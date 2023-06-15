@isset($apartment)

<?php
$isDatesDefined = false;
$price = 0;
$periodFrom = Session::get('checkIn');
$periodTo = Session::get('checkOut');
$guests = Session::get('guests');

if (isset($periodFrom) && isset($periodTo)) {
    $isDatesDefined = true;
    $price = $apartment->calculatePrice($periodFrom, $periodTo, $guests);
} else {
    $price = $apartment->calculatePrice(null, null, $guests);
}

$priceText = '';
$priceAmount = '';
$priceCurrency = ' € ';
if ($price == 0) {
    $priceText = '<span class="mint-color">' .__('messages.OnRequest') . '</span>';
} else {
    if ($isDatesDefined) {
        $priceAmount = $priceCurrency . number_format($price, 2);
        $priceText =  __('messages.TotalPrice');
    } else {
        $priceText = '<span>' . __('messages.From') . ' </span><span class="mint-color" style="display: inline-block;">' . $priceCurrency  . number_format($price, 2) . ' / ' . __('messages.Night') . '</span>';
    }
}
?>

<div class="p-4 col-lg-6 col-sm-12 col-12 mb-5 apartment-container <?php if ($price == 0) { echo 'notAvailable'; } ?>" >
    <div class="box shadow">

        <a href="{{route('apartment', $apartment->id)}}">
            <div class="apartment-detail-container">
                <img src="
                <?php
                $mainImage = $apartment->getMainImage();
                if (isset($mainImage)) {
                    echo $apartment->getImagesPath() . $mainImage->filename;
                }
                ?>" class="apartment-image-dispay" alt="{{  __('messages.' . $apartment->name) }} at Nature apartment in Omiš"  />
            </div>
        </a>
        <div class="apartment-name-wrapper">
            <div class="apartment-name">
                <h3>{{  __('messages.' . $apartment->name) }} </h3>
                <div class="apartment-description">25m2 / 1-{{ $apartment->getNumberOfGuests()}} {{ __('messages.person') }}</div>
            </div>
            <span class="apartment-description-overview">
                <?php echo strip_tags($apartment->getdescriptionvalue($lang)); ?>
            </span>
            <b><span class="description-show-more"><a href="{{ route('apartment', $apartment->id) }}"> {{ __('messages.showmore') }} </a></span></b>
            <!--<div class="apartment-name-more-details">Show more details</div>-->
            <div class="apartment-book-now uppercase">
                <div class="priceText" style="<?php if($isDatesDefined && $price > 0) { echo 'width: min-content;'; } ?>">
                    <?php echo $priceText ?>
                </div>
                <div class="priceAmount">
                    <?php echo $priceAmount ?>
                </div>
                <div class="booknow uppercase" style="display: inline-block; float: right;">
                    <a href="{{ route('apartment', $apartment->id) }}"><span class="booknowBtn"> {{ __('messages.BookNow') }}</span></a>
                </div>

            </div>
        </div>
    </div>
</div>

@endisset
