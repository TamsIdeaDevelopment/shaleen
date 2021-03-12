/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.VueEvent = new Vue();

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

// Blog
Vue.component('list-blog', require('./components/blog/Lists/ListBlog').default);
Vue.component('elements-blog', require('./components/blog/Elements/ElementsBlog').default);
Vue.component('create-form-blog', require('./components/blog/Forms/CreateBlog').default);
Vue.component('update-form-blog', require('./components/blog/Forms/UpdateBlog').default);
Vue.component('delete-form-blog', require('./components/blog/Forms/DeleteBlog').default);

// Book
Vue.component('list-book', require('./components/Book/Lists/ListBook').default);
Vue.component('elements-book', require('./components/Book/Elements/ElementsBook').default);
Vue.component('create-form-book', require('./components/Book/Forms/CreateBook').default);
Vue.component('update-form-book', require('./components/Book/Forms/UpdateBook').default);
Vue.component('delete-form-book', require('./components/Book/Forms/DeleteBook').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
