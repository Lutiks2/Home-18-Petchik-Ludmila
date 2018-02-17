<?php
/**
 * businessplus Theme Customizer
 *
 * @package businessplus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function businessplus_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title a',
            'render_callback' => 'businessplus_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'businessplus_customize_partial_blogdescription',
        ));
    }

    // add header background
    $wp_customize->add_section('header_settings', array(
        'title' => __('Header settings'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 20,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));

    // add  header background
    $wp_customize->add_setting('set_background', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'set_background', array(
        'label' => __('Featured Home Page Image', 'businessplus'),
        'section' => 'header_settings',
        'type' => 'background',
    )));

    // add header tel number
    $wp_customize->add_setting('tel_number', array(
        'default' => __('+9978 8856 999', 'businessplus'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('tel_number', array(
        'label' => __('Tel number', 'businessplus'),
        'section' => 'header_settings',
        'settings' => 'tel_number',
        'type' => 'text',
    ));
    //add header greeting
    $wp_customize->add_setting('greeting', array(
        'default' => __('Welcome to', 'businessplus'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('greeting', array(
        'label' => __('Greeting', 'businessplus'),
        'section' => 'header_settings',
        'settings' => 'greeting',
        'type' => 'text',
    ));

    // add header button

    $wp_customize->add_setting('text_button', array(
        'default' => __('Read more', 'businessplus'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('text_button', array(
        'label' => __('Text button', 'businessplus'),
        'section' => 'header_settings',
        'settings' => 'text_button',
        'type' => 'text',
    ));
    $wp_customize->add_setting('url_button', array(
        'default' => __('Url button', 'businessplus'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('url_button', array(
        'label' => __('Button url', 'businessplus'),
        'section' => 'header_settings',
        'settings' => 'url_button',
        'type' => 'dropdown-pages',
    ));
    $wp_customize->add_setting('header_button_color', array(
        'default' => '#ffaf36',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_button_color', array(
        'label' => 'Button Color',
        'section' => 'header_settings',
        'settings' => 'header_button_color',
    )));

    /////////// add section "about us"////////////
    $wp_customize->add_section('about_us', array(
        'title' => __('About us'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));

    // add "about us"  heading
    $wp_customize->add_setting('about_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'About us',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('about_heading', array(
        'label' => __('Section heading', 'businessplus'),
        'section' => 'about_us',
        'settings' => 'about_heading',
        'type' => 'text',
    ));

    //add "about us" description
    $wp_customize->add_setting('about_description', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Our Short Story',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('about_description', array(
        'label' => __('Section description', 'businessplus'),
        'section' => 'about_us',
        'settings' => 'about_description',
        'type' => 'text',
    ));

    // add "about us" text
    $wp_customize->add_setting('about_text', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been 
            the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and 
            scrambled it to make a type specimen book.',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('about_text', array(
        'label' => __('Section text', 'businessplus'),
        'section' => 'about_us',
        'settings' => 'about_text',
        'type' => 'textarea',
    ));

    // add about button

    $wp_customize->add_setting('about_text_button', array(
        'default' => __('Read more', 'businessplus'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_text_button', array(
        'label' => __('Text button', 'businessplus'),
        'section' => 'about_us',
        'settings' => 'about_text_button',
        'type' => 'text',
    ));
    $wp_customize->add_setting('about_url_button', array(
        'default' => __('Url button', 'businessplus'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('about_url_button', array(
        'label' => __('Button url', 'businessplus'),
        'section' => 'about_us',
        'settings' => 'about_url_button',
        'type' => 'dropdown-pages',
    ));
    $wp_customize->add_setting('about_button_color', array(
        'default' => '#ffaf36',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'about_button_color', array(
        'label' => 'Button Color',
        'section' => 'about_us',
        'settings' => 'about_button_color',
    )));

    ///////// add section "services"//////////
    $wp_customize->add_section('services', array(
        'title' => __('Services'),
        'description' => __('Add settings here'),
        'panel' => '', // Not typically needed.
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));

    // add "services"  heading
    $wp_customize->add_setting('services_heading', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'Services',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('services_heading', array(
        'label' => __('Section heading', 'businessplus'),
        'section' => 'services',
        'settings' => 'services_heading',
        'type' => 'text',
    ));

    //add "services" description
    $wp_customize->add_setting('services_description', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
        'default' => 'What we are doing',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => '',
        'sanitize_js_callback' => '', // Basically to_json.
    ));
    $wp_customize->add_control('services_description', array(
        'label' => __('Section description', 'businessplus'),
        'section' => 'services',
        'settings' => 'services_description',
        'type' => 'text',
    ));
    // add services background color
    $wp_customize->add_setting('backgr_color', array(
        'default' => '#eaeff3',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'backgr_color', array(
        'label' => 'Bg Color',
        'section' => 'services',
        'settings' => 'backgr_color',
    )));

    // add services button

    $wp_customize->add_setting('services_text_button', array(
        'default' => __('Read more', 'businessplus'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('services_text_button', array(
        'label' => __('Text button', 'businessplus'),
        'section' => 'services',
        'settings' => 'services_text_button',
        'type' => 'text',
    ));
    $wp_customize->add_setting('services_url_button', array(
        'default' => __('Url button', 'businessplus'),
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('services_url_button', array(
        'label' => __('Button url', 'businessplus'),
        'section' => 'services',
        'settings' => 'services_url_button',
        'type' => 'dropdown-pages',
    ));
    $wp_customize->add_setting('services_button_color', array(
        'default' => '#ffaf36',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'services_button_color', array(
        'label' => 'Button Color',
        'section' => 'services',
        'settings' => 'services_button_color',
    )));
}

add_action('customize_register', 'businessplus_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function businessplus_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function businessplus_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function businessplus_customize_preview_js()
{
    wp_enqueue_script('businessplus-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'businessplus_customize_preview_js');
