<?php
  $post_counter = 0;

  foreach( get_posts( $query_string ) as $post ) {
    if ( $post_counter == 0 ) {
      if( get_post_meta( $post->ID, 'show_logo_color', true ) == 'Dark' ) {
        $HEADER_DARK = true;
      }
    }

    $post_counter += 1;
  }
?>

<?php
  get_header();
?>

<section class="content">
  <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
  ?>

  <?php get_template_part( 'post' ); ?>

  <?php endwhile; endif; ?>

  <div class="pagination">
    <?php
      echo paginate_links(array(
        'prev_text' => __('« Aktueller'),
        'next_text' => __('Älter »'),
      ));
    ?>
  </div>

</section>

<?php if ( have_posts() ) { get_footer(); } ?>
