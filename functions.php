<?php
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 1900, 1300 );

  add_action( 'init', 'register_my_menus' );
  add_action('admin_init', 'wpb_imagelink_setup', 10);

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
        'toolbar' => 'basic',
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

?>