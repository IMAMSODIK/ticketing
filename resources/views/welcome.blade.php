<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <title>{{ $pageTitle }}</title>

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="images/fav.png">

    <!-- Stylesheets -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
    <link href="{{ asset('landing_assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/night-mode.css') }}" rel="stylesheet">

    <!-- Vendor Stylesheets -->
    <link href="{{ asset('landing_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}"
        rel="stylesheet">
    <style>
        .hero-banner {
            background-image: url('...');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .hero-banner-overlay {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .hero-banner .container,
        .hero-banner-content {
            position: relative;
            z-index: 2;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <!-- Header Start-->
    <header class="header">
        <div class="header-inner">
            <nav
                class="navbar navbar-expand-lg bg-barren barren-head navbar fixed-top justify-content-sm-start pt-0 pb-0">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon">
                            <i class="fa-solid fa-bars"></i>
                        </span>
                    </button>
                    <a class="navbar-brand order-1 order-lg-0 ml-lg-0 ml-2 me-auto" href="/">
                        <div class="res-main-logo">
                            <h3 class="text-dark">Sahabat Bertamu</h3>
                        </div>
                        <div class="main-logo" id="logo">
                            <h3 class="text-dark">Sahabat Bertamu</h3>
                        </div>
                    </a>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <div class="offcanvas-logo" id="offcanvasNavbarLabel">
                                <h3 class="text-dark">Sahabat Bertamu</h3>
                            </div>
                            <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe_5">
                            </ul>
                        </div>
                        <div class="offcanvas-footer">
                            <div class="offcanvas-social">
                                <h5>Social Media Kami</h5>
                                <ul class="social-links">
                                    <li><a href="{{ $web_profile && $web_profile->facebook ? $web_profile->facebook : 'https://www.facebook.com/?locale=id_ID' }}"
                                                _target="blank" class="social-link"><i class="fab fa-facebook-square"></i></a>
                                    <li><a href="{{ $web_profile && $web_profile->instagram ? $web_profile->instagram : 'https://www.instagram.com/?locale=id_ID' }}"
                                                _target="blank" class="social-link"><i class="fab fa-instagram"></i></a>
                                    <li><a href="{{ $web_profile && $web_profile->tiktok ? $web_profile->tiktok : 'https://www.tiktok.com/?locale=id_ID' }}"
                                                _target="blank" class="social-link"><i class="fab fa-tiktok"></i></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="right-header order-2">
                        <ul class="align-self-stretch">
                            @guest
                                <li>
                                    <a href="/login" class="create-btn-2 btn-hover">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                                        <span>Login</span>
                                    </a>
                                </li>
                            @endguest

                            @auth
                                <li class="dropdown account-dropdown">
                                    <a href="#" class="account-link" role="button" id="accountClick"
                                        data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ auth()->user()->avatar }}" alt="">
                                        <i class="fas fa-caret-down arrow-icon"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-account dropdown-menu-end"
                                        aria-labelledby="accountClick">
                                        <li>
                                            <div class="dropdown-account-header">
                                                <div class="account-holder-avatar">
                                                    <img src="{{ auth()->user()->avatar }}" alt="">
                                                </div>
                                                <h5>{{ auth()->user()->name }}</h5>
                                                <p>{{ auth()->user()->email }}</p>
                                            </div>
                                        </li>
                                        <li class="profile-link">
                                            <a href="/{{(auth()->user()->role == 'admin') ? 'admin' : 'user'}}-dashboard" class="link-item">My Dashboard</a>
                                            <form method="POST" action="/logout">
                                                @csrf
                                                <button type="submit" class="link-item"
                                                    style="background: none; border: none; color: inherit; padding: 0;">Sign
                                                    Out</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="overlay"></div>
        </div>
    </header>
    <!-- Header End-->
    <!-- Body Start-->
    <div class="wrapper">
        <div class="hero-banner position-relative"
            style="background-image: url('{{ $web_profile && $web_profile->banner ? asset('storage/' . $web_profile->banner) : asset('landing_assets/images/banner.jpg') }}')">
            <div class="hero-banner-overlay"></div>
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9 col-md-10">
                        <div class="hero-banner-content">
                            <div class="text-center">
                                <h2 class="text-white">Selamat datang di <span style="color: #6ac045">Sahabat
                                        Bertamu</span></h2>
                            </div>

                            <div class="social-media-icons" style="margin-top: 20px;">
                                <div class="offcanvas-social">
                                    <h5 class="text-white">Social Media Kami</h5>
                                    <ul class="social-links">
                                        <li><a href="{{ $web_profile && $web_profile->facebook ? $web_profile->facebook : 'https://www.facebook.com/?locale=id_ID' }}"
                                                _target="blank" class="social-link"><i
                                                    class="fab fa-facebook-square"></i></a>
                                        <li><a href="{{ $web_profile && $web_profile->instagram ? $web_profile->instagram : 'https://www.instagram.com/' }}"
                                                _target="blank" class="social-link"><i
                                                    class="fab fa-instagram"></i></a>
                                        <li><a href="{{ $web_profile && $web_profile->tiktok ? $web_profile->tiktok : 'https://www.tiktok.com/?locale=id_ID' }}"
                                                _target="blank" class="social-link"><i class="fab fa-tiktok"></i></a>
                                    </ul>
                                </div>
                            </div>
                            <a href="#events" class="create-btn btn-hover">
                                <span>Lihat Event</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="explore-events p-80" id="events">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="main-title">
                            <h3>Cari Events</h3>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <form method="GET" action="{{ url('/') }}">
                            <div class="form-group border_bottom">
                                <label class="">Pilih Lokasi Event</label>
                                <select class="selectpicker" name="kota" data-size="5" title="Pilih Lokasi"
                                    data-live-search="true" onchange="this.form.submit()">
                                    @foreach ($kotas as $kota)
                                        <option value="{{ $kota->id }}"
                                            {{ request('kota') == $kota->id ? 'selected' : '' }}>
                                            {{ $kota->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6">
                    <div class="event-filter-items">
                        <div class="featured-controls">
                            <div class="row" data-ref="event-filter-content">
                                @foreach ($events as $event)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mix arts concert workshops volunteer sports health_Wellness"
                                        data-ref="mixitup-target">
                                        <div class="main-card mt-4">
                                            <div class="event-thumbnail">
                                                <a href="venue_event_detail_view.html" class="thumbnail-img">
                                                    <img src="{{ $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('own_assets/default_flayer.png') }}"
                                                        alt="">
                                                </a>
                                                {{-- <span class="bookmark-icon" title="Bookmark"></span> --}}
                                            </div>
                                            <div class="event-content">
                                                <a href="/event/detail-event?id={{ $event->id }}"
                                                    class="event-title">{{ $event->title }}</a>
                                                <div class="duration-price-remaining">
                                                    <span class="duration-price">
                                                        Harga mulai dari : <br>
                                                        @if ($event->jenisTiket->isNotEmpty())
                                                            Rp.
                                                            {{ number_format($event->jenisTiket->min('harga'), 0, ',', '.') }}
                                                        @else
                                                            <span class="badge text-bg-success">Free</span>
                                                        @endif
                                                    </span>
                                                    <span class="remaining"></span>
                                                </div>
                                            </div>
                                            <div class="event-footer">
                                                <div class="event-timing">
                                                    <div class="publish-date">
                                                        <span><i
                                                                class="fa-solid fa-calendar-day me-2"></i>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('d M') }}</span>
                                                        <span class="dot"><i class="fa-solid fa-circle"></i></span>
                                                        <span>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('l') . ', ' . \Carbon\Carbon::parse($event->waktu_mulai)->format('h:i A') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- @if ($count_event > 8)
                                <div class="browse-btn">
                                    <a href="explore_events.html" class="main-btn btn-hover ">View More</a>
                                </div>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Body End-->
    <!-- Footer Start-->
    <footer class="footer mt-auto">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="footer-content">
                            <h4>Follow Us</h4>
                            <ul class="social-links">
                                <li><a href="{{ $web_profile && $web_profile->facebook ? $web_profile->facebook : 'https://www.facebook.com/?locale=id_ID' }}"
                                                _target="blank" class="social-link"><i class="fab fa-facebook-square"></i></a>
                                <li><a href="{{ $web_profile && $web_profile->instagram ? $web_profile->instagram : 'https://www.instagram.com/?locale=id_ID' }}"
                                                _target="blank" class="social-link"><i class="fab fa-instagram"></i></a>
                                <li><a href="{{ $web_profile && $web_profile->tiktok ? $web_profile->tiktok : 'https://www.tiktok.com/?locale=id_ID' }}"
                                                _target="blank" class="social-link"><i class="fab fa-tiktok"></i></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-copyright-text">
                            <p class="mb-0">© 2025, <strong>{{ $appName }}</strong>. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End-->


    <script src="{{ asset('landing_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landing_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing_assets/vendor/OwlCarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('landing_assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('landing_assets/vendor/mixitup/dist/mixitup.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/custom.js') }}"></script>
    <script src="{{ asset('landing_assets/js/night-mode.js') }}"></script>
    <script>
        var containerEl = document.querySelector('[data-ref~="event-filter-content"]');

        var mixer = mixitup(containerEl, {
            selectors: {
                target: '[data-ref~="mixitup-target"]'
            }
        });
    </script>
</body>

</html>
