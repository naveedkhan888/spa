<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Spalisho_Elementor_Contact_Info extends Widget_Base {

	public function get_name() {
		return 'spalisho_elementor_contact_info';
	}

	public function get_title() {
		return esc_html__( 'Contact Info', 'spalisho' );
	}

	public function get_icon() {
		return 'eicon-email-field';
	}

	public function get_categories() {
		return [ 'spalisho' ];
	}

	public function get_script_depends() {
		return [ '' ];
	}

	protected function register_controls() {

		/**
		 * Content Tab
		 */
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'spalisho' ),
				
			]
		);

			$this->add_control(
				'template',
				[
					'label' => esc_html__( 'Template', 'spalisho' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'template_1',
					'options' => [
						'template_1' => esc_html__( 'Template 1', 'spalisho' ),
						'template_2' => esc_html__( 'Template 2', 'spalisho' ),
					]
				]
			);

			$this->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'flaticon flaticon-email',
						'library' 	=> 'all',
					],
				]
			);

			$this->add_control(
				'label',
				[
					'label' => esc_html__( 'Label', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__('', 'spalisho'),
				]
			);


			$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'type',
					[
						'label' => esc_html__( 'Type', 'spalisho' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'email',
						'options' => [
							'email' => esc_html__('Email', 'spalisho'),
							'phone' => esc_html__('Phone', 'spalisho'),
							'link' => esc_html__('Link', 'spalisho'),
							'text' => esc_html__('Text', 'spalisho'),
						]
					]
				);

				$repeater->add_control(
					'email_label',
					[
						'label'   => esc_html__( 'Email Label', 'spalisho' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'email@company.com', 'spalisho' ),
						'condition' => [
							'type' => 'email',
						]

					]
				);

				$repeater->add_control(
					'email_address',
					[
						'label'   => esc_html__( 'Email Adress', 'spalisho' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'email@company.com', 'spalisho' ),
						'condition' => [
							'type' => 'email',
						]

					]
				);


				$repeater->add_control(
					'phone_label',
					[
						'label'   => esc_html__( 'Phone Label', 'spalisho' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( '+012 (345) 678', 'spalisho' ),
						'condition' => [
							'type' => 'phone',
						]

					]
				);

				$repeater->add_control(
					'phone_address',
					[
						'label'   => esc_html__( 'Phone Adress', 'spalisho' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( '+012345678', 'spalisho' ),
						'condition' => [
							'type' => 'phone',
						]

					]
				);

				$repeater->add_control(
					'link_label',
					[
						'label'   => esc_html__( 'Link Label', 'spalisho' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'https://your-domain.com', 'spalisho' ),
						'condition' => [
							'type' => 'link',
						]

					]
				);

				$repeater->add_control(
					'link_address',
					[
						'label'   => esc_html__( 'Link Adress', 'spalisho' ),
						'type'    => \Elementor\Controls_Manager::URL,
						'description' => esc_html__( 'https://your-domain.com', 'spalisho' ),
						'condition' => [
							'type' => 'link',
						],
						'show_external' => false,
						'default' => [
							'url' => '#',
							'is_external' => false,
							'nofollow' => false,
						],

					]
				);

				$repeater->add_control(
					'text_title',
					[
						'label'   => esc_html__( 'Title - Template 2', 'spalisho' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'Your Title', 'spalisho' ),
						'condition' => [
							'type' => 'text',
						]
					]
				);

				$repeater->add_control(
					'text',
					[
						'label'   => esc_html__( 'Text', 'spalisho' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'Your text', 'spalisho' ),
						'condition' => [
							'type' => 'text',
						]

					]
				);

				$this->add_control(
					'items_info',
					[
						'label'       => esc_html__( 'Items Info', 'spalisho' ),
						'type'        => Controls_Manager::REPEATER,
						'fields'      => $repeater->get_controls(),
						'default' => [
							[
								'type' => 'email',
								'email_label' => esc_html__('email@company.com', 'spalisho'),
								'email_address' => esc_html__('email@company.com', 'spalisho'),
							],
							
						],
						'title_field' => '{{{ type }}}',
					]
				);

			$this->add_responsive_control(
				'align_items',
				[
					'label' 	=> esc_html__( 'Items Alignment', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::CHOOSE,
					'options' 	=> [
						'flex-start' => [
							'title' => esc_html__( 'Top', 'spalisho' ),
							'icon' 	=> 'eicon-align-center-v',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'spalisho' ),
							'icon' 	=> 'eicon-align-center-v',
						],
						'flex-end' => [
							'title' => esc_html__( 'Bottom', 'spalisho' ),
							'icon' 	=> 'eicon-align-end-v',
						],
					],
					'toggle' 	=> true,
					'separator' => 'before',
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info' => 'align-items: {{VALUE}}',
					],
				]
			);
			

		$this->end_controls_section();

		/**
		 * Icon Style Tab
		 */
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'spalisho' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'icon_align',
				[
					'label' 	=> esc_html__( 'Alignment', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::CHOOSE,
					'options' 	=> [
						'flex-start' => [
							'title' => esc_html__( 'Start', 'spalisho' ),
							'icon' 	=> 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'spalisho' ),
							'icon' 	=> 'eicon-text-align-center',
						],
						'flex-end' => [
							'title' => esc_html__( 'End', 'spalisho' ),
							'icon' 	=> 'eicon-text-align-right',
						],
					],
					'default' 	=> 'center',
					'toggle' 	=> true,
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .icon' => 'align-items: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'icon_tranform',
				[
					'label' => esc_html__( 'Rolate', 'spalisho' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 360,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .icon' => 'transform: rotate({{SIZE}}deg);', 
						
					],
				]
			);

			$this->add_responsive_control(
				'icon_width',
				[
					'label' => esc_html__( 'Width', 'spalisho' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 15,
							'max' => 50,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
						
					],
				]
			);

			$this->add_control(
				'icon_fontsize',
				[
					'label' => esc_html__( 'Font Size', 'spalisho' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 300,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .icon' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .xp-contact-info .icon svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'spalisho' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .icon' => 'color : {{VALUE}};',
						'{{WRAPPER}} .xp-contact-info .icon svg, {{WRAPPER}} .xp-contact-info .icon svg path' => 'fill : {{VALUE}};'
					],
				]
			);

			$this->add_control(
				'icon_background',
				[
					'label' => esc_html__( 'Background', 'spalisho' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .icon' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'icon_margin',
				[
					'label' => esc_html__( 'Margin', 'spalisho' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'icon_padding',
				[
					'label' => esc_html__( 'Padding', 'spalisho' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'border_radius_icon',
				array(
					'label'      => esc_html__( 'Border Radius', 'spalisho' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .xp-contact-info .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' 		=> 'border_icon',
					'label' 	=> esc_html__( 'Border', 'spalisho' ),
					'selector' 	=> '{{WRAPPER}} .xp-contact-info .icon',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'icon_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'spalisho' ),
					'selector' => '{{WRAPPER}}  .xp-contact-info .icon',
				]
			);

		$this->end_controls_section(); // End Icon Style Tab

		/**
		 * Label Style Tab
		 */
		$this->start_controls_section(
			'section_label_style',
			[
				'label' => esc_html__( 'Label', 'spalisho' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'label!' => '',
				]
			]
		);
			
			$this->add_control(
				'label_color',
				[
					'label' => esc_html__( 'Color', 'spalisho' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .contact .label' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'label_typography',
					'selector' => '{{WRAPPER}} .xp-contact-info .contact .label',
				]
			);

			$this->add_responsive_control(
				'label_margin',
				[
					'label' => esc_html__( 'Margin', 'spalisho' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .contact .label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'align_label',
				[
					'label' 	=> esc_html__( 'Alignment', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::CHOOSE,
					'options' 	=> [
						'left' => [
							'title' => esc_html__( 'Left', 'spalisho' ),
							'icon' 	=> 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'spalisho' ),
							'icon' 	=> 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'spalisho' ),
							'icon' 	=> 'eicon-text-align-right',
						],
					],
					
					'toggle' 	=> true,
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .contact .label' => 'text-align: {{VALUE}}',
					],
				]
			);

		$this->end_controls_section(); // End Label Style Tab


		/**
		 * Info Style Tab
		 */
		$this->start_controls_section(
			'section_info_style',
			[
				'label' => esc_html__( 'Info', 'spalisho' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'contact_align_content',
				[
					'label' 	=> esc_html__( 'Alignment', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::CHOOSE,
					'options' 	=> [
						'left' => [
							'title' => esc_html__( 'Left', 'spalisho' ),
							'icon' 	=> 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'spalisho' ),
							'icon' 	=> 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'spalisho' ),
							'icon' 	=> 'eicon-text-align-right',
						],
						
					],
					'toggle' 	=> true,
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .contact .info .item ' => 'text-align: {{VALUE}};',
						'{{WRAPPER}} .xp-contact-info .contact .info .item a' => 'text-align: {{VALUE}};',
					],
					'condition' => [
						'template' => [
							'template_1'
						]
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'info_typography',
					'selector' => '{{WRAPPER}} .xp-contact-info .contact .info .item, {{WRAPPER}} .xp-contact-info .contact .info .item a',
				]
			);

			$this->add_control(
				'info_color',
				[
					'label' => esc_html__( 'Color', 'spalisho' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .contact .info .item' => 'color : {{VALUE}};',
						'{{WRAPPER}} .xp-contact-info .contact .info .item a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'info_color_hover',
				[
					'label' => esc_html__( 'Link Color hover', 'spalisho' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .contact .info .item a:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'underline_hover_color',
				[
					'label' => esc_html__( 'Underline Color hover', 'spalisho' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .contact .info .item a:before' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'info_margin',
				[
					'label' => esc_html__( 'Margin', 'spalisho' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .contact .info .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'info_padding',
				[
					'label' => esc_html__( 'Padding', 'spalisho' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info .contact .info .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		/**
		 * Contact Info Style Tab
		 */
		$this->start_controls_section(
			'section_contact_info_style',
			[
				'label' => esc_html__( 'Contact Info', 'spalisho' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'contact_info_bgcolor',
					'label' => esc_html__( 'Background', 'spalisho' ),
					'types' => [ 'classic' ],
					'selector' => '{{WRAPPER}} .xp-contact-info',
				]
			);

			$this->add_responsive_control(
				'contact_info_padding',
				[
					'label' => esc_html__( 'Padding', 'spalisho' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .xp-contact-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();

		$template 	= $settings['template'];
		$icon 		= $settings['icon'] ? $settings['icon'] : '';
		$label 		= $settings['label'] ? $settings['label'] : '';
		$items_info = $settings['items_info'];

		?>

			<div class="xp-contact-info <?php echo esc_html( $template ); ?>">
				
				<?php if( $icon['value'] ){ ?>
					<div class="icon">
						<?php 
					        \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] );
					    ?>
					</div>	
				<?php } ?>
				

				<div class="contact <?php echo esc_html( $template ); ?>">
					
					<?php if( $label ){ ?>
						<div class="label">
							<?php echo esc_html( $label ); ?>
						</div>
					<?php } ?>

					<ul class="info">
						<?php foreach( $items_info as $item ):
							$type 	= $item['type'];
						?>

							<li class="item">

								<?php switch ( $type ) {

									case 'email':

										$email_address 	= $item['email_address'];
										$email_label 	= $item['email_label'];

										if( $email_address && $email_label ){
										?>
											<a href="mailto:<?php echo esc_attr( $email_address ); ?> ">
												<?php echo esc_html( $email_label ); ?>
											</a>
										<?php
										}
										break;

									case 'phone':

										$phone_address 	= $item['phone_address'];
										$phone_label 	= $item['phone_label'];

										if( $phone_address && $phone_label ){
										?>
											<a href="tel:<?php echo esc_attr( $phone_address ); ?> ">
												<?php echo esc_html( $phone_label ); ?>
											</a>
										<?php
										}
										break;

									case 'link':

										$this->add_render_attribute( 'title' );

										$link_address 	= $item['link_address']['url'];
										$link_label 	= $item['link_label'];
										$title 			= $item['link_label'] ? $item['link_label'] : '';

										if ( ! empty( $item['link_address']['url'] ) ) {

											$this->add_link_attributes( 'url', $item['link_address'] );

											echo sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url' ), $title );

										}else{
											echo esc_html( $title );
										}
										
										break;

									case 'text':
										$text_title = $item['text_title'];

										// replace % to %% avoid printf error
										if(strpos($text_title, '%') !== false){
		                                    $text_title = str_replace('%', '%%', $text_title);
		                                }
		
										$text_desc 	= $item['text'];
										// replace % to %% avoid printf error
										if(strpos($text_desc, '%') !== false){
		                                    $text_desc = str_replace('%', '%%', $text_desc);
		                                }
									?>
										<?php if($template == 'template_1'): ?>
											<?php echo esc_html( $text_desc ); ?>
										<?php endif; ?>

										<?php if($template == 'template_2'): ?>
											<span class="title"><?php printf( $text_title ); ?></span>
											<span class="desc"><?php printf( $text_desc ); ?></span>
										<?php endif; ?>
											
										<?php
										break;
									default:
										break;
								} ?>
							</li>
							
						<?php endforeach; ?>
					</ul>

				</div>

			</div>

		<?php
	}

}


$widgets_manager->register( new Spalisho_Elementor_Contact_Info() );