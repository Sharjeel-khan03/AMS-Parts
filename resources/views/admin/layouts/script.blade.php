 <!-- js -->
 <script src="{{ asset('admin_assets/vendors/scripts/core.js') }}"></script>
 <script src="{{ asset('admin_assets/vendors/scripts/script.min.js') }}"></script>
 <script src="{{ asset('admin_assets/vendors/scripts/process.js') }}"></script>
 <script src="{{ asset('admin_assets/vendors/scripts/layout-settings.js') }}"></script>
 <script src="{{ asset('admin_assets/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
 <script src="{{ asset('admin_assets/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('admin_assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('admin_assets/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('admin_assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('admin_assets/vendors/scripts/dashboard3.js') }}"></script>

 {{-- <script>
    $(document).ready(function(){
        let table = new DataTable('.myTable');
    });
    </script> --}}
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


@if (Session::has('success'))
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    };
    toastr.success("{{ session('success') }}");
</script>
@endif
 {{-- logut out scrpit --}}
 <script>
     document.getElementById('logout-link').addEventListener('click', function(event) {
         event.preventDefault();
         document.getElementById('logout-form').submit();
     });

     //
     document.getElementById('destory-currency').addEventListener('click', function(event) {
         event.preventDefault();
         document.getElementById('destory').submit();
     });
 </script>
 {{-- end --}}

 <!-- Google Tag Manager (noscript) -->
 <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
 style="display: none; visibility: hidden"></iframe></noscript>
 <!-- End Google Tag Manager (noscript) -->
 <script>
     $(document).ready(function() {
         $('#category').change(function() {
             var categoryId = $(this).val();
             // Clear existing subcategories
             $('#subcategory').empty().append('<option value="">Choose...</option>');

             if (categoryId) {
                 $.ajax({
                    //  url: '/getSubcategories/' + categoryId,
                    url:'{{ route("getSubcategories", ["category_id" => "__categoryId__"]) }}'.replace('__categoryId__', categoryId),
                     type: 'GET',
                     success: function(response) {
                         if (response.length > 0) {
                            // console.log(response);
                             $.each(response, function(key, subcategory) {
                                 $('#subcategory').append('<option value="' +
                                     subcategory.id + '">' + subcategory.name +
                                     '</option>');
                             });
                         } else {
                             $('#subcategory').append(
                                 '<option value="">No subcategories found</option>');
                         }
                     },
                     error: function(xhr, status, error) {
                         console.error(error);
                     }
                 });
             }
         });
     });
 </script>
