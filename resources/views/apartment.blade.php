<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('/layouts/header')
    </head>
    <body class="antialiased">

        <?php

        use App\Http\Controllers\LangController;

$lang = LangController::getLanguage();
        ?>

        @include('/layouts/navbar')


        <div class="container pt-5">

            <div class="row houseName">
                <h1 class="f-w-6">{{$apartment->house->name}}</h1>
            </div>

            <div class="row houseDetails">
                <div class="ratings">
                    <i class="fa fa-star rating-color"></i>
                    <i class="fa fa-star rating-color"></i>
                    <i class="fa fa-star rating-color"></i>
                    <i class="fa fa-star rating-color"></i>
                    <i class="fa fa-star rating-color-half"></i>
                </div>
                <!--<span style="padding-left: 5px;">4.5</span>-->
                <span>
                    <a href="#reviews">{{ __('messages.ShowRatings') }}</a>
                </span>
                <!--<span class="apartmentDetailsSpacer" >&#x2022;</span>-->
                <div class="houseLocation">
                    <i class="fa fa-map-marker rating-color" aria-hidden="true"></i>
                    <span>{{ __('messages.Lisičina 2, 21310 Omiš, Croatia') }} - </span>
                    <a href="#location"> {{ __('messages.ShowOnMap') }} </a>
                </div>
            </div>


            <?php
            $mainImage = $apartment->getMainImage();
            $firstRowImages = $apartment->getImagesByRange(0, 2);
            $secondRowImages = $apartment->getImagesByRange(2, 2);
            $allImages = $apartment->getAllImagesToDisplay();
            $imagePath = $apartment->getImagesPath();
