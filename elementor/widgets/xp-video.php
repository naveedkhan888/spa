<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Spalisho_Elementor_Ova_Video extends Widget_Base {

	
	public function get_name() {
		return 'spalisho_elementor_ova_video';
	}

	
	public function get_title() {
		return esc_html__( 'Ova Video', 'spalisho' );
	}

	
	public function get_icon() {
		return 'eicon-play-o';
	}

	
	public function get_categories() {
		return [ 'spalisho' ];
	}

	public function get_script_depends() {
		return [ 'spalisho-elementor-ova-video' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'spalisho' ),
			]
		);	
			
			
			$this->add_control(
				'version',
				[
					'label' => esc_html__( 'Version', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'version_1',
					'options' => [
						'version_1' => esc_html__( 'Version 1', 'spalisho' ),
						'version_2' => esc_html__( 'Version 2', 'spalisho' ),
					]
				]
			);

			$this->add_control(
				'ova_image',
				[
					'label' => esc_html__( 'Choose Image Background', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' =>[
						'version' => 'version_2'
					],
				]
			);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'spalisho' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__( 'Place of beauty', 'spalisho' ),
					'rows'      => 4
				]
			);

			$this->add_control(
				'title_font_family',
				[
					'label' 	=> esc_html__( 'Font Family', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::FONT,
					'default' 	=> "Parisienne",
					'selectors' => [
						'{{WRAPPER}} .xp-video .title' => 'font-family: {{VALUE}}',
					],
				]
			);

			$this->add_control(
	            'title_color',
	            [
	                'label' 	=> esc_html__( 'Title Color', 'spalisho' ),
	                'type' 		=> \Elementor\Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .xp-video .title' => 'color: {{VALUE}};',
	                ],
	            ]
	        );

			$this->add_control(
				'html_tag',
				[
					'label' 	=> esc_html__( 'HTML Tag', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SELECT,
					'default' 	=> 'h3',
					'options' 	=> [
						'h1' 		=> esc_html__( 'H1', 'spalisho' ),
						'h2'  		=> esc_html__( 'H2', 'spalisho' ),
						'h3'  		=> esc_html__( 'H3', 'spalisho' ),
						'h4' 		=> esc_html__( 'H4', 'spalisho' ),
						'h5' 		=> esc_html__( 'H5', 'spalisho' ),
						'h6' 		=> esc_html__( 'H6', 'spalisho' ),
						'div' 		=> esc_html__( 'Div', 'spalisho' ),
						'span' 		=> esc_html__( 'span', 'spalisho' ),
						'p' 		=> esc_html__( 'p', 'spalisho' ),
					],
				]
			);

			$this->add_control(
				'icon_class',
				[
					'label' 	=> esc_html__( 'Icon Class', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::TEXT,
					'default' 	=> 'flaticon flaticon-play',
				]
			);


			$this->add_control(
				'icon_url_video',
				[
					'label' 	=> esc_html__( 'URL Video', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::TEXT,
					'placeholder' 	=> esc_html__( 'Enter your URL', 'spalisho' ) . ' (YouTube)',
					'default' 		=> 'https://www.youtube.com/watch?v=XHOmBV4js_E',
				]
			);

			$this->add_control(
	            'link',
	            [
	                'label' 	=> esc_html__( 'Link', 'spalisho' ),
	                'type' 		=> \Elementor\Controls_Manager::URL,
	                'dynamic' 	=> [
	                    'active' => true,
	                ],
	                'condition' => [
	                	'icon_url_video' => '',
	                ],
	            ]
	        );

	        $this->add_control(
				'video_options',
				[
					'label' 	=> esc_html__( 'Video Options', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'autoplay_video',
				[
					'label' 	=> esc_html__( 'Autoplay', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'spalisho' ),
					'label_off' => esc_html__( 'No', 'spalisho' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'mute_video',
				[
					'label' 	=> esc_html__( 'Mute', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'spalisho' ),
					'label_off' => esc_html__( 'No', 'spalisho' ),
					'default' 	=> 'no',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'loop_video',
				[
					'label' 	=> esc_html__( 'Loop', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'spalisho' ),
					'label_off' => esc_html__( 'No', 'spalisho' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'player_controls_video',
				[
					'label' 	=> esc_html__( 'Player Controls', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'spalisho' ),
					'label_off' => esc_html__( 'No', 'spalisho' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'modest_branding_video',
				[
					'label' 	=> esc_html__( 'Modest Branding', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'spalisho' ),
					'label_off' => esc_html__( 'No', 'spalisho' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'show_info_video',
				[
					'label' 	=> esc_html__( 'Show Info', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'spalisho' ),
					'label_off' => esc_html__( 'No', 'spalisho' ),
					'default' 	=> 'no',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

		$this->end_controls_section();
		
		/* Begin section Image style */
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => esc_html__( 'Image', 'spalisho' ),
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'condition' =>[
					'version' => 'version_2'
				],
			]
		);
			$this->add_responsive_control(
				'image_min_height',
				[
					'label' 	=> esc_html__( 'Min Height', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 550,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .xp-video.version_2 .xp-img img' => 'min-height: {{SIZE}}{{UNIT}};max-height: {{SIZE}}{{UNIT}};',
					],

				]
			);

		$this->end_controls_section();

		/* Begin section icon style */
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'spalisho' ),
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'icon_width',
				[
					'label' 	=> esc_html__( 'Width', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 400,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .xp-video .icon-content-view .content' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);

			$this->add_responsive_control(
				'icon_height',
				[
					'label' 	=> esc_html__( 'Height', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 400,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .xp-video .icon-content-view .content' => 'height: {{SIZE}}{{UNIT}}; min-height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'icon_typography',
					'selector' 	=> '{{WRAPPER}} .xp-video .icon-content-view .content i',
				]
			);

			$this->start_controls_tabs( 'tabs_icon_style' );
				$this->start_controls_tab(
		            'tab_icon_normal',
		            [
		                'label' => esc_html__( 'Normal', 'spalisho' ),
		            ]
		        );

		        	$this->add_control(
			            'icon_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'spalisho' ),
			                'type' 		=> \Elementor\Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .xp-video .icon-content-view .content i' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

			        $this->add_control(
			            'icon_background_normal',
			            [
			                'label' 	=> esc_html__( 'Background', 'spalisho' ),
			                'type' 		=> \Elementor\Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .xp-video .icon-content-view .content' => 'background-color: {{VALUE}};',
			                ],
			            ]
			        );

			        $this->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' 		=> 'icon_bg_gradient_normal',
							'label' 	=> esc_html__( 'Background Gradient', 'spalisho' ),
							'types' 	=> [ 'gradient' ],
							'selector' 	=> '{{WRAPPER}} .xp-video .icon-content-view .content',
						]
					);

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_icon_hover',
		            [
		                'label' => esc_html__( 'Hover', 'spalisho' ),
		            ]
		        );

		        	$this->add_control(
			            'icon_color_hover',
			            [
			                'label' 	=> esc_html__( 'Color', 'spalisho' ),
			                'type' 		=> \Elementor\Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .xp-video .icon-content-view .content:hover i' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

		        	$this->add_control(
			            'icon_background_hover',
			            [
			                'label' 	=> esc_html__( 'Background', 'spalisho' ),
			                'type' 		=> \Elementor\Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .xp-video .icon-content-view .content:hover' => 'background-color: {{VALUE}};',
			                ],     
			            ]
			        );

			        $this->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' 		=> 'icon_bg_gradient_hover',
							'label' 	=> esc_html__( 'Background Gradient', 'spalisho' ),
							'types' 	=> [ 'gradient' ],
							'selector' 	=> '{{WRAPPER}} .xp-video .icon-content-view .content:hover',
						]
					);

					$this->add_control(
			            'icon_border_color_hover',
			            [
			                'label' 	=> esc_html__( 'Border', 'spalisho' ),
			                'type' 		=> \Elementor\Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .xp-video .icon-content-view .content:hover' => 'border-color: {{VALUE}};',
			                ],     
			            ]
			        );

		        $this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_group_control(
	            \Elementor\Group_Control_Border::get_type(), [
	                'name' 		=> 'icon_before_border',
	                'selector' 	=> '{{WRAPPER}} .xp-video .icon-content-view .content',
	                'separator' => 'before',  
	            ]
	        );

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' 		=> 'icon_box_shadow',
					'label' 	=> esc_html__( 'Box Shadow', 'spalisho' ),
					'selector' 	=> '{{WRAPPER}} .xp-video .icon-content-view .content',
				]
			);

			 $this->add_responsive_control(
	            'content_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'spalisho' ),
	                'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .xp-video .icon-content-view .content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );	

	        $this->add_responsive_control(
	            'content_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'spalisho' ),
	                'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .xp-video .icon-content-view .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );		

	    $this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings 	= $this->get_settings();
		$version  	= $settings['version'];

		$icon_class = $settings['icon_class'];
		$url_video 	= $settings['icon_url_video'];
		$link 		= $settings['link']['url'];
		$tg_blank 	= '';

		if ( $settings['link']['is_external'] == 'on' ) {
			$tg_blank = 'target="_blank"';
		}

		if ( ! $link ) {
			$url = $link;
		}

		$autoplay 	= $settings['autoplay_video'];
		$mute 		= $settings['mute_video'];
		$loop 		= $settings['loop_video'];
		$controls 	= $settings['player_controls_video'];
		$modest 	= $settings['modest_branding_video'];
		$show_info 	= $settings['show_info_video'];

		//version 2
		$title     		= $settings['title'];
		$html_tag  		= $settings['html_tag'];
		$image 			= $settings['ova_image']['url'];
		$alt 	    	= isset( $settings['ova_image']['alt'] ) ? $settings['ova_image']['alt'] : '';
		?>
         
        <div class="xp-video <?php echo esc_html($version); ?>">

         	<div class="xp-img">
				<?php if( $version == 'version_2'): ?>
			 		<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_html( $alt );  ?>">
			 	<?php endif; ?>

			 	<div class="icon-content-view video_active">
					<?php if ( ! empty( $url_video ) ) : ?>
						<div class="content video-btn" 
								data-src="<?php echo esc_url( $url_video ); ?>" 
								data-autoplay="<?php echo esc_attr( $autoplay ); ?>" 
								data-mute="<?php echo esc_attr( $mute ); ?>" 
								data-loop="<?php echo esc_attr( $loop ); ?>" 
								data-controls="<?php echo esc_attr( $controls ); ?>" 
								data-modest="<?php echo esc_attr( $modest ); ?>" 
								data-show_info="<?php echo esc_attr( $show_info ); ?> 
								">
							<i class="<?php echo esc_attr( $icon_class ); ?>"></i>
						</div>
					<?php else: ?>
						<div class="content">
							<i class="<?php echo esc_attr( $icon_class ); ?>"></i>
						</div>
					<?php endif; ?>
				</div>

				<?php if($title): ?>
					<<?php echo esc_attr($html_tag); ?> class="title">
						<?php echo esc_html($title); ?>								 
					</<?php echo esc_attr($html_tag); ?>>
				<?php endif; ?>
			</div>

			<div class="modal-container">
				<div class="modal">
					<i class="xpicon-cancel"></i>
					<iframe class="modal-video" allow="autoplay" allowFullScreen="allowFullScreen" frameBorder="0"></iframe>
				</div>
			</div>

		</div>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Spalisho_Elementor_Ova_Video() );