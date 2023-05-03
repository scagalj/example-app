<li class="nav-item active">
    <a class="nav-link" href="{{route('welcome')}}">{{ __('messages.Home') }}</a>
</li>
<li class="nav-item">
    <?php
    $homeRoute = route('welcome');
    $welcomeApartmentsUrl = $homeRoute . '#apartments';
    $welcomeReviewsUrl = $homeRoute . '#reviews';
    $welcomeLocationUrl = $homeRoute . '#location';
    $welcomeExploreUrl = $homeRoute . '#explore';
    ?>


    <a class="nav-link" href="<?php echo $welcomeApartmentsUrl ?>">{{ __('messages.Apartments') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo $welcomeReviewsUrl ?>">{{ __('messages.Reviews') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo $welcomeLocationUrl ?>">{{ __('messages.Location') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo $welcomeExploreUrl ?>">{{ __('messages.ExploreLikeALocal') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('contactus')}}">{{ __('messages.Contact') }}</a>
</li>