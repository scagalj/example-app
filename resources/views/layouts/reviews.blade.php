<?php

if(!isset($page)){
    $page = 'default';
}

use \App\Http\Controllers\ApartmentReviewsController;

$reviews = ApartmentReviewsController::getAll();
//            echo $reviews;
?>
    
<div id="reviews">
    @if ($page == 'apartmentDetails')
    <div class="row">
        <div class="col-12">
            <div class="mt-4 mb-2">
                <div style="display: flex;font-size: 25px;">
                    <!--<span style="padding-right: 5px; padding-left: 10px; padding-bottom: 10px;" >&#x2022;</span>-->
                    <h3 class="f-w-6">{{ __('messages.GuestReviews') }}</h3>
                </div>
                <!--<div class="houseLocation" style="padding-left: 10px; display: block;">-->
                    <!--<span style="font-size: 15px;">{{ __('messages.WhatOurGuestsThinkAboutOurAccommodation') }}</span>-->
                <!--</div>-->
            </div>
        </div>
    </div>
    @else
    <div class="row mt-3">
        <div class="col-12">
            <div class="guestHeader">
                <h3 class="mb-3 f-w-4">{{ __('messages.GuestReviews') }}</h3>
                <p>{{ __('messages.WhatOurGuestsThinkAboutOurAccommodation') }}</p>
            </div>
        </div>
    </div>
    @endif
</div>


