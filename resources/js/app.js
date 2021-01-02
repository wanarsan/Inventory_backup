/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');

import VueRouter from 'vue-router';
import routes from './routes';

import Vue from 'vue'
import VueLodash from 'vue-lodash'
import lodash from 'lodash'
Vue.use(VueLodash, { name: 'custom' , lodash: lodash})

Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('product-component', require('./components/product/index.vue').default);
Vue.component('edit-component', require('./components/product/edit.vue').default);
Vue.component('material-component', require('./components/material/index.vue').default);
Vue.component('materialedit-component', require('./components/material/edit.vue').default);
Vue.component('home-component', require('./components/home.vue').default);
Vue.component('manage-component', require('./components/manage/index.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',router: new VueRouter(routes)
});
