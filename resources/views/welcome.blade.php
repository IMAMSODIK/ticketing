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
                    <a class="navbar-brand order-1 order-lg-0 ml-lg-0 ml-2 me-auto" href="index.html">
                        <div class="res-main-logo">
                            <img src="{{ asset('landing_assets/images/logo-icon.svg') }}" alt="">
                        </div>
                        <div class="main-logo" id="logo">
                            <h3 class="text-dark">Sahabat Bertamu</h3>
                        </div>
                    </a>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <div class="offcanvas-logo" id="offcanvasNavbarLabel">
                                <img src="{{ asset('landing_assets/images/logo-icon.svg') }}" alt="">
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
                                    <li><a href="#" class="social-link"><i class="fab fa-facebook-square"></i></a>
                                    <li><a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                    <li><a href="#" class="social-link"><i class="fab fa-tiktok"></i></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="right-header order-2">
                        <ul class="align-self-stretch">
                            @guest
                                <li>
                                    <a href="/login" class="create-btn btn-hover">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                                        <span>Login</span>
                                    </a>
                                </li>
                            @endguest

                            @auth
                                <li class="dropdown account-dropdown">
                                    <a href="#" class="account-link" role="button" id="accountClick"
                                        data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ Auth::user()->profile_photo_url ?? asset('landing_assets/images/profile-imgs/img-13.jpg') }}"
                                            alt="">
                                        <i class="fas fa-caret-down arrow-icon"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-account dropdown-menu-end"
                                        aria-labelledby="accountClick">
                                        <li>
                                            <div class="dropdown-account-header">
                                                <div class="account-holder-avatar">
                                                    <img src="{{ Auth::user()->profile_photo_url ?? asset('landing_assets/images/profile-imgs/img-13.jpg') }}"
                                                        alt="">
                                                </div>
                                                <h5>{{ Auth::user()->name }}</h5>
                                                <p>{{ Auth::user()->email }}</p>
                                            </div>
                                        </li>
                                        <li class="profile-link">
                                            <a href="/dashboard" class="link-item">My Dashboard</a>
                                            <a href="/profile" class="link-item">My Profile</a>
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

                            <li>
                                <div class="night_mode_switch__btn">
                                    <div id="night-mode" class="fas fa-moon fa-sun"></div>
                                </div>
                            </li>
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
        <div class="hero-banner">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9 col-md-10">
                        <div class="hero-banner-content">
                            <div class="text-center">
                                <h2>Selamat datang di <span style="color: #6ac045">Sahabat Bertamu</span></h2>
                            </div>

                            <div class="social-media-icons" style="margin-top: 20px;">
                                <div class="offcanvas-social">
                                    <h5>Social Media Kami</h5>
                                    <ul class="social-links">
                                        <li><a href="#" class="social-link"><i
                                                    class="fab fa-facebook-square"></i></a>
                                        <li><a href="#" class="social-link"><i
                                                    class="fab fa-instagram"></i></a>
                                        <li><a href="#" class="social-link"><i class="fab fa-tiktok"></i></a>
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
                        <div class="form-group border_bottom">
                            <label class="">Pilih Lokasi Event</label>
                            <select class="selectpicker" multiple="" data-selected-text-format="count > 4"
                                data-size="5" title="Select category" data-live-search="true">
                                <option value="01">Arts</option>
                                <option value="02">Business</option>
                                <option value="03">Coaching and Consulting</option>
                                <option value="04">Community and Culture</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="event-filter-items">
                            <div class="featured-controls">
                                <div class="row" data-ref="event-filter-content">
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mix arts concert workshops volunteer sports health_Wellness"
                                        data-ref="mixitup-target">
                                        <div class="main-card mt-4">
                                            <div class="event-thumbnail">
                                                <a href="venue_event_detail_view.html" class="thumbnail-img">
                                                    <img src="{{ asset('landing_assets/images/event-imgs/img-1.jpg') }}"
                                                        alt="">
                                                </a>
                                                <span class="bookmark-icon" title="Bookmark"></span>
                                            </div>
                                            <div class="event-content">
                                                <a href="venue_event_detail_view.html" class="event-title">A New Way
                                                    Of Life</a>
                                                <div class="duration-price-remaining">
                                                    <span class="duration-price">AUD $100.00*</span>
                                                    <span class="remaining"></span>
                                                </div>
                                            </div>
                                            <div class="event-footer">
                                                <div class="event-timing">
                                                    <div class="publish-date">
                                                        <span><i class="fa-solid fa-calendar-day me-2"></i>15
                                                            Apr</span>
                                                        <span class="dot"><i class="fa-solid fa-circle"></i></span>
                                                        <span>Fri, 3.45 PM</span>
                                                    </div>
                                                    <span class="publish-time"><i
                                                            class="fa-solid fa-clock me-2"></i>1h</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mix business workshops volunteer sports health_Wellness"
                                        data-ref="mixitup-target">
                                        <div class="main-card mt-4">
                                            <div class="event-thumbnail">
                                                <a href="online_event_detail_view.html" class="thumbnail-img">
                                                    <img src="{{ asset('landing_assets/images/event-imgs/img-2.jpg') }}"
                                                        alt="">
                                                </a>
                                                <span class="bookmark-icon" title="Bookmark"></span>
                                            </div>
                                            <div class="event-content">
                                                <a href="online_event_detail_view.html" class="event-title">Earrings
                                                    Workshop with Bronwyn David</a>
                                                <div class="duration-price-remaining">
                                                    <span class="duration-price">AUD $75.00*</span>
                                                    <span class="remaining"><i
                                                            class="fa-solid fa-ticket fa-rotate-90"></i>6
                                                        Remaining</span>
                                                </div>
                                            </div>
                                            <div class="event-footer">
                                                <div class="event-timing">
                                                    <div class="publish-date">
                                                        <span><i class="fa-solid fa-calendar-day me-2"></i>30
                                                            Apr</span>
                                                        <span class="dot"><i class="fa-solid fa-circle"></i></span>
                                                        <span>Sat, 11.20 PM</span>
                                                    </div>
                                                    <span class="publish-time"><i
                                                            class="fa-solid fa-clock me-2"></i>2h</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mix coaching_consulting free concert volunteer health_Wellness bussiness"
                                        data-ref="mixitup-target">
                                        <div class="main-card mt-4">
                                            <div class="event-thumbnail">
                                                <a href="venue_event_detail_view.html" class="thumbnail-img">
                                                    <img src="{{ asset('landing_assets/images/event-imgs/img-3.jpg') }}"
                                                        alt="">
                                                </a>
                                                <span class="bookmark-icon" title="Bookmark"></span>
                                            </div>
                                            <div class="event-content">
                                                <a href="venue_event_detail_view.html" class="event-title">Spring
                                                    Showcase Saturday April 30th 2022 at 7pm</a>
                                                <div class="duration-price-remaining">
                                                    <span class="duration-price">Free*</span>
                                                    <span class="remaining"></span>
                                                </div>
                                            </div>
                                            <div class="event-footer">
                                                <div class="event-timing">
                                                    <div class="publish-date">
                                                        <span><i class="fa-solid fa-calendar-day me-2"></i>1 May</span>
                                                        <span class="dot"><i class="fa-solid fa-circle"></i></span>
                                                        <span>Sun, 4.30 PM</span>
                                                    </div>
                                                    <span class="publish-time"><i
                                                            class="fa-solid fa-clock me-2"></i>3h</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-xl-3 col-lg-4 col-md-6 col-sm-12 mix health_Wellness concert volunteer sports free business"
                                        data-ref="mixitup-target">
                                        <div class="main-card mt-4">
                                            <div class="event-thumbnail">
                                                <a href="online_event_detail_view.html" class="thumbnail-img">
                                                    <img src="{{ asset('landing_assets/images/event-imgs/img-4.jpg') }}"
                                                        alt="">
                                                </a>
                                                <span class="bookmark-icon" title="Bookmark"></span>
                                            </div>
                                            <div class="event-content">
                                                <a href="online_event_detail_view.html" class="event-title">Shutter
                                                    Life</a>
                                                <div class="duration-price-remaining">
                                                    <span class="duration-price">AUD $85.00</span>
                                                    <span class="remaining"><i
                                                            class="fa-solid fa-ticket fa-rotate-90"></i>7
                                                        Remaining</span>
                                                </div>
                                            </div>
                                            <div class="event-footer">
                                                <div class="event-timing">
                                                    <div class="publish-date">
                                                        <span><i class="fa-solid fa-calendar-day me-2"></i>1 May</span>
                                                        <span class="dot"><i class="fa-solid fa-circle"></i></span>
                                                        <span>Sun, 5.30 PM</span>
                                                    </div>
                                                    <span class="publish-time"><i
                                                            class="fa-solid fa-clock me-2"></i>1h</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mix concert sports health_Wellness free arts"
                                        data-ref="mixitup-target">
                                        <div class="main-card mt-4">
                                            <div class="event-thumbnail">
                                                <a href="venue_event_detail_view.html" class="thumbnail-img">
                                                    <img src="{{ asset('landing_assets/images/event-imgs/img-5.jpg') }}"
                                                        alt="">
                                                </a>
                                                <span class="bookmark-icon" title="Bookmark"></span>
                                            </div>
                                            <div class="event-content">
                                                <a href="venue_event_detail_view.html" class="event-title">Friday
                                                    Night Dinner at The Old Station May 27 2022</a>
                                                <div class="duration-price-remaining">
                                                    <span class="duration-price">AUD $41.50*</span>
                                                    <span class="remaining"></span>
                                                </div>
                                            </div>
                                            <div class="event-footer">
                                                <div class="event-timing">
                                                    <div class="publish-date">
                                                        <span><i class="fa-solid fa-calendar-day me-2"></i>27
                                                            May</span>
                                                        <span class="dot"><i class="fa-solid fa-circle"></i></span>
                                                        <span>Fri, 12.00 PM</span>
                                                    </div>
                                                    <span class="publish-time"><i
                                                            class="fa-solid fa-clock me-2"></i>5h</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mix workshops concert arts volunteer sports"
                                        data-ref="mixitup-target">
                                        <div class="main-card mt-4">
                                            <div class="event-thumbnail">
                                                <a href="venue_event_detail_view.html" class="thumbnail-img">
                                                    <img src="{{ asset('landing_assets/images/event-imgs/img-6.jpg') }}"
                                                        alt="">
                                                </a>
                                                <span class="bookmark-icon" title="Bookmark"></span>
                                            </div>
                                            <div class="event-content">
                                                <a href="venue_event_detail_view.html" class="event-title">Step Up
                                                    Open Mic Show</a>
                                                <div class="duration-price-remaining">
                                                    <span class="duration-price">AUD $200.00*</span>
                                                    <span class="remaining"></span>
                                                </div>
                                            </div>
                                            <div class="event-footer">
                                                <div class="event-timing">
                                                    <div class="publish-date">
                                                        <span><i class="fa-solid fa-calendar-day me-2"></i>30
                                                            Jun</span>
                                                        <span class="dot"><i class="fa-solid fa-circle"></i></span>
                                                        <span>Thu, 4.30 PM</span>
                                                    </div>
                                                    <span class="publish-time"><i
                                                            class="fa-solid fa-clock me-2"></i>1h</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mix volunteer free health_Wellness"
                                        data-ref="mixitup-target">
                                        <div class="main-card mt-4">
                                            <div class="event-thumbnail">
                                                <a href="online_event_detail_view.html" class="thumbnail-img">
                                                    <img src="{{ asset('landing_assets/images/event-imgs/img-7.jpg') }}"
                                                        alt="">
                                                </a>
                                                <span class="bookmark-icon" title="Bookmark"></span>
                                            </div>
                                            <div class="event-content">
                                                <a href="online_event_detail_view.html" class="event-title">Tutorial
                                                    on Canvas Painting for Beginners</a>
                                                <div class="duration-price-remaining">
                                                    <span class="duration-price">AUD $50.00*</span>
                                                    <span class="remaining"><i
                                                            class="fa-solid fa-ticket fa-rotate-90"></i>17
                                                        Remaining</span>
                                                </div>
                                            </div>
                                            <div class="event-footer">
                                                <div class="event-timing">
                                                    <div class="publish-date">
                                                        <span><i class="fa-solid fa-calendar-day me-2"></i>17
                                                            Jul</span>
                                                        <span class="dot"><i class="fa-solid fa-circle"></i></span>
                                                        <span>Sun, 5.30 PM</span>
                                                    </div>
                                                    <span class="publish-time"><i
                                                            class="fa-solid fa-clock me-2"></i>1h</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mix sports concert volunteer arts"
                                        data-ref="mixitup-target">
                                        <div class="main-card mt-4">
                                            <div class="event-thumbnail">
                                                <a href="venue_event_detail_view.html" class="thumbnail-img">
                                                    <img src="{{ asset('landing_assets/images/event-imgs/img-8.jpg') }}"
                                                        alt="">
                                                </a>
                                                <span class="bookmark-icon" title="Bookmark"></span>
                                            </div>
                                            <div class="event-content">
                                                <a href="venue_event_detail_view.html" class="event-title">Trainee
                                                    Program on Leadership' 2022</a>
                                                <div class="duration-price-remaining">
                                                    <span class="duration-price">AUD $120.00*</span>
                                                    <span class="remaining"><i
                                                            class="fa-solid fa-ticket fa-rotate-90"></i>7
                                                        Remaining</span>
                                                </div>
                                            </div>
                                            <div class="event-footer">
                                                <div class="event-timing">
                                                    <div class="publish-date">
                                                        <span><i class="fa-solid fa-calendar-day me-2"></i>20
                                                            Jul</span>
                                                        <span class="dot"><i class="fa-solid fa-circle"></i></span>
                                                        <span>Wed, 11.30 PM</span>
                                                    </div>
                                                    <span class="publish-time"><i
                                                            class="fa-solid fa-clock me-2"></i>12h</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="browse-btn">
                                    <a href="explore_events.html" class="main-btn btn-hover ">Browse All</a>
                                </div>
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
                                <li><a href="#" class="social-link"><i class="fab fa-facebook-square"></i></a>
                                <li><a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                <li><a href="#" class="social-link"><i class="fab fa-tiktok"></i></a>
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
