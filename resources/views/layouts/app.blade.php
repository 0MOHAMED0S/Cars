<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="shortcut icon" href="{{ asset('main/images/sport-car.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('main/style.css') }}" />
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
</head>

<body class="font-sans antialiased">
    <div id="loading">
        <div id="loading-center">
            <img src="{{ asset('main/images/loader.gif') }}" alt="">
        </div>
    </div>
    <div class="min-h-screen bg-gray-100">

        @include('layouts.headar')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @include('layouts.footer')
</body>

<script type="text/javascript" src="{{ asset('main/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/js/mega_menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/js/jquery.appear.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/js/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/vendor/jquery.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/vendor/jquery.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('main/vendor/extensions/revolution.extension.actions.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('main/vendor/extensions/revolution.extension.carousel.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('main/vendor/extensions/revolution.extension.kenburn.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('main/vendor/extensions/revolution.extension.layeranimation.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('main/vendor/extensions/revolution.extension.migration.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('main/vendor/extensions/revolution.extension.navigation.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('main/vendor/extensions/revolution.extension.parallax.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('main/vendor/extensions/revolution.extension.slideanims.min.js') }}">
</script>

<script type="text/javascript" src="{{ asset('main/js/custom.js') }}"></script>
<script type="text/javascript">
    (function(b) {
        var a = jQuery;
        var c;
        a(document).ready(function() {
            if (a("#rev_slider_2_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_2_1")
            } else {
                c = a("#rev_slider_2_1").show().revolution({
                    sliderType: "standard",
                    sliderLayout: "fullwidth",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        bullets: {
                            enable: true,
                            hide_onmobile: false,
                            style: "hermes",
                            hide_onleave: false,
                            direction: "horizontal",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 0,
                            v_offset: 50,
                            space: 10,
                            tmp: ""
                        }
                    },
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: 1570,
                    gridheight: 1000,
                    lazyType: "none",
                    shadow: 0,
                    spinner: "spinner3",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                })
            }
        })
    })(jQuery);
</script>
</html>
