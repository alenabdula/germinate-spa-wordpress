<template>
  <ul class="listing">
    <li v-for="article in posts">
      <a @click.prevent="viewSingle(article)" href="{{ article.ID }}">{{ article.post_title }}</a>
    </li>
  </ul>
  <article v-show="single" v-for="article in single">
    <h2>{{ article.post_title }}</h2>
    {{{ article.post_content }}}
  </article>
</template>
<script>
  export default {
    props: ['posts', 'single'],
    methods: {
      viewSingle: function(article) {
        this.single = [article];
      }
    },
  }
</script>
<style lang="sass"></style>