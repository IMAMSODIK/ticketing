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
				<div class="row justify-content-center">
					<div class="col-lg-8 col-md-10">
						<div class="blog-view">
							<div class="blog-img-card p-0">
								<img src="{{ $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('own_assets/default_flayer.png') }}" alt="">
							</div>
							<div class="blog-content blog-content-view p-0">
								<h3>{{$event->title}}</h3>
								<div class="post-meta border_bottom pb-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="post-date me-4 fs-14">
                                                <i class="fa-regular fa-calendar-days me-2"></i> {{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('l, d M Y') }} <br>
                                                <i class="fa fa-clock me-2"></i>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('l') . ', ' . \Carbon\Carbon::parse($event->waktu_mulai)->format('h:i A') }}</b>
                                            </span>
                                        </div>
                                        <div class="col-6">
                                            <span class="post-read-time float-none fs-14">
                                                <i class="fa fa-regular fa-building me-2"></i>{{$event->nama_tempat}}</b> <br>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i> {{$event->alamat}}
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
                                                <button class="btn btn-primary" onclick="location.href='/event/edit?id={{ $event->id }}'">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </button>
                                            </li>
                                            <li>
                                                <button class="btn btn-danger" id="delete" data-id="{{$event->id}}"><i class="fa fa-trash"></i> Hapus</button>
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
								<h3>Tiket</h3>
							</div>
                            <div>
								@foreach ($event->jenisTiket as $tiket)
                                    <div class="item">
                                        <div class="price-ticket-card mt-4">
                                            <div class="price-ticket-card-head d-md-flex flex-wrap align-items-start justify-content-between position-relative p-4">
                                                <div class="d-flex align-items-center top-name">
                                                    <div class="icon-box">
                                                        <span class="icon-big rotate-icon icon icon-purple">
                                                            <i class="fa-solid fa-ticket"></i>
                                                        </span>
                                                        <h5 class="fs-16 mb-1 mt-1">{{$tiket->nama}}</h5>
                                                        <p class="text-gray-50 m-0"><span class="visitor-date-time">{{$tiket->deskripsi}}</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-ticket-card-body border_top p-4">
                                                <div class="full-width d-flex flex-wrap justify-content-between align-items-center">
                                                    <div class="icon-box">
                                                        <div class="icon me-3">
                                                            <i class="fa-solid fa-ticket"></i>
                                                        </div>
                                                        <span class="text-145">Harga Tiket</span>
                                                        <h6 class="coupon-status">Rp. {{ number_format($tiket->harga, 0, ',', '.') }}</h6>
                                                    </div>
                                                    <div class="icon-box">
                                                        <div class="icon me-3">
                                                            <i class="fa-solid fa-users"></i>
                                                        </div>
                                                        <span class="text-145">Kuota Tiket</span>
                                                        <h6 class="coupon-status">{{$tiket->kuota}} Peserta</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection

@section('own_script')
    <script>
        $("#delete").on("click", function(){
            $(this).prop("disabled", true);
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/event/delete',
                        method: 'POST',
                        data: {
                            '_token': $("meta[name='csrf-token']").attr('content'),
                            'id': $(this).data('id')
                        },
                        success: function(response){
                            $(this).prop("disabled", false);
                            if(response.status){
                                sweetAlert(response.status, 'Data berhasil dihapus');
                                setTimeout(() => location.href = '/event', 1000);
                            }else{
                                sweetAlert(response.status, response.message);
                            }
                        },
                        error: function(response){
                            $(this).prop("disabled", false);
                            sweetAlert(response.status, response.message);
                        }
                    })
                }
            });
        });
    </script>
@endsection