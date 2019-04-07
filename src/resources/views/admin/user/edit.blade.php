@extends('bootplant::layouts.app-'.config('bootplant.app_menu_position'))

@section('section')
Utente
@endsection

@section('page')
<span v-cloak v-if="user.name || user.lastname">@{{user.lastname}} @{{user.name}}</span>
<span v-cloak v-if="!user.name && !user.lastname">Nuovo Utente</span>
@endsection

@section('content')
@isset($user)
<form action="{{url('users/'.$user->id)}}" method="POST">
  @csrf
  @method('PUT')
  @endisset
  @empty($user)
  <form action="{{url('users')}}" method="POST">
    @csrf
    @endempty
    <div class="row">
      <div class="col col-lg-8 col-md-12 col-sm-12 mb-4">
        <div class="card card-small h-100">
          <div class="card-header border-bottom  bg-light">
            <h6 class="m-0">Informazioni Personali</h6>
          </div>
          <div class="card-body pt-0">
            {{-- Dettagli Ordine --}}
            <div class="row py-2">
              <div class="col">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="lastName">Cognome</label>
                    <input type="text" required class="form-control" v-model="user.lastname" name="lastname" value="{{@$user->lastname}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="firstName">Nome</label>
                    <input type="text" required class="form-control" v-model="user.name" name="name" value="{{@$user->name}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="emailAddress">Indirizzo Email</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="material-icons"></i>
                        </div>
                      </div>
                      <input type="email" required class="form-control" name="email" value="{{@$user->email}}">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="emailAddress">Codice Interno</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="material-icons">vpn_key</i>
                        </div>
                      </div>
                      <input type="text" class="form-control" name="internal_code" value="{{@$user->internal_code}}">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="branch">Ruolo</label>
                    <select name="role" :value="user.roles[0].name" class="form-control" @role('agente') readonly="readonly" @endrole id="role" >
                      <option value="agente">Agente</option>
                      <option value="admin">Admin</option>
                      @role('superadmin')
                      <option value="superadmin">Super-Admin</option>
                      @endrole
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="branch">Branch</label>
                    <select name="branch_id" @role('agente') readonly="readonly" @endrole class="form-control" id="branch" >
                        @foreach($branches as $branch)
                          <option value="{{$branch->id}}"
                            @isset($user)
                               {{($user->branch_id == $branch->id) ? 'selected' : ''}}
                            @endisset>{{$branch->name}}</option>
                        @endforeach
                    </select>
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
                <span class="d-flex mb-2"><i class="material-icons mr-1">vpn_key</i><strong class="mr-1">Codice Utente:</strong> {{substr(@$user->id, 0,8)}}</span>
                <span class="d-flex mb-2"><i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Creato il:</strong> {{ Carbon\Carbon::parse(@$user->created_at)->format('d/m/Y H:i') }}</span>
                <span class="d-flex mb-2"><i class="material-icons mr-1">today</i><strong class="mr-1">Ultima Modifica il:</strong> {{ Carbon\Carbon::parse(@$user->updated_at)->format('d/m/Y H:i') }}</span>
              </li>
              <li class="list-group-item p-3">
                <button class="btn btn-block btn-outline-info" disabled="disabled">Aggiorna la Password</button>
                @hasanyrole('superadmin|admin')
                  <button class="btn btn-block btn-outline-danger" disabled="disabled">Reset della Password</button>
                @endhasanyrole
              </li>
            </ul>
          </div>
          <div class="card-footer border-top">
            <div class="row">
              <div class="col">
                @isset($user)
                  <a href="#!" @click="modal({
                  type: 'warning',
                  text: 'Sei sicuro di vole eliminare questo utente?',
                  confirm: 'Sì, elimina',
                  callback: {
                    fn: deleteResource,
                    args: {
                      id: user.id,
                      resource:'users'
                    }
                  }
              })" class="btn btn-sm btn-outline-danger"><i class="material-icons">clear</i> Elimina</a>
                @else
                  <a href="{{url('/users')}}" class="btn btn-sm btn-outline-danger"><i class="material-icons">clear</i> Annulla</a>
                @endisset
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
    user:@json($user ?? ['roles' => [0 => ['name' => 'agente']]])
  }
  }).$mount('#app');
  </script>
  @endsection
