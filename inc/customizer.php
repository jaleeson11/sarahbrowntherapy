<?php
/**
 * sarahbrowntherapy Theme Customizer
 *
 * @package sarahbrowntherapy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sarahbrowntherapy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'sarahbrowntherapy_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'sarahbrowntherapy_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'sarahbrowntherapy_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function sarahbrowntherapy_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function sarahbrowntherapy_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sarahbrowntherapy_customize_preview_js() {
	wp_enqueue_script( 'sarahbrowntherapy-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), SARAH_BROWN_THERAPY_VERSION, true );
}
add_action( 'customize_preview_init', 'sarahbrowntherapy_customize_preview_js' );

/**
 * Add custom customizer sections.
 * 
 * @param WP_Customize_Manager $wp_customize Theme Customizer object. 
 */
function sarahbrowntherapy_custom_sections( $wp_customize ) {
	$wp_customize->add_panel( 'home', array(
		'title' => 'Home Page'
	));

	$wp_customize->add_section( 'home_about', array(
		'title' => 'About Me Section',
		'panel' => 'home'
	));

	$wp_customize->add_setting( 'home_about_heading', array(
		'default'   => 'Example heading text'
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_about_heading_control', array(
		'label' => 'Heading',
		'section' => 'home_about',
		'settings' => 'home_about_heading'
	)));

	$wp_customize->add_setting( 'home_about_text', array(
		'default'   => 'Example paragraph text'
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_about_text_control', array(
		'label' => 'Text',
		'section' => 'home_about',
		'settings' => 'home_about_text',
		'type' => 'textarea'
	)));

	$wp_customize->add_setting( 'home_about_button_text', array(
		'default'   => 'Example button text'
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_about_button_text_control', array(
		'label' => 'Button Text',
		'section' => 'home_about',
		'settings' => 'home_about_button_text'
	)));

	$wp_customize->add_setting( 'home_about_button_link' );
    
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_about_button_link_control', array(
		'label' => 'Button Link',
		'section' => 'home_about',
		'settings' => 'home_about_button_link',
		'type' => 'dropdown-pages'
	)));

	$wp_customize->add_setting( 'home_about_image' );
    
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_about_image_control', array(
		'label' => 'Image',
		'section' => 'home_about',
		'settings' => 'home_about_image'
	)));

	$wp_customize->add_setting( 'home_about_image_alt');

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_about_image_alt_control', array(
		'label' => 'Image Alt Text',
		'section' => 'home_about',
		'settings' => 'home_about_image_alt'
	)));
}
add_action('customize_register', 'sarahbrowntherapy_custom_sections');
