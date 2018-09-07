
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('table-modal', require('./components/MyComponent.vue'));//ejemplo Test
Vue.component('pdv-table', require('./components/PdvTable.vue'));
Vue.component('pdv', require('./components/Pdv.vue'));
Vue.component('comment', require('./components/Commentstable.vue'));
Vue.component('comment-get', require('./components/CommentsPdv.vue'));
Vue.component('pdv-update', require('./components/PdvModalUpdate.vue'));
Vue.component('pdv-pagination', require('./components/PdvTablePaginator'));

const app = new Vue({
    el: '#app'
});
