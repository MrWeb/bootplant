<style scoped> .list-group{
  position:absolute;
  z-index:99;
  /*top:60px;*/
  width:100%;
  max-height: 200px;
  border-radius: 5px;
  border: thin solid #DDE1E8;
  overflow-y: auto;
}
.list-group-item:first-child{
  border-radius: 0;
  border-top: hidden;
}
.list-group-item:last-child{
  border-bottom: hidden;
}
.list-group-item{
  border-left: hidden;
  border-right: hidden;
}
.list-group-item:hover{
  cursor: pointer;
}
</style>
<template v-cloak>
    <form action="" @submit.prevent="filter(search)">
        <label for="search" v-if="label">{{label}}</label>
        <div class="input-group">
            <input class="navbar-search form-control" @keyup.enter="filter(search)" @keydown="emptyResults" autocomplete="off" type="search" name="search" :placeholder="placeHolder" v-model="search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-white" type="submit" @click="filter(search)"><i class="fa fa-search"></i></button>
                <a class="btn btn-white" v-if="search != ''" href="#!" @click="clear" role="button"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <ul class="list-group" v-if="search && searching">
            <!-- Ricerca in corso -->
            <a v-if="!results.length && searching == 'ip'" class="list-group-item text-muted list-group-item-action"><img src="/bootplant/images/loading.gif" width="20" alt="(ricerca)" class="mb-1"> Ricerca per "<strong>{{search}}</strong>"...</a>
            <!-- Nessun Risultato -->
            <a v-if="!results.length && searching == 'end'" class="list-group-item text-muted list-group-item-action text-muted"><i class="fa fa-filter text-muted"></i> (Nessun risultato per "<strong>{{search}}</strong>")</a>
            <!-- Elenco Risultati -->
            <a v-for="result in results" @click="onSelectItem(result)" class="list-group-item list-group-item-light"><span class="text-primary">#{{result.id.substr(0,8)}}</span> {{result.fname}} {{result.lname}}<br v-if="result.company">{{result.company}}<br v-if="result.email">{{result.email}}<br v-if="result.address">{{result.address}} {{result.city}} {{result.zip}} {{result.district}}</a>
            <!-- Crea nuovo in base a "item" -->
            <a v-if="searching == 'end'" @click="newItem(search)" class="list-group-item text-muted list-group-item-action"><i class="fa fa-plus text-success"></i> Crea nuovo cliente "<strong class="text-success">{{search}}</strong>"</a>
        </ul>
    </form>
</template>
<script>
export default {
  props: [
        'placeHolder',
        'endpoint',
        'label'
    ],
  name: 'vue-search',
  data: function () {
    return {
      search: '',
      results: [],
      searching: false,
    }
  },
  methods: {
    filter(word) {
      this.results = [];
      this.searching = 'ip';
      axios.post(`/${this.$props.endpoint}`, {
        filter: this.search
      }).then((response) => {
        this.searching = 'end';
        this.results = response.data
      })
    },
    emptyResults() {
      this.results = [];
      this.searching = false;
    },
    clear() {
      this.search = '';
      this.emptyResults();
    },
    newItem(search) {
      this.$emit('on-new', search);
    },
    url(type, id) {
      if (type == 'buyer') {
        return `/contact/${id}`;
      }
      return `/${type}/${id}`;
    },
    onSelectItem(id) {
      this.$emit('on-select', id);
      this.clear();
    }
  },
  mounted() {
    if (this.$props.endpoint == null)
      console.error('Errore: prop "endpoint" sul componente "' + this.$options._componentTag + '" assente')
  }
}
</script>
