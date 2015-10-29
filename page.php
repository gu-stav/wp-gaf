<?php
  if( get_post_meta( $post->ID, 'show_logo_color', true ) === 'Dark' ) {
    $HEADER_DARK = true;
  }

  get_header();
?>

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

<section class="content">
  <article class="post post--page">
    <div class="post__image <?php if( !$background ) { ?> post__image--empty <?php } ?>" style="background-image: url(<?php echo $background ?>)">

      <?php
        if($background) {
      ?>

      <img src="<?php echo $background ?>"
           class="post__mobile-image"
           alt="<?php echo $background_caption; ?>" />

      <?php
        }
      ?>

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