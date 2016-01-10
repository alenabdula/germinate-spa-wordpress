<?php get_header(); ?>
<!-- <div id="app"> -->
  <navigation :pages="pages" :single.sync="single" keep-alive></navigation>
  <posts :posts="posts" :single.sync="single" keep-alive></posts>
  <single :single="single" keep-alive></single>
  <article v-show="errors">
    <ul>
      <li v-for="error in errors">{{ error }}</li>
    </ul>
  </article>
<!-- </div> -->
<?php get_footer(); ?>