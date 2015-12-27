<?php

class GerminateCleanUp {

  function __construct() {
    add_action('init', [$this, 'clean']);
  }

  function clean() {
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_generator' );
    add_filter( 'show_admin_bar', '__return_false' );
  }

}