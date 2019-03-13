@extends('bootplant::layouts.app-'.config('bootplant.app_menu_position'))

@section('section')
Concessionarie
@endsection

@section('page')
Tutte le Concessionarie
@endsection

@section('addbutton')
	<a class="btn btn-success" href="{{url('/agents/create')}}">Nuova Concessionaria</a>
@endsection
@section('content')
<div>
<table class="table mb-0" id="agents-table">
  <thead class="bg-light">
  </thead>
  <tbody>
  </tbody>
</table>
</div>

<!-- End Small Stats Blocks -->
@endsection
