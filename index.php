<?php get_header(); ?>
<div id="app">
  <navigation :pages="pages" :single.sync="single"></navigation>
  <posts :posts="posts" :single.sync="single"></posts>
  <single :single="single"></single>
</div>
<?php get_footer(); ?>