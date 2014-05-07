<?php
  query_posts( $query_string . '&category_name=current' );
  $post_counter = 0;
?>

<?php if ( have_posts() ) : while ( have_posts() && $post_counter == 0 ) : the_post(); ?>
<?php

  if( get_post_meta( $post->ID, 'show_logo_color', true ) == 'Dark' ) {
    $HEADER_DARK = true;
  }

  $post_counter += 1;

?>
<?php endwhile; endif; ?>

<?php
  get_header();
?>


<section class="content">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'post' ); ?>
  <?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>