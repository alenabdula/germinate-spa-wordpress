/* Components */
var Home = require('./components/Home.vue');
var Articles = require('./components/Articles.vue');
var Error = require('./components/Error.vue');

Vue.component('articles', Articles);

/* Application Instance */
var App = Vue.extend();

/* Application Router */
Vue.use(VueRouter);
var router = new VueRouter({
  history: true,
});

/* Application Routes */
router.map({
  /* Home */
  '/': {
    component : Home,
    name : 'home',
  },
  /* Articles */
  '/articles': {
    component : Articles,
    name : 'articles',
  },
  /* Not Found */
  '/404': {
    component : Error,
    name : 'error',
  },

});

/* No Route */
router.redirect({
  '*': '/404'
});

/* Start */
router.start(App, 'html');