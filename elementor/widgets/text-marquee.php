<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Spalisho_Elementor_Text_Marquee extends Widget_Base {

	public function get_name() {
		return 'spalisho_elementor_text_marquee';
	}

	public function get_title() {
		return esc_html__( 'Text Marquee', 'spalisho' );
	}

	public function get_icon() {
		return 'eicon-animation-text';
	}

	public function get_categories() {
		return [ 'spalisho' ];
	}

	public function get_script_depends() {
		return [ '' ];
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
				'icon',
				[
					'label' => esc_html__( 'Icon', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'flaticon flaticon-flower',
						'library' => 'flaticon',
					],
				]
			);
			
			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'text',
				[
					'label' => esc_html__( 'Text', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Your Text' , 'spalisho' ),
					'show_label' => true,
				]
			);

			$repeater->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_content',
					'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
				]
			);

			$repeater->add_control(
				'color',
				[
					'label' => esc_html__( 'Color', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'items',
				[
					'label' => esc_html__( 'Items', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'text' => esc_html__( '100% Natural & Paraben-Free','spalisho' ),
						],
						[
							'text' => esc_html__( 'Get 20% Off For Your First Order','spalisho' ),
						],
						[
							'text' => esc_html__( 'No Artificial Fragrances', 'spalisho' ),
						],
						[
							'text' => esc_html__( 'Completely Aluminum Free', 'spalisho' ),
						],
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'general_section_style',
			[
				'label' => esc_html__( 'General', 'spalisho' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'general_background',
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .xp-text-marquee',
				]
			);

			$this->add_responsive_control(
				'general_opacity',
				[
					'label' => esc_html__( 'Opacity', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0.1,
							'max' => 1,
							'step' => 0.1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .xp-text-marquee' => 'opacity: {{SIZE}};',
					],
				]
			);

			$this->add_responsive_control(
				'general_padding',
				[
					'label' => esc_html__( 'Padding', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem' ],
					'selectors' => [
						'{{WRAPPER}} .xp-text-marquee' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_section_style',
			[
				'label' => esc_html__( 'Icon', 'spalisho' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'icon_size',
				[
					'label' => esc_html__( 'Size', 'spalisho' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 100,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .xp-text-marquee .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .xp-text-marquee .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'spalisho' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-text-marquee .icon i' => 'color : {{VALUE}};',
						'{{WRAPPER}} .xp-text-marquee .icon svg path' => 'fill : {{VALUE}};'
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
					   '{{WRAPPER}} .xp-text-marquee .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'text_section_style',
			[
				'label' => esc_html__( 'Text', 'spalisho' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'content_typography',
					'selector' => '{{WRAPPER}} .xp-text-marquee .content .text',
				]
			);

			$this->add_control(
				'text_color',
				[
					'label' => esc_html__( 'Color', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-text-marquee .content .text' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'text_wrapper_width',
				[
					'label' => esc_html__( 'Width (%)', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ '%' ],
					'range' => [
						'%' => [
							'min' => 150,
							'max' => 700,
						]
					],
					'default' => [
						'unit' => '%',
					],
					'selectors' => [
						'{{WRAPPER}} .xp-text-marquee .content-wrapper' => 'width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .xp-text-marquee .content-wrapper-2' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'space_between',
				[
					'label' => esc_html__( 'Space Between', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em', 'rem' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .xp-text-marquee .spacing' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'time_duration',
				[
					'label' => esc_html__( 'Time Duration', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'normal',
					'options' => [
						'slow' => esc_html__( 'Slow', 'spalisho' ),
						'normal' => esc_html__( 'Normal', 'spalisho' ),
						'fast' => esc_html__( 'Fast', 'spalisho' ),
					],
				]
			);

			$this->add_control(
				'direction',
				[
					'label' => esc_html__( 'Direction', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'rtl',
					'options' => [
						'ltr' => esc_html__( 'Left to Right', 'spalisho' ),
						'rtl' => esc_html__( 'Right to Left', 'spalisho' ),
					],
				]
			);

		$this->end_controls_section();
	}

	// Render Template Here
	protected function render() {
		$settings = $this->get_settings();

		$items 			= $settings['items'];
		$direction 		= $settings['direction'];
		$time_duration  = $settings['time_duration'];	

		?>

			<div class="xp-text-marquee duration-<?php echo esc_attr($time_duration); ?> direction-<?php echo esc_attr($direction); ?>">

				<?php if( is_array($items) && $items ) : ?>

					<div class="content content-wrapper">

					  	<?php foreach($items as $item) { 
							$item_id  = 'elementor-repeater-item-' . $item['_id'];
							$text  	  =  $item['text'];
						?>

							<span class="icon">
								<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
							</span>

							<span class="text <?php echo esc_attr( $item_id ); ?>">
								<?php echo esc_html( $text ) . ' '; ?>	
							</span>

						<?php } ?>													

					</div>

					<div class="spacing"></div>

					<div class="content content-wrapper-2">

					  	<?php foreach($items as $item) { 
							$item_id  = 'elementor-repeater-item-' . $item['_id'];
							$text  	  =  $item['text'];
						?>
							<span class="icon">
								<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
							</span>

							<span class="text <?php echo esc_attr( $item_id ); ?>">
								<?php echo esc_html( $text ) . ' '; ?>	
							</span>

						<?php } ?>											

					</div>

				<?php endif; ?>

			</div>

		<?php
	}

	
}
$widgets_manager->register( new Spalisho_Elementor_Text_Marquee() );