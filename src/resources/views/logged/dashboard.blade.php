@extends('bootplant::layouts.app-'.config('bootplant.app_menu_position'))

@section('content')
<div class="row">
  @card(['title' => "Sinistri Attivi", 'link' => 'accidents', 'num' => $data['closed_orders'], 'color' => 'warning'])
  @endcard

  @card(['title' => "Riparazioni Effettuate", 'link' => 'accidents', 'num' => $data['open_orders'], 'color' => 'success'])
  @endcard

  @card(['title' => "Clienti", 'link' => '#!', 'num' => $data['customers'], 'color' => 'info'])
  @endcard
</div>

<!-- End Small Stats Blocks -->
@endsection

@section('js')
<script type="text/javascript">
	new VueApp({

	}).$mount('#app');
</script>
@endsection
