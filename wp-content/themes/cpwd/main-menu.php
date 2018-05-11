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

      wp_nav_menu( $menu );
?>