@extends('template')

@section('own_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="wrapper wrapper-body">
        <div class="dashboard-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-main-title">
                            <h3><i class="fa-solid fa-gauge me-3"></i>{{ $pageTitle }}</h3>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="main-card mt-4">
                            <div class="item-analytics-content p-4 ps-1 pb-2">
                                <div class="d-flex flex-wrap justify-content-between align-items-center border_bottom p-4">
                                    <h3 id="title">Data Penjualan Tiket <span
                                            style="color: #74CB4E">{{ $event }}</span></h3>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 m-2">
                                    <div class="event-list">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="orders-tab" role="tabpanel">
                                                <div class="table-card mt-4">
                                                    <div class="main-table">
                                                        <div class="table-responsive">
                                                            <div class="row mb-4">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="statusFilter" class="form-label">Filter
                                                                            Status</label>
                                                                        <select id="statusFilter" class="selectpicker">
                                                                            <option value="">Semua</option>
                                                                            <option value="aktif">Aktif</option>
                                                                            <option value="pending">Pending</option>
                                                                            <option value="gagal">Gagal</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jenisTiketFilter"
                                                                            class="form-label">Filter
                                                                            Jenis Tiket</label>
                                                                        <select id="jenisTiketFilter" class="selectpicker">
                                                                            <option value="">Semua</option>
                                                                            @foreach ($orders->pluck('jenisTiket.nama')->unique() as $namaTiket)
                                                                                <option value="{{ $namaTiket }}">
                                                                                    {{ $namaTiket }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <table class="table" id="ordersTable">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Nama Pembeli</th>
                                                                        <th>Jenis Tiket</th>
                                                                        <th>Jumlah</th>
                                                                        <th>Status</th>
                                                                        <th>Metode</th>
                                                                        <th>Bank</th>
                                                                        <th>VA Number</th>
                                                                        <th>Dibayar Pada</th>
                                                                        <th>Dokumen</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($orders as $i => $order)
                                                                        <tr>
                                                                            <td>{{ $i + 1 }}</td>
                                                                            <td>{{ $order->user->name ?? '-' }}</td>
                                                                            <td>{{ $order->jenisTiket->nama ?? '-' }}</td>
                                                                            <td>{{ $order->jumlah }}</td>
                                                                            <td>
                                                                                <span
                                                                                    class="badge bg-{{ $order->status == 'aktif' ? 'success' : ($order->status == 'pending' ? 'warning' : 'danger') }}">
                                                                                    {{ ucfirst($order->status) }}
                                                                                </span>
                                                                            </td>
                                                                            <td>{{ $order->payment_type ?? '-' }}</td>
                                                                            <td>{{ $order->bank ?? '-' }}</td>
                                                                            <td>{{ $order->va_number ?? '-' }}</td>
                                                                            <td>{{ $order->paid_at ? \Carbon\Carbon::parse($order->paid_at)->translatedFormat('d F Y, H:i') : '-' }}
                                                                            </td>
                                                                            <td>
                                                                                @if ($order->status == 'aktif')
                                                                                    <button
                                                                                        class="btn btn-sm btn-success text-white reciept"
                                                                                        data-id="{{ $order->id }}"
                                                                                        target="_blank"> Bukti
                                                                                        Transaksi</button>
                                                                                @elseif ($order->status == 'pending')
                                                                                    <button
                                                                                        class="btn btn-sm btn-warning text-white invoice"
                                                                                        data-id="{{ $order->id }}"
                                                                                        target="_blank"> Invoice</button>
                                                                                @else
                                                                                    <span class="text-muted">-</span>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalreciept" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Bukti Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="invoice clearfix">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col-12">
                                    <div class="invoice-header justify-content-between">
                                        <div class="invoice-header-logo">
                                            @if ($web_profile && $web_profile->logo)
                                                <img id="preview_avatar" src="{{ asset('storage/' . $web_profile->logo) }}"
                                                    alt="">
                                            @else
                                                <img id="preview_avatar" src="{{ asset('own_assets/default_logo.png') }}"
                                                    alt="">
                                            @endif
                                        </div>
                                        <div class="invoice-header-text">
                                            <a href="#" class="download-link">Download</a>
                                        </div>
                                    </div>
                                    <div class="invoice-body">
                                        <div class="invoice_dts">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h2 class="invoice_title">Receipt</h2>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="vhls140">
                                                        <ul>
                                                            <li>
                                                                <div class="vdt-list">Bill Untuk John Doe</div>
                                                            </li>
                                                            <li>
                                                                <div class="vdt-list">email@gmail.com</div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="vhls140">
                                                        <ul>
                                                            <li>
                                                                <div class="vdt-list">Order ID : YCCURW-000000</div>
                                                            </li>
                                                            <li>
                                                                <div class="vdt-list">Order Date : 10/05/2022</div>
                                                            </li>
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td><a href="#" target="_blank">Tutorial on Canvas
                                                                    Painting for Beginners</a></td>
                                                            <td>Online</td>
                                                            <td>1</td>
                                                            <td>$75.00</td>
                                                            <td>$75.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="1"></td>
                                                            <td colspan="5">
                                                                <div class="user_dt_trans text-end pe-xl-4">
                                                                    <div class="totalinv2">Total : USD $36.00</div>
                                                                    <p>Paid via Paypal</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="invoice_footer">
                                            <div class="cut-line">
                                                <i class="fa-solid fa-scissors"></i>
                                            </div>
                                            <div class="main-card">
                                                <div class="row g-0">
                                                    <div class="col-lg-7">
                                                        <div class="event-order-dt p-4">
                                                            <div class="event-thumbnail-img">
                                                                <img src="{{ asset('landing_assets/images/event-imgs/img-7.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="event-order-dt-content">
                                                                <h5>Tutorial on Canvas Painting for Beginners</h5>
                                                                <span>Wed, Jun 01, 2022 5:30 AM. Duration 1h</span>
                                                                <div class="buyer-name">John Doe</div>
                                                                <div class="booking-total-tickets">
                                                                    <i class="fa-solid fa-ticket rotate-icon"></i>
                                                                    <span class="booking-count-tickets mx-2">1</span>x
                                                                    Ticket
                                                                </div>
                                                                <div class="booking-total-grand">
                                                                    Total : <span>$75.00</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="QR-dt p-4">
                                                            <ul class="QR-counter-type">
                                                                <li>Online</li>
                                                                <li>Counter</li>
                                                                <li>0000000001</li>
                                                            </ul>
                                                            <div class="QR-scanner">
                                                                <img src="{{ asset('landing_assets/images/qr.png') }}"
                                                                    alt="QR-Ticket-Scanner">
                                                            </div>
                                                            <p>Powered by Barren</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cut-line">
                                                <i class="fa-solid fa-scissors"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="store">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('own_script')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#ordersTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });

            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var statusFilter = $('#statusFilter').val().toLowerCase();
                    var jenisTiketFilter = $('#jenisTiketFilter').val().toLowerCase();
                    var status = data[4].toLowerCase();
                    var jenisTiket = data[2].toLowerCase();

                    var statusMatch = !statusFilter || status.includes(statusFilter);
                    var jenisTiketMatch = !jenisTiketFilter || jenisTiket === jenisTiketFilter;

                    return statusMatch && jenisTiketMatch;
                }
            );

            $('#statusFilter, #jenisTiketFilter').on('change', function() {
                table.draw();
            });

        });

        $(document).on("click", ".reciept", function() {
            let id = $(this).data('id');
            $.ajax({
                url: '/orders/receipt',
                method: 'GET',
                data: {
                    'id': id,
                },
                success: function(response) {
                    if (response.status) {
                        let order = response.data;
                        $("#modalreciept .vdt-list:contains('Bill Untuk')").text("Bill Untuk " + order
                            .user.name);
                        $("#modalreciept .vdt-list:contains('@')").text(order.user.email);
                        $("#modalreciept .vdt-list:contains('Order ID')").text("Order ID : " + order
                            .order_id);
                        $("#modalreciept .vdt-list:contains('Order Date')").text("Order Date : " + order
                            .formatted_paid_at);

                        let rows = '';
                        order.jenisTiket.forEach((item, index) => {
                            let total = item.qty * item.price;
                            rows += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${order.event.title}</td>
                    <td>${item.nama}</td>
                    <td>${item.qty}</td>
                    <td>Rp${item.price.toLocaleString('id-ID')}</td>
                    <td>Rp${total.toLocaleString('id-ID')}</td>
                </tr>
            `;
                        });

                        let grandTotal = "Rp" + parseInt(order.total).toLocaleString('id-ID');

                        $("#modalreciept tbody").html(rows);
                        $("#modalreciept .totalinv2").text("Total : " + grandTotal);
                        $("#modalreciept").modal('show');

                        $("#modalreciept").modal('show');
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
                        sweetAlert(response.status, "Terjadi kesalahan saat memuat data.");
                    }
                }
            })
        })

        $(document).on("click", ".invoice", function() {
            alert($(this).data("id"));
        })
    </script>
@endsection
