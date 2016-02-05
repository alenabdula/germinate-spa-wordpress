<template>
  <section id="posts">
    <ul>
      <li v-for="post in posts">
        <a @click.prevent="single = post" href="#{{ post.ID }}">{{ post.post_title }}</a>
      </li>
    </ul>
  </section>
</template>
<style lang="sass"></style>
<script>
  export default {
    props: ['posts', 'single']
  }
</script>