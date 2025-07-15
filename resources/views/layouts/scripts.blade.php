<script src="{{asset('landing_assets/js/vertical-responsive-menu.min.js')}}"></script>
<script src="{{asset('landing_assets/js/jquery.min.js')}}"></script>
<script src="{{asset('landing_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('landing_assets/vendor/OwlCarousel/owl.carousel.js')}}"></script>
<script src="{{asset('landing_assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('landing_assets/vendor/chartist/dist/chartist.min.js')}}"></script>
<script src="{{asset('landing_assets/vendor/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('landing_assets/js/analytics.js')}}"></script>
<script src="{{asset('landing_assets/js/custom.js')}}"></script>
<script src="{{asset('landing_assets/js/night-mode.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function sweetAlert(status, message){
        if(status){
            Swal.fire({
                title: "Success",
                text: message,
                icon: "success"
            });
        }else{
            Swal.fire({
                title: "Error",
                text: message,
                icon: "error"
            });
        }
    }

    function confirmationAlert(id, url){
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
                        url: url,
                        method: 'POST',
                        data: {
                            '_token': $("meta[name='csrf-token']").attr('content'),
                            'id': id
                        },
                        success: function(response){
                            if(response.status){
                                sweetAlert(response.status, 'Data berhasil dihapus');
                                setTimeout(() => location.reload(), 1000);
                            }else{
                                sweetAlert(response.status, response.message);
                            }
                        },
                        error: function(response){
                            sweetAlert(response.status, response.message);
                        }
                    })
                }
            });
    }
</script>

@yield('own_script')