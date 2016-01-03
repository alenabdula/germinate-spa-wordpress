<template>
  <article class="article article-home">
    <h2>{{ home.post_title }}</h2>
    {{{ home.post_content }}}
  </article>
</template>
<script>
  export default {
    ready: function() {
      console.log('Home.vue Ready!');
    },
    data: function() {
      return {
        home: this.get_content(),
      }
    },
    methods: {
      get_content: function () {
        this.$http.get('wp-json/wp/v2/home').then(function (response) {
          this.$set('home', response.data[0]);
        }, function (response) {
          console.error('Home.vue', response.data);
        });
      }
    }
  }
</script>