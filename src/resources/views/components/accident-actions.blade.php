<div class="card card-small" style="z-index: 99">
	<div class="card-header border-bottom">
		<button type="button" class="float-right btn my-0 btn-white btn-sm" @click="back"><i class="material-icons">keyboard_arrow_left</i></button>
		<h6 class="m-0 p-0">Azioni</h6>
	</div>
	{{-- Dettagli e Dati --}}
	<div class='card-body p-0'>
		<ul class="list-group list-group-flush">
			{{-- Riassunto Ordine --}}
			<li class="list-group-item p-3 text-center" :class="'list-group-item-'+tipologia(accident.accident_type).color" style="border-radius: 0">
				<span v-cloak>@{{accident.step_word}}</span>
				<span v-if="loading"><i class="fa fa-spinner fa-spin"></i></span>
			</li>
			<li class="list-group-item p-3">
				<span class="d-flex mb-2"><i class="material-icons mr-1">vpn_key</i><strong class="mr-1">Numero {{$fullname}}:</strong> {{@$registry->id_leggibile}}</span>
				<span class="d-flex mb-2"><i class="material-icons mr-1">lock</i><strong class="mr-1">Codice {{$fullname}}:</strong> {{substr(@$registry->id, 0,8)}}</span>
				<span class="d-flex mb-2"><i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Creato il:</strong> {{ Carbon\Carbon::parse(@$registry->created_at)->format('d/m/Y H:i') }}</span>
				<span class="d-flex mb-2"><i class="material-icons mr-1">today</i><strong class="mr-1">Ultima Modifica il:</strong> {{ Carbon\Carbon::parse(@$registry->updated_at)->format('d/m/Y H:i') }}</span>
				<span class="d-flex mb-2"><i class="material-icons mr-1">person</i><strong class="mr-1">Utente:</strong> {{ $registry->user()->pluck('name')[0] }}</span>
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
					text:'Sei sicuro di vole eliminare questo {{$fullname}}?',
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
{{-- Gestione Sinistri --}}
<transition enter-active-class="animated slideInDown" enter-stagger="50">
	<div class="card card-small mt-3" v-cloak v-show="!loading && {{$vuemodel}}.id" style="z-index:98">
		<div class="card-header border-bottom">
			<h6 class="m-0">Gestione Sinistro</h6>
		</div>
		<div class="card-body p-0">
			<ul class="list-group list-group-flush pb-1 text-center">
				<li class="list-group-item px-3 pb-2">
					<span class="badge badge-pill badge-lighter mb-2" v-show="edited">Salva prima di gestire il Sinistro</span>
					<button type="button" class="btn btn-success btn-block" :disabled="!{{$vuemodel}}.id || edited">@{{step_up_word}}</button>
					<button type="button" class="btn btn-outline-salmon btn-block" v-show="{{$vuemodel}}.step > 0" :disabled="!{{$vuemodel}}.id || edited">Retrocedi a @{{step_back_word}}</button>
				</li>
			</ul>
		</div>
	</div>
</transition>
{{-- Gestione Sinistri --}}
<transition enter-active-class="animated slideInDown">
	<div class="card card-small mt-3" v-cloak v-show="!loading && {{$vuemodel}}.id && steps_panel">
		<div class="card-header border-bottom">
			<h6 class="m-0">Storico Sinistro</h6>
		</div>
		<div class="card-body p-0">
			<ul class="list-group list-group-flush pb-1 text-left">
				<li class="list-group-item px-3 py-2" v-for="step in steps">
					<span class="badge float-left" :class="{'badge-outline-secondary':!step.backed, 'badge-outline-danger':step.backed}">@{{step.step_word}}</span>
					<small class="text-muted float-right">@{{step.created_at | date}}</small><br>
					<small class="text-muted float-right">@{{step.user.name}}</small><br>
				</li>
			</ul>
		</div>
	</div>
</transition>
