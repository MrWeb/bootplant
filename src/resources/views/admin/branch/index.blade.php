@extends('bootplant::layouts.app-'.config('bootplant.app_menu_position'))

@section('section')
Agenzie
@endsection

@section('page')
Tutte le Agenzie
@endsection

@section('addbutton')
	<a class="btn btn-success" href="{{url('/branches/create')}}">Nuova Agenzia</a>
@endsection

@section('content')
@table(['table' => 'branches'])
@endtable
@endsection

@section('js')
<script type="text/javascript">
  new VueApp({
  }).$mount('#root');
</script>
@endsection
