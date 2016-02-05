<?php get_header(); ?>

<!--
|\\\\\||||||||||||/////|
|/////            \\\\\|
|\\\\\ Navigation /////|
|/////            \\\\\|
|\\\\\||||||||||||/////|
-->
<navigation :pages="pages" :single.sync="single" keep-alive></navigation>
<!--
|\\\\\|||||||/////|
|/////       \\\\\|
|\\\\\ Posts /////|
|/////       \\\\\|
|\\\\\|||||||/////|
-->
<posts :posts="posts" :single.sync="single" keep-alive></posts>
<!--
|\\\\\||||||||/////|
|/////        \\\\\|
|\\\\\ Single /////|
|/////        \\\\\|
|\\\\\||||||||/////|
-->
<single :single="single" keep-alive></single>
<!--
|\\\\\||||||||/////|
|/////        \\\\\|
|\\\\\ Errors /////|
|/////        \\\\\|
|\\\\\||||||||/////|
-->
<article v-show="errors">
  <ul>
    <li v-for="error in errors">{{ error }}</li>
  </ul>
</article>
<?php get_footer(); ?>