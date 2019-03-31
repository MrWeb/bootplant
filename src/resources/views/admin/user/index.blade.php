@extends('bootplant::layouts.app-'.config('bootplant.app_menu_position'))

@section('section')
Utenti
@endsection

@section('page')
Tutti gli Utenti
@endsection

@section('addbutton')
	<a class="btn btn-success" href="{{url('/users/create')}}">Nuovo Utente</a>
@endsection

@section('content')
@table(['table' => 'users'])
@endtable
@endsection

@section('js')
<script type="text/javascript">
  new VueApp({
  }).$mount('#root');
</script>
@endsection
