<?php get_header(); ?>

<section class="content">
  <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
  ?>

  <?php get_template_part( 'post' ); ?>

  <?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>