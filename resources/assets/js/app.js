
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

Vue.component('pagination', require('./components/PaginationComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
        items: [],
        message: 'Hi Vue!',
        hasError: true,
        posts: {},
        pagination: {
          'current_page': 1
        }
    },
    mounted : function(){
        this.getVueItems();
        this.fetchPosts();
    },
    created: function () {
        console.log('Значение message: ' + this.message);  // `this` указывает на экземпляр app
    },
    methods : {
        getVueItems: function(){
            axios.get('/vue/news').then((response) => {
                this.items = response.data;
            });
        },
        
        fetchPosts: function() {
            axios.get('/vue/posts?page=' + this.pagination.current_page)
                .then(response => {
                    this.posts = response.data.data.data;
                    this.pagination = response.data.pagination;
                })
                .catch(error => {
                    console.log(error.response.data);
                });
        }
    }
});
