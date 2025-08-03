<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="{{ asset('landing_assets/js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function sweetAlert(status, message) {
        if (status) {
            Swal.fire({
                title: "Success",
                text: message,
                icon: "success"
            });
        } else {
            Swal.fire({
                title: "Error",
                text: message,
                icon: "error"
            });
        }
    }
</script>

<script>
    $(document).ready(function() {
        let tiketData = localStorage.getItem('pendingCheckout');
        console.log(tiketData);
        if (!tiketData) {
            Swal.fire({
                title: "Error",
                text: "Data checkout tidak ditemukan",
                icon: "error"
            }).then(() => {
                window.location.href = "/";
            });
            return;
        }

        $.ajax({
            url: "/event/checkout",
            method: "POST",
            data: {
                '_token': $("meta[name='csrf-token']").attr('content'),
                'tiketData': tiketData
            },
            success: function(response) {
                localStorage.removeItem('pendingCheckout');
                if (response.status) {
                    Swal.fire({
                        title: "Success",
                        text: response.message,
                        icon: "success"
                    }).then(() => {
                        window.location.href = "/user-dashboard";
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: response.message,
                        icon: "error"
                    });
                }
            },
            error: function(xhr) {
                let message = "Terjadi kesalahan saat memproses pembayaran";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                Swal.fire({
                    title: "Error",
                    text: message,
                    icon: "error"
                });
            }
        });
    });
</script>
