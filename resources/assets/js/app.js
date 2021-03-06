
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('header-component', require('./components/headerComponent.vue'));
Vue.component('footer-component', require('./components/footerComponent.vue'));


let home = require('./components/homeComponent.vue');
let about = require('./components/aboutComponent.vue');


const routes =[
    {path: '/home',component: home},
    {path: '/about',component: about}
];

const router=new VueRouter({
    mode:'history',
    routes
});

const app = new Vue({
    el: '#app',
    router,
    components:{home,about}
});
