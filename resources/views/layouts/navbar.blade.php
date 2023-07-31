<div class="container-fluid header-navigation">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="{{route('welcome')}}" style="padding-top: 0px; margin-top: 0px;">
            <div class="headerLogo">
                <div class="logoNameFont headerLogoName">{{ __('messages.ApartmentsNature')}}</div>
                <span class="uppercase headerLogoPlaceName" >Omiš</span>
                                          <!--<img class="logoImage" src="/images/logoname2.png" alt="Apartment Nature Omiš"/>-->
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
                <li class="nav-item flag-icon-style {{ $lang == 'hr' ? 'hide' : ''}}" value="hr">
                    <i class="flag-icon flag-icon-hr"></i>
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
<div class="headerPadding"></div>

<script type="text/javascript">

    var curLang = "{{ $lang }}";
    $(".changeLang li").click(function () {
    var lang = $(this).attr('value');
    var currentUrl = window.location.href;
    var anchor = window.location.hash; // Extract the anchor part of the URL
    
    // Remove the anchor from the current URL
    var urlWithoutAnchor = currentUrl.replace(anchor, '');
    
    if (urlWithoutAnchor.includes('/' + curLang)) {
        var newurl = urlWithoutAnchor.replace('/' + curLang, '/' + lang);
    } else {
        var newurl = urlWithoutAnchor + lang;
    }
    
    // Append the anchor back to the new URL
    var newurlWithAnchor = newurl + anchor;
    
    window.location.href = newurlWithAnchor;
});

</script>
