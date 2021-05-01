require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import { routes } from './routes';
import App from './App.vue';

Vue.use(VueRouter)
Vue.use(VueAxios, axios)

Vue.component('fact-component', require('./components/FactComponent.vue').default);

const router = new VueRouter({
    routes
});

const app = new Vue({
    el: '#app',
    router,
    components: {
        App
    },
    render: h => h(App)
});
