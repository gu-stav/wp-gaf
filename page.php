<?php get_header(); ?>

<?php
  $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

  if( $background[0] ) {
    $background = $background[0];
  } else {
    $background = '';
  }
?>

<section class="content">
  <article class="post post--page">
    <div class="post__image" style="background-image: url(<?php echo $background ?>)">
      <div class="post__header">
        <div>
          <h1><?php echo $post->post_title; ?></h1>
        </div>
      </div>
    </div>

    <div class="post__content">
      <? echo get_post_meta( $post->ID, 'excerpt', true ); ?>
    </div>

    <div class="post__images">
      <div class="post__images--page">
        <?php echo $post->post_content; ?>
      </div>
    </div>
  </article>
<section>

<?php get_footer(); ?>