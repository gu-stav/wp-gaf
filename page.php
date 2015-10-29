<?php
  if( get_post_meta( $post->ID, 'show_logo_color', true ) === 'Dark' ) {
    $HEADER_DARK = true;
  }

  get_header();
?>

<?php
  $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

  if( $background[0] ) {
    $background = $background[0];
  } else {
    $background = false;
  }
?>

<section class="content">
  <article class="post post--page">
    <div class="post__image <?php if( !$background ) { ?> post__image--empty <?php } ?>" style="background-image: url(<?php echo $background ?>)">
      <div class="post__header">
        <div>
          <h1><?php echo $post->post_title; ?></h1>
        </div>
      </div>
    </div>

    <?php if( get_post_meta( $post->ID, 'excerpt', true ) ) { ?>
      <div class="post__content">
        <?php echo the_field( 'excerpt', $post->ID ); ?>
      </div>
    <?php } ?>

    <?php if( $post->post_content ) { ?>
      <div class="post__images">
        <div class="post__images--page">
          <?php echo apply_filters('the_content', $post->post_content); ?>
        </div>
      </div>
    <?php } ?>

  </article>
<section>

<?php if( $background && (
          get_post_meta( $post->ID, 'excerpt', true ) ||
          $post->post_content ) ) {
        get_footer();
      }
?>