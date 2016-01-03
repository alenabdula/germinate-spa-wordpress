<template>
  <article>
    <h2>{{ single.post_title }}</h2>
    {{{ single.post_content }}}
  </article>
</template>
<script>
  export default {
    props: ['pages', 'single'],
    ready: function () {
      this.get_content();
    },
    methods: {
      get_content: function() {
        this.$http.get('wp-json/wp/v2/pages').then(function (response) {
          this.$set('pages', response.data);
          this.$set('single', this.filterResponse(response.data, 'home')[0]);
        }, function (response) {
          console.error('Page.vue', response.data);
        });
      },
      filterResponse: function(data, slug) {
        return data.filter(function(item){
          return item.post_name == slug;
        })
      }
    }
  }
</script>