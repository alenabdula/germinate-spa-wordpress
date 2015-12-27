<?php

class GerminateSupport {

  function __construct() {
    add_action('after_setup_theme', [$this, 'support']);
  }

  function support() {
    add_theme_support('automatic-feed-links');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
  }

}