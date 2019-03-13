@extends('bootplant::layouts.app-'.config('bootplant.app_menu_position'))

@section('section')
Assicurazioni
@endsection

@section('page')
Tutte le Assicurazioni
@endsection

@section('addbutton')
	<a class="btn btn-success" href="{{url('/insurances/create')}}">Nuova Assicurazione</a>
@endsection
@section('content')
<div>
<table class="table mb-0" id="insurances-table">
  <thead class="bg-light">
  </thead>
  <tbody>
  </tbody>
</table>
</div>

<!-- End Small Stats Blocks -->
@endsection
