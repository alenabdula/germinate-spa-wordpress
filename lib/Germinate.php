<?php

class Germinate {

  public $options;

  function __construct() {
    $this->options = [
      'theme_name'    => 'GerminateSPA',
      'theme_version' => '0.1',
      'theme_uri'     => get_template_directory_uri() . '/',
      'api_url'       => rest_get_url_prefix() . '/wp/v2/',
      'nonce'         => wp_create_nonce('wp_rest'),
      'is_admin'      => current_user_can('administrator')
    ];
    add_action('wp_enqueue_scripts', [$this, 'scripts']);
  }

  function scripts() {
    # Master
    wp_enqueue_script(
      $this->options['theme_name'], # Handle
      $this->options['theme_uri'] . 'js/master.min.js', # Path
      [], # Dependencies
      $this->options['theme_version'], # Version
      true # In footer
    );
    /**
     * Localized Data
     * wp_localize_script($handle, $name, $data);
     * <![CDATA[ var App_GerminateSPA = { // data }; ]]>
     */    
    wp_localize_script(
      $this->options['theme_name'], # handle
      'App_'.$this->options['theme_name'], # name
      [
        'theme_uri' => $this->options['theme_uri'],
        'api_url' => $this->options['api_url'],
        'nonce' => $this->options['nonce'],
        'is_admin' => $this->options['is_admin'],
      ] # data
    );
  }

}