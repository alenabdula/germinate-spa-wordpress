<?php

class GerminateApiRoutes {

  function __construct() {
    add_action('rest_api_init', [$this, 'register_api_routes']);
  }

  function register_api_routes() {
    $this->get_all_posts();
  }

  function get_all_posts() {
    register_rest_route( 'wp/v2', '/posts', [
      'methods' => 'GET',
      'callback' => [$this, 'get_all_posts_callback']
      ]
    );
  }

  function get_all_posts_callback($data) {
    $query = new WP_Query([
      'posts_per_page' => '-1',
      'post_type'      => ['post'],
    ]);
    $data = [];
    foreach ($query->posts as $key => $post) {
      $data[$key] = $post;
      $data[$key]->thumb_url = $this->get_post_thumbnail_src($post->ID);
    }
    return new WP_REST_Response($data);
  }

  private function get_post_thumbnail_src($post_id, $thumbnail_size = 'thumbnail') {
    return wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $thumbnail_size)[0];
  }
}