<?php

class Germinate {

  public $options;

  function __construct() {
    $this->options = [
      'theme_name'    => 'Germinate',
      'theme_version' => '1.0',
      'theme_uri'     => get_template_directory_uri() . '/',
      'api_url'       => rest_get_url_prefix() . '/wp/v2/',
      'nonce'         => wp_create_nonce('wp_rest'),
      'is_admin'      => current_user_can('administrator')
    ];
    add_action('wp_enqueue_scripts', [$this, 'scripts']);
  }

  function scripts() {
    wp_enqueue_script(
      $this->options['theme_name'],                       # Handle
      $this->options['theme_uri'] . 'js/master.min.js',   # Path
      [],                                                 # Dependencies
      $this->options['theme_version'],                    # Version
      true                                                # In footer
    );
  }

}