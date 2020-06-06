/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import VueNoty from 'vuejs-noty'

import axios from 'axios'
import VueAxios from 'vue-axios'
import 'vuejs-noty/dist/vuejs-noty.css'

import StarRating from 'vue-star-rating' 

import router from './routes'
import store from './store'

Vue.use(require('vue-moment'));
Vue.prototype.$http = axios;
Vue.use(VueAxios, axios);
Vue.use(VueNoty);
Vue.use(Vuex);
Vue.use(VueRouter);

Vue.use(VueNoty, {
    timeout: 4000,
    progressBar: true,
    layout: 'topRight'
});


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('top-nav', require('./components/Header.vue').default);
Vue.component('banner-view', require('./components/Banner.vue').default);
Vue.component('footer-nav', require('./components/Footer.vue').default);
Vue.component('star-rating', StarRating);

//admin default components
Vue.component('admin-top-nav', require('./components/auth/Topnav.vue').default);
Vue.component('side-bar', require('./components/auth/Sidebar.vue').default);
Vue.component('bottom-nav', require('./components/auth/Bottom.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store
});
