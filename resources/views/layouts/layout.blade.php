<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Jabir Faisal">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="" />


    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600, 700,900|Oswald:400,700" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fancybox.min.css') }}">

  

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Jabir Faisal - Laravel Web Developer</title>


</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="200">


    <div class="site-wrap">

        @include('components.nav')
        <main class="main-content">
            @yield('content')
        </main>

    </div> <!-- .site-wrap -->

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/lozad.min.js') }}"></script>

    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    {{-- <script src="//cdn.datatables.net/2.3.4/js/dataTables.min.js"></script> --}}

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
        $('.owl-carousel').owlCarousel({
            items: 1,
            merge: true,
            loop: true,
            margin: 10,
            video: true,
            lazyLoad: true,
            center: true,
            videoWidth: false, // Default false; Type: Boolean/Number
            videoHeight: false, // Default false; Type: Boolean/Number
            responsive: {
                480: {
                    items: 2
                },
                600: {
                    items: 4
                }
            }
        })
        
    
        </script>
    <script src="{{ asset('js/main.js') }}"></script>


</body>

</html>
