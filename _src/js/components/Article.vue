<template>
  <article v-show="single">
    <h2>{{ single.post_title }}</h2>
    {{{ single.post_content }}}
  </article>
</template>
<script>
  export default {
    props: ['articles', 'single'],
    ready: function () {
      this.get_content();
    },
    methods: {
      get_content: function() {
        this.$http.get('wp-json/wp/v2/posts').then(function (response) {
          console.log(response.data);
          this.$set('articles', response.data);
          this.$set('single', this.filterResponse(response.data)[0]);
        }, function (response) {
          console.error('Article.vue', response.data);
        });
      },
      filterResponse: function(data, key, val) {
        return data.filter(function(item){
          return item.key == val;
        })
      }
    }
  }
</script>