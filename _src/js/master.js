Vue.component('home', require('./components/Home.vue'));
var App = new Vue({
  el: '#app',
  data: {
    currentView: 'home'
  }
});