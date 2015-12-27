<?php get_header(); ?>
<?php // get_template_part('templates/vue-posts'); ?>
<ul>
  <li><a v-link="{ name: 'home' }">Home</a></li>
  <li><a v-link="{ name: 'articles' }">Articles</a></li>
</ul>
<router-view keep-alive></router-view>
<?php get_footer(); ?>