<?php
  $background_id = get_post_thumbnail_id($post->ID);
  $attachment = get_post($attachment_id);
  $background = wp_get_attachment_image_src($background_id, 'full');
  $background_caption = $attachment->post_excerpt;

  if($background[0]) {
    $background = $background[0];
  } else {
    $background = '';
  }
?>

<article class="post post--current">
  <div class="post__image <?php if( !$background ) { ?> post__image--empty <?php } ?>" style="background-image: url(<?php echo $background ?>)">

    <?php
      if($background) {
    ?>

    <a href="<?php echo esc_url( get_permalink() ); ?>"
       rel="nofollow">
      <img src="<?php echo $background ?>"
           class="post__mobile-image"
           alt="<?php echo $background_caption; ?>" />
    </a>

    <?php
      }
    ?>

    <div class="post__header">
      <div>
        <h2 class="pre-headline">
          <?php
            $category_name = get_the_category( $post->ID );
            echo $category_name[0]->cat_name;
          ?>
        </h2>
      </div>
      <div>
        <?php
          if ( is_single() ) :
            the_title( '<h1>', '</h1>' );
          else :
            the_title( '<h1><a href="' . esc_url( get_permalink() ) . '">', '</a></h1>' );
          endif;
        ?>

        <?php
          $opening = get_post_meta($post->ID, 'opening', true);
          $opening_time = get_post_meta($post->ID, 'opening_time', true);
          $subtitle = get_post_meta($post->ID, 'subtitle', true);
          $duration_start = get_post_meta($post->ID, 'duration_start', true);
          $duration_end = get_post_meta($post->ID, 'duration_end', true);
        ?>

        <?php if( $subtitle ) { ?>
          <strong class="post__subtitle"><?php echo $subtitle ?></strong>
        <?php } ?>

        <?php if( $opening || $opening_time ) { ?>
          <strong>

          <?php
            if( $opening ) {
          ?>

            Eröffnung am <?php echo $opening ?>

          <?php
            }
          ?>

          <?php
            if( $opening_time ) {
          ?>

            um <?php echo $opening_time ?> Uhr

          <?php
            }
          ?>

          </strong>
        <?php } ?>

        <?php if( $duration_start || $duration_end ) { ?>
          <strong>Ausstellung vom <?php echo $duration_start ?> - <?php echo $duration_end ?></strong>
        <?php } ?>

      </div>
    </div>
  </div>

  <div class="post__content">
    <?php echo apply_filters('the_content', $post->post_content); ?>
  </div>

  <?php
    $post_images = get_field('images', $post->ID);
  ?>

  <?php if($post_images) { ?>

    <div class="post__images">
      <?php echo $post_images; ?>
    </div>

  <?php } ?>
</article>