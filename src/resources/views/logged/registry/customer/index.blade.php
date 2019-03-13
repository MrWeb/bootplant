@extends('bootplant::layouts.app-'.config('bootplant.app_menu_position'))

@section('section')
Clienti
@endsection

@section('page')
Tutti i Clienti
@endsection

@section('addbutton')
	<a class="btn btn-success" href="{{url('/customers/create')}}">Nuovo Cliente</a>
@endsection
@section('content')
<div>
<table class="table mb-0" id="customers-table">
  <thead class="bg-light">
  </thead>
  <tbody>
  </tbody>
</table>
</div>

<!-- End Small Stats Blocks -->
@endsection
