Vue.config.debug = true;

var Navigation = require('./components/Navigation.vue');
Vue.component('navigation', Navigation);

var Posts = require('./components/Posts.vue');
Vue.component('posts', Posts);

var Single = require('./components/Single.vue');
Vue.component('single', Single);

new Vue({
  el: '#app',
  props: ['posts', 'categories', 'pages'],
  data: {
    single: false,
  },
  ready() {
    this.get_posts();
    this.get_categories();
    this.get_pages();
  },
  methods: {
    get_pages() {
      this.$http.get('wp-json/wp/v2/pages').then(function (response) {
        this.$set('pages', response.data);
        this.$set('single', this.filterResponse(response.data, 'home')[0]);
      }, function (response) {
        console.error('App.vue', response.data);
      });
    },
    get_posts() {
      this.$http.get('wp-json/wp/v2/posts').then(function (response) {
        this.$set('posts', response.data);
      }, function (response) {
        console.error('App.vue', response.data);
      });
    },
    get_categories() {
      this.$http.get('wp-json/wp/v2/categories').then(function (response) {
        this.$set('categories', response.data);
      }, function (response) {
        console.error('App.vue', response.data);
      });
    },
    filterResponse(data, slug) {
      return data.filter(function(item){
        return item.post_name == slug;
      })
    }
  }
});