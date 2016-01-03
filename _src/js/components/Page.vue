<template>
  <article v-for="page in single">
    <h2>{{ page.post_title }}</h2>
    {{{ page.post_content }}}
  </article>
</template>
<script>
  export default {
    props: ['single', 'home']
  }
</script>