<?php
/**
 * proton Theme Customizer
 *
 * @package proton
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function proton_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'proton_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'proton_customize_partial_blogdescription',
			)
		);
	}

	/**
	 * Social Profiles
	 */

	$wp_customize->add_section(
	    'proton_social',
	    array(
	        'title'     => 'Social Profiles',
	        'description' => __( 'Enter the URL to your account or profile for each service for the icon to appear in the header.', 'proton' ),
	        'priority'  => 200
	    )
	);

	$social_profiles = array(
		array(
			'title' => 'Facebook',
			'id' => 'facebook',
			'placeholder' => 'https://facebook.com/username'
		),
		array(
			'title' => 'Twitter',
			'id' => 'twitter',
			'placeholder' => 'https://twitter.com/username'
		),
		array(
			'title' => 'Instagram',
			'id' => 'instagram',
			'placeholder' => 'https://instagram.com/username'
		),
		array(
			'title' => 'YouTube',
			'id' => 'youtube',
			'placeholder' => 'https://youtube.com/username'
		),
		array(
			'title' => 'GitHub',
			'id' => 'github',
			'placeholder' => 'https://github.com/username'
		),
		array(
			'title' => 'Mastodon',
			'id' => 'mastodon',
			'placeholder' => 'https://host.tld/@username'
		),
		array(
			'title' => 'Bluesky',
			'id' => 'bluesky',
			'placeholder' => 'https://bsky.app/profile/username.bsky.social'
		),
		array(
			'title' => 'LinkedIn',
			'id' => 'linkedin',
			'placeholder' => 'https://linkedin.com/in/username'
		)
	);

	foreach ( $social_profiles as $social_profile ) {

	    $wp_customize->add_setting(
	  		'proton_social_' . $social_profile['id'],
	  		array(
	  			'transport' => 'refresh',
	  			'sanitize_callback' => 'esc_url_raw'
	  		)
	  	);

	  	$wp_customize->add_control(
	  		'proton_social_' . $social_profile['id'],
	  		array(
	  			'section' => 'proton_social',
	  			'label' => $social_profile['title'],
	  			'type' => 'url',
	  			'input_attrs' => array(
	  	            'placeholder' => $social_profile['placeholder'],
	  	        )
	  		)
	  	);

	}

	/**
	 * Accent Color
	 */

	$wp_customize->add_setting( 'proton_accent_color' , array(
	    'default'     => '#E90064',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'proton_accent_color',
	        array(
	            'label'      => __( 'Accent Color', 'proton' ),
	            'section'    => 'title_tagline',
	            'settings'   => 'proton_accent_color'
	        )
	    )
	);

	/**
	 * Color Scheme
	 */

	$wp_customize->add_setting( 'proton_color_scheme_toggle' , array(
	    'default'     => 'light',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'proton_sanitize_radio'
	) );

	//radio box sanitization function
	function proton_sanitize_radio( $input, $setting ){
	    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	    $input = sanitize_key($input);

	    //get the list of possible radio box options 
	    $choices = $setting->manager->get_control( $setting->id )->choices;
	                      
	    //return input if valid or return default option
	    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
	}

	$wp_customize->add_control(
	    new WP_Customize_Control(
	        $wp_customize,
	        'proton_color_scheme_toggle',
	        array(
	            'label'      => __( 'Color Scheme', 'proton' ),
	            'description' => __( 'Adjust the overall appearance of the theme.', 'proton' ),
	            'section'    => 'title_tagline',
	            'settings'   => 'proton_color_scheme_toggle',
	            'type'    => 'radio',
	            'choices' => array(
                    'light' => 'Light (default)',
                    'dark' => 'Dark',
                    'auto' => 'Auto'
                )
	        )
	    )
	);
}
add_action( 'customize_register', 'proton_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function proton_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function proton_customize_partial_blogdescription() {
	bloginfo( 'description' );
}