<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('/layouts/header')
    </head>
    <body class="antialiased">

        @include('/layouts/navbar')

        <div class="container-fluid header-conainer">
            <div id="fullPageContactUsHeader" class="fullPageContactUsHeaderMain" style="background: url(/images/headers/contactus.jpg); background-position: center; background-repeat: no-repeat; background-size: cover" >
                <div id="headerContent" class="headerContactUsImageContent">
                    <div class="container-fluid">
                        <div class="headerName">
                            <h1 class="imageHeaderFontSize f-w-2">{{ __('messages.Contact') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5" style="display: inline-block"></div>
        <div class="container mt-5">
            <div class="row">
                <div class="apartmentInformationDetails col-lg-6 col-md-5 col-sm-12 col-12 col-xs-12">
                    <div class="pb-5">
                        
                    <h3>Apartments Nature</h3>

                    <p>{{__('messages.FellFreeToContactUsOn')}} <a href="mailto:apartmentsnature2@gmail.com"><b>apartmentsnature2@gmail.com</b></a></p>

                    <p>{{__('messages.CallUs')}} <span><a href="tel:+385911235696"><b>+385911235696</b></a></span></p>

                    <p>{{__('messages.Adress')}}: <b>Lisičina 2, 21310 Omiš, Croatia</b></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-12 col-12 col-xs-12">
                    <form action="{{route('contact.information.request') }}" method="post" >
                        @csrf
                        @include('/layouts/informationContactForm')
                    </form>
                </div>
            </div>

        </div>


        @include('/layouts/footer')

    </body>
</html>
