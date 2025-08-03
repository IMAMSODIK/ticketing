<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <title>{{ $pageTitle }}</title>

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{ asset('landing-assets/images/fav.png') }}">

    <!-- Stylesheets -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('landing_assets/vendor/unicons-2.0.1/css/unicons.css') }}" rel='stylesheet'>
    <link href="{{ asset('landing_assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/vertical-responsive-menu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/analytics.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/night-mode.css') }}" rel="stylesheet">

    <!-- Vendor Stylesheets -->
    <link href="{{ asset('landing_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('landing_assets/vendor/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/vendor/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.css') }}"
        rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .menu-divider {
            display: flex;
            align-items: center;
            text-align: center;
            padding: 10px 0;
            list-style: none;
        }

        .menu-divider .divider-text {
            flex: 1;
            border-bottom: 1px solid #ccc;
            line-height: 0.1em;
            margin: 10px 0;
            color: #666;
            font-weight: bold;
            position: relative;
        }

        .menu-divider .divider-text::before,
        .menu-divider .divider-text::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #ccc;
            margin: 0 10px;
        }
    </style>

    @yield('own_style')

</head>
