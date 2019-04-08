import './bootstrap.js';
window.Vue = require('vue');
import * as components from './../vue-components';
import * as directives from './../directives';
window.moment = require('moment');
import {
    vueUse
} from './../utils'
//Import notifiche di vue-toasted
import './notifications.js';
//Import SweetAlert2
window.Swal = require('sweetalert2');
//Plugin VueJS
const VuePlugin = {
    install: function (Vue) {
        if (Vue._shards_vue_installed) {
            return
        }
        Vue._shards_vue_installed = true;
        // Register component plugins
        for (let component in components) {
            Vue.use(components[component])
        }
        // Register directive plugins
        for (let directive in directives) {
            Vue.use(directives[directive])
        }
    }
}
vueUse(VuePlugin);
export default VuePlugin;
//Currency
import VueCurrencyFilter from 'vue-currency-filter';
Vue.use(VueCurrencyFilter, {
  symbol : '€',
  thousandsSeparator: "'",
  fractionCount: 2,
  fractionSeparator: '.',
  symbolPosition: 'back',
  symbolSpacing: true
});
//End Currency
Vue.component('vue-search', require('../vue-components/VueSearch.vue').default);
Vue.component('vue-search-small', require('../vue-components/VueSearchSmall.vue').default);
Vue.filter('money', function (value, symbol) {
    return Money(value) + ` ${symbol}`;
});
// console.log('App running')
window.mixin = {
    data: function () {
        return {
            loading: true,
            edited: false,
            modal: {}
        }
    },
    methods: {
        valuta: function (input) {
            input.replace(/,/g, '.');
        },
        urlParam(key) {
            let url = new URLSearchParams(document.location.search.substring(1));
            return url.get(key) || false;
        },
        showToastOnPageLoad(parametro) {
            if (this.urlParam(parametro))
                notify({
                    parametro: this.urlParam(parametro)
                });
        },
        modal(...args) {
            args = args[0];
            Swal.fire({
                ...args[0],
                reverseButtons: true,
                showCancelButton: (args.cancel !== undefined) ? args.cancel : true,
                type: args.type || 'info',
                title: (args.title !== undefined) ? args.title : '' || 'Attenzione',
                text: args.text || '',
                confirmButtonText: args.confirm || 'Ok',
                cancelButtonText: args.cancel || 'Annulla',
                confirmButtonColor: args.btn || ((args.type == 'error' || args.type == 'warning') ? '#d33' : '#28C474'),
            }).then((willConfirm) => {
                if (willConfirm.value) {
                    if (args.callback) {
                        args.callback.fn(args.callback.args)
                    } else {
                        return true;
                    }
                }
            }).catch((error) => {
                notify({
                    error: error
                });
            })
        },
        deleteResource(args) {
            let endpoint = '';
            if (args.id !== undefined) {
                endpoint = `/${args.resource}/${args.id}`
            } else {
                endpoint = `/${args.resource}s/${eval('this.'+args.resource+'.id')}`
            }
            axios.delete(endpoint)
                .then((response) => {
                    // console.log(response.data)
                    if (response.data) {
                        if (args.callback !== undefined) {
                            args.callback(args.callbackargs);
                        } else {
                            let go_to = (args.resource.endsWith('s')) ? args.resource : args.resource + 's'
                            window.location.href = `${base_url}/${go_to}?n=deleted`;
                        }
                    }
                }).catch((error) => {
                    notify({
                        parametro: 'error'
                    });
                });
        },
        //Chiamate aincrone
        asyncPost(go, data, then){
            axios.post(`${base_url}/${go}`, data).then((res) => {
                //console.log(res)
                if(res.status == 200){
                    then(res.data);
                }
                }).catch((err) => {
                console.error('asyncPost error: '+err)
                })
        },
        //Pagina indietro
        back() {
            window.history.back();
        },
        //Vai a pagina specifica: page('orders')
        page(pg) {
            window.location.href = base_url + '/' + pg;
        },
        watchForChanges(arryOfModels, callback) {
            let that = this;
            arryOfModels.forEach(function (model) {
                that.$watch(model, callback, {
                    deep: true
                })
            })
        }
    },
    filters: {
        date: function (data) {
            return moment.utc(data).format('DD/MM/YYYY HH:mm ')
        }
    },
    mounted() {
        this.showToastOnPageLoad('n');
        this.loading = false;
    },
}
window.VueApp = Vue.extend({
    mixins: [mixin],
    data: function () {
        return {
            tax: parseFloat(process.env.MIX_TAX)
        }
    }
});
