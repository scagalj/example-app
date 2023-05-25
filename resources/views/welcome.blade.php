<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('/layouts/header')
    </head>
    <body class="antialiased">

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
            <div class="container-sm welcomeTitle">
                <form action="{{ route('apartment.searchCriteria.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="inline-input-date">
                        <span>{{ __('messages.CheckIn')}}:</span>
                        <input class="date-pickers form-control actual_range" type="text" autocomplete="off"  id="checkIn" name="checkIn" value="{{ Session::get('checkIn') ?? '' }}" required="true">
                    </div>
                    <div class="inline-input-date">
                        <span>{{ __('messages.CheckOut')}}:</span>
                        <input class="date-pickers form-control actual_range" type="text" autocomplete="off"  data-provide="datepicker" id="checkOut" name="checkOut" value="{{ Session::get('checkOut') ?? '' }}" required="true">
                    </div>
                    <div class="inline-input-date">
                        <span>{{ __('messages.Guests')}}:</span>
                        <input type="number" step="any"  name="guests" id="guests" min="1" max="2" class="form-control" value="{{ Session::get('guests') ?? '2' }}" required="true"/>
                    </div>

                    <div class="inline-input-date">
                        <button type="submit" class="btn searchBtn">{{ __('messages.Search')}}</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            $(document).ready(function () {

                $(".date-pickers").datepicker.defaults.format = 'dd.mm.yyyy';
                $('.date-pickers').datepicker({
                    startDate: new Date(),
                    todayHighlight: true,
                    autoclose: true,
                })

                $("#checkIn").datepicker({
                }).on("changeDate", function (e) {
                    $checkInDate = $(e.currentTarget).val();
                    if ($("#checkOut").val() === null || $("#checkOut").val() === undefined || $("#checkOut").val() === '') {
                        $selectedDate = $(e.currentTarget).val();
                        $('#checkOut').val(addDayToDate($selectedDate, 1));
                        $("#checkOut").datepicker('update');
                    }
                    $checkOutDate = $('#checkOut').val();
                    if (cretaeDateFromString($checkInDate) > cretaeDateFromString($checkOutDate)) {
                        $selectedDate = $(e.currentTarget).val();
                        $('#checkOut').val(addDayToDate($selectedDate, 1));
                    }
                    $('#checkOut').focus();
                });

            });

            function addDayToDate($date, $days) {
                $dateO = cretaeDateFromString($date);
                $dateO.setDate($dateO.getDate() + $days);

                $newDay = $dateO.getDate();
                $newMonth = ($dateO.getMonth() + 1);
                $newYear = $dateO.getFullYear();


                if ($newDay < 10){
                    $newDay = "0" + $newDay.toString();
                }
                if ($newMonth < 10){
                    $newMonth = "0" + $newMonth.toString();
                }
                return $newDay.toString() + "." + $newMonth.toString() + "." + $newYear.toString();
            }
            
            function cretaeDateFromString($dateAsString){
                
                $values = $dateAsString.split('.');
                $day = $values[0];
                $month = $values[1];
                $year = $values[2];
                $dateS = $year + "-" + $month + "-" + $day;
                $dateO = new Date($dateS);
                return $dateO;
            }
            
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
            <iframe id="googlemps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5793.658165061611!2d16.68513861313894!3d43.44328550964453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134a9842f9b61385%3A0x8987116b5779943c!2zTGlzacSNaW5hIDIsIDIxMzEwLCBPbWnFoQ!5e0!3m2!1shr!2shr!4v1684258887423!5m2!1shr!2shr" width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

        @include('/layouts/footer')

    </body>
</html>
