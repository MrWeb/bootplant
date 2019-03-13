@extends('bootplant::layouts.app-'.config('bootplant.app_menu_position'))
@section('section')
Sinistro
@endsection
@section('page')
<span v-cloak v-if="accident.fname || accident.lname">@{{accident.lname}} @{{accident.fname}}</span>
<span v-if="!accident.fname && !accident.lname">Sinistro</span>
@endsection
@section('content')
@isset($accident)
<form action="{{url('accidents/'.$accident->id)}}" method="POST">
  @csrf
  @method('PUT')
  @endisset
  @empty($accident)
  <form action="{{url('accidents')}}" method="POST">
    @csrf
    @endempty
    <div class="row">
      <div class="col col-lg-8 col-md-12 col-sm-12 mb-4">
        <div class="card card-small h-100">
          <div class="card-header pb-0 bg-light">
            {{-- Badge tipo Sinistro --}}
            <span v-cloak class="float-right badge" :class="'badge-'+tipologia(accident.accident_type).color">@{{(registry.id) ? tipologia(accident.accident_type).text : '-'}}</span>
            <h6 class="m-0">Informazioni sul Sinistro</h6>
            {{-- Cliente --}}
            <input type="hidden" name="registry_id" id="registry_id" :value="registry.id">
            <div class="row py-2 bg-light">
              <div class="col col-12 pt-2">
                <span class="text-muted" v-cloak>Cliente:</span>
                <div v-show="!loading && registry" v-cloak>
                  @{{registry.lname}} @{{registry.fname}}
                  <br v-if="registry.company"> @{{registry.company}}
                  <br v-if="registry.email || registry.phone">@{{registry.email}} <span v-if="registry.email">-</span> @{{registry.phone}}
                  <br v-if="registry.address || registry.city">@{{registry.address}} <span v-if="registry.city">-</span> @{{registry.city}}
                  <span v-if="registry.zip">-</span> @{{registry.zip}} @{{registry.district}}
                  <br v-if="registry.CF"><span v-if="registry.CF"> CF:</span> @{{registry.CF}}
                  <br v-if="registry.PIVA"><span v-if="registry.PIVA"> P.IVA</span> @{{registry.PIVA}}
                </div>
                <div v-if="!registry" v-cloak>
                  [Non selezionato]
                </div>
                <div v-if="loading">
                  <span class="text-muted">Caricamento...</span>
                </div>
              </div>
            </div>
          </div>
          <div class="card-header border-bottom bg-light mb-0 mt-0 pb-0">
            @tabs()
              @tab(['tab' => "Informazioni", "active" => 1])
              @endtab
              @tab(['tab' => "Spaccati"])
              @endtab
              @tab(['tab' => "Foto"])
              @endtab
              @tab(['tab' => "Documenti"])
              @endtab
            @endtabs
          </div>
          <div class="card-body pt-3">
            <div class="tab-content" id="nav-tabContent">
              {{--Informazioni--}}
              @tabcontent(['tab' => "Informazioni", 'active' => 1])
                @include('bootplant::logged.accident.tab-info')
              @endtabcontent
              {{--Spaccati--}}
              @tabcontent(['tab' => "Spaccati"])
                @include('bootplant::logged.accident.tab-spaccati')
              @endtabcontent
              {{--Foto--}}
              @tabcontent(['tab' => "Foto"])
                @include('bootplant::logged.accident.tab-foto')
              @endtabcontent
              {{--Documenti--}}
              @tabcontent(['tab' => "Documenti"])
                @include('bootplant::logged.accident.tab-documenti')
              @endtabcontent
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
        @accidentactions(['registry' => @$accident, 'vuemodel' => 'accident', 'fullname' => "Sinistro"])
        @endaccidentactions
      </div>
    </div>
  </form>
  @endsection
  @section('js')
  <script type="text/javascript">
  new VueApp({
    data:{
      accident:@json($accident ?? []),
      registry:@json($accident->registry ?? []),
      carparts:@json($accident->carparts ?? []),
      steps:@json($accident->steps()->with('user')->get() ?? []),
      steps_panel: 0,
    },
    computed:{
      step_up_word(){
        return this.accident.step_up_word;
      },
      step_back_word(){
        return this.accident.step_back_word;
      },
    },
    created(){
      this.watchForChanges(['accident', 'registr', 'carparts'],  () => {this.edited = true});
    },
    mounted(){
      setTimeout(()=>{
        return this.steps_panel = this.steps.length > 0;
      }, 800)
    }
  }).$mount('#app');
  </script>
  @endsection
