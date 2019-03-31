@extends('bootplant::layouts.app-'.config('bootplant.app_menu_position'))

@section('section')
Agenzia
@endsection

@section('page')
<span v-cloak v-if="branch.name || branch.lastname">@{{branch.name}}</span>
<span v-cloak v-if="!branch.name && !branch.lastname">Nuova Agenzia</span>
@endsection

@section('content')
@isset($branch)
<form action="{{url('branchs/'.$branch->id)}}" method="POST">
  @csrf
  @method('PUT')
  @endisset
  @empty($branch)
  <form action="{{url('branchs')}}" method="POST">
    @csrf
    @endempty
    <div class="row">
      <div class="col col-lg-8 col-md-12 col-sm-12 mb-4">
        <div class="card card-small h-100">
          <div class="card-header border-bottom  bg-light">
            <h6 class="m-0">Informazioni Agenzia</h6>
          </div>
          <div class="card-body pt-0">
            {{-- Dettagli Ordine --}}
            <div class="row py-2">
              <div class="col">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="firstName">Nome / Ragione Sociale</label>
                    <input type="text" required class="form-control" v-model="branch.name" name="name" value="{{@$branch->name}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="emailAddress">Email Aziendale</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="material-icons"></i>
                        </div>
                      </div>
                      <input type="email" id="emailAddress" required class="form-control" name="email" value="{{@$branch->email}}">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="phone">Telefono</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="material-icons"></i>
                        </div>
                      </div>
                      <input type="text" id="phone" required class="form-control" name="phone" value="{{@$branch->phone}}">
                    </div>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="address">Indirizzo</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="material-icons">location_on</i>
                        </div>
                      </div>
                      <input type="text" id="address" class="form-control" name="address" value="{{@$branch->address}}">
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="city">Città</label>
                    <input type="text" id="city" class="form-control" name="city" value="{{@$branch->city}}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="zip">CAP</label>
                      <input type="text" id="zip" class="form-control" name="zip" value="{{@$branch->zip}}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="district">Provincia</label>
                    <input type="text" maxlength="2" id="district" class="form-control" name="district" value="{{@$branch->district}}">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
        <div class="card ubd-stats card-small">
          <div class="card-header bg-light border-bottom">
            <h6 class="m-0">Azioni</h6>
          </div>
          {{-- Dettagli e Dati --}}
          <div class='card-body p-0'>
            <ul class="list-group list-group-flush">
              {{-- Riassunto Ordine --}}
              <li class="list-group-item p-3">
                <span class="d-flex mb-2"><i class="material-icons mr-1">vpn_key</i><strong class="mr-1">Codice Agenzia:</strong> {{substr(@$branch->id, 0,8)}}</span>
                <span class="d-flex mb-2"><i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Creato il:</strong> {{ Carbon\Carbon::parse(@$branch->created_at)->format('d/m/Y H:i') }}</span>
                <span class="d-flex mb-2"><i class="material-icons mr-1">today</i><strong class="mr-1">Ultima Modifica il:</strong> {{ Carbon\Carbon::parse(@$branch->updated_at)->format('d/m/Y H:i') }}</span>
              </li>
            </ul>
          </div>
          <div class="card-footer border-top">
            <div class="row">
              <div class="col">
                {{-- @isset($branch)
                  <a href="#!" @click="modal({
                  type: 'warning',
                  text: 'Sei sicuro di vole eliminare questo utente?',
                  confirm: 'Sì, elimina',
                  callback: {
                    fn: deleteResource,
                    args: {
                      id: branch.id,
                      resource:'branchs'
                    }
                  }
              })" class="btn btn-sm btn-outline-danger"><i class="material-icons">clear</i> Elimina</a>
                @else --}}
                  <a href="{{url('/branchs')}}" class="btn btn-sm btn-outline-danger"><i class="material-icons">clear</i> Annulla</a>
                {{-- @endisset --}}
               <button class="btn btn-sm btn-accent float-right"><i class="material-icons">check</i> Salva</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  @endsection
  @section('js')
  <script type="text/javascript">
  new VueApp({
  data:{
    branch:@json($branch ?? [])
  }
  }).$mount('#app');
  </script>
  @endsection