<div class="row reviewsClass">
    <div class="col-12">
        <div class="mt-4 mb-5">
            <div id="reviewItems" class="row prevent-select">
                @foreach($reviews as $review)

                <div class="col-lg-4 col-sm-12 col-12 hidden" card-index="{{($loop->index + 1)}}" style="padding-right: 20px;padding-left: 20px;">

                    <div class="card review-block">
                        <div class="review-profile-image-wrapper">
                            <div class="review-profile-image">
                                <?php echo $review->firstName[0] ?> 
                            </div></div>
                        <div class="review-content">
                            <div class=""><span class="review-name">{{ $review->firstName }},</span><span class="review-date">{{ __('messages.Reviewed')}}: <?php echo (new DateTimeImmutable($review->reviewDate))->format('d.m.Y'); ?></span></div>
                            <div class="review-rating">
                                @if ($review->ratingNumber > 2)
                                <i class="fa fa-star rating-color"></i>
                                @endif
                                @if ($review->ratingNumber > 4)
                                <i class="fa fa-star rating-color"></i>
                                @endif
                                @if ($review->ratingNumber > 6)
                                <i class="fa fa-star rating-color"></i>
                                @endif
                                @if ($review->ratingNumber > 6 && $review->ratingNumber < 8)
                                <i class="fa fa-star rating-color-half"></i>
                                @elseif ($review->ratingNumber > 7)
                                <i class="fa fa-star rating-color"></i>
                                @endif
                                @if ($review->ratingNumber > 8 && $review->ratingNumber < 10)
                                <i class="fa fa-star rating-color-half"></i>
                                @elseif ($review->ratingNumber > 9)
                                <i class="fa fa-star rating-color"></i>
                                @endif
                            </div>
                            <div class="review-title"><h4>{{ $review->title }}</h4></div>
                            <hr/>
                            <div class="review-message">{{ $review->positiveComment }}</div>
                        </div>
                    </div>

                </div>


                @endforeach
            </div>
            <div class="moveElements">
                <div id="moveLeft" class="moveIconBlock prevent-select hidden"><</div>
                <div id="moveRight" class="moveIconBlock prevent-select">></div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {

        function isTouchDevice() {
            return (('ontouchstart' in window) ||
                    (navigator.maxTouchPoints > 0) ||
                    (navigator.msMaxTouchPoints > 0));
        }

        var startEventType = 'mousedown',
                endEventType = 'mouseup';

        if (isTouchDevice() === true) {
            startEventType = 'touchstart';
            endEventType = 'touchend';
        }

        var mx = 0;
        var moveXLast = 0;
        $('#reviewItems').not('.moveElements').bind(startEventType, function (ed) {
            if (ed.pageX == undefined) {
                mx = ed.touches[0].pageX;
            } else {
                mx = ed.pageX;//register the mouse down position
            }

            $('#reviewItems').not('.moveElements').bind('touchmove', function (event) {
                moveXLast = event.touches[0].pageX;
            });

//                console.log('mouseDown');
        });

        $('#reviewItems').not('.moveElements').bind(endEventType, function (eup) {
//                console.log('mouseUp');

            if (eup.pageX == undefined) {
//                            mouseUpX = eup.touches[0].pageX;
            } else {
                moveXLast = eup.pageX;//register the mouse down position

            }
            if (moveXLast > mx) { //right w.r.t mouse down position
                moveLeft();
//                    console.log("Moved Right");
            } else {
                moveRight();
//                    console.log("Moved Left")
            }
        });

        var activeIndexFrom = 1;
        var activeIndexTo = 3;
        var numberOfActiveCards = 3;
        var w = window.innerWidth;
        if (w < 992) {
            numberOfActiveCards = 1;
            activeIndexTo = 1;
            $('.moveIconBlock').css({"top": "150px"});

        }
        var numberOfElements = parseInt("<?php echo $reviews->count(); ?>");

        $childrens = $('#reviewItems').children().each(function () {
            if (parseInt($(this).attr('card-index')) <= numberOfActiveCards) {
                $(this).removeClass('hidden');
                $(this).addClass('visible');
            }

        });
        if ((activeIndexFrom - 1) <= 0 && !$("#moveLeft").hasClass('hidden')) {
            $("#moveLeft").addClass('hidden');
        }

        if (activeIndexTo >= numberOfElements && !$("#moveRight").hasClass('hidden')) {
            $("#moveRight").addClass('hidden');
        }

        $("#moveLeft").on("click", function () {
            moveLeft();

        });


        $("#moveRight").on("click", function () {
            moveRight();
        });

//                        $(window).on('DOMMouseScroll mousewheel', function (e) {
//                            if (e.originalEvent.detail > 0 || e.originalEvent.wheelDeltaX < 0) { //alternative options for wheelData: wheelDeltaX & wheelDeltaY
//                                //scroll right
//                                moveRight();
////                                alert("RIGHT");
//                            } else {
//                                //scroll left
//                                moveLeft();
////                                alert("LEFT");
//                            }
//
//                            //prevent page fom scrolling
//                            return false;
//                        });

        function moveRight() {
            if (activeIndexTo >= numberOfElements) {
                return;
            }

            $('#reviewItems').children().eq(activeIndexFrom - 1).removeClass('visible').addClass('hidden');
            activeIndexFrom = activeIndexFrom + 1;
            activeIndexTo = activeIndexTo + 1;
            $('#reviewItems').children().eq(activeIndexTo - 1).removeClass('hidden').addClass('visible');
            if (activeIndexTo >= numberOfElements) {
                $("#moveRight").addClass('hidden');
            }

            if ((activeIndexFrom - 1) > 0 && $("#moveLeft").hasClass('hidden')) {
                $("#moveLeft").removeClass('hidden').addClass('visible');
            }
        }
        function moveLeft() {
            if ((activeIndexFrom - 1) <= 0) {
                return;
            }
            activeIndexFrom = activeIndexFrom - 1;
            $('#reviewItems').children().eq(activeIndexFrom - 1).removeClass('hidden').addClass('visible');
            $('#reviewItems').children().eq(activeIndexTo - 1).removeClass('visible').addClass('hidden');
            activeIndexTo = activeIndexTo - 1;
            if ((activeIndexFrom - 1) <= 0) {
                $("#moveLeft").addClass('hidden');
            }
            if (activeIndexTo < numberOfElements && $("#moveRight").hasClass('hidden')) {
                $("#moveRight").removeClass('hidden').addClass('visible');
            }
        }


    });
</script>