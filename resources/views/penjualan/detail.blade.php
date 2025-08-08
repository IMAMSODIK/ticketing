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
                                                                <div class="mb-3">
                                                                    <form id="exportForm" action="{{ route('penjualan.export.pdf') }}" method="GET" target="_blank">
                                                                        <input type="hidden" name="status" id="exportStatus">
                                                                        <input type="hidden" name="jenis_tiket" id="exportJenisTiket">
                                                                        <input type="hidden" name="event_id" value="{{ request()->id }}">
                                                                        <button type="submit" class="btn btn-danger">
                                                                            <i class="fa fa-file-pdf"></i> Export PDF
                                                                        </button>
                                                                    </form>
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
                                                    alt="" width="50px">
                                            @else
                                                <img id="preview_avatar" src="{{ asset('own_assets/default_logo.png') }}"
                                                    alt="" width="50px">
                                            @endif
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

                                                    </tbody>
                                                </table>
                                                <div class="user_dt_trans text-end pe-xl-4">
                                                    <div class="totalinv2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invoice_footer">
                                            <div class="cut-line">
                                                <i class="fa-solid fa-scissors"></i>
                                            </div>
                                            <div class="main-card">
                                                <div class="row g-0">
                                                    <div class="col-lg-12">
                                                        <div class="event-order-dt p-4">
                                                            <div class="event-thumbnail-img">
                                                                <img src="" id="event_thumbnail" alt="">
                                                            </div>
                                                            <div class="event-order-dt-content">
                                                                <h5 id="event_title"></h5>
                                                                <span id="event_date"></span>
                                                                <div class="buyer-name" id="buyer_name"></div>
                                                                <div class="booking-total-tickets">
                                                                    <i class="fa-solid fa-ticket rotate-icon"></i>
                                                                    <span class="booking-count-tickets mx-2"
                                                                        id="ticket_amount"></span>x
                                                                    Tiket
                                                                </div>
                                                                <div class="booking-total-grand">
                                                                    Total : <span id="total_amount"></span>
                                                                </div>
                                                            </div>
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
                    <button type="button" class="btn btn-primary" id="send_email">Email</button>
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
                        $("#send_email").data('id', order.id);
                        $("#modalreciept .vdt-list:contains('Bill Untuk')").text("Bill Untuk " + order
                            .user.name);
                        $("#modalreciept .vdt-list:contains('@')").text(order.user.email);
                        $("#modalreciept .vdt-list:contains('Order ID')").text("Order ID : " + order
                            .order_id);
                        $("#modalreciept .vdt-list:contains('Order Date')").text("Order Date : " + order
                            .formatted_paid_at);

                        let rows = '';
                        let total;
                        total = order.jumlah * order.jenis_tiket.harga;
                        rows += `
                            <tr>
                                <td>1</td>
                                <td>${order.jenis_tiket.event.title}</td>
                                <td>${order.jenis_tiket.nama}</td>
                                <td>${order.jumlah}</td>
                                <td>Rp${(order.jenis_tiket.harga).toLocaleString('id-ID')}</td>
                                <td>Rp${total.toLocaleString('id-ID')}</td>
                            </tr>
                        `;

                        let grandTotal = "Rp" + parseInt(total).toLocaleString('id-ID');

                        $("#modalreciept tbody").html(rows);
                        $("#modalreciept .totalinv2").text("Total : " + grandTotal);

                        $("#event_title").text(order.jenis_tiket.event.title);
                        $("#buyer_name").text(order.user.name);
                        $("#ticket_amount").text(order.jumlah);
                        $("#total_amount").text(`Rp${total.toLocaleString('id-ID')}`);
                        if (order.jenis_tiket.event.thumbnail) {
                            $("#event_thumbnail").attr('src', '/storage/' + order.jenis_tiket.event
                                .thumbnail);
                        } else {
                            $("#event_thumbnail").attr('src',
                                '{{ asset('own_assets/default_flayer.png') }}');
                        }


                        let tanggal = order.jenis_tiket.event.tanggal_mulai;
                        let waktu = order.jenis_tiket.event.waktu_mulai;
                        let dateTime = new Date(`${tanggal}T${waktu}`);
                        let hari = dateTime.toLocaleDateString('id-ID', {
                            weekday: 'long'
                        });
                        let tanggalNum = dateTime.getDate();
                        let bulan = dateTime.toLocaleDateString('id-ID', {
                            month: 'long'
                        });
                        let tahun = dateTime.getFullYear();

                        let jam = dateTime.getHours().toString().padStart(2, '0');
                        let menit = dateTime.getMinutes().toString().padStart(2, '0');

                        let formatTeks = `${hari}, ${bulan} ${tanggalNum}, ${tahun} ${jam}:${menit}`
                        $("#event_date").text(formatTeks);


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

        $('#send_email').on('click', function() {
            let orderId = $(this).data('id');

            $.ajax({
                url: '/send-email-receipt',
                method: 'POST',
                data: {
                    order_id: orderId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    $('#send_email').prop('disabled', true).text('Mengirim...');
                },
                success: function(res) {
                    if (res.status) {
                        sweetAlert(true, "Email berhasil dikirim ke pengguna!");
                    } else {
                        sweetAlert(false, 'Gagal mengirim email.');
                    }
                },
                error: function(err) {
                    sweetAlert(false, 'Terjadi kesalahan saat mengirim email.');
                },
                complete: function() {
                    $('#send_email').prop('disabled', false).text('Email');
                }
            });
        });
    </script>
@endsection
