<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <title><?php
       if( is_home() || is_front_page() ) {
          bloginfo('name'); 
          print ' | ';
          bloginfo('description');
        }
        elseif ( is_page() ) { 
          single_post_title(''); 
        }
        elseif ( -is_404() ) { 
          bloginfo('name'); print ' | Not Found'; 
        }
        else { 
          bloginfo('name'); wp_title('|');
          get_page_number(); 
        }
    ?></title>
 
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <?php wp_head(); ?>
</head>
<body>
<header>
<?php

/**
  * @example https://codex.wordpress.org/Function_Reference/wp_nav_menu
  * @example wp_nav_menu
  * @link https://codex.wordpress.org/Function_Reference/wp_nav_menu
  */
      $menu = array(
        'menu'          => 'main-menu',
        'menu_class'      => 'menu',
        'menu_id'         => 'main-menu',
        'container'       => '',
        //'container_class' => 'main-menu',
        //'container_id'    => '',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
      );

      wp_nav_menu( $menu ); ?>
</header>