//            echo $allImages;
            ?>
            <script>

                $(document).ready(function () {
                    var images = @json($allImages);
                            var index = 0;
                    var imagePath = "<?php echo $imagePath; ?>";
                    $("#showAllImages").on("click", function () {
                        index = 0;
                        $('#gallery').removeClass('hidden').addClass('display');
                        loadImages(index);
                    });
                    $(".imageGallery").on("click", function () {
                        index = parseInt($(this).attr('index-val'));
                        $('#gallery').removeClass('hidden').addClass('display');
                        loadImages(index);
                    });
                    $("#prev").on("click", function () {
                        previousImage();
                    });
                    $("#next").on("click", function () {
                        nextImage();
                    });
                    $("#closeGallery").on("click", function () {
                        closeGallery();
                    });
                    function previousImage() {
                        if (index === 0) {
                            index = (images.length - 1);
                        } else {
                            index--;
                        }
                        loadImages(index);
                    }

                    function nextImage() {
                        if (index === (images.length - 1)) {
                            index = 0;
                        } else {
                            index++;
                        }
                        loadImages(index);
                    }

                    function closeGallery() {
                        if (isGalleryOpen) {
                            $('#gallery').removeClass('display').addClass('hidden');
                        }
                    }

                    function isGalleryOpen() {
                        return $('#gallery').hasClass('display');
                    }

                    function loadImages(indexTemp) {
                        $('#image').attr('src', imagePath + images[indexTemp].filename);
                        updateImageNumber();
                    }

                    function updateImageNumber() {
                        $('#currentPage').html(index + 1);
                        $('#numberOfImages').html(images.length);
                    }

                    $(document).keyup(function (e) {
                        if (e.key === "Escape") { // escape key maps to keycode `27`
                            if (isGalleryOpen()) {
                                closeGallery();
                            }
                        } else if (e.key === "ArrowLeft") {
                            if (isGalleryOpen()) {
                                previousImage();
                            }

                        } else if (e.key === "ArrowRight") {
                            if (isGalleryOpen()) {
                                nextImage();
                            }
                        }
                    });
                });
            </script>

            <div id="gallery" class="wholePage hidden">
                <div style="height: 80px;">
                    <div class="headerNavigation">
                        <span id="closeGallery" >X</span>
                    </div>
                </div>
                <div class="imageDisplay">
                    <img id="image" class="fitImageGallery" src="" />
                </div>
                <div id="galleryActions" class="noselect">
                    <span id="prev"><</span>
                    <span id="currentPage"></span>/<span id="numberOfImages"></span>
                    <span id="next">></span>
                </div>

            </div>

            @isset($mainImage, $firstRowImages, $secondRowImages)

            <div class="row headerGallery rowOverride">

                <div class="col-sm-12 col-md-6" style="/*height: 300px;*/">
                    <div class="mainHeaderLargerImage" style="height: 372px;" >
                        <img class="fitImage rounded-left imageGallery" index-val='0' src="{{$apartment->getImagesPath() . $mainImage->filename}}" title="{{$mainImage->description}}" alt="{{ $mainImage->name }}">
                    </div>
                </div>
                <div class="d-none d-md-block col-md-6" style="position: relative;">
                    <div class="row firstRow rowOverride">
                        @foreach($firstRowImages as $rowImage)
                        <div class="col-md-6" style="height: 180px;">
                            <img class="fitImage imageGallery imageGroup {{$loop->last ? 'rounded-top-right' : '' }}" index-val='{{($loop->index + 1)}}' src="{{$apartment->getImagesPath() . $rowImage->filename}}" title="{{$rowImage->description}}" alt="{{ $rowImage->name }}">
                        </div>
                        @endforeach
                    </div>
                    <div class="row rowOverride">
                        @foreach($secondRowImages as $rowImage)
                        <div class="col-md-6" style="height: 180px;" >
                            <img class="fitImage imageGallery imageGroup {{$loop->last ? 'rounded-bottom-right' : '' }}" index-val='{{($loop->index + 3)}}' src="{{$apartment->getImagesPath() . $rowImage->filename}}" title="{{$rowImage->description}}" alt="{{ $rowImage->name }}">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div id="showAllImages" class="showAllImages">
                    <button type="button" class="l1j9v1wn b1qnr4x4 c1p20n7u dir dir-ltr">
                        <div class="_5kaapu"><svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="height: 16px; width: 16px;margin-top: -2px;">
                            <path d="m3 11.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm5 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm5 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-10-5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm5 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm5 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-10-5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm5 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm5 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z" fill-rule="evenodd"></path></svg>
                            <div class="showAllImagesText">{{ __('messages.ShowAllPhotos') }}</div>

                        </div>
                    </button>
                </div>
            </div>

            @endisset

            <div class="row">
                <div class="col-sm-12 col-md-8">

                    <div class="mt-5">

                        <div class="apartmentName">
                            <h2 class="f-w-6"> {{  __('messages.' . $apartment->name) }}</h2>
                        </div>
                        <div class="apartmentDetails">
                            <span class="apartmentDetailsInfo">{{ $apartment->getNumberOfGuests() }} {{ __('messages.Guests') }}</span>
                            <span class="apartmentDetailsSpacer">&#x2022;</span>
                            <span class="apartmentDetailsInfo">{{ $apartment->getNumberOfBedrooms() }} {{ __('messages.Bedrooms') }}</span>
                            <span class="apartmentDetailsSpacer" >&#x2022;</span>
                            <span class="apartmentDetailsInfo">{{ $apartment->getNumberOfBeds() }} {{ __('messages.Beds') }}</span>
                            <span class="apartmentDetailsSpacer" >&#x2022;</span>
                            <span class="apartmentDetailsInfo">{{ $apartment->getNumberOfBathrooms() }} {{ __('messages.Bathrooms') }}</span>
                        </div>
                    </div>
                    <!--<hr/>-->


                    @isset($apartment->note)
                    <div class=" mt-2 mb-4">
                        <!--{!! $apartment->note !!}-->
                        <?php echo $apartment->getdescriptionvalue($lang); ?>
