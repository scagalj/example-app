<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('/layouts/header')
    </head>
    <body class="antialiased">

        <?php

        use \App\Http\Controllers\ApartmentController;
        use App\Http\Controllers\LangController;
        
        $lang = LangController::getLanguage();
        $apartment1 = ApartmentController::getById(1);
        $apartment2 = ApartmentController::getById(2);
        $apartment3 = ApartmentController::getById(3);
        $apartment4 = ApartmentController::getById(4);
        
        ?>
        
        @include('/layouts/navbar')

        <!---------------HEADER--------------------->
        <div class="container-fluid header-conainer">

            <div id="fullPageHeader" class="fullPageHeaderMain" style="background: url(/images/headers/main-header.jpg); background-position: center; background-repeat: no-repeat; background-size: cover" >
<!--                <div id="headerContent" class="headerImageContent">
                    <div class="container-fluid">
                        <div class="headerName">
                            <h1 class="whiteColor headerTitle">{{ __('messages.ApartmentsNature') }}</h1>
                        </div>
                    </div>
                </div>-->

            </div>
            <!--            <div class="container-sm welcomeTitle">
            
                            Check In:
                            <div class="form-group mb-0" id="bootstrap-datepicker">
                                <input class="form-control" type="text" data-provide="datepicker" id="startDate" name="StartDate" value="">
                            </div>
                        </div>-->
        </div>

        <script>
            $(document).ready(function () {

                $('#startDate').datepicker({
                    format: "dd.MM.yyyy",
                    dateFormat: "dd.MM.yyyy",
                    toggleActive: true,
                    todayBtn: "linked",
                    changeMonth: true,
                    changeYear: true
                });
            });
        </script>
        <!---------------HEADER END--------------------->

        <!--------------APARTMENTS ICONS------------------>

        <!--        <div class="container-sm">
                    <div class="row apartments-icons">
                        <div class="col-lg-2 col-sm-6 col-6 ">
                            <img src="images/icons/rental.png"  width="48" height="48"/>
                            <p>RENT DIRECT FROM OWNER</p>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-6 ">
                            <img src="images/icons/parking-sign.png"  width="48" height="48"/>
                            <p>FREE PARKING</p>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-6 ">
                            <img src="images/icons/mountain.png"  width="48" height="48"/>
                            <p>MOUNTAIN VIEW</p>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-6 ">
                            <img src="images/icons/balcony.png"  width="48" height="48"/>
                            <p>ROOMS WITH BALCONY</p>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-6 ">
                            <img src="images/icons/planet-earth.png"  width="48" height="48"/>
                            <p>ENVIRONMENTALLY CONSCIOUS</p>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-6 ">
                            <img src="images/icons/wifi.png"  width="48" height="48"/>
                            <p>FREE WIFI</p>
                        </div>
        
                    </div>
                </div>-->



        <!--------------APARTMENTS ICONS END-------------->

        <!--DESCRIPTION-->
        <div class="container apartmentDescription">
            <h1 class="apartmentNameWelcome">{{ __('messages.ApartmentsNature') }}</h1>
            <p class="">
                {{ __('messages.welcomeMessage1') }}
            </p>
            <p class="">
                {{ __('messages.welcomeMessage2') }}
            </p>
            <p class="">
                {!! __('messages.welcomeMessage3') !!}
            </p>
        </div>
        <!--/DESCRIPTION END-->


        <!--------------APARTMENTS---------------------->


        <div id="apartments" class="container-fluid apartments-wrapper mt-3" >
            <!--<div class="apartments-wrapper-header text-center pt-5">-->
            <!--<h2>ROOMS</h2>-->
            <!--</div>-->
            <!--<div class="apartments-wrapper-description text-center">-->
            <!--<h4>Find best room that fits your needs</h4>-->
            <!--</div>-->

            <div class="container-sm mt-5 pb-5 px-3">
                <!--<div>-->
                <!--<h2>Accommodation in Omiš</h2>-->
                <!--</div>-->
                <div class="row gx-5">
                    @include('/layouts/apartment-overview',['apartment' => $apartment1])
                    @include('/layouts/apartment-overview',['apartment' => $apartment1])
                    @include('/layouts/apartment-overview',['apartment' => $apartment1])
                    @include('/layouts/apartment-overview',['apartment' => $apartment1])
                    @include('/layouts/apartment-overview',['apartment' => $apartment2])
                    @include('/layouts/apartment-overview',['apartment' => $apartment3])
                    @include('/layouts/apartment-overview',['apartment' => $apartment4])
                </div>
            </div>

        </div>

        <!--------------APARTMENTS END------------------->

        <!--------------REVIEWS ------------------->

        <div class="container">
            @include('/layouts/reviews')
        </div>

        <!--------------END------------------->

        <!--------------CONTACT US----------------->


        <section id="section-216-12" class="ct-section">
            <div class="ct-section-inner-wrap">
                <h2 id="headline-217-12" class="ct-headline atomic-secondary-heading uppercase">{{ __('messages.ScheduleOnTime') }}</h2>
                <div id="text_block-218-12" class="ct-text-block atomic-subheading">
                    {{ __('messages.ScheduleOnTimeDescription') }}
                </div>
                <a id="link_text-219-12" class="ct-link-text atomic-primary-button uppercase" href="{{route('contactus')}}">{{ __('messages.ContactUs')}}</a>
            </div>
        </section>



        <div id="location" class="container-fluid mb-5" style="padding: 0px;">
            <iframe id="googlemps" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4118.891789282664!2d16.686875737841838!3d43.44598708451032!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134a9998d1887e19%3A0xb66add0f81abc631!2sApartments%20Nature!5e0!3m2!1shr!2shr!4v1680730404692!5m2!1shr!2shr" width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!--------------END CONTACT US----------------->


        <!--------------EXPLORE LIKE A LOCAL-------------->

        <div id="explore" class="container-fluid header-conainer mt-5 pt-5 mb-5 pb-5">

            <!--<div id="fullPageHeader" class="fullPageHeaderMain" style="background: url(/images/explorelikelocal/activities-header.jpg); background-position: center; background-repeat: no-repeat; background-size: cover" >-->
            <!--                <div id="headerContent" class="headerImageContent">
                                <div class="container-fluid">
                                    <div class="headerName">
                                        <h1 class="whiteColor headerTitle">{{ __('messages.ApartmentsNature') }}</h1>
                                    </div>
                                </div>
                            </div>-->

            <!--</div>-->
            <!--            <div class="container explore-like-a-local-wrapper">
                            <div class="row justify-content-between">
                                <div class="col-4 explore-like-alocal-title">
                                    <h4 class="text-uppercase pb-2">Explore like a local</h4>
                                    <span class="">Little friendly town that offers you enormous numbers of activities</span>
                                </div>
                            </div>
                        </div>-->
            <div class="guestHeader">
                <h3 class="mb-3 f-w-4">{{ __('messages.ExploreLikeALocal') }}</h3>
                <p>{{ __('messages.ExploreLikeALocalDescription') }}</p>
            </div>
            <div class="container explore-like-a-local-images mb-5">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 rowColImage">
                        <div>
                            <img src="images/explorelikelocal/rafting.jpg" class="explore-like-a-local-images-gallery-image" />
                        </div>
                        <div class="explore-like-a-local-image-content">
                            <h5 class="uppercase">{{ __('messages.RaftingOnCetina') }}</h5>
                                
                            {{ __('messages.RaftingOnCetinaText') }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 rowColImage">
                        <div>
                            <img src="images/explorelikelocal/pirate-battle.jpg" class="explore-like-a-local-images-gallery-image" />
                        </div>
                        <div class="explore-like-a-local-image-content">
                            <h5 class="uppercase">{{ __('messages.PirateBattle') }}</h5>
                            {{ __('messages.PirateBattleText') }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 rowColImage">
                        <div>
                            <img src="images/explorelikelocal/rock-climbing.jpg" class="explore-like-a-local-images-gallery-image" />
                        </div>
                        <div class="explore-like-a-local-image-content">
                            <h5 class="uppercase">{{ __('messages.RockClimbing') }}</h5>
                            {{ __('messages.RockClimbingText') }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 rowColImage">
                        <div>
                            <img src="images/explorelikelocal/traditional-dishes.jpg" class="explore-like-a-local-images-gallery-image" />
                        </div>
                        <div class="explore-like-a-local-image-content">
                            <h5 class="uppercase">{{ __('messages.TraditionalDishes') }}</h5>
                            {{ __('messages.TraditionalDishesText') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 rowColImage">
                        <div>
                            <img src="images/explorelikelocal/mountain-bike.jpg" class="explore-like-a-local-images-gallery-image" />
                        </div>
                        <div class="explore-like-a-local-image-content">
                            <h5 class="uppercase">{{ __('messages.MountainBike') }}</h5>
                            {{ __('messages.MountainBikeText') }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 rowColImage">
                        <div>
                            <img src="images/explorelikelocal/ferrata-omis.jpg" class="explore-like-a-local-images-gallery-image" />
                        </div>
                        <div class="explore-like-a-local-image-content">
                            <h5 class="uppercase">{{ __('messages.FerataOmis') }}</h5>
                            {{ __('messages.FerataOmisText') }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 rowColImage">
                        <div>
                            <img src="images/explorelikelocal/zipline.jpg" class="explore-like-a-local-images-gallery-image" />
                        </div>
                        <div class="explore-like-a-local-image-content">
                            <h5 class="uppercase">{{ __('messages.ZipLine') }}</h5>
                            {{ __('messages.ZipLineText') }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 rowColImage">
                        <div>
                            <img src="images/explorelikelocal/fortress-fortica.jpg" class="explore-like-a-local-images-gallery-image" />
                        </div>
                        <div class="explore-like-a-local-image-content">
                            <h5 class="uppercase">{{ __('messages.FortressFortica') }}</h5>
                            {{ __('messages.FortressForticaText') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--------------EXPLORE LIKE A LOCAL END-------------->

        <!--<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">-->
        <!--            @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                        @endauth
                    </div>
                    @endif-->

        <!--</div>-->

        @include('/layouts/footer')

    </body>
</html>
