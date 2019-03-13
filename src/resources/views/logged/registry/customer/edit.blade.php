@extends('bootplant::layouts.app-'.config('bootplant.app_menu_position'))
@section('section')
Cliente
@endsection
@section('page')
<span v-cloak v-if="customer.fname || customer.lname">@{{customer.lname}} @{{customer.fname}}</span>
<span v-if="!customer.fname && !customer.lname">Cliente</span>
@endsection
@section('content')
@isset($customer)
<form action="{{url('customers/'.$customer->id)}}" method="POST">
  @csrf
  @method('PUT')
  @endisset
  @empty($customer)
  <form action="{{url('customers')}}" method="POST">
    @csrf
    @endempty
    <div class="row">
      <div class="col col-lg-8 col-md-12 col-sm-12">
        <div class="card card-small h-100">
          <div class="card-header border-bottom bg-light mb-0 pb-0">
            @tabs()
              @tab(['tab' => "Informazioni", "active" => 1])
              @endtab
              @tab(['tab' => "Sinistri"])
              @endtab
            @endtabs
          </div>
          <div class="card-body pt-0">
            {{-- Dettagli Registry --}}
            <div class="tab-content" id="nav-tabContent">
              {{--Informazioni--}}
              <div class="tab-pane fade show active" id="Informazioni" role="tabpanel" aria-labelledby="nav-home-tab">
                @include('bootplant::logged.registry.customer.edit-tab-informazioni')
              </div>
              {{--Sinistri--}}
              <div class="tab-pane fade pt-3" id="Sinistri" role="tabpanel" aria-labelledby="nav-profile-tab">
                @include('bootplant::logged.registry.common-tabs.accidents', ['vuemodel' => 'customer'])
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
        @registryactions(['registry' => @$customer, 'vuemodel' => 'customer', 'fullname' => "Cliente"])
        @endregistryactions
      </div>
    </div>
  </form>
  @endsection
  @section('js')
  <script type="text/javascript">
  new VueApp({
    data:{
      customer:@json($customer ?? []),
      accidents:@json($customer->accidents ?? []),
    },
    created(){
      this.watchForChanges(['customer'],  () => {this.edited = true});
    }
  }).$mount('#app');
  </script>
  @endsection
