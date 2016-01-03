var Home = require('./components/Home.vue');
Vue.component('Home', Home);

var App = Vue.extend({
  data : function() {
    return {
      content: this.get_content(),
      single: false,
    }
  },
  methods : {
    get_content: function () {
      this.$http.get('wp-json/wp/v2/content').then(function (response) {
        this.$set('content', response.data);
      }, function (response) {
        console.log('Error!');
      });
    }
  }
});
var router = new VueRouter({
  history: true,
});
router.map({
    '/': {
        component: Home,
        name: 'home'
    }
})
router.start(App, '#app');