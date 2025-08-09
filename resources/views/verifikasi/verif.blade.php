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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        .fixed-bottom {
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
            z-index: 1050;
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
                    <a class="navbar-brand order-1 order-lg-0 ml-lg-0 ml-2 me-auto" href="index.html">
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
                                            <a href="/user-dashboard" class="link-item">My Dashboard</a>
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
        <div class="hero-banner position-relative"
            style="background-image: url('{{ $web_profile && $web_profile->banner ? asset('storage/' . $web_profile->banner) : asset('landing_assets/images/banner.jpg') }}')">
            <div class="hero-banner-overlay"></div>
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9 col-md-10">
                        <div class="hero-banner-content">
                            <div class="text-center">
                                <h2 class="text-white">{{$data->jenisTiket?->event?->title ?? 'Selamat Datang di Event Kami'}}</h2>
                            </div>

                            <div class="social-media-icons" style="margin-top: 20px;"></div>
                        </div>
                        <div class="container my-5 p-4 rounded-3" style="background-color: #f8f9fa;">
                            <form id="contactForm">
                                <input type="hidden" name="" id="id" data-id="{{$data->id}}" data-order="{{$data->order_id}}">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Jenis Tiket</label>
                                    <input type="text" class="form-control" id="jenis_tiket" name="jenis_tiket"
                                        placeholder="Masukkan nama Anda" value="{{$data->jenisTiket?->nama ?? ''}}">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Masukkan nama Anda" value="{{$data->user?->name ?? 'Peserta'}}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Masukkan email Anda" value="{{$data->user?->email ?? 'Peserta@mail.com'}}">
                                </div>
                            </form>
                        </div>

                        <!-- Fixed Submit Button - lebih besar -->
                        <div class="fixed-bottom bg-white border-top py-3 px-4 text-end shadow-sm">
                            <button type="button" class="btn btn-success w-100 fs-5 py-" id="submit">
                                <i class="fa fa-paper-plane"></i> Kirim
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Body End-->


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

        $("#submit").on("click", function(){
            alert('test');
            $.ajax({
                url: '/peserta',
                method: 'POST',
                data: {
                    '_token': $("meta[name='csrf-token']").attr('content'),
                    'id': $("#id").data('id'),
                    'order': $("#id").data('order'),
                },
                success: function(response) {
                    if (response.status) {
                        sweetAlert(response.status, 'Berhasil!');
                        setTimeout(function() {
                            location.href = '/';
                        }, 1000);
                    } else {
                        sweetAlert(response.status, response.message);
                    }
                },
                error: function(response) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let messages = Object.values(errors).flat().join("\n");
                        sweetAlert(response.status, "Validasi gagal:\n" + messages);
                    } else {
                        sweetAlert(response.status, "Terjadi kesalahan saat mengirim data.");
                    }
                }
            })
        })
    </script>
</body>

</html>
