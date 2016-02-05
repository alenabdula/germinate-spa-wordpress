<?php get_header(); ?>
<navigation :pages="pages" :single.sync="single" keep-alive></navigation>
<posts :posts="posts" :single.sync="single" keep-alive></posts>
<single :single="single" keep-alive></single>
<article v-show="errors">
  <ul>
    <li v-for="error in errors">{{ error }}</li>
  </ul>
</article>
<?php get_footer(); ?>