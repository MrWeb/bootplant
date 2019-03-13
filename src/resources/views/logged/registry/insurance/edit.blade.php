@extends('bootplant::layouts.app-'.config('bootplant.app_menu_position'))
@section('section')
Assicurazione
@endsection
@section('page')
<span v-cloak v-if="insurance.fname || insurance.lname">@{{insurance.lname}} @{{insurance.fname}}</span>
<span v-if="!insurance.fname && !insurance.lname">Assicurazione</span>
@endsection
@section('content')
@isset($insurance)
<form action="{{url('insurances/'.$insurance->id)}}" method="POST">
  @csrf
  @method('PUT')
  @endisset
  @empty($insurance)
  <form action="{{url('insurances')}}" method="POST">
    @csrf
    @endempty
    <div class="row">
      <div class="col col-lg-8 col-md-12 col-sm-12 mb-4">
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
                @include('bootplant::logged.registry.insurance.edit-tab-informazioni')
              </div>
              {{--Sinistri--}}
              <div class="tab-pane fade pt-3" id="Sinistri" role="tabpanel" aria-labelledby="nav-profile-tab">
                @include('bootplant::logged.registry.common-tabs.accidents', ['vuemodel' => 'insurance'])
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
        @registryactions(['registry' => @$insurance, 'vuemodel' => 'insurance', 'fullname' => "Assicurazione"])
        @endregistryactions
      </div>
    </div>
  </form>
  @endsection
  @section('js')
  <script type="text/javascript">
    new VueApp({
      data:{
        insurance:@json($insurance ?? []),
        accidents:@json($insurance->accidents ?? []),
      },
      created(){
        this.watchForChanges(['insurance'],  () => {this.edited = true});
      }
    }).$mount('#app');
  </script>
  @endsection
