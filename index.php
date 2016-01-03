<?php get_header(); ?>
<div id="app">
  <nav>
    <ul>
      <li v-for="page in pages">
        <a @click.prevent="viewSingle(page)"
           v-link="{ name: 'page', params: { slug: page.post_name } }"
           href="#">{{ page.post_title }}</a>
      </li>
    </ul>
  </nav>
  <router-view
    :home="home"
    :pages="pages"
    :posts="posts"
    :single="single"
    keep-alive>
  </router-view>
</div>
<?php get_footer(); ?>