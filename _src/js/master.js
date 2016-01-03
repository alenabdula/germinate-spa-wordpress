Vue.config.debug = true;

var Page = require('./components/Page.vue');
Vue.component('Page', Page);

var Article = require('./components/Article.vue');
Vue.component('Article', Article);

/**
 * Vue Router
 */
var router = new VueRouter({
  history: true,
});

/**
 * Application Component
 */
var App = Vue.extend({
  data: function() {
    return {
      single: false,
      pages: false,
      articles: false,
    }
  }
});

/**
 * Application Routes
 */
router.map({
    '/': {
        component: Page,
        name: 'page'
    },
    '/articles': {
        component: Article,
        name: 'article'
    }
});
router.redirect({
  '*': '/',
});

router.start(App, '#app');