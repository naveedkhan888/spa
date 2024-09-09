<?php

class Spalisho_Elementor {
	
	function __construct() {
            
		// Register Header Footer Category in Pane
	    add_action( 'elementor/elements/categories_registered', array( $this, 'spalisho_add_category' ) );

	    add_action( 'elementor/frontend/after_register_scripts', array( $this, 'spalisho_enqueue_scripts' ) );
		
		add_action( 'elementor/widgets/register', array( $this, 'spalisho_include_widgets' ) );
		
		add_filter( 'elementor/controls/animations/additional_animations', array( $this, 'spalisho_add_animations'), 10 , 0 );

		add_action( 'wp_print_footer_scripts', array( $this, 'spalisho_enqueue_footer_scripts' ) );

		// load icons
		add_filter( 'elementor/icons_manager/additional_tabs', array( $this, 'spalisho_icons_filters_new' ), 9999999, 1 );

		//Add customize icon 
		add_action( 'elementor/element/icon/section_style_icon/after_section_end', array( $this, 'spalisho_icon_custom' ), 10, 2 );

		//Add icons social customize
		add_action( 'elementor/element/social-icons/section_social_hover/after_section_end', array( $this, 'spalisho_social_icons_custom' ), 10, 2 );

		//Add Icon Box customize
		add_action( 'elementor/element/icon-box/section_style_content/after_section_end', array( $this, 'spalisho_icon_box_customize' ), 10, 2 );

		//Add Accordion custom control styles
		add_action( 'elementor/element/accordion/section_toggle_style_content/after_section_end', array( $this, 'spalisho_accordion_custom' ), 10, 2 );

		//Add Text editor custom  control style
		add_action( 'elementor/element/text-editor/section_style/after_section_end', array( $this, 'spalisho_text_editor_custom' ), 10, 2 );	
	}


	// Xp accordion custom 
    function spalisho_accordion_custom( $element, $args ) {
		/** @var \Elementor\Element_Base $element */
		$element->start_controls_section(
			'xp_accordion',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Xp Accordion', 'spalisho' ),
			]
		);

		    $element->add_responsive_control(
				'accordion_content_title',
				[
					'label' 		=> esc_html__( 'Title', 'spalisho' ),
					'type' 			=> \Elementor\Controls_Manager::HEADING,
				]
			);

				$element->add_responsive_control(
					'accordion_title_margin',
					[
						'label' 		=> esc_html__( 'Margin', 'spalisho' ),
						'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', '%', 'em' ],
						'selectors' 	=> [
						'{{WRAPPER}} .elementor-accordion .elementor-tab-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$element->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'accordion_title_border',
						'label' => esc_html__( 'Border', 'spalisho' ),
						'selector' => '{{WRAPPER}} .elementor-accordion .elementor-accordion-item:not(:first-child) .elementor-tab-title',
					]
				);		   

			$element->add_responsive_control(
				'accordion_content_heading',
				[
					'label' 		=> esc_html__( 'Content', 'spalisho' ),
					'type' 			=> \Elementor\Controls_Manager::HEADING,
				]
			);

				$element->add_responsive_control(
					'accordion_content_margin',
					[
						'label' 		=> esc_html__( 'Margin', 'spalisho' ),
						'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', '%', 'em' ],
						'selectors' 	=> [
						'{{WRAPPER}} .elementor-accordion .elementor-tab-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$element->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'accordion_content_border',
						'label' => esc_html__( 'Border', 'spalisho' ),
						'selector' => '{{WRAPPER}} .elementor-accordion .elementor-accordion-item .elementor-tab-content',
					]
				);

			$element->add_responsive_control(
				'accordion_icon_heading',
				[
					'label' 		=> esc_html__( 'Icon', 'spalisho' ),
					'type' 			=> \Elementor\Controls_Manager::HEADING,
				]
			);
			
				$element->add_responsive_control(
					'accordion_icon_margin',
					[
						'label' 		=> esc_html__( 'Margin', 'spalisho' ),
						'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', '%', 'em' ],
						'selectors' 	=> [
						'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$element->add_control(
				'accordion_icon_size',
				[
					'label' => esc_html__( 'Size ', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 5,
							'max' => 20,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon' => 'font-size: {{SIZE}}{{UNIT}};',	
					],
				]
			);
			

		$element->end_controls_section();
	}  
	
	function spalisho_icon_box_customize($element, $args) {

		$element->start_controls_section(
			'xp_icon_box_customize',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Xp Icon Box', 'spalisho' ),
			]
		);

