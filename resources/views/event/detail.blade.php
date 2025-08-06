@extends('template')

@section('content')
    <div class="wrapper wrapper-body">
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
                <input type="hidden" id="id" value="{{ $event->id }}">
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
                                                <i class="fa fa-regular fa-building me-2"></i>{{ $event->nama_tempat }}</b>
                                                <br>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $event->alamat }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-content-meta">
                                    {!! $event->deskripsi !!}
                                    <div class="social-share">
                                        <h4>Aksi</h4>
                                        <ul>
                                            <li>
                                                <button class="btn btn-primary"
                                                    onclick="location.href='/event/edit?id={{ $event->id }}'">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </button>
                                            </li>
                                            <li>
                                                <button class="btn btn-danger" id="delete"
                                                    data-id="{{ $event->id }}"><i class="fa fa-trash"></i> Hapus</button>
                                            </li>
                                            <li>
                                                <button class="btn btn-secondary" onclick="location.href='/event'">
                                                    <i class="fas fa-arrow-left"></i> Kembali
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="related-posts">
                            <div class="main-title checkout-title Bp-top">
                                <div class="row p-2">
                                    <div class="col-6">
                                        <h4><i class="fa-solid fa-ticket step_icon me-3"></i>Tiket(<span
                                                class="venue-event-ticket-counter">3</span>)</h4>
                                    </div>
                                    <div class="col-6 d-flex align-items-center justify-content-end">
                                        <div class="btn-ticket-type-top">
                                            <button class="main-btn btn-hover h_40 pe-4 ps-4" type="button" id="tambah"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span>Tambah Tiket</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($event->jenisTiket->count() == 0)
                                <div class="ticket-type-item-empty text-center p_30">
                                    <div class="ticket-list-icon d-inline-block">
                                        <img src="{{ asset('landing_assets/images/ticket.png') }}" alt="">
                                    </div>
                                    <h4 class="color-black mt-4 mb-3 fs-18">Belum ada jenis
                                        Tiket.</h4>
                                    <p class="mb-0">Kamu belum membuat jenis Tiket! Tambah
                                        tiket dengan mengklik tombol Tambah.</p>
                                </div>
                            @else
                                @foreach ($event->jenisTiket as $tiket)
                                    <div class="item">
                                        <div class="price-ticket-card mt-4">
                                            <div
                                                class="price-ticket-card-head d-md-flex flex-wrap align-items-start justify-content-between position-relative p-4">
                                                <div class="d-flex align-items-center top-name">
                                                    <div class="icon-box">
                                                        <span class="icon-big rotate-icon icon icon-yellow">
                                                            <i class="fa-solid fa-ticket"></i>
                                                        </span>
                                                        <h5 class="fs-16 mb-1 mt-1">{{ $tiket->nama }}</h5>
                                                        <p class="text-gray-50 m-0"><span
                                                                class="visitor-date-time">{{ $tiket->deskripsi }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <label class="btn-switch tfs-8 mb-0 me-4 mt-1">
                                                        <input type="checkbox" {{ $tiket->status ? 'checked' : '' }}
                                                            class="status" data-id="{{ $tiket->id }}">
                                                        <span class="checkbox-slider"></span>
                                                    </label>
                                                    <div class="dropdown dropdown-default dropdown-text dropdown-icon-item">
                                                        <button class="option-btn-1 edit" type="button"
                                                            data-id="{{ $tiket->id }}">
                                                            <i class="fa-solid fa-pen" style="cursor: pointer"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-ticket-card-body border_top p-4">
                                                <div
                                                    class="full-width d-flex flex-wrap justify-content-between align-items-center">
                                                    <div class="icon-box">
                                                        <div class="icon me-3">
                                                            <i class="fa-solid fa-ticket"></i>
                                                        </div>
                                                        <span class="text-145">Harga Tiket</span>
                                                        <h6 class="coupon-status">Rp.
                                                            {{ number_format($tiket->harga, 0, ',', '.') }}</h6>
                                                    </div>
                                                    <div class="icon-box">
                                                        <div class="icon me-3">
                                                            <i class="fa-solid fa-users"></i>
                                                        </div>
                                                        <span class="text-145">Kuota Tiket</span>
                                                        <h6 class="coupon-status">{{ ($tiket->kuota - $tiket->terjual) }} Tiket</h6>
                                                    </div>
                                                    <div class="icon-box">
                                                        <div class="icon me-3">
                                                            <i class="fa-solid fa-cart-shopping"></i>
                                                        </div>
                                                        <span class="text-145">Terjual</span>
                                                        <h6 class="coupon-status">{{ $tiket->terjual }} Tiket</h6>x
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalTambahTiket" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Jenis Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Tiket *</label>
                        <input type="text" class="form-control" id="nama" name="nama" required
                            placeholder="Masukkan Jenis Tiket">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga *</label>
                        <input type="number" step="0.01" class="form-control" id="harga" name="harga"
                            required placeholder="Masukkan Harga">
                    </div>
                    <div class="mb-3">
                        <label for="kuota" class="form-label">Kuota *</label>
                        <input type="number" class="form-control" id="kuota" name="kuota" value="0"
                            required placeholder="Masukkan Jumlah Kuota">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi Jenis Tiket"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="store">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditTiket" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Jenis Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="id-ticket">
                    <div class="mb-3">
                        <label for="edit_nama" class="form-label">Nama Tiket *</label>
                        <input type="text" class="form-control" id="edit_nama" name="edit_nama" required
                            placeholder="Masukkan Jenis Tiket">
                    </div>
                    <div class="mb-3">
                        <label for="edit_harga" class="form-label">Harga *</label>
                        <input type="number" step="0.01" class="form-control" id="edit_harga" name="edit_harga"
                            required placeholder="Masukkan Harga">
                    </div>
                    <div class="mb-3">
                        <label for="edit_kuota" class="form-label">Kuota *</label>
                        <input type="number" class="form-control" id="edit_kuota" name="edit_kuota" value="0"
                            required placeholder="Masukkan Jumlah Kuota">
                    </div>
                    <div class="mb-3">
                        <label for="edit_deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi" name="edit_deskripsi" rows="3"
                            placeholder="Deskripsi Jenis Tiket"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="update">Update</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('own_script')
    <script>
        $("#tambah").on("click", function() {
            $("#modalTambahTiket").modal('show');
        })

        $(document).on("click", ".edit", function() {
            let id = $(this).data('id');

            $.ajax({
                url: '/tiket/edit',
                method: 'GET',
                data: {
                    'id': id
                },
                success: function(response) {
                    if (response.status) {
                        $("#id-ticket").val(response.data.id);
                        $("#edit_nama").val(response.data.nama);
                        $("#edit_harga").val(response.data.harga);
                        $("#edit_kuota").val(response.data.kuota)
                        $("#edit_deskripsi").val(response.data.deskripsi);

                        $("#modalEditTiket").modal('show');
                    } else {
                        sweetAlert(response.status, response.message);
                    }
                },
                error: function(response) {
                    sweetAlert(response.status, response.message);
                }
            })
        })

        $("#store").on("click", function() {
            let button = $(this);
            button.prop("disabled", true);

            $("#modalTambahTiket").modal('hide');
            $.ajax({
                url: '/tiket/store',
                method: 'POST',
                data: {
                    '_token': $("meta[name='csrf-token']").attr('content'),
                    'event_id': $("#id").val(),
                    'nama': $("#nama").val(),
                    'harga': $("#harga").val(),
                    'kuota': $("#kuota").val(),
                    'deskripsi': $("#deskripsi").val()
                },
                success: function(response) {
                    button.prop("disabled", false);
                    if (response.status) {
                        sweetAlert(response.status, 'Data berhasil disimpan');
                        setTimeout(() => location.reload(), 1000);
                    } else {
                        sweetAlert(response.status, response.message);
                    }
                },
                error: function(response) {
                    button.prop("disabled", false);
                    sweetAlert(response.status, response.message);
                }
            })
        })

        $("#update").on("click", function() {
            let button = $(this);
            button.prop("disabled", true);

            $("#modalEditTiket").modal('hide');
            $.ajax({
                url: '/tiket/update',
                method: 'POST',
                data: {
                    '_token': $("meta[name='csrf-token']").attr('content'),
                    'id': $("#id-ticket").val(),
                    'nama': $("#edit_nama").val(),
                    'harga': $("#edit_harga").val(),
                    'kuota': $("#edit_kuota").val(),
                    'deskripsi': $("#edit_deskripsi").val()
                },
                success: function(response) {
                    button.prop("disabled", false);
                    if (response.status) {
                        sweetAlert(response.status, 'Data berhasil diubah');
                        setTimeout(() => location.reload(), 1000);
                    } else {
                        sweetAlert(response.status, response.message);
                    }
                },
                error: function(response) {
                    button.prop("disabled", false);
                    sweetAlert(response.status, response.message);
                }
            })
        })

        $(document).on("click", ".status", function() {
            $.ajax({
                url: '/tiket/status',
                method: 'POST',
                data: {
                    '_token': $("meta[name='csrf-token']").attr('content'),
                    'id': $(this).data('id')
                },
                success: function(response) {
                    if (response.status) {
                        sweetAlert(response.status, 'Data berhasil diperbaharui');
                        setTimeout(() => location.reload(), 1000);
                    } else {
                        sweetAlert(response.status, response.message);
                    }
                },
                error: function(response) {
                    sweetAlert(response.status, response.message);
                }
            })
        });
    </script>
@endsection
