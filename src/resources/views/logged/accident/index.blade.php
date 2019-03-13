@extends('bootplant::layouts.app-'.config('bootplant.app_menu_position'))

@section('section')
Sinistri
@endsection

@section('page')
Tutti i Sinistri
@endsection

@section('content')
<div>
<table class="table mb-0" id="accidents-table">
  <thead class="bg-light">
  </thead>
  <tbody>
  </tbody>
</table>
</div>

<!-- End Small Stats Blocks -->
@endsection
