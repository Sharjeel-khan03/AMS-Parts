<!DOCTYPE html>
<html lang="en">
<!-- Start Head -->
@include('website.layouts.header')
<!-- End Head -->

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
		{{-- //cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css --}}
		<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <div id="preloader">
        <div id="loader"></div>
    </div>
    <!-- Start Navbar -->
    @include('website.layouts.navbar')
    <!-- End Navbar -->
    @yield('content')

    @include('website.layouts.footer')
    {{-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/photoswipe/photoswipe.min.js"></script>
    <script src="vendor/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="vendor/select2/js/select2.min.js"></script>
    <script src="js/number.js"></script> --}}
    <script src="{{ asset('website/js/main.js') }}"></script>
    <script src="{{ asset('website/js/number.js') }}"></script>

    <script>
        $(document).ready(function() {
            toastr.options = {
                'closeButton': true,
                'debug': false,
                'newestOnTop': false,
                'progressBar': false,
                'positionClass': 'toast-top-right',
                'preventDuplicates': false,
                'showDuration': '1000',
                'hideDuration': '1000',
                'timeOut': '5000',
                'extendedTimeOut': '1000',
                'showEasing': 'swing',
                'hideEasing': 'linear',
                'showMethod': 'fadeIn',
                'hideMethod': 'fadeOut',
            }
        });
    </script>

    {{-- tostar's --}}
    @if (Session::has('login'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            };
            toastr.success("{{ session('login') }}");
        </script>
    @endif

    @if (Session::has('notregister'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            };
            toastr.error("{{ session('notregister') }}");
        </script>
    @endif


    @if (Session::has('register'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            };
            toastr.success("{{ session('register') }}");
        </script>
    @endif

    @if (Session::has('qoute'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        };
        toastr.success("{{ session('qoute') }}");
    </script>
@endif

@if (Session::has('error'))
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    };
    toastr.error("{{ session('error') }}");
</script>
@endif


@if (Session::has('success'))
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    };
    toastr.success("{{ session('success') }}");
</script>
@endif

{{-- end --}}

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var minusButton = document.getElementById('minus-btn');
            var plusButton = document.getElementById('plus-btn');
            var quantityInput = document.getElementById('quantity');

            minusButton.addEventListener('click', function() {
                var currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue) && currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });

            plusButton.addEventListener('click', function() {
                var currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue)) {
                    quantityInput.value = currentValue + 1;
                } else {
                    quantityInput.value = 1;
                }
            });
        });
    </script> --}}

</body>

</html>
