<template>
  <article id="single">
    <h1>{{ single.post_title }}</h1>
    <div v-show="single.categories">
      <ul>
        <li v-for="category in single.categories">{{ category.name }}</li>
      </ul>
    </div>
    <img v-show="single.thumb_url" v-bind:src="single.thumb_url" alt="{{ single.thumb_alt }}">
    {{{ single.post_content }}}
  </article>
</template>
<style lang="sass"></style>
<script>
  export default {
    props: ['single']
  }
</script>