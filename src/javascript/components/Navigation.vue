<template>
  <header id="header">
    <nav>
      <ul>
        <li v-for="page in pages">
          <a @click.prevent="single = page" href="#{{ page.ID }}">
            {{ page.post_title }}
          </a>
        </li>
      </ul>
    </nav>
  </header>
</template>
<style lang="sass"></style>
<script>
  export default {
    props: ['pages', 'single']
  }
</script>