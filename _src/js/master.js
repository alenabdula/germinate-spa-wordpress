/**
 * Home Component
 */
var View = require('./components/View.vue');
Vue.component('View', View);

/**
 * Home Component
 */
// var Home = require('./components/Home.vue');
// Vue.component('Home', Home);

/**
 * Page Component
 */
// var Page = require('./components/Page.vue');
// Vue.component('Page', Page);

/**
 * Vue Router
 */
var router = new VueRouter({});

/**
 * Application Component
 */
var App = Vue.extend({
  data : function() {
    return {
      pages: false,
      posts: false,
      single: false,
    }
  },
  ready: function() {
    this.get_content('pages'),
    this.get_content('posts')
  },
  methods : {
    get_content: function (type) {
      this.$http.get('wp-json/wp/v2/' + type).then(function (response) {
        this.$set(type, response.data);
      }, function (response) {
        console.error('master.js', response.data);
      });
    }
  }
});

/**
 * Application Routes
 */
router.map({
    '/': {
        component: Home,
        name: 'home'
    },
    '/page/:slug': {
        component: Page,
        name: 'page'
    },
});

router.start(App, '#app');