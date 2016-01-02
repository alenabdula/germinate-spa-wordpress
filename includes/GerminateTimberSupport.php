<?php

class GerminateTimberSupport extends TimberSite {

  function __construct() {
    $this->checkSupport();
    Timber::$dirname = ['twig'];
    add_filter('timber_context', [$this, 'add_to_context']);
    add_filter('get_twig', [$this, 'add_to_twig']);
    parent::__construct();
  }

  function add_to_context( $context ) {
    $context['menu'] = new TimberMenu();
    return $context;
  }

  function add_to_twig( $twig ) {
    $twig->addExtension( new Twig_Extension_StringLoader() );
    return $twig;
  }

  function checkSupport() {
    if ( ! class_exists('Timber') ) {
      die('Timber not available!');
    }
  }

}