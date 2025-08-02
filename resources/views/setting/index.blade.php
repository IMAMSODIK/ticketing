@extends('template')

@section('own_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="wrapper wrapper-body">
        <div class="profile-banner">
            <div class="hero-cover-block">
                <div class="hero-cover">
                    <div class="hero-cover-img" style="background-image: url('{{ ($web_profile && $web_profile->banner) ? asset('storage/' . $web_profile->banner) : asset('landing_assets/images/banner.jpg') }}')"></div>
                </div>
                <div class="upload-cover">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="cover-img-btn">
                                    <input type="file" id="cover-img">
                                    <label for="cover-img"><i class="fa-solid fa-panorama me-3"></i>Ubah Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-dt-block">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-12">
                            <div class="main-card user-left-dt">
                                <div class="user-dts">
                                    <h4 class="user-name">{{ auth()->user()->name }}<span class="verify-badge"><i
                                                class="fa-solid fa-circle-check"></i></span></h4>
                                    <span class="user-email">{{ auth()->user()->email }}</span>
                                </div>
                                <div class="profile-social-link">
                                    <h6>Website Links</h6>
                                    <div class="social-links">
                                        <a href="{{ ($web_profile && $web_profile->facebook) ? $web_profile->facebook : 'https://www.facebook.com/?locale=id_ID'}}" _target="blank" class="social-link" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook"><i class="fab fa-facebook-square"></i></a>
                                        <a href="{{ ($web_profile && $web_profile->instagram) ? $web_profile->instagram : 'https://www.instagram.com/'}}" _target="blank" class="social-link" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram"><i class="fab fa-instagram"></i></a>
                                        <a href="{{ ($web_profile && $web_profile->tiktok) ? $web_profile->tiktok : 'https://www.tiktok.com/'}}" _target="blank" class="social-link" data-bs-toggle="tooltip" data-bs-placement="top" title="TikTok"><i class="fab fa-tiktok"></i></a>
                                        <a href="/" class="social-link" data-bs-toggle="tooltip" data-bs-placement="top" title="Website"><i class="fa-solid fa-globe"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-12">
                            <div class="right-profile">
                                <div class="profile-tabs">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="main-card mt-4">
                                                    <div class="card-top p-4">
                                                        <div class="card-event-img">
                                                            <img src="{{ asset('landing_assets/images/event-imgs/img-6.jpg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="card-event-dt">
                                                            <h5>Step Up Open Mic Show</h5>
                                                            <div class="evnt-time">Thu, Jun 30, 2022 4:30 AM</div>
                                                            <div class="event-btn-group">
                                                                <button class="esv-btn saved-btn me-2"><i
                                                                        class="fa-regular fa-bookmark me-2"></i>Save</button>
                                                                <button class="esv-btn me-2"
                                                                    onclick="window.location.href='online_event_detail_view.html'"><i
                                                                        class="fa-solid fa-arrow-up-from-bracket me-2"></i>View</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-pills nav-fill p-2 garren-line-tab" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="feed-tab" data-bs-toggle="tab" href="#feed"
                                                role="tab" aria-controls="feed" aria-selected="true"><i
                                                    class="fa-solid fa-check"></i>Simpan Perubahan</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                    <input type="hidden" id="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Tiket *</label>
                        <input type="text" class="form-control" id="edit_nama" name="nama" required
                            placeholder="Masukkan Jenis Tiket">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga *</label>
                        <input type="number" step="0.01" class="form-control" id="edit_harga" name="harga"
                            required placeholder="Masukkan Harga">
                    </div>
                    <div class="mb-3">
                        <label for="kuota" class="form-label">Kuota *</label>
                        <input type="number" class="form-control" id="edit_kuota" name="kuota" value="0"
                            required placeholder="Masukkan Jumlah Kuota">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3"
                            placeholder="Deskripsi Jenis Tiket"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="update">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('own_script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $("#store").on("click", function() {
            $("#modalTambahTiket").modal('hide');
            $.ajax({
                url: '/jenis-tiket/store',
                method: 'POST',
                data: {
                    '_token': $("meta[name='csrf-token']").attr('content'),
                    'nama': $("#nama").val(),
                    'harga': $("#harga").val(),
                    'kuota': $("#kuota").val(),
                    'deskripsi': $("#deskripsi").val()
                },
                success: function(response) {
                    if (response.status) {
                        sweetAlert(response.status, 'Berhasil menambahkan data!');
                        setTimeout(function() {
                            location.reload();
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

        $(document).on("click", ".edit", function() {
            let id = $(this).data('id');
            $.ajax({
                url: '/jenis-tiket/edit',
                method: 'GET',
                data: {
                    'id': id,
                },
                success: function(response) {
                    if (response.status) {
                        let data = response.data;
                        $("#id").val(data.id);
                        $("#edit_nama").val(data.nama);
                        $("#edit_harga").val(data.harga);
                        $("#edit_kuota").val(data.kuota);
                        $("#edit_deskripsi").val(data.deskripsi);

                        $("#modalEditTiket").modal('show');
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

        $("#update").on("click", function() {
            $("#modalEditTiket").modal('hide');
            $.ajax({
                url: '/jenis-tiket/update',
                method: 'POST',
                data: {
                    '_token': $("meta[name='csrf-token']").attr('content'),
                    'id': $("#id").val(),
                    'nama': $("#edit_nama").val(),
                    'harga': $("#edit_harga").val(),
                    'kuota': $("#edit_kuota").val(),
                    'deskripsi': $("#edit_deskripsi").val()
                },
                success: function(response) {
                    if (response.status) {
                        sweetAlert(response.status, 'Berhasil mengubah data!');
                        setTimeout(function() {
                            location.reload();
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

        $(document).on('click', '.hapus', function() {
            confirmationAlert($(this).data('id'), '/jenis-tiket/delete');
        })
    </script>
@endsection
