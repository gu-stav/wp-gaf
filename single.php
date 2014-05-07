<?php
  if( get_post_meta( $post->ID, 'show_logo_color', true ) == 'Dark' ) {
    $HEADER_DARK = true;
  }

  get_header();
  query_posts( $query_string . '&category_name=current' );

?>

<section class="content">

  <?php
    $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

    if( $background[0] ) {
      $background = $background[0];
    } else {
      $background = '';
    }
  ?>

  <?php get_template_part( 'post' ); ?>

</section>

<?php get_footer(); ?>