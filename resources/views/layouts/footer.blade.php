<footer class="container-fluid mt-5 footer-wrapper">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 col-md-2 col-lg-2 pt-5 footer-navigation">
                <ul class="navbar-nav mr-auto">
                    @include('/layouts/navbar-items')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('privacypolicy')}}">{{ __('messages.PrivacyPolicy') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-7" style="margin: auto; text-align: center;">
                <img src="/images/stay_safe.png" class="" style="width: 100%; padding: 4vw; width: 65%;"/>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 pt-5 footerContactUs">
                <h5 class="uppercase">{{ __('messages.ContactUs') }}:</h5>
                <p class="footerContactDetail">
                    <i class="fa fa-home footerIcon" aria-hidden="true"></i>
                    <span>{{ __('messages.ApartmentsNature') }}</span>
                </p>
                <p class="footerContactDetail">
                    <i class="fa fa-map-marker footerIcon" aria-hidden="true"></i>
                    <span>{{ __('messages.Lisičina 2, 21310 Omiš, Croatia') }}</span>
                </p>
                <p class="footerContactDetail">
                    <i class="fa fa-envelope-o footerIcon" aria-hidden="true"></i>
                    <span><a href="mailto:apartmentsnature2@gmail.com">apartmentsnature2@gmail.com</a></span>
                </p>
                <p class="footerContactDetail">
                    <i class="fa fa-whatsapp footerIcon" aria-hidden="true"></i>
                    <span><a href="tel:+385915933575">+385915933575</a></span>
                </p>
                <p class="footerContactDetail">
                    <i class="fa fa-phone footerIcon" aria-hidden="true"></i>
                    <span><a href="tel:+385919285696">+385919285696</a></span>
                </p>
            </div>
        </div>
        <div class="pb-5">
            
        </div>
        <div class="row pb-2">
            <div class="col-12">
                <div class="copyRight">
                    <span>{{ __('messages.Copyright') }} © 2023 - Apartments Nature</span>
                </div>
            </div>

        </div>
    </div>
</footer>