<!--                        <p>Located just a few minutes from the city center and beach, where it offers you peace and quiet in the heart of nature, surrounded by mountains and greenery.</p>
                        <p>The apartment features a comfortable double bed, a private bathroom with shower and additionals, and a fully-equipped kitchen with fridge where you can prepare your own meals.</p>
                        <p>The balcony offers the breathtaking views of the beauty of nature and the surrounding mountains. The balcony is the perfect place to enjoy your morning coffee or sip a glass of wine.
                            During the break time we have WiFi, air condition and not to worry about parking spaces we have private parking.</p>-->
                    </div>

                    @endisset

                    <?php
//                    $roomsWithBed = $apartment->getAllRoomsWithBed();
                    ?>

                    @isset($roomsWithBed)

                    <hr/>
                    <div class="mt-4 mb-5">
                        <h3 class="mb-3 f-w-6">{{ __('messages.WhereYouWillSleep') }}</h3>
                        <div class="rooms">
                            @foreach($roomsWithBed as $room)
                            <div class="roomDetails {{$loop->last ? '' : 'roomSpacer'}}">
                                <div class="iconDetails"><span class="icon">icon</span> <span class="iconDescription">size</span></div>
                                <div class="roomName">{{ $room->name }}</div>
                                @foreach($room->beds as $bed)
                                <div class="bedType">{{ $bed->numberOfBeds }} {{ $bed->name }}</div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endisset

                    <?php
                    $allRoomAccessories = $apartment->getAllAccessoriesWithPopularFirst();
//                    $allRoomAccessories = $apartment->getAllAccessories();
//                    echo $allRoomAccessories;
                    ?>

                    @isset($allRoomAccessories)

                    <hr/>
                    <div class="mt-4 mb-5">
                        <h3 class="mb-3 f-w-6">{{ __('messages.Amenities') }}</h3>
                        <div class="accessories">
                            <div class="row">
                                @foreach($allRoomAccessories as $roomAccessories)
                                <div class="col-md-6 col-xs-12 col-sm-6 accessoriesEntry">
                                    <span class="icon">
                                        <?php
                                        if (!empty($roomAccessories->accessories->iconPath)) {
                                            echo '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; height: 24px; width: 24px;fill: #444444;"><path d="' . $roomAccessories->accessories->iconPath . '" fill-rule="evenodd"></path></svg>';
                                        }
                                        ?>

                                    </span><span class="iconDescrption">{{ __('accessories.'.$roomAccessories->accessories->name) }}<br/><span class="textDescription">{{ __('accessories.' . $roomAccessories->accessories->description) }}</span></span> 
                                    <?php
