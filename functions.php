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
 * FontAwesome Integration
 * @return void
 */
function enqueue_font_awesome()
{
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css', array(), '7.0.1', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');



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


// Font Size Section
kirki::add_section('typography_settings', array(
    'title'          => esc_html('Typography', 'textdomain'),
    'priority'       => 25,
));
// body font size
kirki::add_field('my_theme_config', array(
    'type'        => 'typography',
    'settings'    => 'body_font',
    'label'       => esc_html('Body Font', 'textdomain'),
    'section'     => 'typography_settings',
    'default'     => [
        'font-family' => 'Roboto, sans-serif',
        'variant'     => 'regular',
        'font-size'   => '16px',
    ],
    'choices'     => array(
        'fonts' => array(
            'google' => array('popularity', 50),
            'standard' => array('serif', 'sans-serif', 'monospace')
        ),
    ),
    'transport'   => 'auto',
));
// Heading font size H1
kirki::add_field('my_theme_config', array(
    'type'        => 'typography',
    'settings'    => 'h1_font',
    'label'       => esc_html('H1 Font', 'textdomain'),
    'section'     => 'typography_settings',
    'default'     => [
        'font-family' => 'Lato, sans-serif',
        'variant'     => '700',
        'font-size'   => '36px',
    ],
    'choices'     => array(
        'fonts' => array(
            'google' => array('popularity', 50),
            'standard' => array('serif', 'sans-serif', 'monospace')
        ),
    ),
    'transport'   => 'auto',
));

// Button Style Section
kirki::add_section('button_style_settings', array(
    'title'          => esc_html('Button Styles', 'textdomain'),
    'priority'       => 40,
));
// Button background color
kirki::add_field('my_theme_config', array(
    'type'        => 'color',
    'settings'    => 'button_background_color',
    'label'       => esc_html('Background Color', 'textdomain'),
    'section'     => 'button_style_settings',
    'default'     => '#0073aa',
    'transport'   => 'auto',
));
// Button hover background color
kirki::add_field('my_theme_config', array(
    'type'        => 'color',
    'settings'    => 'button_hover_background_color',
    'label'       => esc_html('Hover Background Color', 'textdomain'),
    'section'     => 'button_style_settings',
    'default'     => '#005177',
    'transport'   => 'auto',
));
// Button text color
kirki::add_field('my_theme_config', array(
    'type'        => 'color',
    'settings'    => 'button_text_color',
    'label'       => esc_html('Text Color', 'textdomain'),
    'section'     => 'button_style_settings',
    'default'     => '#ffffff',
    'transport'   => 'auto',
));
// Button border radius
kirki::add_field('my_theme_config', array(
    'type'        => 'spacing',
    'settings'    => 'button_border_radius',
    'label'       => esc_html('Border Radius (px)', 'textdomain'),
    'section'     => 'button_style_settings',
    'default'     =>  array(
        'top'  => '4px',
        'right'  => '4px',
        'bottom' => '4px',
        'left'  => '4px',
    ),
    'transport'   => 'auto',
));
// Button padding
kirki::add_field('my_theme_config', array(
    'type'        => 'spacing',
    'settings'    => 'button_padding',
    'label'       => esc_html('Button Padding (px)', 'textdomain'),
    'section'     => 'button_style_settings',
    'default'     =>  array(
        'top'  => '10px',
        'right'  => '20px',
        'bottom' => '10px',
        'left'  => '20px',
    ),
    'transport'   => 'auto',
));


// Layout section
kirki::add_section('layout_settings', array(
    'title'          => esc_html('Layout', 'textdomain'),
    'priority'       => 45,
));
//Container width (box / full)
kirki::add_field('my_theme_config', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'container_width',
    'label'       => esc_html('Container Width', 'textdomain'),
    'section'     => 'layout_settings',
    'default'     =>  'full',
    'choices' => [
        'full' => esc_html__('Full Width', 'textdomain'),
        'boxed' => esc_html__('Boxed', 'textdomain'),
    ],
    'transport'   => 'auto',
));
// Sidebar positions
kirki::add_field('my_theme_config', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'sidebar_position',
    'label'       => esc_html('Sidebar Position', 'textdomain'),
    'section'     => 'layout_settings',
    'default'     =>  'right',
    'choices' => [
        'left' => esc_html__('Left Sidebar', 'textdomain'),
        'right' => esc_html__('Right Sidebar', 'textdomain'),
        'none' => esc_html__('No Sidebar', 'textdomain'),
    ],
    'transport'   => 'refresh',
));
// Content spacing
kirki::add_field('my_theme_config', array(
    'type'        => 'spacing',
    'settings'    => 'content_spacing',
    'label'       => esc_html__('Content Spacing', 'textdomain'),
    'section'     => 'layout_settings',
    'default'     =>  [
        'top' => '20px',
        'right' => '20px',
        'bottom' => '20px',
        'left' => '20px'
    ],
    'transport'   => 'auto',
));

// Author details section
kirki::add_section('author_details_settings', array(
    'title'          => esc_html__('Blog Author Details', 'textdomain'),
    'description'       => esc_html__('Customize your author information for the current blog', 'textdomain'),
    'panel'         => '',
    'priority'       => 20,
));
// profile picture
kirki::add_field('my_theme_config', array(
    'type'        => 'image',
    'settings'    => 'author_picture',
    'label'       => esc_html__('Author Profile Picture', 'textdomain'),
    'section'     => 'author_details_settings',
    'default'     => '',
    'choices'     => array(
        'save_as' => 'id',
    ),
    'transport'   => 'auto',
));
// Show author details
kirki::add_field('my_theme_config', array(
    'type'        => 'text',
    'settings'    => 'author_name',
    'label'       => esc_html__('Author Name', 'textdomain'),
    'section'     => 'author_details_settings',
    'default'     =>  esc_html__('Hiro Wanni', 'textdomain'),
    'transport'   => 'auto',
));
// Author position
kirki::add_field('my_theme_config', array(
    'type'        => 'text',
    'settings'    => 'author_position',
    'label'       => esc_html__('Author Position', 'textdomain'),
    'section'     => 'author_details_settings',
    'default'     => esc_html__('Senior Developer at XYZ Company', 'textdomain'),
    'transport'   => 'auto',
));
// Author bio
kirki::add_field('my_theme_config', array(
    'type'        => 'textarea',
    'settings'    => 'author_bio',
    'label'       => esc_html__('Author Bio', 'textdomain'),
    'section'     => 'author_details_settings',
    'default'     => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, placerat erat at, efficitur quam.', 'textdomain'),
    'transport'   => 'auto',
));


// Widget Area Registration
function register_widget_areas()
{
    register_sidebar(array(
        'name'          => __('Sidebar Widget Area', 'textdomain'),
        'id'            => 'sidebar-widget-area',
        'description'   => __('Widgets in this area will be shown on the sidebar.', 'textdomain'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'textdomain'),
        'id'            => 'footer-widget-area',
        'description'   => __('Widgets in this area will be shown in the footer.', 'textdomain'),
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}

add_action('widgets_init', 'register_widget_areas');
