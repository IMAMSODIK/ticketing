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
            <div class="row">
                <div class="col-lg-10">
                    <div class="main-title mb-4">
                        <h3>Selamat Datang, {{ auth()->check() ? auth()->user()->name : 'Guest' }}</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="nav step-tabs custom-border-top pt-5" role="tablist">
                        <button class="step-link feature-step-link active" data-bs-toggle="tab"
                            data-bs-target="#step-02" type="button" role="tab" aria-controls="step-02"
                            aria-selected="false"><span>Pending</span></button>
                        <button class="step-link feature-step-link" data-bs-toggle="tab" data-bs-target="#step-01"
                            type="button" role="tab" aria-controls="step-01"
                            aria-selected="true"><span>Aktif​</span></button>
                        <button class="step-link feature-step-link" data-bs-toggle="tab" data-bs-target="#step-03"
                            type="button" role="tab" aria-controls="step-03"
                            aria-selected="false"><span>Batal</span></button>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="step-02" role="tabpanel">
                            <div class="row justify-content-between">
                                <div class="row">
                                    @if ($order && $order->has('pending'))
                                        @php
                                            // Group data berdasarkan event_id
                                            $groupedByEvent = $order->get('pending')->groupBy(function ($item) {
                                                return $item->jenisTiket->event->id ?? null;
                                            });
                                        @endphp

                                        @foreach ($groupedByEvent as $eventOrders)
                                            @php
                                                $firstOrder = $eventOrders->first();
                                                $jenisTiket = $firstOrder?->jenisTiket;
                                                $event = $jenisTiket?->event;

                                                if (!$event) {
                                                    continue;
                                                }

                                                $total = $eventOrders->sum(function ($item) {
                                                    return $item->jumlah * optional($item->jenisTiket)->harga ?? 0;
                                                });
                                            @endphp

                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12"
                                                onclick="showPaymentDetail({{ json_encode([
                                                    'event_id' => $event->id,
                                                    'event_title' => $event->title,
                                                    'event_tanggal' => $event->tanggal_mulai,
                                                    'event_waktu' => $event->waktu_mulai,
                                                    'event_tempat' => $event->nama_tempat,
                                                    'thumbnail' => $event->thumbnail,
                                                    'total' => $total,
                                                    'tickets' => $eventOrders->map(function ($order) {
                                                        return [
                                                            'id' => $order->id,
                                                            'jenis_tiket_id' => $order->jenis_tiket_id,
                                                            'nama_tiket' => optional($order->jenisTiket)->nama ?? '',
                                                            'harga' => optional($order->jenisTiket)->harga ?? 0,
                                                            'jumlah' => $order->jumlah,
                                                            'subtotal' => $order->jumlah * (optional($order->jenisTiket)->harga ?? 0),
                                                        ];
                                                    }),
                                                ]) }})"
                                                style="cursor:pointer">
                                                <div class="main-card mt-4">
                                                    <div class="event-thumbnail">
                                                        <img src="{{ $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('own_assets/default_flayer.png') }}"
                                                            alt="" width="100%">
                                                    </div>
                                                    <div class="event-content">
                                                        <div class="event-title">{{ $event->title }}</div>
                                                        <div class="duration-price-remaining">Rp.
                                                            {{ number_format($total, 0, ',', '.') }}</div>
                                                        <div class="event-timing">
                                                            <span><i
                                                                    class="fa-solid fa-calendar-day me-2"></i>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('d M') }}</span>
                                                            <span class="dot"><i
                                                                    class="fa-solid fa-circle"></i></span>
                                                            <span>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('l, H:i') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="event-footer bg-success">
                                                        <div class="row text-white">
                                                            <div class="col-6"><i
                                                                    class="fa-solid fa-credit-card me-2"></i> Bayar
                                                            </div>
                                                            <div class="col-6 text-end">Rp.
                                                                {{ number_format($total, 0, ',', '.') }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="step-01" role="tabpanel">
                            <div class="row justify-content-between">
                                <div class="row">
                                    @if ($order && $order->has('aktif'))
                                        @php
                                            $groupedByEvent = $order->get('aktif')->groupBy(function ($item) {
                                                return $item->jenisTiket->event->id ?? null;
                                            });
                                        @endphp

                                        @foreach ($groupedByEvent as $eventOrders)
                                            @php
                                                $event = $eventOrders->first()->jenisTiket->event;
                                                $total = $eventOrders->sum(function ($item) {
                                                    return $item->jumlah * $item->jenisTiket->harga;
                                                });
                                            @endphp

                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12"
                                                onclick="showTransactionDetail({{ json_encode([
                                                    'event_id' => $event->id,
                                                    'event_title' => $event->title,
                                                    'event_tanggal' => $event->tanggal_mulai,
                                                    'event_waktu' => $event->waktu_mulai,
                                                    'event_tempat' => $event->nama_tempat,
                                                    'thumbnail' => $event->thumbnail,
                                                    'total' => $total,
                                                    'tickets' => $eventOrders->map(function ($order) {
                                                        return [
                                                            'id' => $order->id,
                                                            'jenis_tiket_id' => $order->jenis_tiket_id,
                                                            'nama_tiket' => $order->jenisTiket->nama,
                                                            'harga' => $order->jenisTiket->harga,
                                                            'jumlah' => $order->jumlah,
                                                            'subtotal' => $order->jumlah * $order->jenisTiket->harga,
                                                            'qr_code' => $order->qr_code,
                                                        ];
                                                    }),
                                                ]) }})"
                                                style="cursor:pointer">
                                                <div class="main-card mt-4">
                                                    <div class="event-thumbnail">
                                                        <img src="{{ $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('own_assets/default_flayer.png') }}"
                                                            alt="" width="100%">
                                                    </div>
                                                    <div class="event-content">
                                                        <div class="event-title">{{ $event->title }}</div>
                                                        <div class="duration-price-remaining">Rp.
                                                            {{ number_format($total, 0, ',', '.') }}</div>
                                                        <div class="event-timing">
                                                            <span><i
                                                                    class="fa-solid fa-calendar-day me-2"></i>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('d M') }}</span>
                                                            <span class="dot"><i
                                                                    class="fa-solid fa-circle"></i></span>
                                                            <span>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('l, H:i') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="event-footer bg-success">
                                                        <div class="row text-white">
                                                            <div class="col-7"><i
                                                                    class="fa-solid fa-credit-card me-2"></i> Detail
                                                                Transaksi
                                                            </div>
                                                            <div class="col-5 text-end">Rp.
                                                                {{ number_format($total, 0, ',', '.') }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="step-03" role="tabpanel">
                            <div class="row justify-content-between">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailPembayaranModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-4" id="detailPembayaranBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="prosesCheckout()">Konfirmasi
                        Pembelian</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailTransaksiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Transaksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-4" id="detailTransaksiBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    <script src="{{ asset('landing_assets/js/custom.js') }}"></script>
    <script src="{{ asset('landing_assets/js/night-mode.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    {{-- <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script> --}}

    @if (session('error'))
        <script>
            sweetAlert(false, "{{ session('error') }}");
        </script>
    @endif


    <script>
        $(document).ready(function() {
            let tiketData = localStorage.getItem('pendingCheckout');

            if (tiketData) {
                $.ajax({
                    url: '/order/store',
                    method: 'POST',
                    data: {
                        '_token': $("meta[name='csrf-token']").attr('content'),
                        'status': 'pending',
                        'data': tiketData
                    },
                    success: function(response) {
                        localStorage.removeItem('pendingCheckout');
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    },
                    error: function(xhr) {
                        console.log('Terjadi kesalahan:', xhr.responseJSON);
                    }
                });
            }
        });
    </script>

    <script>
        let currentTickets = [];
        let cancelledTickets = [];

        function showPaymentDetail(data) {
            currentTickets = [...data.tickets];
            cancelledTickets = [];

            renderPaymentDetail(data);
        }

        function showTransactionDetail(data) {
            currentTickets = [...data.tickets];
            cancelledTickets = [];

            renderTransactionDetail(data);
        }

        function renderTransactionDetail(data) {
            let html = `<h5>${data.event_title}</h5>`;
            html += `<p><strong>Tanggal:</strong> ${data.event_tanggal} ${data.event_waktu}</p>`;
            html += `<table class="table table-bordered">
            <thead>
                <tr>
                    <th>Jenis Tiket</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>QR Code</th>
                </tr>
            </thead>
            <tbody>`;

            let total = 0;

            currentTickets.forEach((ticket) => {
                const subtotal = ticket.harga * ticket.jumlah;
                total += subtotal;

                html += `<tr>
        <td>${ticket.nama_tiket}</td>
        <td>Rp. ${ticket.harga.toLocaleString('id-ID')}</td>
        <td>${ticket.jumlah}</td>
        <td>Rp. ${subtotal.toLocaleString('id-ID')}</td>
        <td>`;

                if (ticket.qr_code) {
                    html += `<img src="/${ticket.qr_code}" alt="QR Code" style="width:80px;">`;
                } else {
                    html += `-`;
                }

                html += `</td></tr>`;
            });

            html += `</tbody></table>`;
            html += `<div class="text-end"><strong>Total: Rp. ${total.toLocaleString('id-ID')}</strong></div>`;

            document.getElementById('detailTransaksiBody').innerHTML = html;
            new bootstrap.Modal(document.getElementById('detailTransaksiModal')).show();

        }

        function renderPaymentDetail(data) {
            let html = `<h5>${data.event_title}</h5>`;
            html += `<p><strong>Tanggal:</strong> ${data.event_tanggal} ${data.event_waktu}</p>`;
            html +=
                `<table class="table table-bordered"><thead><tr><th>Jenis Tiket</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th><th>Aksi</th></tr></thead><tbody>`;

            let total = 0;

            currentTickets.forEach((ticket, index) => {
                const subtotal = ticket.harga * ticket.jumlah;
                total += subtotal;

                html += `<tr>
            <td>${ticket.nama_tiket}</td>
            <td>Rp. ${ticket.harga.toLocaleString('id-ID')}</td>
            <td>${ticket.jumlah}</td>
            <td>Rp. ${subtotal.toLocaleString('id-ID')}</td>
            <td><button class="btn btn-sm btn-danger" onclick="hapusTiket(${index})">Hapus</button></td>
        </tr>`;
            });

            html += `</tbody></table>`;

            html += `<div class="text-end"><strong>Total: Rp. ${total.toLocaleString('id-ID')}</strong></div>`;

            document.getElementById('detailPembayaranBody').innerHTML = html;
            new bootstrap.Modal(document.getElementById('detailPembayaranModal')).show();
        }

        function hapusTiket(index) {
            const removed = currentTickets.splice(index, 1)[0];
            cancelledTickets.push(removed);
            renderPaymentDetail({
                event_title: removed.event_title,
                event_tanggal: removed.event_tanggal,
                event_waktu: removed.event_waktu,
                tickets: currentTickets
            });
        }

        function prosesCheckout() {
            $("#detailPembayaranModal").modal('hide');
            $.ajax({
                url: '/order/get-token',
                method: 'POST',
                data: {
                    '_token': $("meta[name='csrf-token']").attr('content'),
                    'tiket_dibeli': JSON.stringify(currentTickets),
                    'tiket_dibatalkan': JSON.stringify(cancelledTickets),
                },
                success: function(response) {
                    if (response.token) {
                        snap.pay(response.token, {
                            onSuccess: function(result) {
                                sweetAlert(true, "Pembayaran berhasil!");
                                setTimeout(function() {
                                    window.location.href = "/user-dashboard";
                                }, 1000);
                            },
                            onPending: function(result) {
                                window.location.href = "/user-dashboard";
                            },
                            onError: function(result) {
                                sweetAlert(false, "Pembayaran gagal!");
                            },
                            onClose: function() {
                                $("#detailPembayaranModal").modal('show');
                            }
                        });
                    } else {
                        Swal.fire("Error", "Gagal mendapatkan token pembayaran!", "error");
                    }
                },
                error: function() {
                    Swal.fire("Error", "Terjadi kesalahan saat checkout!", "error");
                }
            });
        }
    </script>

</body>

</html>
