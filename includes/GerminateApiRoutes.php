<?php

class GerminateApiRoutes {

  function __construct() {
    add_action('rest_api_init', [$this, 'register_api_routes']);
  }

  function register_api_routes() {
    $this->query_home();
    $this->query_pages();
    $this->query_posts();
  }

  function query_home() {
    register_rest_route( 'wp/v2', '/home', [
      'methods' => 'GET',
      'callback' => [$this, 'query_home_callback']
      ]
    );
  }

  function query_home_callback() {
    $query = new WP_Query([
      'posts_per_page' => '-1',
      'post_type'      => ['page'],
      'name'           => 'home',
    ]);
    $data = $this->prepare($query, $data = []);
    return new WP_REST_Response($data);
  }

  function query_pages() {
    register_rest_route( 'wp/v2', '/pages', [
      'methods' => 'GET',
      'callback' => [$this, 'query_pages_callback']
      ]
    );
  }

  function query_pages_callback() {
    $exclude = get_page_by_path('home', OBJECT, 'page');
    $query = new WP_Query([
      'posts_per_page' => '-1',
      'post__not_in'   => [$exclude->ID],
      'post_type'      => ['page'],
    ]);
    $data = $this->prepare($query, $data = []);
    return new WP_REST_Response($data);
  }

  function query_posts() {
    register_rest_route( 'wp/v2', '/posts', [
      'methods' => 'GET',
      'callback' => [$this, 'query_posts_callback']
      ]
    );
  }

  function query_posts_callback($data) {
    $query = new WP_Query([
      'posts_per_page' => '-1',
      'post_type'      => ['post'],
    ]);
    $data = $this->prepare($query, $data = []);
    return new WP_REST_Response($data);
  }

  private function prepare($query, $data) {
    foreach ($query->posts as $key => $post) {
      $data[$key] = $post;
      $data[$key]->post_content = apply_filters('the_content', $post->post_content);
      $data[$key]->permalink = get_permalink($post->ID);
      $data[$key]->thumb_url = $this->get_post_thumbnail_src($post->ID);
      $data[$key]->thumb_alt = $this->get_post_thumbnail_alt($post->ID);
    }
    return $data;
  }

  private function get_post_thumbnail_alt($post_id) {
    return get_post_meta( get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true);
  }

  private function get_post_thumbnail_src($post_id, $thumbnail_size = 'thumbnail') {
    return wp_get_attachment_image_src( get_post_thumbnail_id($post_id), $thumbnail_size)[0];
  }
}