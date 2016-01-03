<template>
  <article v-for="page in single" class="article article-page">
    <h2>{{ page.post_title }}</h2>
    {{{ page.post_content }}}
  </article>
</template>
<script>
  export default {
    props: ['pages'],
    data: function() {
      return {
        single: this.get_post_by_slug(),
      }
    },
    methods: {
      get_post_by_slug: function() {
        var slug = this.$root.$route.params.slug;
        return this.pages.filter(function(item){
          return item.post_name == slug;
        });
      }
    }
  }
</script>