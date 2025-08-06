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
        .step-tabs {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .step-tabs .step-link {
            flex: 1 1 auto;
            text-align: center;
            padding: 1rem;
            font-size: 16px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        .step-tabs .step-link.active {
            background-color: #6AC045;
            color: #fff;
            border-color: #579e38;
        }

        @media (max-width: 768px) {
            .step-tabs .step-link {
                font-size: 14px;
                padding: 0.75rem;
            }
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
                            <h3>Sahabat Bertamu</h3>
                        </div>
                        <div class="main-logo" id="logo">
                            <h3>Sahabat Bertamu</h3>
                        </div>
                    </a>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <div class="offcanvas-logo" id="offcanvasNavbarLabel">
                                <h3>Sahabat Bertamu</h3>
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
                            <li class="nav-item mb-2">
                                <a class="nav-link" href="/">
                                    <i class="fa-solid fa-compass me-2"></i>Explore Events
                                </a>
                            </li>
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

    <div class="feature-block p-80">
        <div class="container">
            <div class="breadcrumb-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-10">
                            <div class="barren-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <h3>Detail Event</h3>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-dt-block p-80">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10">
                            <div class="blog-view">
                                <div class="blog-img-card p-0">
                                    <img src="{{ $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('own_assets/default_flayer.png') }}"
                                        alt="">
                                </div>
                                <div class="blog-content blog-content-view p-0">
                                    <h3>{{ $event->title }}</h3>
                                    <div class="post-meta border_bottom pb-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="post-date me-4 fs-14">
                                                    <i class="fa-regular fa-calendar-days me-2"></i>
                                                    {{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('l, d M Y') }}
                                                    <br>
                                                    <i
                                                        class="fa fa-clock me-2"></i>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('l') . ', ' . \Carbon\Carbon::parse($event->waktu_mulai)->format('h:i A') }}</b>
                                                </span>
                                            </div>
                                            <div class="col-6">
                                                <span class="post-read-time float-none fs-14">
                                                    <i
                                                        class="fa fa-regular fa-building me-2"></i>{{ $event->nama_tempat }}</b>
                                                    <br>
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    {{ $event->alamat }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-content-meta">
                                        {!! $event->deskripsi !!}
                                        <div class="social-share">
                                            <ul>
                                                <li>
                                                    <button class="btn btn-secondary" onclick="location.href='/'">
                                                        <i class="fas fa-arrow-left"></i> Kembali
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-10">
                            <div>
                                @foreach ($event->jenisTiket as $tiket)
                                    @php
                                        $harga = $tiket->harga;
                                        $kuota = $tiket->kuota;
                                    @endphp

                                    <div class="item">
                                        <div class="price-ticket-card">
                                            <div
                                                class="price-ticket-card-head d-md-flex flex-wrap align-items-start justify-content-between position-relative p-4">
                                                <div class="d-flex align-items-center top-name">
                                                    <div class="icon-box">
                                                        <span class="icon-big rotate-icon icon icon-purple">
                                                            <i class="fa-solid fa-ticket"></i>
                                                        </span>
                                                        <h5 class="fs-16 mb-1 mt-1">{{ $tiket->nama }}</h5>
                                                        <p class="text-gray-50 m-0">
                                                            <span
                                                                class="visitor-date-time">{{ $tiket->deskripsi }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-ticket-card-body border_top p-4">
                                                <div
                                                    class="full-width d-flex flex-wrap justify-content-between align-items-center">
                                                    <div class="icon-box" style="width: 50%">
                                                        <div class="icon me-3">
                                                            <i class="fa-solid fa-ticket"></i>
                                                        </div>
                                                        <span class="text-145">Harga Tiket</span>
                                                        <h6 class="coupon-status"
                                                            id="harga-format-{{ $tiket->id }}">
                                                            Rp. {{ number_format($harga, 0, ',', '.') }}
                                                        </h6>
                                                    </div>
                                                    <div class="icon-box" style="width: 50%">
                                                        <div class="icon me-3">
                                                            <i class="fa-solid fa-users"></i>
                                                        </div>
                                                        <span class="text-145">Kuota Tiket</span>
                                                        <h6 class="coupon-status">{{ ($kuota - $tiket->terjual) }} Peserta</h6>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="ubahJumlah('{{ $tiket->id }}', -1)">
                                                        <i class="fa fa-minus"></i>
                                                    </button>

                                                    <input type="text" class="form-control text-center mx-2"
                                                        style="width: 60px;" id="jumlah-{{ $tiket->id }}"
                                                        value="0" readonly>

                                                    <button type="button" class="btn btn-sm btn-success"
                                                        onclick="ubahJumlah('{{ $tiket->id }}', 1)">
                                                        <i class="fa fa-plus"></i>
                                                    </button>

                                                    <div class="ms-auto">
                                                        <strong>Total: </strong>
                                                        <span id="total-{{ $tiket->id }}">Rp. 0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="text-end mt-4">
                                    <button class="btn btn-success" id="checkout">
                                        <i class="fa fa-shopping-cart"></i> Checkout Semua Tiket
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function sweetAlert(status, message) {
            if (status) {
                Swal.fire({
                    title: "Success",
                    text: message,
                    icon: "success"
                });
            } else {
                Swal.fire({
                    title: "Error",
                    text: message,
                    icon: "error"
                });
            }
        }
    </script>

    <script>
        var containerEl = document.querySelector('[data-ref~="event-filter-content"]');

        var mixer = mixitup(containerEl, {
            selectors: {
                target: '[data-ref~="mixitup-target"]'
            }
        });
    </script>

    <script>
        function ubahJumlah(id, change) {
            let $jumlahInput = $(`#jumlah-${id}`);
            let $totalHargaEl = $(`#total-${id}`);
            let hargaText = $(`#harga-format-${id}`).text();
            let harga = parseInt(hargaText.replace(/[^\d]/g, ''));

            let jumlah = parseInt($jumlahInput.val()) || 0;
            jumlah += change;
            if (jumlah < 0) jumlah = 0;
            $jumlahInput.val(jumlah);

            let total = harga * jumlah;
            $totalHargaEl.text(`Rp. ${total.toLocaleString('id-ID')}`);
        }

        $("#checkout").on("click", function() {
            let tiketData = [];

            $("input[id^='jumlah-']").each(function() {
                let id = $(this).attr('id').replace('jumlah-', '');
                let jumlah = parseInt($(this).val());

                if (jumlah > 0) {
                    tiketData.push({
                        id: id,
                        jumlah: jumlah
                    });
                }
            });

            if (tiketData.length === 0) {
                alert("Silakan pilih minimal satu tiket.");
                return;
            }

            localStorage.setItem('pendingCheckout', JSON.stringify(tiketData));
            window.location.href = "/event/checkout-pre";
        });
    </script>


</body>

</html>
