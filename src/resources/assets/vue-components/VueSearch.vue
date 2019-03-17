<style scoped>
.list-group{
  position:absolute;
  z-index:99;
  top:60px;
  width:80%;
  max-height: 200px;
  overflow-y: auto;
}
.list-group-item:first-child{
  border-radius: 0;
}
</style>
<template v-cloak>
  <form action="" @submit.prevent="filter(search)" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
    <div class="input-group input-group-seamless ml-3">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-search"></i>
        </div>
      </div>
      <input class="navbar-search form-control" @keyup.enter="filter(search)" autocomplete="off" type="search" name="search" :placeholder="placeHolder" v-model="search" aria-label="Search">
    </div>
    <ul class="list-group" v-if="search != ''">
      <a v-if="!results.length && searching == 'ip'" class="list-group-item text-muted list-group-item-action"><img src="/bootplant/images/loading.gif" width="25" alt="(ricerca)" class="mb-1"> Ricerca per "<strong>{{search}}</strong>" sistema...</a>
      <a v-if="!results.length && searching == 'end'" class="list-group-item text-muted list-group-item-action">(Nessun risultato per "<strong>{{search}}</strong>")</a>
      <a v-for="result in results" :href="url(result.type, result.id)" class="list-group-item list-group-item-light"><span class="text-primary">#{{result.id}}</span> {{result.nome}} {{result.cognome}}: {{result.cell}} {{result.phone}} {{(result.estate) ? result.estate.descrizione : ''}} <span v-for="richieste in result.search" v-if="result.search.length">{{richieste.tipologia}} </span></a>
    </ul>
    <ul class="navbar-nav border-left flex-row d-none d-sm-block" v-if="search != ''">
      <li class="nav-item">
        <a class="nav-link nav-link-icon btn-warning text-center" href="#!" @click="clear" role="button">
          <i class="material-icons">clear</i>
        </a>
      </li>
    </ul>
  </form>
</template>

<script>

export default {
  props:['placeHolder'],
  name: 'vue-search',
  data: function () {
    return {
      search:'',
      results:[],
      searching:false,
    }
  },
  methods: {
    filter(word){
      this.results = [];
      this.searching = 'ip';
      axios.post('/filter', {filter:this.search}).then((response) => {
        this.searching = 'end';
        this.results = response.data
      })
    },
    clear(){
      this.search = '';
      this.results = [];
      this.searching = false;
    },
    url(type, id){
      if(type == 'buyer'){
        return `/contact/${id}`;
      }
      return `/${type}/${id}`;
    }
  },
  mounted() {
    // console.log('Component mounted.')
  }
}
</script>
