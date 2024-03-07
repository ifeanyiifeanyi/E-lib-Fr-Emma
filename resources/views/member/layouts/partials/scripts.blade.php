<!-- Bootstrap JS -->
<script src="{{ asset("") }}user/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{ asset("") }}user/assets/js/jquery.min.js"></script>
<script src="{{ asset("") }}user/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{ asset("") }}user/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{ asset("") }}user/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{ asset("") }}user/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset("") }}user/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset("") }}user/assets/plugins/chartjs/js/chart.js"></script>
<script src="{{ asset("") }}user/assets/plugins/chartjs/js/Chart.extension.js"></script>
<script src="{{ asset("") }}user/assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
<!--notification js -->
<script src="{{ asset("") }}user/assets/plugins/notifications/js/lobibox.min.js"></script>
{{-- <script src="{{ asset("") }}user/assets/plugins/notifications/js/notifications.min.js"></script> --}}
<script src="{{ asset("") }}user/assets/js/index3.js"></script>
<!--app JS-->
<script src="{{ asset("") }}user/assets/js/app.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
var type = "{{ Session::get('alert-type','info') }}"
switch(type){
case 'info':
toastr.info(" {{ Session::get('message') }} ");
break;

case 'success':
toastr.success(" {{ Session::get('message') }} ");
break;

case 'warning':
toastr.warning(" {{ Session::get('message') }} ");
break;

case 'error':
toastr.error(" {{ Session::get('message') }} ");
break;
}
@endif
</script>

<script src="{{ asset('search.js') }}"></script>
@yield('js')