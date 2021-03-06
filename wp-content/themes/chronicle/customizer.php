<?php
function chronicle_customizer( $wp_customize ) { 
	wp_enqueue_style('customizr', get_template_directory_uri() .'/css/customizr.css');
	$wp_customize->get_setting( 'background_color' )->transport = 'refresh';
	$wp_customize->get_setting( 'background_image' )->transport = 'refresh';

	/* Genral section */
		/* Slider Section */
	$wp_customize->add_panel( 'chronicle_theme_option', array(
    'title' => __( 'Theme Options','chronicle' ),
    'priority' => 1, // Mixed with top-level-section hierarchy.
) );
	$wp_customize->add_section(
        'general_sec',
        array(
            'title' => __('Theme General Options','chronicle'),
            'description' => __('Here you can customize Your theme\'s general Settings','chronicle'),
			'panel'=>'chronicle_theme_option',
			'capabilit'=>'edit_theme_options',
            'priority' => 35,
			
        )
    ); 
		$wl_theme_options = chronicle_get_options();
	$wp_customize->add_setting(
		'chronicle_theme_options[_frontpage]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['_frontpage'],
			'sanitize_callback'=>'chronicle_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'chronicle_front_page', array(
		'label'        => __( 'Show Front Page', 'chronicle' ),
		'type'=>'checkbox',
		'section'    => 'general_sec',
		'settings'   => 'chronicle_theme_options[_frontpage]',
	) );
	
	$wp_customize->add_setting(
		'chronicle_theme_options[upload_image_logo]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['upload_image_logo'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[height]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['height'],
			'sanitize_callback'=>'chronicle_sanitize_integer',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[width]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['width'],
			'sanitize_callback'=>'chronicle_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);
	

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'chronicle_upload_image_logo', array(
		'label'        => __( 'Website Logo', 'chronicle' ),
		'section'    => 'general_sec',
		'settings'   => 'chronicle_theme_options[upload_image_logo]',
	) ) );
	$wp_customize->add_control( 'chronicle_logo_height', array(
		'label'        => __( 'Logo Height', 'chronicle' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'chronicle_theme_options[height]',
	) );
	$wp_customize->add_control( 'chronicle_logo_width', array(
		'label'        => __( 'Logo Width', 'chronicle' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'chronicle_theme_options[width]',
	) );
	
	$wp_customize->add_setting(
		'chronicle_theme_options[upload_image_favicon]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['upload_image_favicon'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'chronicle_upload_favicon_image', array(
		'label'        => __( 'Custom favicon', 'chronicle' ),
		'section'    => 'general_sec',
		'settings'   => 'chronicle_theme_options[upload_image_favicon]',
	) ) );
	
	/* Slider Section */
	$wp_customize->add_section(
        'slider_sec',
        array(
            'title' => __('Theme Slider Options','chronicle'),
			'panel'=>'chronicle_theme_option',
            'description' => __('Here you can add slider images','chronicle'),
			'capabilit'=>'edit_theme_options',
            'priority' => 36,
			'active_callback' => 'is_front_page',
        )
    );
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_image_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_image_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_image_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_image_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_image_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_image_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_title_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_title_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_title_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_desc_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_desc_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_desc_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_desc_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_desc_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_desc_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text'
		)
	);
	
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_link_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_link_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_link_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_link_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_link_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_link_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'chronicle_slider_image_1', array(
		'label'        => __( 'Slider Image One', 'chronicle' ),
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_image_1]'
	) ) );
	$wp_customize->add_control( 'chronicle_slide_title_1', array(
		'label'        => __( 'Slider title one', 'chronicle' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_title_1]'
	) );
	$wp_customize->add_control( 'chronicle_slide_desc_1', array(
		'label'        => __( 'Slider description one', 'chronicle' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_desc_1]'
	) );

	
	$wp_customize->add_control( 'chronicle_slide_btnlink_1', array(
		'label'        => __( 'Slider Button Link', 'chronicle' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_link_1]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'chronicle_slider_image_2', array(
		'label'        => __( 'Slider Image Two ', 'chronicle' ),
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_image_2]'
	) ) );
	
	$wp_customize->add_control( 'chronicle_slide_title_2', array(
		'label'        => __( 'Slider Title Two', 'chronicle' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_title_2]'
	) );
	$wp_customize->add_control( 'chronicle_slide_desc_2', array(
		'label'        => __( 'Slider Description Two', 'chronicle' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_desc_2]'
	) );

	$wp_customize->add_control( 'chronicle_slide_btnlink_2', array(
		'label'        => __( 'Slider Link Two', 'chronicle' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_link_2]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'chronicle_slider_image_3', array(
		'label'        => __( 'Slider Image Three', 'chronicle' ),
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_image_3]'
	) ) );
	$wp_customize->add_control( 'chronicle_slide_title_3', array(
		'label'        => __( 'Slider Title Three', 'chronicle' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_title_3]'
	) );
	
	$wp_customize->add_control( 'chronicle_slide_desc_3', array(
		'label'        => __( 'Slider Description Three', 'chronicle' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_desc_3]'
	) );

	$wp_customize->add_control( 'chronicle_slide_btnlink_3', array(
		'label'        => __( 'Slider Button Link Three', 'chronicle' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_link_3]'
	) );
	/* Portfolio Section */
	$wp_customize->add_section(
        'portfolio_section',
        array(
            'title' => __('Portfolio Options','chronicle'),
            'description' => __('Here you can add Portfolio title,description and even portfolios','chronicle'),
			'panel'=>'chronicle_theme_option',
			'capabilit'=>'edit_theme_options',
            'priority' => 39,
        )
    );
	
	$wp_customize->add_setting(
		'chronicle_theme_options[portfolio_home]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['portfolio_home'],
			'sanitize_callback'=>'chronicle_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[port_heading]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['port_heading'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text',
		)
	);

	for($i=1;$i<=3;$i++){ 
		$wp_customize->add_setting(
			'chronicle_theme_options[port_'.$i.'_img]',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_'.$i.'_img'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'esc_url_raw',
			)
		);
		$wp_customize->add_setting(
			'chronicle_theme_options[port_'.$i.'_title]',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_'.$i.'_title'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'chronicle_sanitize_text',
			)
		);

		$wp_customize->add_setting(
			'chronicle_theme_options[port_'.$i.'_link]',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_'.$i.'_link'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'esc_url_raw',
			)
		);
	}
	
	$wp_customize->add_control( 'chronicle_show_portfolio', array(
		'label'        => __( 'Enable Portfolio on Home', 'chronicle' ),
		'type'=>'checkbox',
		'section'    => 'portfolio_section',
		'settings'   => 'chronicle_theme_options[portfolio_home]'
	) );
	$wp_customize->add_control( 'chronicle_portfolio_title', array(
		'label'        => __( 'Portfolio Heading', 'chronicle' ),
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'chronicle_theme_options[port_heading]'
	) );

	for($i=1;$i<=3;$i++){
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'chronicle_portfolio_img_'.$i, array(
		'label'        => __( 'Portfolio Image', 'chronicle' ),
		'section'    => 'portfolio_section',
		'settings'   => 'chronicle_theme_options[port_'.$i.'_img]'
	) ) );
	$wp_customize->add_control( 'chronicle_portfolio_title_'.$i, array(
		'label'        => __( 'Portfolio Title', 'chronicle' ),
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'chronicle_theme_options[port_'.$i.'_title]'
	) );
	
	$wp_customize->add_control( 'chronicle_portfolio_link_'.$i, array(
		'label'        => __( 'Portfolio Link', 'chronicle' ),
		'type'=>'url',
		'section'    => 'portfolio_section',
		'settings'   => 'chronicle_theme_options[port_'.$i.'_link]'
	) );
	}
	/* Blog Option */
	$wp_customize->add_section('blog_section',array(
	'title'=>__("Home Blog Options","weblizar"),
	'panel'=>'chronicle_theme_option',
	'capabilit'=>'edit_theme_options',
    'priority' => 40
	));
	$wp_customize->add_setting(
	'chronicle_theme_options[blog_heading]',
		array(
		'default'=>esc_attr($wl_theme_options['blog_heading']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'chronicle_blog_title', array(
		'label'        => __( 'Home Blog Title', 'chronicle' ),
		'type'=>'text',
		'section'    => 'blog_section',
		'settings'   => 'chronicle_theme_options[blog_heading]'
	) );
	
	/* Service Section */
	$wp_customize->add_section('service_section',array(
	'title'=>__("Service Options","weblizar"),
	'panel'=>'chronicle_theme_option',
	'capabilit'=>'edit_theme_options',
    'priority' => 38,
	
	));
	$wp_customize->add_setting(
	'chronicle_theme_options[home_service_title]',
		array(
		'default'=>esc_attr($wl_theme_options['home_service_title']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text',
		)
	);
	$wp_customize->add_setting(
	'chronicle_theme_options[home_service_description]',
		array(
		'default'=>esc_attr($wl_theme_options['home_service_description']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text',
		)
	);
	$wp_customize->add_setting(
	'chronicle_theme_options[service_1_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_icons']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text',
			)
	);
	$wp_customize->add_setting(
	'chronicle_theme_options[service_2_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_icons']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text',
		)
	);
	$wp_customize->add_setting(
	'chronicle_theme_options[service_3_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_icons']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text',
		)
	);
	$wp_customize->add_setting(
	'chronicle_theme_options[service_1_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_title']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text',
			)
	);
	$wp_customize->add_setting(
	'chronicle_theme_options[service_2_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_title']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text'
		)
	);
	$wp_customize->add_setting(
	'chronicle_theme_options[service_3_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_title']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'chronicle_theme_options[service_1_text]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_text']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options',
			)
	);
	$wp_customize->add_setting(
	'chronicle_theme_options[service_2_text]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_text']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'chronicle_theme_options[service_3_text]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_text']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'chronicle_theme_options_home_title', array(
		'label'        => __( 'Home Service Title', 'chronicle' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[home_service_title]'
	) );
	$wp_customize->add_control( 'chronicle_theme_options_home_desc', array(
		'label'        => __( 'Home Service Description', 'chronicle' ),
		'type'=>'textarea',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[home_service_description]'
	) );
	
	$wp_customize->add_control(
    new chronicle_Customize_Misc_Control(
        $wp_customize,
        'chronicle_theme_options1-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));

	
	$wp_customize->add_control( 'chronicle_service_one_title', array(
		'label'        => __( 'Service One Title', 'chronicle' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[service_1_title]'
	) );
	
		$wp_customize->add_control(
        'chronicle_theme_options[service_1_icons]',
        array(
			'label'        => __( 'Service Icon One', 'chronicle' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','chronicle'),
            'section'  => 'service_section',
			'settings'   => 'chronicle_theme_options[service_1_icons]'
        )
    );
	
	$wp_customize->add_control( 'chronicle_service_one_text', array(
		'label'        => __( 'Service One Text', 'chronicle' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[service_1_text]'
	) );
		$wp_customize->add_control(
    new chronicle_Customize_Misc_Control(
        $wp_customize,
        'chronicle_theme_options2-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'chronicle_service_two_title', array(
		'label'        => __( 'Service Two Title', 'chronicle' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[service_2_title]'
	) );
		$wp_customize->add_control('chronicle_theme_options[service_2_icons]',
        array(
			'label'        => __( 'Service Icon Two', 'chronicle' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','chronicle'),
            'section'  => 'service_section',
			
			'settings'   => 'chronicle_theme_options[service_2_icons]'
    ));
	$wp_customize->add_control( 'chronicle_service_two_text', array(
		'label'        => __( 'Service Two Text', 'chronicle' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[service_2_text]'
	) );
		$wp_customize->add_control(
    new chronicle_Customize_Misc_Control(
        $wp_customize,
        'chronicle_theme_options3-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'chronicle_service_three_title', array(
		'label'        => __( 'Service Three Title', 'chronicle' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[service_3_title]'
	) );
	$wp_customize->add_control('chronicle_theme_options[service_3_icons]',
        array(
			'label'        => __( 'Service Icon Three', 'chronicle' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','chronicle'),
            'section'  => 'service_section',
			
			'settings'   => 'chronicle_theme_options[service_3_icons]'
    ));
	$wp_customize->add_control( 'chronicle_service_three_text', array(
		'label'        => __( 'Service Three Text', 'chronicle' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[service_3_text]'
	) );
	/* Social options */
	$wp_customize->add_section('social_section',array(
	'title'=>__("Social Options","weblizar"),
	'panel'=>'chronicle_theme_option',
	'capabilit'=>'edit_theme_options',
    'priority' => 42
	));
	$wp_customize->add_setting(
	'chronicle_theme_options[header_social_media_in_enabled]',
		array(
		'default'=>esc_attr($wl_theme_options['header_social_media_in_enabled']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_checkbox',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'header_social_media_in_enabled', array(
		'label'        => __( 'Enable Social Media Icons in Header', 'chronicle' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[header_social_media_in_enabled]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[footer_section_social_media_enbled]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_section_social_media_enbled']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_checkbox',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_section_social_media_enbled', array(
		'label'        => __( 'Enable Social Media Icons in Footer', 'chronicle' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[footer_section_social_media_enbled]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[twitter_link]',
		array(
		'default'=>esc_attr($wl_theme_options['twitter_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'twitter_link', array(
		'label'        =>  __('Twitter', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[twitter_link]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[facebook_link]',
		array(
		'default'=>esc_attr($wl_theme_options['facebook_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'facebook_link', array(
		'label'        => __( 'Facebook', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[facebook_link]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[linkedin_link]',
		array(
		'default'=>esc_attr($wl_theme_options['linkedin_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'linkedin_link', array(
		'label'        => __( 'LinkedIn', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[linkedin_link]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[youtube_link]',
		array(
		'default'=>esc_attr($wl_theme_options['youtube_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'youtube_link', array(
		'label'        => __( 'Youtube_link', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[youtube_link]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[google_plus]',
		array(
		'default'=>esc_attr($wl_theme_options['google_plus']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'google_plus', array(
		'label'        => __( 'Goole+', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[google_plus]'
	) );
		$wp_customize->add_setting(
	'chronicle_theme_options[rss_link]',
		array(
		'default'=>esc_attr($wl_theme_options['rss_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'rss_link', array(
		'label'        => __( 'rss_link', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[rss_link]'
	) );
		$wp_customize->add_setting(
	'chronicle_theme_options[flicker_link]',
		array(
		'default'=>esc_attr($wl_theme_options['flicker_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'flicker_link', array(
		'label'        => __( 'flicker_link', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[flicker_link]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[contact_email]',
		array(
		'default'=>esc_attr($wl_theme_options['contact_email']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'is_email',
		)
	);
		$wp_customize->add_control( 'contact_email', array(
		'label'        => __( 'Email-ID', 'chronicle' ),
		'type'=>'email',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[contact_email]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[phone_no]',
		array(
		'default'=>esc_attr($wl_theme_options['phone_no']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_integer',
		)
	);
		$wp_customize->add_control( 'phone_no', array(
		'label'        => __( 'Phone Number', 'chronicle' ),
		'type'=>'text',
		'section'    => 'social_section',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'settings'   => 'chronicle_theme_options[phone_no]'
	) );
	/* Footer Callout */
	$wp_customize->add_section('callout_section',array(
	'title'=>__("Footer Call-Out Options","weblizar"),
	'panel'=>'chronicle_theme_option',
	'capabilit'=>'edit_theme_options',
    'priority' => 37
	));
	$wp_customize->add_setting(
	'chronicle_theme_options[callout_text]',
		array(
		'default'=>esc_attr($wl_theme_options['callout_text']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text',
		)
	);
	$wp_customize->add_control( 'callout_title', array(
		'label'        => __( 'Callout Text', 'chronicle' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'chronicle_theme_options[callout_text]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[button_1_text]',
		array(
		'default'=>esc_attr($wl_theme_options['button_1_text']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'chronicle_btn_1', array(
		'label'        => __( 'Button One Text', 'chronicle' ),
		'type'=>'textarea',
		'section'    => 'callout_section',
		'settings'   => 'chronicle_theme_options[button_1_text]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[button_1_link]',
		array(
		'default'=>esc_attr($wl_theme_options['button_1_link']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options',
		)
	);
$wp_customize->add_control( 'chronicle_btn_link_1', array(
		'label'        => __( 'Button One Link', 'chronicle' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'chronicle_theme_options[button_1_link]'
	) );
		$wp_customize->add_setting(
	'chronicle_theme_options[button_2_text]',
		array(
		'default'=>esc_attr($wl_theme_options['button_2_text']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options',
		)
	);
$wp_customize->add_control( 'chronicle_btn_2', array(
		'label'        => __( 'Button Two Text', 'chronicle' ),
		'type'=>'textarea',
		'section'    => 'callout_section',
		'settings'   => 'chronicle_theme_options[button_2_text]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[button_2_link]',
		array(
		'default'=>esc_attr($wl_theme_options['button_2_link']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options',
		)
	);
$wp_customize->add_control( 'chronicle_btn_link_2', array(
		'label'        => __( 'Button Two Link', 'chronicle' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'chronicle_theme_options[button_2_link]'
	) );

	/* Footer Options */
	$wp_customize->add_section('footer_section',array(
	'title'=>__("Footer Options","weblizar"),
	'panel'=>'chronicle_theme_option',
	'capabilit'=>'edit_theme_options',
    'priority' => 41
	));
	$wp_customize->add_setting(
	'chronicle_theme_options[footer_customizations]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_customizations']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'chronicle_footer_customizations', array(
		'label'        => __( 'Footer Customization Text', 'chronicle' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'chronicle_theme_options[footer_customizations]'
	) );
	
	$wp_customize->add_setting(
	'chronicle_theme_options[developed_by_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_text']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'chronicle_developed_by_text', array(
		'label'        => __( 'Footer Customization Text', 'chronicle' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'chronicle_theme_options[developed_by_text]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[developed_by_chronicle_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_chronicle_text']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'chronicle_developed_by_weblizar_text', array(
		'label'        => __( 'Footer Customization Text', 'chronicle' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'chronicle_theme_options[developed_by_chronicle_text]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[developed_by_link]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_link']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( 'chronicle_developed_by_link', array(
		'label'        => __( 'Footer Customization Text', 'chronicle' ),
		'type'=>'url',
		'section'    => 'footer_section',
		'settings'   => 'chronicle_theme_options[developed_by_link]'
	) );
		$wp_customize->add_section( 'chronicle_more' , array(
				'title'      	=> __( 'Upgrade to Chronicle Premium', 'chronicle' ),
				'priority'   	=> 999,
				'panel'=>'chronicle_theme_option',
			) );

			$wp_customize->add_setting( 'chronicle_more', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new More_chronicle_Control( $wp_customize, 'chronicle_more', array(
				'label'    => __('Chronicle Premium', 'chronicle'),
				'section'  => 'chronicle_more',
				'settings' => 'chronicle_more',
				'priority' => 1,
			) ) );
}
add_action( 'customize_register', 'chronicle_customizer' );
function chronicle_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function chronicle_sanitize_checkbox( $input ) {
    if ( $input == 'on' ) {
        return 'on';
    } else {
        return '';
    }
}
function chronicle_sanitize_integer( $input ) {
    return (int) $input;
}
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'chronicle_Customize_Misc_Control' ) ) :
class chronicle_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
    public function render_content() {
        switch ( $this->type ) {
            default:
           
            case 'heading':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;
 
            case 'line' :
                echo '<hr />';
                break;
			
        }
    }
}
endif;


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'More_chronicle_Control' ) ) :
class More_chronicle_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6 upsell-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://weblizar.com/themes/chronicle-premium-theme/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Chronicle Premium','chronicle'); ?> </a>
			</div>
			<div class="col-md-4 col-sm-6">
				<img class="enigma_img_responsive " src="<?php echo get_template_directory_uri() .'/images/chronicle-pro-screenshot1.png'?>">
			</div>			
			<div class="col-md-3 col-sm-6">
				<h3 style="margin-top:10px;margin-left: 20px;text-decoration:underline;color:#333;"><?php echo _e( 'Chronicle Premium - Features','chronicle'); ?></h3>
					<ul style="padding-top:20px">
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Responsive Design','chronicle'); ?> </li>						
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('More than 15+ Templates','chronicle'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('12 types Themes Colors Scheme','chronicle'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Patterns Background','chronicle'); ?></li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Full Width & Boxed Layout','chronicle'); ?></li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Touch Slider','chronicle'); ?>   </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('WPML Compatible','chronicle'); ?>   </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Woo-commerce Compatible','chronicle'); ?>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Ultimate Portfolio layout with Isotope effect','chronicle'); ?>  </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Rich Short codes','chronicle'); ?>  </li>	
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Translation Ready','chronicle'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Coming Soon Mode','chronicle'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Google Fonts','chronicle'); ?>  </li>
					</ul>
			</div>
			<div class="col-md-2 col-sm-6 upsell-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://weblizar.com/themes/chronicle-premium-theme/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Chronicle Premium','chronicle'); ?> </a>
			</div>
			<span class="customize-control-title"><?php _e( 'Enjoying Chronicle?', 'chronicle' ); ?></span>
			<p>
				<?php
					printf( __( 'If you Like our Products , Please do Rate us on %sWordPress.org%s?  We\'d really appreciate it!', 'chronicle' ), '<a target="" href="https://wordpress.org/support/view/theme-reviews/chronicle?filter=5">', '</a>' );
				?>
			</p>
		</label>		
		<?php
	}
}
endif;
?>