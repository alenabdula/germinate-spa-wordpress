<?php get_header(); ?>
<div id="app">
  <router-view :content="content" :single="single" keep-alive></router-view>
</div>
<?php get_footer(); ?>