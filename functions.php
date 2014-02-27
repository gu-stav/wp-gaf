<?php
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'page-thumbnails' );
  set_post_thumbnail_size( 1900, 1300 );

  add_action( 'init', 'register_my_menus' );
  add_action('admin_init', 'wpb_imagelink_setup', 10);

  add_filter( 'post_thumbnail_html', 'remove_height_attribute', 10 );
  add_filter( 'image_send_to_editor', 'remove_height_attribute', 10 );

function remove_height_attribute( $html ) {
   $html = preg_replace( '/(height)="\d*"\s/', "", $html );
   return $html;
}

  function wpb_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );

    if ($image_set !== 'none') {
      update_option('image_default_link_type', 'none');
    }
  }


  function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' )
      )
    );
  }

  if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_details',
    'title' => 'Details',
    'fields' => array (
      array (
        'key' => 'field_5300ab4bafff9',
        'label' => 'Subtitle',
        'name' => 'subtitle',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5300aae4afff6',
        'label' => 'Opening',
        'name' => 'opening',
        'type' => 'date_picker',
        'date_format' => 'dd. MM yy',
        'display_format' => 'dd. MM yy',
        'first_day' => 1,
      ),
      array (
        'key' => 'field_5300ab10afff7',
        'label' => 'Start',
        'name' => 'duration_start',
        'type' => 'date_picker',
        'date_format' => 'dd. MM',
        'display_format' => 'dd. MM',
        'first_day' => 1,
      ),
      array (
        'key' => 'field_5300ab34afff8',
        'label' => 'End',
        'name' => 'duration_end',
        'type' => 'date_picker',
        'date_format' => 'dd. MM yy',
        'display_format' => 'dd. MM yy',
        'first_day' => 1,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));

  register_field_group(array (
    'id' => 'acf_images',
    'title' => 'Images',
    'fields' => array (
      array (
        'key' => 'field_5300ac5691785',
        'label' => 'Images',
        'name' => 'images',
        'type' => 'wysiwyg',
        'default_value' => '',
        'toolbar' => 'full',
        'media_upload' => 'yes',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_post-fields',
    'title' => 'Post fields',
    'fields' => array (
      array (
        'key' => 'field_530d06e5514fd',
        'label' => 'Excerpt',
        'name' => 'excerpt',
        'type' => 'wysiwyg',
        'default_value' => '',
        'toolbar' => 'full',
        'media_upload' => 'no',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}

function special_nav_class( $classes, $item ) {
  if( is_home() && $item->post_name == "current" ) {
    $classes[] = "current-menu-item";
  }

  if( is_home() && $item->title == "Upcoming" ) {
    $classes = $item->classes;

    foreach ( $classes as $key => $value ) {
      if( $value == 'current_page_item' ||
          $value == 'current-menu-item' ) {
        $classes[ $key ] = '';
      }
    }

    $item->classes = $classes;
  }

  return $classes;
}


?>