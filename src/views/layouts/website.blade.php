<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Personal, Portfolio, Creative">
    <meta name="description" content="Kalvin Portfolio Template">
    <meta name="author" content="cosmos-themes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kalvin - Portfolio Template</title>

    <!-- favicon -->
    <link href="{{asset('package_assets/website')}}/assets/images/favicon.ico" rel="icon" type="image/png">

    <!--Font Awesome css-->
    <link rel="stylesheet" href="{{asset('package_assets/website')}}/assets/css/font-awesome.min.css">

    <!--Bootstrap css-->
    <link rel="stylesheet" href="{{asset('package_assets/website')}}/assets/css/bootstrap.css">

    <!--Owl Carousel css-->
    <link rel="stylesheet" href="{{asset('package_assets/website')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('package_assets/website')}}/assets/css/owl.theme.default.min.css">

    <!--Magnific Popup css-->
    <link rel="stylesheet" href="{{asset('package_assets/website')}}/assets/css/magnific-popup.css">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800,900%7cOpen+Sans:400,600,700,800"
        rel="stylesheet">

    <!--Site Main Style css-->
    <link rel="stylesheet" href="{{asset('package_assets/website')}}/assets/css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122650090-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-122650090-1');
    </script>

</head>

<body>

    <!--Preloader-->
    {{-- <div class="preloader">
            <div class="loader "></div>
        </div> --}}
    <!--Preloader-->

    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo" href="index.html">
                <img src="{{asset(''.BlogPackage::show_all_basic()->header_logo)}}" alt="" style="width:
                    60px;">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <!--Nav Links-->
                    <li class="nav-item">
                        <a href="#" class="nav-link active" data-scroll-nav="0">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-scroll-nav="1">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-scroll-nav="2">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-scroll-nav="3">Works</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-scroll-nav="4">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-scroll-nav="5">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Navbar End-->
    @yield('content')
    <!--Home Section Start-->

    <!--Home Section End-->

    <!--About Section Start-->

    <!--About Section End-->

    <!--Services Section Start-->

    <!--Services Section End-->

    <!--Stats Section Start-->

    <!--Stats Section End-->


    <!--Portfolio Section Start-->

    <!--Portfolio Section End-->

    <!--Blog Section Start-->

    <!--Blog Section End-->

    <!--Testimonials Section Start-->

    <!--Testimonials Section End-->

    <!--Contact Section Start-->

    <!--Contact Section End-->

    <!--Footer Start-->
    <footer class="pt-50 pb-50">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-sm-6">
                    <!--Contant Item-->
                    <div class="contact-info">
                        <img src="{{asset(''.BlogPackage::show_all_basic()->footer_logo)}}" alt="" style="width:
                            60px;">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Contant Item-->
                    <div class="contact-info">
                        <h5>Phone No.</h5>
                        <p>(+1) 123 456 7890</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Contant Item-->
                    <div class="contact-info">
                        <h5>Email</h5>
                        <p>info@example.com</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Contant Item-->
                    <div class="contact-info">
                        <h5>Address</h5>
                        <p>123 lorem ipsum New York, USA.</p>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <hr>
                    <p class="copy pt-30">
                        Kalvin &copy; 2018. All Right Reserved, Designed By Cosmos-Themes.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!--Footer End-->

    <!--Jquery js-->
    <script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
    <!--Bootstrap js-->
    <script src="{{asset('package_assets/website')}}/assets/js/bootstrap.min.js"></script>
    <!--Stellar js-->
    <script src="{{asset('package_assets/website')}}/assets/js/jquery.stellar.js"></script>
    <!--Animated Headline js-->
    <script src="{{asset('package_assets/website')}}/assets/js/animated.headline.js"></script>
    <!--Owl Carousel js-->
    <script src="{{asset('package_assets/website')}}/assets/js/owl.carousel.min.js"></script>
    <!--ScrollIt js-->
    <script src="{{asset('package_assets/website')}}/assets/js/scrollIt.min.js"></script>
    <!--Isotope js-->
    <script src="{{asset('package_assets/website')}}/assets/js/isotope.pkgd.min.js"></script>
    <!--Magnific Popup js-->
    <script src="{{asset('package_assets/website')}}/assets/js/jquery.magnific-popup.min.js"></script>
    <!--Site Main js-->
    <script src="{{asset('package_assets/website')}}/assets/js/main.js"></script>

</body>


</html>