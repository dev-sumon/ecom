<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="{{ asset('frontend/assets/images/favicon/1.png')}}" type="image/x-icon">
    <title>@yield('title', 'Ecom') -Shoping</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/vendors/bootstrap.css')}}">

    <!-- wow css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css')}}" />

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/vendors/font-awesome.css')}}">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/vendors/feather-icon.css')}}">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/vendors/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/vendors/slick/slick-theme.css')}}">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bulk-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/vendors/animate.css')}}">
    @stack('css_link')

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css')}}">
    @stack('css')
</head>

<body class="bg-effect">

    <!-- Loader Start -->
    <!-- <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div> -->
    <!-- Loader End -->

    {{-- Header Start  --}}
    <header class="pb-md-4 pb-0">
        {{-- Header Top  --}}
            @include('frontend.include.header.top')
        {{-- Header Top  --}}

        {{-- Header Middle  --}}
            @include('frontend.include.header.middle')
        {{-- Header Middle  --}}

        {{-- Menu  --}}
            @include('frontend.include.header.menu')
        {{-- Menu  --}}
    </header>
    {{-- Header End  --}}

        <!-- mobile fix menu start -->
            @include('frontend.include.header.mobile-menu')
        <!-- mobile fix menu start -->

    <!-- mobile fix menu end -->

    <!-- Main Content -->
        @yield('content')

    <!-- Main Content -->







    {{-- Footer Section Start  --}}
        @include('frontend.include.footer.footer')
    {{-- Footer Section End  --}}

    {{-- <!-- Location Modal Start --> --}}
        {{-- @include('frontend.include.modal.location') --}}
    {{-- <!-- Location Modal End --> --}}

    {{-- <!-- Cookie Bar Box Start --> --}}
        @include('frontend.include.modal.cookie')
    {{-- <!-- Cookie Bar Box End --> --}}

    {{-- <!-- Deal Box Modal Start --> --}}
        {{-- @include('frontend.include.modal.deal-box') --}}
    {{-- <!-- Deal Box Modal End --> --}}

    <!-- Tap to top start -->
    <div class="theme-option">
        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- latest jquery-->
    <script src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js')}}"></script>

    <!-- jquery ui-->
    <script src="{{ asset('frontend/assets/js/jquery-ui.min.js')}}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('frontend/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap/bootstrap-notify.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap/popper.min.js')}}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('frontend/assets/js/feather/feather.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/feather/feather-icon.js')}}"></script>

    <!-- Lazyload Js -->
    <script src="{{ asset('frontend/assets/js/lazysizes.min.js')}}"></script>

    <!-- Slick js-->
    <script src="{{ asset('frontend/assets/js/slick/slick.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/slick/slick-animation.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/slick/custom_slick.js')}}"></script>

    <!-- Auto Height Js -->
    <script src="{{ asset('frontend/assets/js/auto-height.js')}}"></script>

    <!-- Timer Js -->
    <script src="{{ asset('frontend/assets/js/timer1.js')}}"></script>

    <!-- Fly Cart Js -->
    <script src="{{ asset('frontend/assets/js/fly-cart.js')}}"></script>

    <!-- Quantity js -->
    <script src="{{ asset('frontend/assets/js/quantity-2.js')}}"></script>

    @stack('js_link')

    <!-- WOW js -->
    <script src="{{ asset('frontend/assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/custom-wow.js')}}"></script>

    <!-- script js -->
    <script src="{{ asset('frontend/assets/js/script.js')}}"></script>
    @stack('js')
</body>

</html>
