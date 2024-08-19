<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Spalisho_Elementor_Icon_Box extends Widget_Base {

	public function get_name() {
		return 'spalisho_elementor_icon_box';
	}

	public function get_title() {
		return esc_html__( 'Ova Icon Box', 'spalisho' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return [ 'spalisho' ];
	}

	public function get_script_depends() {
		return [ '' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		/* Content */
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
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'template_1',
					'options' => [
						'template_1' => esc_html__( 'Template 1', 'spalisho' ),
						'template_2' => esc_html__( 'Template 2', 'spalisho' ),
					],
				]
			);

			$this->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'flaticon flaticon-stress',
						'library' => 'all',
					],
				]
			);

			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Reduce Body Stress', 'spalisho' ),
				]
			);

			$this->add_control(
				'desc',
				[
					'label' => esc_html__( 'Description', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'rows' => 3,
					'default' => esc_html__( 'Skilled therapists their hands nurturing wellness renewal opulente', 'spalisho' ),
				]
			);

		$this->end_controls_section();

		/* General */
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'General', 'spalisho' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'item_bgcolor',
				[
					'label' => esc_html__( 'Background Color', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-icon-box' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'item_border',
					'selector' => '{{WRAPPER}} .xp-icon-box:before',
				]
			);

			$this->add_responsive_control(
				'item_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .xp-icon-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'item_padding',
				[
					'label' => esc_html__( 'Padding', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .xp-icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();

		/* Icon */
		$this->start_controls_section(
				'icon_style_section',
				[
					'label' => esc_html__( 'Icon', 'spalisho' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control(
				'icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .xp-icon-box .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .xp-icon-box .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-icon-box .icon i' => 'color: {{VALUE}}',
						'{{WRAPPER}} .xp-icon-box .icon svg' => 'fill: {{VALUE}}',
					],
				]
			);

		$this->end_controls_section();

		/* Title */
		$this->start_controls_section(
				'title_style_section',
				[
					'label' => esc_html__( 'Title', 'spalisho' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control(
				'title_margin',
				[
					'label' => esc_html__( 'Margin', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .xp-icon-box .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .xp-icon-box .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-icon-box .title' => 'color: {{VALUE}}',
					],
				]
			);

		$this->end_controls_section();

		/* Description */
		$this->start_controls_section(
				'desc_style_section',
				[
					'label' => esc_html__( 'Description', 'spalisho' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control(
				'desc_margin',
				[
					'label' => esc_html__( 'Margin', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .xp-icon-box .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'selector' => '{{WRAPPER}} .xp-icon-box .desc',
				]
			);

			$this->add_control(
				'desc_color',
				[
					'label' => esc_html__( 'Color', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-icon-box .desc' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'desc_border',
					'selector' => '{{WRAPPER}} .xp-icon-box .desc',
				]
			);

		$this->end_controls_section();
	}

	// Render Template Here
	protected function render() {
		$settings 	= $this->get_settings();

		$template 	= $settings['template'];
		$icon 		= $settings['icon'];
		$title 		= $settings['title'];
		$desc 		= $settings['desc'];

		?>

		<div class="xp-icon-box <?php echo esc_attr( $template ); ?>">

			<?php if ( $template == 'template_2' ): ?>
				<div class="icon">
					<?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] ); ?>
				</div>
			<?php endif; ?>

			<div class="info">

				<?php if ( $template == 'template_1' ): ?>
					<div class="icon">
						<?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] ); ?>
					</div>
				<?php endif; ?>

				<h3 class="title"><?php echo esc_html( $title ); ?></h3>
			</div>

			<?php if ( $desc ): ?>
				<p class="desc">
					<?php echo esc_html( $desc ); ?>
				</p>
			<?php endif; ?>

			<?php if ( $template == 'template_2' ): ?>
				<div class="icon-arrow">
					<i aria-hidden="true" class="fas fa-arrow-right"></i>
				</div>
			<?php endif; ?>

		</div>

		<?php
	}

	
}
$widgets_manager->register( new Spalisho_Elementor_Icon_Box() );