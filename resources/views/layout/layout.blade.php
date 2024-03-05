<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from html.themesawesome.com/dugemhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Mar 2024 18:21:21 GMT -->
<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <!-- SYLESHEETS
            ============================================= -->
            @vite(['resources/css/aos.css'])
            @vite(['resources/css/style1.css'])
            @vite(['resources/css/swiper.min.css'])
            @vite(['resources/css/lightgallery.min.css'])
            @vite(['resources/css/plugin.css'])
            @vite(['resources/css/sm-core-css.css'])
            @vite(['resources/css/sm-clean.css'])
            @vite(['resources/css/thaw-flex.css'])
            @vite(['resources/css/font.css'])
            @vite(['resources/css/fontawesome.min.css'])
            @vite(['resources/css/style.css'])
            @vite(['resources/css/responsive.css'])
            
            
        <link rel="icon" href="{{ asset('img/fav-icon.png') }} ">
        <script>
            document.documentElement.className = 'js';

        </script>
        <!-- EXTERNAL STYLES
            ============================================= -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <!-- DOCUMENT TITLES
            ============================================= -->
        <title>Evento</title>
    </head>

    <body class="demo-1">
          <!-- HEADER START
                ============================================= -->
                @include('layout.nav')
            <!-- HEADER END -->
        @yield('content')
    </body>
   <!-- FOOTER START
                ============================================= -->
           @include('layout.footer')

                <!-- FOOTER END -->
           
<!-- Mirrored from html.themesawesome.com/dugemhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Mar 2024 18:21:25 GMT -->
</html>
