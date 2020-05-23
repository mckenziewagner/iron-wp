<?php

//Add support for post thmbnaiils
  add_theme_support('post-thumbnails');

  //Register a Main Menu that can be edited through the wordpress admin
  register_nav_menu('Primary','The primary navigation');

  //Use this to add data that will be added and provided by all the context when calling Timber::get_context();
  add_filter('timber_context','add_to_context');

  function add_to_context($data) {
      $data['menu'] = new TimberMenu(); //This will grab the first menu generated, if you want a specific menu simply add the menu slug
      return $data;
  }

  add_action('wp_enqueue_scripts', 'add_scripts');

  function add_scripts() {
    wp_register_script('main-js', get_stylesheet_directory_uri() . '/dist/out.js', null, null, true);
    wp_enqueue_script('main-js');
    wp_register_style('main-css', get_stylesheet_directory_uri() . '/dist/out.css', null, null, true);
    wp_enqueue_style('main-css');
  }

 ?>
