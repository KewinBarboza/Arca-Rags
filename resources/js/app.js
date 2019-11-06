
require('./bootstrap');

window.Vue = require('vue');

Vue.component('app', require('./components/AppComponent.vue').default);
// Vue.component('registrar-producto', require('./components/RegistrarProductoComponent.vue').default);
Vue.component('Dashboard', require('./views/Dashboard.vue').default);
Vue.component('InfinitiLoading', require('vue-infinite-loading').default);


import router from './routes'

const app = new Vue({
    el: '#app',
    router
});
