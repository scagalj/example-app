<div class="container-fluid header-navigation">
    <div class="container">


        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{route('welcome')}}">
                <div class="headerLogo">
                    <img class="logoImage" src="/images/logoname2.png" alt=""/>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto headerItems">
                    @include('/layouts/navbar-items')
                </ul>
                <!--                <form class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>-->
            </div>

            <div class="dropdown">
                <li class=" nav-item flag-icon-style dropdown-toggle" data-toggle="dropdown" aria-expanded="false" value="en" style="list-style-type: none;">
                    <i class="flag-icon flag-icon-{{ $lang == 'en' || $lang == '' ? 'gb' : ($lang == 'cs' ? 'cz' : $lang) }}"></i>
                </li>
                <ul class="dropdown-menu changeLang">
                    <li class="nav-item flag-icon-style {{ $lang == 'en' || $lang == '' ? 'hide' : ''}}" value="en">
                        <i class="flag-icon flag-icon-gb"></i>
                    </li>
                    <li class="nav-item flag-icon-style {{ $lang == 'de' ? 'hide' : ''}}" value="de">
                        <i class="flag-icon flag-icon-de"></i>
                    </li>
                    <li class="nav-item flag-icon-style {{ $lang == 'es' ? 'hide' : ''}}" value="es">
                        <i class="flag-icon flag-icon-es "></i>
                    </li>
                    <li class="nav-item flag-icon-style {{ $lang == 'fr' ? 'hide' : ''}}" value="fr">
                        <i class="flag-icon flag-icon-fr"></i>
                    </li>
                    <li class="nav-item flag-icon-style {{ $lang == 'it' ? 'hide' : ''}}" value="it">
                        <i class="flag-icon flag-icon-it"></i>
                    </li>
                    <li class="nav-item flag-icon-style {{ $lang == 'pl' ? 'hide' : ''}}" value="pl">
                        <i class="flag-icon flag-icon-pl"></i>
                    </li>
                    <li class="nav-item flag-icon-style {{ $lang == 'cs' ? 'hide' : ''}}" value="cs">
                        <i class="flag-icon flag-icon-cz"></i>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="headerPadding"></div>

<script type="text/javascript">

    var curLang = "{{ $lang }}";
    $(".changeLang li").click(function () {
        var lang = $(this).attr('value');
        
    var currentUrl = window.location.href;
    if(currentUrl.includes('/'+curLang)){
        var newurl = currentUrl.replace('/'+curLang, '/'+lang);
    }else{
        var newurl = currentUrl + lang;
    }
        window.location.href = newurl;
    });

</script>