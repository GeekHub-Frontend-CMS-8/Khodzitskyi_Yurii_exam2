<?php
/**
 * ghhw Theme Customizer
 *
 * @package ghhw
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ghhw_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'ghhw_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ghhw_customize_partial_blogdescription',
		) );
	}



/*---------------------CHOOSE SECTION IMAGE---------------------------*/
    $wp_customize->add_section('choose_image', array(
        'title' => __('Image in section \"choose\"', 'ghhw'),
        'priority' => 120
    ));
    $wp_customize->add_setting('image_set', array(
        'default' => 'none',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_control', array(
        'label' => __("Choose image", 'ghhw'),
        'section' => 'choose_image',
        'settings' => 'image_set',
        'priority' => 1
    )));
    /*-----------------------------FOOTER ADRESS TEXT-------------------------------------*/
    $wp_customize->add_section('footer_adress_sec', array(
        'title' => __('Footer Adress Text', 'ghhw'),
        'priority' => 130
    ));
    $wp_customize->add_setting('footer_adress_set', array(
        'default' => '',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_adress_control', array(
        'label' => __("Contact Us Adress Text", 'ghhw'),
        'section' => 'footer_adress_sec',
        'settings' => 'footer_adress_set',
        'priority' => 40
    )));
    /*--------------CONTACT US ADRESS-----------------*/
    $wp_customize->add_section('contact_adress_sec', array(
        'title' => __('Contact Us Adress Text', 'ghhw'),
        'priority' => 140
    ));
    $wp_customize->add_setting('contact_adress_set', array(
        'default' => '',
        'transport' => 'refresh'
    ));
    $wp_customize->add_setting('contact_phones_set1', array(
        'default' => '',
        'transport' => 'refresh'
    ));
    $wp_customize->add_setting('contact_phones_set2', array(
        'default' => '',
        'transport' => 'refresh'
    ));
    $wp_customize->add_setting('contact_mail_set', array(
        'default' => '',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_adress_control', array(
        'label' => __("Contact Us Text", 'ghhw'),
        'section' => 'contact_adress_sec',
        'type' => 'textarea',
        'settings' => 'contact_adress_set',
        'priority' => 50
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_phones_control1', array(
        'label' => __("Contact phone 1", 'ghhw'),
        'section' => 'contact_adress_sec',
        'settings' => 'contact_phones_set1',
        'priority' => 60
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_phones_control2', array(
        'label' => __("Contact phone 2", 'ghhw'),
        'section' => 'contact_adress_sec',
        'settings' => 'contact_phones_set2',
        'priority' => 70
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_mail_control', array(
        'label' => __("Contact mail", 'ghhw'),
        'section' => 'contact_adress_sec',
        'settings' => 'contact_mail_set',
        'priority' => 80
    )));
    /*--------------CONTACT US ADRESS-----------------*/
}
add_action( 'customize_register', 'ghhw_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ghhw_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ghhw_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ghhw_customize_preview_js() {
	wp_enqueue_script( 'ghhw-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ghhw_customize_preview_js' );
