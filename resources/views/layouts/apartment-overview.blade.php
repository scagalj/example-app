<?php

use \App\Http\Controllers\ApartmentController;
use App\Http\Controllers\LangController;

$lang = LangController::getLanguage();
?>

@isset($apartment)

<div class="p-4 col-lg-6 col-sm-12 col-12 mb-5 apartment-container">
    <div class="box shadow">

        <a href="{{route('apartment', $apartment->id)}}">
            <div class="apartment-detail-container">
                <img src="
                <?php
                $mainImage = ApartmentController::getMainImage($apartment);
                if(isset($mainImage)){
                    echo $apartment->getImagesPath() . $mainImage->filename;
                }
                ?>" class="apartment-image-dispay"  />
            </div>
        </a>
        <div class="apartment-name-wrapper">
            <div class="apartment-name">
                <h3>{{  __('messages.' . $apartment->name) }} </h3>
                <div class="apartment-description">25m2 / 1-2 {{ __('messages.person') }}</div>
            </div>
            <span class="apartment-description-overview">
                <?php echo strip_tags($apartment->getdescriptionvalue($lang)); ?>
            </span>
            <b><span class="description-show-more"><a href="{{ route('apartment', $apartment->id) }}"> {{ __('messages.showmore') }} </a></span></b>
            <!--<div class="apartment-name-more-details">Show more details</div>-->
            <div class="apartment-book-now uppercase">
                <a href="{{ route('apartment', $apartment->id) }}"><p> {{ __('messages.BookNow') }} +</p></a>
            </div>
        </div>
    </div>
</div>

@endisset