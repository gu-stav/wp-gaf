<!Doctype html/>
<html lang="en">
<head>
  <?php
    $title = wp_title( '', FALSE );

    if( !$title ) {
      $title = 'GAF Hannover';
    }
   ?>
  <title><?php echo $title; ?></title>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <meta charset="utf-8" />

  <link href="http://fonts.googleapis.com/css?family=Oswald:400,300,700"
        rel="stylesheet"
        type="text/css" />

  <link rel="stylesheet"
        href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

  <?php wp_head(); ?>
</head>
<body>

<?php

global $HEADER_DARK;

$logo_appendix = '';

if( $HEADER_DARK ) {
  $logo_appendix = '--dark';
}

?>

<?php
  $headerText = get_option( 'theme_header_text' );

  if( $headerText ) {
    ?>

    <p class="service<?php echo $logo_appendix; ?>">
      <?php echo $headerText; ?>
    </p>

    <?php
  }
?>

<header class="header">
  <?php
    if( !is_home() ) { ?>
    <a href="<?php echo home_url(); ?>">
  <?php } ?>

    <img src="<?php echo get_bloginfo('template_url'); ?>/style/logo<?php echo $logo_appendix ?>.svg"
         class="header__logo"
         alt="GAF Hannover - Logo" />

  <?php if( !is_home() ) { ?>
    </a>
  <?php } ?>
</header>

<?php
  add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
  $nav = wp_nav_menu( array( 'echo' => 0 ) );

  print_r( $nav )
?>
