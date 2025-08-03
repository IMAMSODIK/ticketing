@extends('template')

@section('own_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="wrapper wrapper-body">
        <div class="profile-banner">
            <div class="hero-cover-block">
                <div class="hero-cover">
                    <div class="hero-cover-img"
                        style="background-image: url('{{ $web_profile && $web_profile->banner ? asset('storage/' . $web_profile->banner) : asset('landing_assets/images/banner.jpg') }}')">
                    </div>
                </div>
                <div class="upload-cover">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="cover-img-btn">
                                    <input type="file" id="cover-img" accept="image/*">
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
                                <div class="user-avatar-img">
                                    @if ($web_profile && $web_profile->logo)
                                        <img id="preview_avatar" src="{{ asset('storage/' . $web_profile->logo) }}" alt="">
                                    @else
                                        <img id="preview_avatar" src="{{ asset('own_assets/default_logo.png') }}" alt="">
                                    @endif
                                    <div class="avatar-img-btn">
                                        <input type="file" id="avatar-img">
                                        <label for="avatar-img"><i class="fa-solid fa-camera"></i></label>
                                    </div>
                                </div>
                                <div class="user-dts">
                                    <h4 class="user-name">{{ auth()->user()->name }}<span class="verify-badge"><i
                                                class="fa-solid fa-circle-check"></i></span></h4>
                                    <span class="user-email">{{ auth()->user()->email }}</span>
                                </div>
                                <div class="profile-social-link">
                                    <h6>Website Links</h6>
                                    <div class="social-links">
                                        <a href="{{ $web_profile && $web_profile->facebook ? $web_profile->facebook : 'https://www.facebook.com/?locale=id_ID' }}"
                                            _target="blank" class="social-link" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Facebook"><i
                                                class="fab fa-facebook-square"></i></a>
                                        <a href="{{ $web_profile && $web_profile->instagram ? $web_profile->instagram : 'https://www.instagram.com/' }}"
                                            _target="blank" class="social-link" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Instagram"><i class="fab fa-instagram"></i></a>
                                        <a href="{{ $web_profile && $web_profile->tiktok ? $web_profile->tiktok : 'https://www.tiktok.com/' }}"
                                            _target="blank" class="social-link" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="TikTok"><i class="fab fa-tiktok"></i></a>
                                        <a href="{{ $web_profile && $web_profile->website ? $web_profile->website : '/' }}" _target="blank" class="social-link" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Website"><i class="fa-solid fa-globe"></i></a>
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
                                                        <div class="card-event-dt">
                                                            <h5>Profile Aplikasi</h5>
                                                            <div class="event-btn-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mt-1">
                                                                            <label class="form-label fs-6">Facebook</label>
                                                                            <input class="form-control h_50" type="text" id="facebook" placeholder="Masukin link Profile Facebook" value="{{$web_profile->facebook}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group mt-1">
                                                                            <label class="form-label fs-6">Instagram</label>
                                                                            <input class="form-control h_50" type="text" id="instagram" placeholder="Masukin link Profile Instagram" value="{{$web_profile->instagram}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group mt-1">
                                                                            <label class="form-label fs-6">TikTok</label>
                                                                            <input class="form-control h_50" type="text" id="tiktok" placeholder="Masukin link Profile TikTok" value="{{$web_profile->tiktok}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group mt-1">
                                                                            <label class="form-label fs-6">Website</label>
                                                                            <input class="form-control h_50" type="text" id="website" placeholder="Masukin link Website" value="{{$web_profile->website}}">
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
                                    <ul class="nav nav-pills nav-fill p-2 garren-line-tab" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <button class="nav-link active" id="store" data-bs-toggle="tab"
                                                role="tab" aria-controls="feed" aria-selected="true"><i
                                                    class="fa-solid fa-check"></i>Simpan Perubahan</button>
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
@endsection

@section('own_script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $("#cover-img").on("change", function(event) {
            const file = event.target.files[0];

            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $(".hero-cover-img").css("background-image", `url('${e.target.result}')`);
                }

                reader.readAsDataURL(file);
            }
        });


        $("#avatar-img").on("change", function(event) {
            const file = event.target.files[0];

            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $("#preview_avatar").attr("src", e.target.result);
                }

                reader.readAsDataURL(file);
            }
        })

        $("#store").on("click", function() {
            $("#modalTambahTiket").modal('hide');

            let button = $(this);
            button.prop("disabled", true);

            let formData = new FormData();
            const cover = $('#cover-img')[0].files[0];
            const avatar = $('#avatar-img')[0].files[0];

            if (cover) {
                formData.append('cover', cover);
            }

            if (avatar) {
                formData.append('avatar', avatar);
            }

            formData.append('facebook', $("#facebook").val());
            formData.append('instagram', $("#instagram").val());
            formData.append('tiktok', $("#tiktok").val());
            formData.append('website', $("#website").val());
            formData.append('_token', $("meta[name='csrf-token']").attr('content'));

            $.ajax({
                url: '/web-settings/update',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    button.prop("disabled", false);
                    if (response.status) {
                        sweetAlert(response.status, 'Berhasil mungubah profile!');
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        sweetAlert(response.status, response.message);
                    }
                },
                error: function(response) {
                    button.prop("disabled", false);
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
@endsection
