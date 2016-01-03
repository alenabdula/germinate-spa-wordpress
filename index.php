<?php get_header(); ?>
<div id="app">
  <ul>
    <li><a @click.prevent v-link="{ name: 'home' }" href="#">Home</a></li>
    <li v-for="page in pages">
      <a v-link="{ name: 'page', params: { slug: page.post_name } }" href="#">{{ page.post_title }}</a>
    </li>
  </ul>
  <router-view
    :pages="pages"
    :posts="posts"
    :single="single"
    keep-alive>
  </router-view>
</div>
<?php get_footer(); ?>