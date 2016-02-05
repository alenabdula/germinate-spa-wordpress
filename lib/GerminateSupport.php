<?php

class GerminateSupport {

  function __construct() {
    add_action('after_setup_theme', [$this, 'support']);
  }

  function support() {
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', ['post', 'page']);
    add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);
    // add_theme_support('custom-header', [
    //   'default-image' => '',
    //   'random-default' => false,
    //   'width' => 0,
    //   'height' => 0,
    //   'flex-height' => false,
    //   'flex-width' => false,
    //   'default-text-color' => '',
    //   'header-text' => true,
    //   'uploads' => true,
    //   'wp-head-callback' => '',
    //   'admin-head-callback' => '',
    //   'admin-preview-callback' => '',
    //   ]
    // );
    // add_theme_support('automatic-feed-links');
    // add_theme_support('custom-background', [
    //   'default-color' => '',
    //   'default-image' => '',
    //   'wp-head-callback' => '_custom_background_cb',
    //   'admin-head-callback' => '',
    //   'admin-preview-callback' => ''
    //   ]
    // );
    // add_theme_support( 'post-formats', [
    //   'aside',
    //   'gallery',
    //   'link',
    //   'image',
    //   'quote',
    //   'status',
    //   'video',
    //   'audio',
    //   'chat'
    //   ]
    // );
  }

}