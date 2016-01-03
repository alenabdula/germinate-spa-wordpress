<?php

class GerminateApiRoutes {

  function __construct() {
    add_action('rest_api_init', [$this, 'register_api_routes']);
  }

  function register_api_routes() {
    $this->get_all_content();
  }

  function get_all_content() {
    register_rest_route( 'wp/v2', '/content', [
      'methods' => 'GET',
      'callback' => [$this, 'get_all_content_callback']
      ]
    );
  }

  function get_all_content_callback($data) {
    $query = new WP_Query([
      'posts_per_page' => '-1',
      'post_type'      => ['post', 'page'],
    ]);
    $data = [];
    foreach ($query->posts as $key => $post) {
      $data[$key] = $post;
      $data[$key]->post_content = apply_filters('the_content', $post->post_content);
      $data[$key]->permalink = get_permalink($post->ID);
      $data[$key]->thumb_url = $this->get_post_thumbnail_src($post->ID);
      $data[$key]->thumb_alt = $this->get_post_thumbnail_alt($post->ID);
    }
    return new WP_REST_Response($data);
  }

  private function get_post_thumbnail_alt($post_id) {
    return get_post_meta( get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true);
  }

  private function get_post_thumbnail_src($post_id, $thumbnail_size = 'thumbnail') {
    return wp_get_attachment_image_src( get_post_thumbnail_id($post_id), $thumbnail_size)[0];
  }
}