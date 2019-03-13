<div id="side-actions">
<div class="card card-small" style="z-index: 99">
	<div class="card-header border-bottom">
		<button type="button" class="float-right btn my-0 btn-white btn-sm" @click="back"><i class="material-icons">keyboard_arrow_left</i></button>
		<h6 class="m-0 p-0">Azioni</h6>
	</div>
	{{-- Dettagli e Dati --}}
	<div class='card-body p-0'>
		<ul class="list-group list-group-flush">
			<li class="list-group-item p-3">
				<span class="d-flex mb-2"><i class="material-icons mr-1">vpn_key</i><strong class="mr-1">Codice {{$fullname}}:</strong> {{substr(@$registry->id, 0,8)}}</span>
				<span class="d-flex mb-2"><i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Creato il:</strong> {{ Carbon\Carbon::parse(@$registry->created_at)->format('d/m/Y H:i') }}</span>
				<span class="d-flex mb-2"><i class="material-icons mr-1">today</i><strong class="mr-1">Ultima Modifica il:</strong> {{ Carbon\Carbon::parse(@$registry->updated_at)->format('d/m/Y H:i') }}</span>
				<span class="d-flex mb-2"><i class="material-icons mr-1">person</i><strong class="mr-1">Utente:</strong> {{ isset($registry->user) ? $registry->user()->pluck('name')[0] : Auth::user()->name}}</span>
				<span class="d-flex mb-2" v-if="{{$vuemodel}}.id" v-cloak><i class="fa fa-hashtag mr-1"></i> <small class="text-muted">{{@$registry->id}}</small></span>
			</li>
		</ul>
	</div>
	{{-- Footer Bottoni --}}
	<div class="card-footer border-top">
		<div class="row">
			<div class="col">
				{{-- Elimina --}}
				<button v-cloak v-if="{{$vuemodel}}.id" type="button" @click="modal({
					type:'warning',
					text:'Sei sicuro di vole eliminare questa {{$fullname}}?',
					confirm:'Sì, elimina',
					callback: {
						fn: deleteResource,
						args: {
							resource: '{{$vuemodel}}',
						}
					}
				})" class="btn btn-sm btn-outline-danger"><i class="material-icons">clear</i> Elimina</button>
				{{-- Indietro --}}
				<button v-if="!{{$vuemodel}}.id" type="button" @click="back()" class="btn btn-sm btn-outline-warning"><i class="material-icons">arrow_left</i> Annulla</button>
				{{-- Crea --}}
				<button class="btn btn-sm btn-accent float-right" v-cloak v-if="!{{$vuemodel}}.id"><i class="material-icons">check</i> Crea</button>
				{{-- Salva --}}
				<button class="btn btn-sm btn-accent float-right" v-cloak v-if="{{$vuemodel}}.id"><i class="material-icons">check</i> Salva</button>
			</div>
		</div>
	</div>
</div>
{{-- Creazione Sinistri --}}
<transition enter-active-class="animated slideInDown">
	<div class="card card-small mt-3" v-cloak v-show="!loading && {{$vuemodel}}.id">
		<div class="card-header border-bottom">
			<h6 class="m-0">Gestione Sinistri</h6>
		</div>
		<div class="card-body p-0">
			<ul class="list-group list-group-flush pb-1 text-center">
				<li class="list-group-item px-3 pb-2">
					<span class="badge badge-pill badge-lighter mb-2" v-show="edited">Salva prima di creare un Sinistro</span>
					<button type="button" class="btn btn-success btn-block" @click="asyncPost('accidents/new/'+{{$vuemodel}}.id+'/quote', null, (res)=>{page('accidents/'+res+'/edit')})" :disabled="!{{$vuemodel}}.id || edited">Nuovo Preventivo</button>
					<button type="button" class="btn btn-secondary btn-block" :disabled="!{{$vuemodel}}.id || edited">Nuovo Forfait</button>
					<button type="button" class="btn btn-primary btn-block" :disabled="!{{$vuemodel}}.id || edited">Nuovo Grande Progetto</button>
				</li>
			</ul>
		</div>
	</div>
</transition>
</div>
