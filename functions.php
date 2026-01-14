<?php
function load_stylesheets()
{
    wp_register_style('style', get_template_directory_uri() . '/style/style.css', array(), false, 'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function load_scripts()
{
    wp_register_script('custom_js', get_template_directory_uri() . '/js/scripts.js', '', 1, true);
    wp_enqueue_script('custom_js');
}
add_action('wp_enqueue_scripts', 'load_scripts');

/**
 * Summary of bootstrap_and_jquery
 * @return void
 */
function bootstrap_and_jquery()
{
    wp_enqueue_script('jquery');
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css', array(), '5.3.8', 'all');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.8', true);
}
add_action('wp_enqueue_scripts', 'bootstrap_and_jquery');

/**
 * Logo setup
 * 
 * @return void
 */
function theme_support_options()
{
    $default_logo = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    );

    add_theme_support('custom-logo', $default_logo);
}

add_action('after_setup_theme', 'theme_support_options');


/** Menu setup*/
add_theme_support('menus');
register_nav_menus(
    array(
        'primary-menu' => __('Primary Menu', 'theme'),
        'footer-menu'  => __('Footer Menu', 'theme'),
        'mobile-menu'  => __('Mobile Menu', 'theme')
    )
);
function primary_menu()
{
    wp_nav_menu(
        array(
            'theme_location' => 'primary-menu',
            'container'      => 'nav',
            'container_class' => 'primary-menu-class',
            'menu_class'     => 'primary-menu-items',
            'fallback_cb'    => false
        )
    );
}

// To add post thumbnail support
add_theme_support('post-thumbnails');
add_image_size('small-thumbnail', 180, 120, true);
add_image_size('medium-thumbnail', 300, 200, true);
add_image_size('largest', 800, 800, true);


// Kirki Customizer Framework Integration
if (!class_exists('kirki')) {
    require_once get_theme_file_path('/settings/inc/kirki/kirki.php');
}

kirki::add_config('my_theme_config', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
));

// Example of adding color section in customizer
kirki::add_section('colors_settings', array(
    'title'          => esc_html('Colors', 'textdomain'),
    'priority'       => 30,
));

// Example of adding a color field in customizer
kirki::add_field('my_theme_config', array(
    'type'        => 'color',
    'settings'    => 'primary_color',
    'label'       => esc_html('Primary Color', 'textdomain'),
    'section'     => 'colors_settings',
    'default'     => '#00aaff',
    'transport'   => 'auto',
));

kirki::add_field('my_theme_config', array(
    'type'        => 'color',
    'settings'    => 'secondary_color',
    'label'       => esc_html('Secondary Color', 'textdomain'),
    'section'     => 'colors_settings',
    'default'     => '#444444',
    'transport'   => 'auto',
));

kirki::add_field('my_theme_config', array(
    'type'        => 'color',
    'settings'    => 'accent_color',
    'label'       => esc_html('Accent Color', 'textdomain'),
    'section'     => 'colors_settings',
    'default'     => '#ff5474',
    'transport'   => 'auto',
));

kirki::add_field('my_theme_config', array(
    'type'        => 'color',
    'settings'    => 'background_color',
    'label'       => esc_html('Background Color', 'textdomain'),
    'section'     => 'colors_settings',
    'default'     => '#ffffff',
    'transport'   => 'auto',
));
