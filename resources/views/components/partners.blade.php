<div class="rs-partner bg-light partner-main-home pt-60 pb-60">
    <div class="container">               
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="2" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="3" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="3" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">
            @foreach (partners() as $partner)
                <div class="grid-figure">
                    <div class="logo-img">
                        <a href="#">
                            <img src="{{ asset_img('partners/' . $partner) }}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>