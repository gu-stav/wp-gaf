<?php
  get_header();
?>

<section class="content">
  <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();

    $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

    if( $background[0] ) {
      $background = $background[0];
    } else {
      $background = '';
    }
  ?>

  <?php get_template_part( 'post' ); ?>

  <?php endwhile; endif; ?>

</section>