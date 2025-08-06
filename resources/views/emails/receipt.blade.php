<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <title>Bukti Pembelian Tiket - {{ $webSettings->nama_web ?? 'Sahabat Bertamu' }}</title>
    <style>
        /* Add email-specific styles here */
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .invoice {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
        }
        .invoice-header-logo img {
            height: 50px;
        }
        .invoice_title {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .vdt-list {
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background: #2c3e50;
            color: white;
            padding: 10px;
            text-align: left;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .totalinv2 {
            font-weight: bold;
            font-size: 1.1em;
            margin-top: 10px;
        }
        .cut-line {
            text-align: center;
            margin: 20px 0;
            color: #7f8c8d;
        }
        .event-order-dt {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .event-thumbnail-img img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
        }
        .booking-total-tickets {
            margin: 10px 0;
        }
        .rotate-icon {
            transform: rotate(-45deg);
            display: inline-block;
        }
        .booking-total-grand span {
            font-weight: bold;
            color: #2c3e50;
        }
    </style>
</head>

<body>
    <div class="invoice clearfix">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-12">
                    <div class="invoice-header justify-content-between">
                        <div class="invoice-header-logo">
                            @if ($webSettings && $webSettings->logo)
                                <img src="{{ asset('storage/' . $webSettings->logo) }}" alt="Logo" width="50px">
                            @else
                                <img src="{{ asset('own_assets/default_logo.png') }}" alt="Logo" width="50px">
                            @endif
                        </div>
                    </div>
                    <div class="invoice-body">
                        <div class="invoice_dts">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="invoice_title">Bukti Pembelian Tiket</h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="vhls140">
                                        <ul>
                                            <li><div class="vdt-list">Bill Untuk {{ $order->user->name }}</div></li>
                                            <li><div class="vdt-list">{{ $order->user->email }}</div></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="vhls140">
                                        <ul>
                                            <li><div class="vdt-list">Order ID : {{ $order->order_id }}</div></li>
                                            <li><div class="vdt-list">Order Date : {{ $order->formatted_paid_at ?? date('d/m/Y', strtotime($order->created_at)) }}</div></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-table bt_40">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Event</th>
                                            <th scope="col">Jenis Tiket</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Unit Price</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = $order->jumlah * $order->jenisTiket->harga;
                                        @endphp
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $order->jenisTiket->event->title }}</td>
                                            <td>{{ $order->jenisTiket->nama }}</td>
                                            <td>{{ $order->jumlah }}</td>
                                            <td>Rp{{ number_format($order->jenisTiket->harga, 0, ',', '.') }}</td>
                                            <td>Rp{{ number_format($total, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="user_dt_trans text-end pe-xl-4">
                                    <div class="totalinv2">Total : Rp{{ number_format($total, 0, ',', '.') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice_footer">
                            <div class="cut-line">
                                <i>━━━━━━━━━━━━━━━━━━━━</i>
                            </div>
                            <div class="main-card">
                                <div class="row g-0">
                                    <div class="col-lg-12">
                                        <div class="event-order-dt p-4">
                                            <div class="event-thumbnail-img">
                                                @if ($order->jenisTiket->event->thumbnail)
                                                    <img src="{{ asset('storage/' . $order->jenisTiket->event->thumbnail) }}" alt="Event Thumbnail">
                                                @else
                                                    <img src="{{ asset('own_assets/default_flayer.png') }}" alt="Event Thumbnail">
                                                @endif
                                            </div>
                                            <div class="event-order-dt-content">
                                                <h5>{{ $order->jenisTiket->event->title }}</h5>
                                                @php
                                                    $dateTime = new DateTime($order->jenisTiket->event->tanggal_mulai . ' ' . $order->jenisTiket->event->waktu_mulai);
                                                @endphp
                                                <span>{{ $dateTime->format('l, j F Y H:i') }}</span>
                                                <div class="buyer-name">{{ $order->user->name }}</div>
                                                <div class="booking-total-tickets">
                                                    <i class="rotate-icon">🎫</i>
                                                    <span class="booking-count-tickets mx-2">{{ $order->jumlah }}</span>x Tiket
                                                </div>
                                                <div class="booking-total-grand">
                                                    Total : <span>Rp{{ number_format($total, 0, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cut-line">
                                <i>━━━━━━━━━━━━━━━━━━━━</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>