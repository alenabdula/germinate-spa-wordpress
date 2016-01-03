/**
 * Page Component
 */
var Page = require('./components/Page.vue');
Vue.component('Page', Page);

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
      single: false,
      pages: false,
      posts: false,
    }
  },
  ready: function() {
    this.get_content('pages');
    this.get_content('posts');
    this.set_home();
  },
  methods: {
    set_home: function() {
      console.log(this.$data);
    },
    viewSingle: function(item) {
      this.single = [item];
    },
    get_content: function (type) {
      this.$http.get('wp-json/wp/v2/' + type).then(function (response) {
        this.$set(type, response.data);
      }, function (response) {
        console.error('master.js', response.data);
      });
    },
  }

});

/**
 * Application Routes
 */
router.map({
    '/:slug': {
        component: Page,
        name: 'page'
    }
});

router.start(App, '#app');