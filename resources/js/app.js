
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('component-dashboard', require('./components/AdminComponents/Dashboard/Dashboard.vue'));
//component for form and table awayday
Vue.component('component-form-table-awayday',require('./components/AdminComponents/Awayday/FormInsertAndTableComponent.vue'));
//component for awaydays timeline
Vue.component('component-timeline-awaydays',require('./components/AdminComponents/Awayday/timelineAwayday.vue'))
//component for awaydays timeline
Vue.component('component-awayday-detail',require('./components/AdminComponents/Awayday/AwaydayDetail.vue'))


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