			$element->add_responsive_control(
				'xp_icon_box_margin_title',
				[
					'label' => esc_html__( 'Margin Title', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			

		$element->end_controls_section();

	}

	function spalisho_social_icons_custom ( $element, $args ) {

	$element->start_controls_section(
		'xp_social_icons',
		[
			'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
			'label' => esc_html__( 'Xp Social Icon', 'spalisho' ),
		]
	);

		$element->add_responsive_control(
            'xp_social_icons_display',
            [
                'label' 	=> esc_html__( 'Display', 'spalisho' ),
                'type' 		=> \Elementor\Controls_Manager::CHOOSE,
                'options' 	=> [
                    'inline-block' => [
                        'title' => esc_html__( 'Block', 'spalisho' ),
                        'icon' 	=> 'eicon-h-align-left',
                    ],
                    'inline-flex' => [
                        'title' => esc_html__( 'Flex', 'spalisho' ),
                        'icon' 	=> 'eicon-h-align-center',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon.elementor-social-icon' => 'display: {{VALUE}}',
                ],
            ]
        );

		$element->end_controls_section();
	}

	// text-editor custom 
    function spalisho_text_editor_custom( $element, $args ) {
		/** @var \Elementor\Element_Base $element */
		$element->start_controls_section(
			'xp_tabs',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Xp Text Editor', 'spalisho' ),
			]
		);

			$element->add_responsive_control(
				'text_margin',
				[
					'label' 		=> esc_html__( 'Margin', 'spalisho' ),
					'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$element->add_responsive_control(
		        'text_padding',
		        [
		            'label' 		=> esc_html__( 'Padding', 'spalisho' ),
		            'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
		            'size_units' 	=> [ 'px', '%', 'em' ],
		            'selectors' 	=> [
		             '{{WRAPPER}}  p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		            ],
		         ]
		    );


		$element->end_controls_section();
	}

	
	function spalisho_add_category(  ) {

	    \Elementor\Plugin::instance()->elements_manager->add_category(
	        'hf',
	        [
	            'title' => __( 'Header Footer', 'spalisho' ),
	            'icon' => 'fa fa-plug',
	        ]
	    );

	    \Elementor\Plugin::instance()->elements_manager->add_category(
	        'spalisho',
	        [
	            'title' => __( 'Spalisho', 'spalisho' ),
	            'icon' => 'fa fa-plug',
	        ]
	    );

	}

	function spalisho_enqueue_scripts(){
        
        $files = glob(get_theme_file_path('/assets/js/elementor/*.js'));
        
        foreach ($files as $file) {
            $file_name = wp_basename($file);
            $handle    = str_replace(".js", '', $file_name);
            $src       = get_theme_file_uri('/assets/js/elementor/' . $file_name);
            if (file_exists($file)) {
                wp_register_script( 'spalisho-elementor-' . $handle, $src, ['jquery'], false, true );
            }
        }


	}

	function spalisho_include_widgets( $widgets_manager ) {
        $files = glob(get_theme_file_path('elementor/widgets/*.php'));
        foreach ($files as $file) {
            $file = get_theme_file_path('elementor/widgets/' . wp_basename($file));
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }

    function spalisho_add_animations(){
    	$animations = array(
            'Spalisho' => array(
                'xp-move-up' 		=> esc_html__('Move Up', 'spalisho'),
                'xp-move-down' 	=> esc_html__( 'Move Down', 'spalisho' ),
                'xp-move-left'     => esc_html__('Move Left', 'spalisho'),
                'xp-move-right'    => esc_html__('Move Right', 'spalisho'),
                'xp-scale-up'      => esc_html__('Scale Up', 'spalisho'),
                'xp-flip'          => esc_html__('Flip', 'spalisho'),
                'xp-helix'         => esc_html__('Helix', 'spalisho'),
                'xp-popup'			=> esc_html__( 'PopUp','spalisho' )
            ),
        );

        return $animations;
    }

   

	function spalisho_enqueue_footer_scripts(){
		 // Font Icon
	    wp_enqueue_style('xpicon', SPALISHO_URI.'/assets/libs/xpicon/font/xpicon.css', array(), null);

	    // Webicon
	    wp_enqueue_style('xp-webicon', SPALISHO_URI.'/assets/libs/webicon/font/webicon.css', array(), null);

	    // Xp Spa Icon
	    wp_enqueue_style('xp-spaicon', SPALISHO_URI.'/assets/libs/xpspaicon/style.css', array(), null);
	}
	
	

	public function spalisho_icons_filters_new( $tabs = array() ) {
		$newicons = [];

		$font_data['json_url'] = SPALISHO_URI.'/assets/libs/xpicon/xpicon.json';
		$font_data['name'] = 'xpicon';

		$newicons[ $font_data['name'] ] = [
			'name'          => $font_data['name'],
			'label'         => esc_html__( 'Default', 'spalisho' ),
			'url'           => '',
			'enqueue'       => '',
			'prefix'        => 'xpicon-',
			'displayPrefix' => '',
			'ver'           => '1.0',
			'fetchJson'     => $font_data['json_url'],
		];

		// Flaticon
		$flaticon_data['json_url'] = SPALISHO_URI.'/assets/libs/webicon/webicon.json';
		$flaticon_data['name'] = 'webicon';

		$newicons[ $flaticon_data['name'] ] = [
			'name'          => $flaticon_data['name'],
			'label'         => esc_html__( 'Webicon', 'spalisho' ),
			'url'           => '',
			'enqueue'       => '',
			'prefix'        => 'webicon-',
			'displayPrefix' => '',
			'ver'           => '1.0',
			'fetchJson'     => $flaticon_data['json_url'],
		];

		// Xp Spa Icon
		$icon_data_new['json_url'] = SPALISHO_URI.'/assets/libs/xpspaicon/selection.json';
		$icon_data_new['name'] = 'icomoon';

		$newicons[ $icon_data_new['name'] ] = [
			'name'          => $icon_data_new['name'],
			'label'         => esc_html__( 'Xp Spa Icon', 'spalisho' ),
			'url'           => '',
			'enqueue'       => '',
			'prefix'        => 'icon-',
			'displayPrefix' => '',
			'ver'           => '1.0',
			'fetchJson'     => $icon_data_new['json_url'],
		];

		return array_merge( $tabs, $newicons );
	}

	public function spalisho_icon_custom($element, $args){
		$element->start_controls_section(
			'xp_icon_customize',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Xp Icon', 'spalisho' ),
			]
		);
			$element->add_control(
				'xp_icon_wrapper_line_height',
				[
					'label' => esc_html__( 'Line Height', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 1.5,
							'step' => 0.1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .elementor-icon-wrapper' => 'line-height: {{SIZE}};',	
					],
				]
			);

		$element->end_controls_section();
	}
    

}

return new Spalisho_Elementor();