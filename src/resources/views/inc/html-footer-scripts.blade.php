{{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> --}}
<script src="{{asset('bootplant/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('bootplant/js/popper.min.js')}}"></script>
<script src="{{asset('bootplant/js/bootstrap.min.js')}}"></script>
<script src="{{asset('bootplant/js/Chart.min.js')}}"></script>
<script src="{{asset('bootplant/js/shards.min.js')}}"></script>
<script src="{{asset('bootplant/js/classes.js')}}"></script>
<script type="text/javascript">
let base_url = '{{url('')}}';
</script>
<script src="{{asset('bootplant/js/bootplant.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('bootplant/js/shards-dashboards.1.3.0.min.js')}}"></script>
<!--[if IE]>
<script type="text/javascript" src="{{asset('js/promise.min.js')}}"></script>
<![endif]-->
@isset($table)
<script type="text/javascript">
table_name = '{{$table}}';
</script>
<script type="text/javascript" src="{{asset('js/datatable-lang.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datatable-yadcf.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/table-buttons.js')}}"></script>
<script type="text/javascript" src="{{asset('js/table-models.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootplant-tables.js')}}"></script>
@endisset
@yield('extrascripts')
{{-- <script src="scripts/app/app-analytics-overview.1.3.0.js"></script> --}}
