<?php
get_header();
$context = Timber::get_context();
Timber::render( 'navigation.twig', $context );
?>
<div id="app">
  <component :is="currentView"></component>
</div>
<?php get_footer(); ?>