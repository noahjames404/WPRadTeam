<?php

#register the styles & scripts in order
function wpdocs_theme_name_scripts()
{

  wp_enqueue_style('bootstrap', get_template_directory_uri() . "/assets/vendor/magnific-popup/magnific-popup.css");
  wp_enqueue_style('custom-styles', get_template_directory_uri() . "/style.css");
  wp_enqueue_style('font-awesome-free', get_template_directory_uri() . "/assets/vendor/fontawesome-free/css/all.min.css");
  wp_enqueue_style('google-font-1', 'https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700');
  wp_enqueue_style('google-font-2', 'https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic');
  wp_enqueue_style('navigation-clean', get_template_directory_uri() . "/assets/css/creative.min.css?v=2");


  wp_deregister_script( 'jquery' );

  wp_register_script('jquery', get_template_directory_uri() . '/assets/vendor/jquery/jquery.min.js', true);
  wp_register_script('bootstrap-bundle-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', false);
  wp_register_script('bootstrap-easing-js', get_template_directory_uri() . '/assets/vendor/jquery-easing/jquery.easing.min.js', false);
  wp_register_script('bootstrap-magnific-js', get_template_directory_uri() . '/assets/vendor/magnific-popup/jquery.magnific-popup.min.js', false);
  wp_register_script('creative-js', get_template_directory_uri() . '/assets/js/creative.js', false);


  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap-bundle-js');
  wp_enqueue_script('bootstrap-easing-js');
  wp_enqueue_script('bootstrap-magnific-js');
  wp_enqueue_script('creative-js');

}


#registers a set of menu categories and enables menu feature, located at wpdashboard->appearance->menu
function register_my_menus()
{
  register_nav_menus(
    array(
      'header-menu' => __('Header Menu'),
      'footer-menu-1' => __('Footer Menu 1'),
      'footer-menu-2' => __('Footer Menu 2'),
      'footer-menu-3' => __('Footer Menu 3'),
      'footer-menu-4' => __('Footer Menu 4'),
    )
  );
}


/*
adds custom css classes on <li> tags when using wp_nav_menu()
use li_class ='my css class' to wp_nav_menu(array()) to activate
*/
function wp_nav_menu_customize_li($classes, $item, $args)
{
  if ($args->theme_location == 'header-menu' && strcmp($args->li_class, '') != 0) {
    $classes[] = $args->li_class;
  }
  return $classes;
}

/*
adds custom css classes on <a> tags when using wp_nav_menu()
use anchor_class ='my css class' to wp_nav_menu(array()) to activate
*/
function wp_nav_menu_cutomize_anchor($atts, $item, $args)
{
  if (strcmp($args->anchor_class, '') != 0) {
    $class = $args->anchor_class;
    $atts['class'] = $class;
  }
  return $atts;
}

/*
add title to wp_nav_menu() located at the top of <ul>
*/
function wp_nav_customize_title(string $items, stdClass $args)
{
  if (strcmp($args->title, '') != 0) {
    $menu_title = $args->menu->name;
    $args->title = str_replace("%title", $menu_title, $args->title);
    $items = $args->title . $items;
  }
  return $items;
}


/*
  The following functions below focuses on theme customization features,
  using the wordpress settings api the theme can now create its own unique customization
  other than the default settings provided.

  @see https://blog.templatetoaster.com/wordpress-settings-api-creating-theme-options/
*/


function theme_option_page(){
  ?>
  <div class="wrap">
    <h1>Other Theme Options</h1>
    <form method="post" action="options.php">
      <?php
      // display settings field on theme-option page
      settings_fields("theme-options-grp");
      // display all sections for theme-options page
      do_settings_sections("theme-options");
      submit_button();
      ?>
    </form>
  </div>
  <?php
}



  function add_theme_menu_item() {
    add_theme_page("Theme Customization", "Other Theme Options", "manage_options", "theme-options", "theme_option_page", null, 99);
  }

  function theme_section_description(){
    echo '<p>Theme Option Section</p>';
  }

  function options_callback_header_background(){
    echo getCustomThemeInput('header_background_color','color');
  }

  function options_callback_header_color(){
    echo getCustomThemeInput('header_text_color','color');
  }

  function options_callback_footer_copyright(){
    echo getCustomThemeInput('footer_copyright','text');
  }

  function theme_settings(){
    add_option("header_background_color", "#fff", '', 'yes');
    add_option("header_text_color", "#000", '', 'yes');
    add_option("footer_copyright", "© 2019 Radteam. All Rights Reserved.", '', 'yes');

    add_settings_section( 'first_section', 'New Theme Options Section','theme_section_description','theme-options');

    add_settings_field('header_background_color','Header Background Color','options_callback_header_background','theme-options','first_section');
    add_settings_field('header_text_color','Header Text Color','options_callback_header_color','theme-options','first_section');
    add_settings_field('footer_copyright','Footer Copyright','options_callback_footer_copyright','theme-options','first_section');

    register_setting( 'theme-options-grp', 'header_background_color');
    register_setting( 'theme-options-grp', 'header_text_color');
    register_setting( 'theme-options-grp', 'footer_copyright');
  }

  /*
    Creates a custom input for theme customization
    @name - string, define the name & id attributes.
    @type - string, define input type.
    @value - string, define a default value.
    @custom_attr - string, additional attributes are appended at the end of input tag.

    @Returns a single line input tag result.
  */
  function getCustomInput($name, $type, $value,$custom_attr = ''){
      return '<input name="'. $name .'" id="'. $name .'" type="'. $type .'" value="'. $value .'" '. $custom_attr .' />';
  }

  /*
    Creates a custom input for theme Customization
    @name - string, defines the name,id, and value using get_option().
    @type - string, define the input type.

    @Returns a single line input tag result.
  */
  function getCustomThemeInput($name,$type){
    return getCustomInput($name,$type,get_option($name));
  }

  /*
  register methods
  */
  add_action("admin_menu", "add_theme_menu_item");
  add_action('admin_init','theme_settings');
  add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');
  add_action('init', 'register_my_menus');

  add_filter('nav_menu_link_attributes', 'wp_nav_menu_cutomize_anchor', 10, 3);
  add_filter('nav_menu_css_class', 'wp_nav_menu_customize_li', 1, 3);
  add_filter('wp_nav_menu_items', 'wp_nav_customize_title', 2, 2);
