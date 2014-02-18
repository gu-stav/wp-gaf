<?php
  get_header();
  query_posts( $query_string . '&category_name=current' );
?>

<section class="content">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'post' ); ?>
  <?php endwhile; endif; ?>

<?php
  query_posts( $query_string . '&category_name=upcoming' );
?>

<?php
  if ( have_posts() ) {
?>
  <h3 class="content__category-divider">&nbsp;Upcoming</h3>
<?php
  }
?>

  <div id="upcoming">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'post' ); ?>
    <?php endwhile; endif; ?>
  </div>
</section>

<?php get_footer(); ?>