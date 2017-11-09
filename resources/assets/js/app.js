
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

require('./global');
require('./parts');

window.Event = new Vue();

import { routes } from './router.js';
const router = new VueRouter({ routes });
const app = new Vue({router}).$mount('#app');
