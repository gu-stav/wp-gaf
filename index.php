<?php
  get_header();
  query_posts( $query_string . '&category_name=current' );
?>

<section class="content">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'post' ); ?>
  <?php endwhile; endif; ?>
</section>