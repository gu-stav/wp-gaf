<?php get_header(); ?>

<section class="content">
  <article class="post post--page">
    <div class="post__header">
      <div>
        <h1><?php echo $post->post_title; ?></h1>
      </div>
    </div>
    <div class="post__content">
      <?php echo $post->post_content; ?>
    </div>
  </article>
<section>