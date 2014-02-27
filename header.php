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

<header class="header">
  <?php if( !is_home() ) { ?>
    <a href="<?php echo home_url(); ?>">
  <?php } ?>

  <? $logo_appendix = '';

     if( is_page() ) {
       if( is_single() ) {
        if( get_post_meta( $page->ID, 'show_dark_logo', true ) ) {
          $logo_appendix = '-dark';
        }
       }
     }
   ?>

    <img src="<?php echo get_bloginfo('template_url'); ?>/style/logo<? echo $logo_appendix; ?>.svg"
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