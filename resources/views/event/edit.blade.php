@extends('template')

@section('own_style')
    <link href="{{ asset('landing_assets/css/datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/jquery-steps.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/night-mode.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/night-mode.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="wrapper wrapper-body">
        <div class="breadcrumb-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-10">
                        <div class="barren-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <h3>Edit Event</h3>
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
                    <div class="col-xl-8 col-lg-9 col-md-12">
                        <div class="wizard-steps-block">
                            <div id="add-event-tab" class="step-app">
                                <ul class="step-steps">
                                    <li class="active">
                                        <a href="#tab_step1">
                                            <span class="number"></span>
                                            <span class="step-name">Detail</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_step2">
                                            <span class="number"></span>
                                            <span class="step-name">Lokasi</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="step-content">
                                    <input type="hidden" id="id" value="{{$event->id}}">
                                    <div class="step-tab-panel step-tab-info active" id="tab_step1">
                                        <div class="tab-from-content">
                                            <div class="main-card">
                                                <div class="bp-title">
                                                    <h4><i class="fa-solid fa-circle-info step_icon me-3"></i>Detail</h4>
                                                </div>
                                                <div class="p-4 bp-form main-form">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group border_bottom pb_30">
                                                                <label class="form-label fs-16">Nama Event*</label>
                                                                <input class="form-control h_50" type="text"
                                                                    id="title"
                                                                    placeholder="Masukin nama Event kamu disini"
                                                                    value="{{ $event->title }}">
                                                            </div>
                                                            <div class="form-group border_bottom pt_30 pb_30">
                                                                <label class="form-label fs-16">Tanggal Event*</label>
                                                                <div class="row g-2">
                                                                    <div class="col-md-6">
                                                                        <label class="form-label mt-3 fs-6">Pilih Tanggal
                                                                            Event dimulai.*</label>
                                                                        <div class="loc-group position-relative">
                                                                            <input class="form-control h_50 datepicker-here"
                                                                                data-language="en" type="text"
                                                                                placeholder="MM/DD/YYYY"
                                                                                value="{{ $event->tanggal_mulai }}"
                                                                                id="tanggal_mulai">
                                                                            <span class="absolute-icon"><i
                                                                                    class="fa-solid fa-calendar-days"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row g-2">
                                                                            <div class="col-md-6">
                                                                                <div class="clock-icon">
                                                                                    @php
                                                                                        $timeOptions = [];
                                                                                        for ($h = 0; $h < 24; $h++) {
                                                                                            for (
                                                                                                $m = 0;
                                                                                                $m < 60;
                                                                                                $m += 15
                                                                                            ) {
                                                                                                $timeOptions[] = sprintf(
                                                                                                    '%02d:%02d',
                                                                                                    $h,
                                                                                                    $m,
                                                                                                );
                                                                                            }
                                                                                        }
                                                                                    @endphp
                                                                                    <label
                                                                                        class="form-label mt-3 fs-6">Waktu</label>
                                                                                    <select class="selectpicker"
                                                                                        data-size="5"
                                                                                        data-live-search="true"
                                                                                        id="waktu_mulai" name="waktu_mulai">
                                                                                        @foreach ($timeOptions as $time)
                                                                                            <option
                                                                                                value="{{ $time }}"
                                                                                                {{ \Carbon\Carbon::parse($event->waktu_mulai)->format('H:i') === $time ? 'selected' : '' }}>
                                                                                                {{ $time }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row g-2">
                                                                    <div class="col-md-6">
                                                                        <label class="form-label mt-3 fs-6">Pilih Tanggal
                                                                            Event berakhir.*</label>
                                                                        <div class="loc-group position-relative">
                                                                            <input class="form-control h_50 datepicker-here"
                                                                                data-language="en" type="text"
                                                                                placeholder="MM/DD/YYYY"
                                                                                value="{{ $event->tanggal_selesai }}"
                                                                                id="tanggal_selesai">
                                                                            <span class="absolute-icon"><i
                                                                                    class="fa-solid fa-calendar-days"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row g-2">
                                                                            <div class="col-md-6">
                                                                                @php
                                                                                    $timeOptionsDone = [];
                                                                                    for ($h = 0; $h < 24; $h++) {
                                                                                        for (
                                                                                            $m = 0;
                                                                                            $m < 60;
                                                                                            $m += 15
                                                                                        ) {
                                                                                            $timeOptionsDone[] = sprintf(
                                                                                                '%02d:%02d',
                                                                                                $h,
                                                                                                $m,
                                                                                            );
                                                                                        }
                                                                                    }
                                                                                @endphp
                                                                                <div class="clock-icon">
                                                                                    <label
                                                                                        class="form-label mt-3 fs-6">Waktu</label>
                                                                                    <select class="selectpicker"
                                                                                        data-size="5"
                                                                                        data-live-search="true"
                                                                                        id="waktu_selesai">
                                                                                        @foreach ($timeOptionsDone as $time)
                                                                                            <option
                                                                                                value="{{ $time }}"
                                                                                                {{ \Carbon\Carbon::parse($event->waktu_selesai)->format('H:i') === $time ? 'selected' : '' }}>
                                                                                                {{ $time }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group pt_30 pb_30">
                                                                <label class="form-label fs-16">Banner Event</label>
                                                                <p class="mt-2 fs-14 d-block mb-3 pe_right">Upload gambar
                                                                    menarik untuk Banner Event kamu</p>
                                                                <div class="content-holder mt-4">
                                                                    <div class="default-event-thumb">
                                                                        <div class="default-event-thumb-btn">
                                                                            <div class="thumb-change-btn">
                                                                                <input type="file" id="thumbnail"
                                                                                    name="thumbnail">
                                                                                <label for="thumbnail">Ubah Gambar</label>
                                                                            </div>
                                                                        </div>
                                                                        <img src="{{ $event->thumbnail ? asset('storage') . '/' . $event->thumbnail : asset('landing_assets/images/banners/custom-img.jpg') }}"
                                                                            alt="" id="preview_thumbnail">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group border_bottom pb_30">
                                                                <label class="form-label fs-16">Detail Event</label>
                                                                <p class="mt-2 fs-14 d-block mb-3">Tuliskan detail event
                                                                    anda</p>
                                                                <div class="text-editor mt-4">
                                                                    <div id="pd_editor">{!! $event->deskripsi !!}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="step-tab-panel step-tab-location" id="tab_step2">
                                        <div class="tab-from-content">
                                            <div class="main-card">
                                                <div class="bp-title">
                                                    <h4><i class="fa-solid fa-gear step_icon me-3"></i>Lokasi</h4>
                                                </div>
                                                <div class="p_30 bp-form main-form">

                                                    <div class="form-group">
                                                        <div class="ticket-section">
                                                            <div class="form-group pt_30 pb-2">
                                                                <div class="stepper-data-set">
                                                                    <div class="content-holder template-selector">
                                                                        <div class="row g-4">
                                                                            {{-- <div class="col-md-12">
                                                                                <div class="venue-event">
                                                                                    <div class="map">
                                                                                        <iframe
                                                                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254832.60235546026!2d98.50468044429529!3d3.6422714716564024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131cc1c3eb2fd%3A0x23d431c8a6908262!2sMedan%2C%20Kota%20Medan%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1752507869279!5m2!1sid!2sid"
                                                                                            width="600" height="450"
                                                                                            style="border:0;"
                                                                                            allowfullscreen=""
                                                                                            loading="lazy"
                                                                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                                        <input type="hidden" id="koordinat_lokasi" name="koordinat_lokasi">
                                                                                    </div>
                                                                                </div>
                                                                            </div> --}}
                                                                            <div class="col-md-12">
                                                                                <div class="form-group mt-1">
                                                                                    <label
                                                                                        class="form-label fs-6">Venue*</label>
                                                                                    <input class="form-control h_50"
                                                                                        type="text" id="nama_tempat"
                                                                                        placeholder="Masukkan nama Tempat"
                                                                                        value="{{ $event->nama_tempat }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group mt-1">
                                                                                    <label
                                                                                        class="form-label fs-6">Alamat</label>
                                                                                    <input class="form-control h_50"
                                                                                        type="text" id="alamat"
                                                                                        placeholder="Masukin detail alamat Event"
                                                                                        value="{{ $event->alamat }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group main-form mt-1">
                                                                                    <label class="form-label">Pilih
                                                                                        Kota*</label>
                                                                                    <select class="selectpicker"
                                                                                        data-size="5" id="kota"
                                                                                        title="Pilih Kota"
                                                                                        data-live-search="true">
                                                                                        @foreach ($kotas as $kota)
                                                                                            <option
                                                                                                value="{{ $kota->id }}"
                                                                                                {{ $event->kota_id == $kota->id ? 'selected' : '' }}>
                                                                                                {{ $kota->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
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
                                <div class="step-footer step-tab-pager mt-4">
                                    <button data-direction="prev"
                                        class="btn btn-default btn-hover steps_btn">Previous</button>
                                    <button data-direction="next"
                                        class="btn btn-default btn-hover steps_btn">Next</button>
                                    <button data-direction="finish" class="btn btn-default btn-hover steps_btn"
                                        id="create">Update</button>
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
@endsection

@section('own_script')
    <script src="{{ asset('landing_assets/vendor/ckeditor5/ckeditor.js') }}"></script>
    <script src="{{ asset('landing_assets/js/jquery-steps.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/i18n/datepicker.en.js') }}"></script>

    <script>
        $('#add-event-tab').steps({
            // onFinish: function() {
            //     alert('Wizard Completed');
            // }
        });
    </script>
    <script>
        let editorInstance;

        ClassicEditor
            .create(document.querySelector('#pd_editor'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        $("#thumbnail").on("change", function(event) {
            const file = event.target.files[0];

            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $("#preview_thumbnail").attr("src", e.target.result);
                }

                reader.readAsDataURL(file);
            }
        })
    </script>

    <script>
        $("#create").on("click", function(e) {
            e.preventDefault();
            let button = $(this);
            button.prop("disabled", true);

            const deskripsi = $("#pd_editor").html();

            let formData = new FormData();
            const thumbnail = $('#thumbnail')[0].files[0];
            if (thumbnail) {
                formData.append('thumbnail', thumbnail);
            }
            formData.append('_token', $("meta[name='csrf-token']").attr('content'));
            formData.append('id', $("#id").val());
            formData.append('title', $("#title").val());
            formData.append('tanggal_mulai', $("#tanggal_mulai").val());
            formData.append('waktu_mulai', $("#waktu_mulai").val());
            formData.append('tanggal_selesai', $("#tanggal_selesai").val());
            formData.append('waktu_selesai', $("#waktu_selesai").val());
            formData.append('deskripsi', editorInstance.getData());
            formData.append('nama_tempat', $("#nama_tempat").val());
            formData.append('alamat', $("#alamat").val());
            formData.append('kota_id', $("#kota").val());

            $.ajax({
                url: "/event/update",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    button.prop("disabled", false);
                    if (response.status) {
                        sweetAlert(response.status, "Event berhasil disimpan!");
                        location.href = '/event';
                    } else {
                        sweetAlert(response.status, "Gagal menyimpan event: " + response.message);
                    }
                },
                error: function(xhr) {
                    button.prop("disabled", false);
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let message = '';
                        $.each(errors, function(key, val) {
                            message += `${val}\n`;
                        });
                        sweetAlert(false, message);
                    } else {
                        sweetAlert(false, xhr.responseJSON.errors);
                    }
                }
            });
        })
    </script>
@endsection
