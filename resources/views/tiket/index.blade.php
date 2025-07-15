@extends('template')

@section('own_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="wrapper wrapper-body">
        <div class="dashboard-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-main-title">
                            <h3><i class="fa-solid fa-ticket me-3"></i>{{ $pageTitle }}</h3>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <button type="button" id="tambah" class="btn btn-success">
                            <i class="fa fa-plus me-1"></i> Tambah Data
                        </button>
                    </div>
                    <div class="col-md-12">
                        <div class="main-card mt-4">

                            <div class="table-responsive m-4">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Tiket</th>
                                            <th>Harga</th>
                                            <th>Kuota</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tikets as $index => $tiket)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td>{{ $tiket->nama }}</td>
                                                <td>Rp. {{ $tiket->harga }}</td>
                                                <td>{{ $tiket->kuota }} Peserta</td>
                                                <td>{{ $tiket->deskripsi ?? '' }}</td>
                                                <td class="text-center">
                                                    <button type="button" data-id="{{ $tiket->id }}"
                                                        class="btn btn-sm btn-info edit"><i
                                                            class="fa fa-pencil me-1"></i>Edit</button>
                                                    <button type="button" data-id="{{ $tiket->id }}"
                                                        class="btn btn-sm btn-danger hapus"><i
                                                            class="fa fa-trash me-1"></i>Hapus</button>
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
                        <input type="text" class="form-control" id="nama" name="nama" required placeholder="Masukkan Jenis Tiket">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga *</label>
                        <input type="number" step="0.01" class="form-control" id="harga" name="harga" required placeholder="Masukkan Harga">
                    </div>
                    <div class="mb-3">
                        <label for="kuota" class="form-label">Kuota *</label>
                        <input type="number" class="form-control" id="kuota" name="kuota" value="0" required placeholder="Masukkan Jumlah Kuota">
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
                        <input type="text" class="form-control" id="edit_nama" name="nama" required placeholder="Masukkan Jenis Tiket">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga *</label>
                        <input type="number" step="0.01" class="form-control" id="edit_harga" name="harga" required placeholder="Masukkan Harga">
                    </div>
                    <div class="mb-3">
                        <label for="kuota" class="form-label">Kuota *</label>
                        <input type="number" class="form-control" id="edit_kuota" name="kuota" value="0" required placeholder="Masukkan Jumlah Kuota">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi Jenis Tiket"></textarea>
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
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        $("#tambah").on("click", function() {
            $("#modalTambahTiket").modal('show');
        })

        $("#store").on("click", function(){
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
                success: function(response){
                    if(response.status){
                        sweetAlert(response.status, 'Berhasil menambahkan data!');
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }else{
                        sweetAlert(response.status, response.message);
                    }
                },
                error: function(response){
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

        $(document).on("click", ".edit", function(){
            let id = $(this).data('id');
            $.ajax({
                url: '/jenis-tiket/edit',
                method: 'GET',
                data: {
                    'id': id,
                },
                success: function(response){
                    if(response.status){
                        let data = response.data;
                        $("#id").val(data.id);
                        $("#edit_nama").val(data.nama);
                        $("#edit_harga").val(data.harga);
                        $("#edit_kuota").val(data.kuota);
                        $("#edit_deskripsi").val(data.deskripsi);

                        $("#modalEditTiket").modal('show');
                    }else{
                        sweetAlert(response.status, response.message);
                    }
                },
                error: function(response){
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

        $("#update").on("click", function(){
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
                success: function(response){
                    if(response.status){
                        sweetAlert(response.status, 'Berhasil mengubah data!');
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }else{
                        sweetAlert(response.status, response.message);
                    }
                },
                error: function(response){
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

        $(document).on('click', '.hapus', function(){
            confirmationAlert($(this).data('id'), '/jenis-tiket/delete');
        })
    </script>
@endsection
