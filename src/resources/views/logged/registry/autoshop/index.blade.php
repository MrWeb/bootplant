@extends('bootplant::layouts.app-'.config('bootplant.app_menu_position'))

@section('section')
Carrozzerie
@endsection

@section('page')
Tutte le Carrozzerie
@endsection

@section('addbutton')
	<a class="btn btn-success" href="{{url('/autoshops/create')}}">Nuova Carrozzeria</a>
@endsection
@section('content')
<div>
<table class="table mb-0" id="autoshops-table">
  <thead class="bg-light">
  </thead>
  <tbody>
  </tbody>
</table>
</div>

<!-- End Small Stats Blocks -->
@endsection
