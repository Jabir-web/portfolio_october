<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Primary Meta Tags -->
    <title>Jabir Faisal - Expert Laravel Web Developer in Pakistan | Portfolio</title>
    <meta name="title" content="Jabir Faisal - Expert Laravel Web Developer in Pakistan | Portfolio">
    <meta name="description"
        content="I'm Jabir Faisal, a professional Laravel Web Developer from Pakistan. I build dynamic websites, web apps, and business software using Laravel, PHP, HTML, CSS, and JavaScript. Explore my portfolio and hire me for your next project.">
    <meta name="keywords"
        content="Laravel developer, web developer Pakistan, hire Laravel expert, full stack developer, PHP developer, freelance web developer, Jabir Faisal, Laravel portfolio, web app developer, backend developer, frontend developer">
    <meta name="author" content="Jabir Faisal">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://jabirfaisal.com/">
    <meta property="og:title" content="Jabir Faisal - Expert Laravel Web Developer in Pakistan | Portfolio">
    <meta property="og:description"
        content="Professional Laravel Web Developer from Pakistan. I create modern, responsive, and scalable websites and web applications.">
    <meta property="og:image" content="https://jabirfaisal.com/images/og-image.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://jabirfaisal.com/">
    <meta property="twitter:title" content="Jabir Faisal - Expert Laravel Web Developer in Pakistan | Portfolio">
    <meta property="twitter:description"
        content="Explore the portfolio of Jabir Faisal — a Laravel Web Developer from Pakistan building powerful and secure web applications.">
    <meta property="twitter:image" content="https://jabirfaisal.com/images/og-image.jpg">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900|Oswald:400,700" rel="stylesheet">

    <!-- Stylesheets -->
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
