<?php 

// Register navigation

register_nav_menus(array('front' => __('Front Menu')));
register_nav_menus(array('blog' => __('Blog Menu')));

// Widget Area

function siteWidgets() {
  register_sidebar(array(
    'name' => 'Social',
    'id' => 'social',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => ''
  ));
}

add_action('widgets_init', 'siteWidgets');

// Add Image Support

function addImages() {
  add_theme_support('post-thumbnails');
  add_image_size('index-teaser', 350, 177, true);
  add_image_size('index-single', 1110, 511, true);
  add_image_size('profile-pic', 300, 300, true);
  add_image_size('home-teaser', 500, 500, true);
}
add_action('after_setup_theme', 'addImages');

// Excerpt length and ellipsis

function custom_excerpt_length( $length ) {
  return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Custom pagination

function custom_pagination() {
  global $wp_query;
  $big = 999999999; // need an unlikely integer
  $pages = paginate_links( array(
  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  'format' => '?paged=%#%',
  'current' => max( 1, get_query_var('paged') ),
  'total' => $wp_query->max_num_pages,
  'prev_next' => false,
  'type' => 'array',
  'prev_next' => TRUE,
  'prev_text' => __('<i class="fa fa-angle-left" aria-hidden="true"></i>'),
  'next_text' => __('<i class="fa fa-angle-right" aria-hidden="true"></i>'),
  ) );
  if( is_array( $pages ) ) {
    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
    echo '<ul class="pagination">';
    foreach ( $pages as $page ) {
    echo "<li>$page</li>";
  }
  echo '</ul>';
  }
}

// Add Title Tag

function titles_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'titles_setup' );

// Move comment field to bottom

function wpb_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

//Hide Admin Bar

add_filter('show_admin_bar', '__return_false');

// Theme Settings

function themeSet($wp_customize) {
  
  // Social Media

  $wp_customize->add_section('social_media', array(
  'title' => 'Social Profiles',
  'priority' => 30
  ));
  
  $wp_customize->add_setting('facebook', array(
  'default' => '',
  'transport' => 'refresh'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'facebook', array(
  'label' => __( 'Facebook', 'theme_name' ),
  'section' => 'social_media',
  'settings' => 'facebook',
  'type' => 'text'
  )));
  
  $wp_customize->add_setting('twitter', array(
  'default' => '',
  'transport' => 'refresh'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'twitter', array(
  'label' => __( 'Twitter', 'theme_name' ),
  'section' => 'social_media',
  'settings' => 'twitter',
  'type' => 'text'
  )));
  
  $wp_customize->add_setting('instagram', array(
  'default' => '',
  'transport' => 'refresh'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'instagram', array(
  'label' => __( 'Instagram', 'theme_name' ),
  'section' => 'social_media',
  'settings' => 'instagram',
  'type' => 'text'
  )));
  
  $wp_customize->add_setting('linkedin', array(
  'default' => '',
  'transport' => 'refresh'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'linkedin', array(
  'label' => __( 'Linkedin', 'theme_name' ),
  'section' => 'social_media',
  'settings' => 'linkedin',
  'type' => 'text'
  )));
  
  // Contact Form Embed
  
  $wp_customize->add_section('contact_form', array(
  'title' => 'Contact Form',
  'priority' => 30
  ));
  
  $wp_customize->add_setting('contact_form_code', array(
  'default' => '',
  'transport' => 'refresh'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'facebook', array(
  'label' => __( 'Contact Form Shortcode', 'theme_name' ),
  'section' => 'contact_form',
  'settings' => 'contact_form_code',
  'type' => 'text'
  )));

}

add_action('customize_register','themeSet');

//Exclude pages from WordPress Search

if (!is_admin()) {
  function wpb_search_filter($query) {
    if ($query->is_search) {
      $query->set('post_type', 'post');
    }
    return $query;
  }
  add_filter('pre_get_posts','wpb_search_filter');
}

?>