//                                    if (!empty($roomAccessories->accessories->description)) {
//                                        echo '<span><i class="fa fa-info-circle accessoriedDescriptionInfo" title="' . __('accessories.' . $roomAccessories->accessories->description) . '" aria-hidden="true"></i></span>';
//                                    }
//                                    ?>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    @endisset

                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="mt-5">
                        <form action="{{route('contact.booking.request', ['apartment_id' => $apartment->id]) }}" method="post" >
                            @csrf
                            @include('/layouts/bookingContactForm',['apartment' => $apartment])
                        </form>
                    </div>
                </div>
            </div>


            <?php if ($apartment->house->isHaveHouseRule() == true): ?>

                <hr/>
                <div class="mt-4 mb-5">
                    <h3 class="mb-3 f-w-6">{{ __('messages.HouseRules') }}</h3>
                    <div class="accessories">
                        <div class="row">
                            <?php if ($apartment->house->checkInRule): ?>
                                <div class="col-sm-12 col-md-6 accessoriesEntry">
                                    <span class="icon">
                                        <svg class="bk-icon -streamline-check_in" height="20" width="20" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M87.33 66.22c.06-.1.11-.2.16-.3.077-.125.143-.255.2-.39.054-.133.097-.27.13-.41.04-.112.073-.225.1-.34.1-.515.1-1.045 0-1.56a3.352 3.352 0 0 0-.1-.34 2.802 2.802 0 0 0-.13-.41 2.868 2.868 0 0 0-.2-.39c0-.1-.1-.2-.16-.3a4.922 4.922 0 0 0-.5-.61l-24-24a4.002 4.002 0 1 0-5.66 5.66L74.34 60H20a4 4 0 0 0 0 8h54.34L57.17 85.17a4.002 4.002 0 1 0 5.66 5.66l24-24c.183-.19.35-.394.5-.61zM92 0h-8a4 4 0 0 0 0 8h8c6.627 0 12 5.373 12 12v88c0 6.627-5.373 12-12 12h-8a4 4 0 0 0 0 8h8c11.046 0 20-8.954 20-20V20c0-11.046-8.954-20-20-20z"></path></svg>
                                    </span>
                                    <!--<span class="iconDescrption">{{ $apartment->house->checkInRule }}</span>--> 
                                    <span class="iconDescrption">{{ __('messages.CheckInRule') }}</span> 
                                </div>
                            <?php endif; ?>
                            <?php if ($apartment->house->checkOutRule): ?>
                                <div class="col-sm-12 col-md-6 accessoriesEntry">
                                    <span class="icon">
                                        <svg class="bk-icon -streamline-check_out" height="20" width="20" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M111.33 66.22c.06-.1.11-.2.16-.3.05-.1.15-.25.21-.39s.08-.27.12-.41c.039-.112.073-.225.1-.34.1-.515.1-1.045 0-1.56a3.352 3.352 0 0 0-.1-.34c0-.14-.07-.28-.12-.41-.05-.13-.14-.26-.21-.39-.07-.13-.1-.2-.16-.3a4.886 4.886 0 0 0-.5-.61l-24-24a4.002 4.002 0 1 0-5.66 5.66L98.34 60H44a4 4 0 0 0 0 8h54.34L81.17 85.17a4.002 4.002 0 1 0 5.66 5.66l24-24c.183-.19.35-.394.5-.61zM44 120h-8c-6.627 0-12-5.373-12-12V20c0-6.627 5.373-12 12-12h8a4 4 0 0 0 0-8h-8C24.954 0 16 8.954 16 20v88c0 11.046 8.954 20 20 20h8a4 4 0 0 0 0-8z"></path></svg>
                                    </span>
                                    <!--<span class="iconDescrption">{{ $apartment->house->checkOutRule }}</span>--> 
                                    <span class="iconDescrption">{{ __('messages.CheckOutRule') }}</span> 
                                </div>
                            <?php endif; ?>
                            <?php if ($apartment->house->quietHoursRule): ?>
                                <div class="col-sm-12 col-md-6 accessoriesEntry">
                                    <span class="icon">
                                        <svg class="bk-icon -streamline-weather_moon_stars" height="20" width="20" viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false"><path d="M16.5 21a9 9 0 1 1 0-18 1.02 1.02 0 0 0 1.004-1.048 1.014 1.014 0 0 0-.56-.873A11.912 11.912 0 0 0 12 0C5.373 0 0 5.373 0 12s5.373 12 12 12c1.697 0 3.375-.364 4.92-1.067a1.02 1.02 0 0 0 .478-1.372 1.014 1.014 0 0 0-.872-.56zm-.026 1.5a.486.486 0 0 1-.2-.92c-1.326.602-2.791.92-4.274.92C6.2 22.5 1.5 17.799 1.5 12S6.201 1.5 12 1.5c1.483 0 2.948.318 4.298.933a.497.497 0 0 1-.293-.43.486.486 0 0 1 .47-.503C10.7 1.5 6 6.201 6 12s4.701 10.5 10.5 10.5zM16.5 6.75v3a.75.75 0 0 0 1.5 0v-3a.75.75 0 0 0-1.5 0zM15.75 9h3a.75.75 0 0 0 0-1.5h-3a.75.75 0 0 0 0 1.5zM21 12.75v3a.75.75 0 0 0 1.5 0v-3a.75.75 0 0 0-1.5 0zM20.25 15h3a.75.75 0 0 0 0-1.5h-3a.75.75 0 0 0 0 1.5zm-6.75-.75v3a.75.75 0 0 0 1.5 0v-3a.75.75 0 0 0-1.5 0zm-.75 2.25h3a.75.75 0 0 0 0-1.5h-3a.75.75 0 0 0 0 1.5z"></path></svg>
                                    </span>
                                    <!--<span class="iconDescrption">{{ $apartment->house->quietHoursRule }}</span>--> 
                                    <span class="iconDescrption">{{ __('messages.QuitHoursRule') }}</span> 
                                </div>
                            <?php endif; ?>
                            <?php if ($apartment->house->extraBedPolicy): ?>
                                <div class="col-sm-12 col-md-6 accessoriesEntry">
                                    <span class="icon">
                                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" height="20" width="20" role="presentation" focusable="false"><path d="M28 2a2 2 0 0 1 1.995 1.85L30 4l-.001 9.836 1.847 5.54a3 3 0 0 1 .115.468l.03.24.009.24V30h-2v-2H2v2H0v-9.675a3 3 0 0 1 .087-.717l.067-.232 1.845-5.537L2 4a2 2 0 0 1 1.697-1.977l.154-.018L4 2zm1.999 20H2l-.001 3.999h28zm-1.387-6H3.387l-1.333 4h27.891zM28 4H4l-.001 10H6v-4a2 2 0 0 1 1.85-1.995L8 8h16a2 2 0 0 1 1.995 1.85L26 10v4h1.999zm-13 6H8v4h7zm9 0h-7v4h7z"></path></svg>
                                    </span>
                                    <!--<span class="iconDescrption">{{ $apartment->house->extraBedPolicy }}</span>--> 
                                    <span class="iconDescrption">{{ __('messages.ExtraBedRule') }}</span> 
                                </div>
                            <?php endif; ?>
                            <?php if ($apartment->house->damagePolicy): ?>
                                <div class="col-sm-12 col-md-6 accessoriesEntry">
                                    <span class="icon">
                                        <svg class="bk-icon -streamline-weather_moon_stars" height="20" width="20" viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false"><path d="M16.5 21a9 9 0 1 1 0-18 1.02 1.02 0 0 0 1.004-1.048 1.014 1.014 0 0 0-.56-.873A11.912 11.912 0 0 0 12 0C5.373 0 0 5.373 0 12s5.373 12 12 12c1.697 0 3.375-.364 4.92-1.067a1.02 1.02 0 0 0 .478-1.372 1.014 1.014 0 0 0-.872-.56zm-.026 1.5a.486.486 0 0 1-.2-.92c-1.326.602-2.791.92-4.274.92C6.2 22.5 1.5 17.799 1.5 12S6.201 1.5 12 1.5c1.483 0 2.948.318 4.298.933a.497.497 0 0 1-.293-.43.486.486 0 0 1 .47-.503C10.7 1.5 6 6.201 6 12s4.701 10.5 10.5 10.5zM16.5 6.75v3a.75.75 0 0 0 1.5 0v-3a.75.75 0 0 0-1.5 0zM15.75 9h3a.75.75 0 0 0 0-1.5h-3a.75.75 0 0 0 0 1.5zM21 12.75v3a.75.75 0 0 0 1.5 0v-3a.75.75 0 0 0-1.5 0zM20.25 15h3a.75.75 0 0 0 0-1.5h-3a.75.75 0 0 0 0 1.5zm-6.75-.75v3a.75.75 0 0 0 1.5 0v-3a.75.75 0 0 0-1.5 0zm-.75 2.25h3a.75.75 0 0 0 0-1.5h-3a.75.75 0 0 0 0 1.5z"></path></svg>
                                    </span>
                                    <span class="iconDescrption">{{ $apartment->house->damagePolicy }}</span> 
                                </div>
                            <?php endif; ?>
                            <div class="col-sm-12 col-md-6 accessoriesEntry">
                                <span class="icon">
                                    <svg class="bk-icon -iconset-nosmoking" height="20" width="20" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M64 8a56 56 0 1 0 56 56A56 56 0 0 0 64 8zm0 104a48 48 0 0 1-36.6-79l31 31H28v8h38.3L95 100.6A47.8 47.8 0 0 1 64 112zm36.6-17l-23-23H84v-8H69.7L33 27.4A48 48 0 0 1 100.6 95zM92 64h8v8h-8zm0-10c0-7.7-5.9-14-13.2-14H78a2 2 0 0 1-2-2 10 10 0 0 0-10-10h-8a2 2 0 0 1 0-4h8a14 14 0 0 1 13.8 12c9 .6 16.2 8.4 16.2 18a2 2 0 0 1-4 0zm-8 0a2 2 0 0 1-4 0 2 2 0 0 0-2-2h-3a15 15 0 0 1-15-15 2 2 0 0 1 4 0 11 11 0 0 0 11 11h3a6 6 0 0 1 6 6z"></path></svg>
                                </span>
                                <span class="iconDescrption">
                                    <?php
                                    if ($apartment->house->smokingAllowed) {
                                        echo __('messages.SmokingIsAllowd');
                                    } else {
                                        echo __('messages.SmokingIsNotAllowd');
                                    }
                                    ?>
                                </span> 
                            </div>
                            <div class="col-sm-12 col-md-6 accessoriesEntry">
                                <span class="icon">
                                    <!--<svg class="bk-icon -streamline-soda_can" height="20" width="20" viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false"><path d="M6.75 7.5h10.5a.75.75 0 0 0 0-1.5H6.75a.75.75 0 0 0 0 1.5zm4.35-1.2l-2.25-3a.75.75 0 1 0-1.2.9l2.25 3a.75.75 0 1 0 1.2-.9zm2.775-1.8a.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5 1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5zm2.25-2.25a.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5 1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5zm-4.5-.75a.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5 1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5zm-3.21 4.782L5.742 9.62a2.25 2.25 0 0 0-.493 1.406v9.52c0 .444.132.878.378 1.248l.8 1.2A2.249 2.249 0 0 0 8.298 24H15.7a2.25 2.25 0 0 0 1.872-1.002l.8-1.2a2.25 2.25 0 0 0 .378-1.254v-9.518a2.25 2.25 0 0 0-.494-1.406l-2.67-3.338a.75.75 0 0 0-1.172.936l2.671 3.34a.75.75 0 0 1 .165.468v9.52c0 .15-.044.296-.126.42l-.8 1.2a.75.75 0 0 1-.624.334H8.3a.75.75 0 0 1-.623-.336l-.801-1.202a.75.75 0 0 1-.126-.416v-9.52a.75.75 0 0 1 .165-.468l2.67-3.34a.75.75 0 0 0-1.17-.936z"></path></svg>-->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" height="20" width="20" role="presentation" focusable="false" ><path d="M9.238 3l-.203.408a20.366 20.366 0 0 0-1.69 5.01l-.007.032A9.001 9.001 0 0 1 10.16 8c2.262 0 4.444.844 6.124 2.407l.237.229a6.979 6.979 0 0 0 4.948 2.05 6.985 6.985 0 0 0 3.528-.951l-.002-.222c-.071-2.757-.746-5.456-2.03-8.105L22.762 3H9.238zm.92 7c-1.087 0-2.15.249-3.112.726C7.014 11.15 7 11.574 7 12a9 9 0 0 0 9 9c4.06 0 7.706-3.138 8.72-6.919a8.999 8.999 0 0 1-3.252.605 8.976 8.976 0 0 1-6.126-2.408l-.236-.228A6.967 6.967 0 0 0 10.159 10zm13.804-9l.284.523C26.079 4.913 27 8.41 27 12c0 5.4-4.528 10.398-10 10.95V29h6v2H9v-2h6v-6.045C9.394 22.45 5 17.738 5 12c0-3.591.92-7.087 2.754-10.477L8.038 1h15.924z"></path></svg>
                                </span>
                                <span class="iconDescrption">
                                    <?php
                                    if ($apartment->house->partiesAllowed) {
                                        echo __('messages.PartiesAreAllowed');
                                    } else {
                                        echo __('messages.PartiesAreNotAllowed');
                                    }
                                    ?>
                                </span> 
                            </div>
                            <!--                            <div class="col-sm-12 col-md-6 accessoriesEntry">
                                                            <span class="icon">
                                                                <svg class="bk-icon -streamline-pawprint" height="20" width="20" viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false"><path d="M16.01 15a4.5 4.5 0 1 0-9 0l.75-.75a3.75 3.75 0 1 0 0 7.5 4.96 4.96 0 0 0 2.245-.59 3.277 3.277 0 0 1 3.018.005c.677.365 1.44.567 2.22.585a3.75 3.75 0 1 0 .018-7.5l.749.75zm-1.5 0c0 .414.336.75.75.75a2.25 2.25 0 0 1 0 4.5 3.435 3.435 0 0 1-1.536-.41 4.786 4.786 0 0 0-4.42-.005 3.457 3.457 0 0 1-1.562.415A2.247 2.247 0 0 1 5.51 18a2.25 2.25 0 0 1 2.25-2.25.75.75 0 0 0 .75-.75 3 3 0 1 1 6 0zm-9.75-3.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm1.5 0a3 3 0 1 0-6 0 3 3 0 0 0 6 0zm3-6a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm1.5 0a3 3 0 1 0-6 0 3 3 0 0 0 6 0zm6 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm1.5 0a3 3 0 1 0-6 0 3 3 0 0 0 6 0zm3.75 6a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm1.5 0a3 3 0 1 0-6 0 3 3 0 0 0 6 0z"></path></svg>
                                                            </span>
                                                            <span class="iconDescrption">
                            <?php
                            if ($apartment->house->petsAllowed) {
                                echo __('messages.PetsAreAllowed');
                            } else {
                                echo __('messages.PetsAreNotAllowed');
                            }
                            ?>
                                                            </span> 
                                                        </div>-->
                        </div>
                    </div>

                </div>
            <?php endif; ?>

            <hr/>

            @include('/layouts/reviews', ['page' => 'apartmentDetails'])

            <hr/>
            <div id="location" class="row">
                <div class="col-12">
                    <div class="mt-4 mb-5">
                        <div class="pb-4">
                            <!--<span style="padding-right: 5px; padding-left: 10px; padding-bottom: 10px;" >&#x2022;</span>-->
                            <h3 class="f-w-6">{{ __('messages.Location') }}</h3>
                        </div>
                        <!--<div class="houseLocation" style="padding-bottom: 10px; display: block;">-->
                            <!--<i class="fa fa-map-marker rating-color" aria-hidden="true"></i>-->
                            <!--<span>Lisičina 2, 21310 Omiš, Croatia</span>-->
                        <!--</div>-->
                        <div>
                            <iframe id="googlemps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5793.658165061611!2d16.68513861313894!3d43.44328550964453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134a9842f9b61385%3A0x8987116b5779943c!2zTGlzacSNaW5hIDIsIDIxMzEwLCBPbWnFoQ!5e0!3m2!1shr!2shr!4v1684258887423!5m2!1shr!2shr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <!--<hr/>-->
                </div>
            </div>
        </div>

        @include('/layouts/footer')

    </body>
</html>
