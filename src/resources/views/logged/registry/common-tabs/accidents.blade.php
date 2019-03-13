<table class="table mb-0">
  <thead class="bg-light">
  	<tr>
  		<td>Sinistro</td>
  		<td>Stato</td>
  		<td>Data</td>
  		<td>Azioni</td>
  	</tr>
  </thead>
  <tbody>
  	<tr v-for="sinistro in accidents" v-if="accidents.length">
  		<td>#@{{sinistro.id_leggibile}}</td>
  		<td><span class="badge badge-secondary">@{{sinistro.step_word}}</span></td>
  		<td>@{{sinistro.created_at | date}}</td>
  		<td><a @click="page(`accidents/${sinistro.id}/edit`)" class="btn btn-white"><i class="material-icons">edit</i></a></td>
  	</tr>
  	<tr v-if="!accidents.length">
  		<td align="center" colspan="4">Nessun sinistro per questa anagrafica</td>
  	</tr>
  </tbody>
</table>
