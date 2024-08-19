<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Spalisho_Elementor_Before_After extends Widget_Base {

	public function get_name() {
		return 'spalisho_elementor_before_after';
	}

	public function get_title() {
		return esc_html__( 'Before After', 'spalisho' );
	}

	public function get_icon() {
		return 'eicon-image-before-after';
	}

	public function get_categories() {
		return [ 'spalisho' ];
	}

	public function get_script_depends() {
		return [ 'spalisho-elementor-before-after' ];
	}

	protected function register_controls() {


		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'spalisho' ),
			]
		);

			$this->add_control(
				'image_before',
				[
					'label'   => esc_html__( 'Before Image', 'spalisho' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_control(
				'image_after',
				[
					'label'   => esc_html__( 'After Image', 'spalisho' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_responsive_control(
				'image_height',
				[
					'label' 		=> esc_html__( 'Height', 'spalisho' ),
					'type' 			=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' 	=> 300,
							'max' 	=> 1000,
							'step' 	=> 10,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .xp_before_after #comparison' => 'height: {{SIZE}}{{UNIT}}',
					],
				]
			);


		$this->end_controls_section();
	
	}

	protected function render() {

		$settings = $this->get_settings();	

		?>

			<div class='ova_before_after'>

				<div id="comparison">
					<figure style="background-image: url(<?php echo esc_attr($settings['image_after']['url'])?>);">
						<div id="handle">
							<i aria-hidden="true" class="flaticon flaticon-caret-right left"></i>
							<i aria-hidden="true" class="flaticon flaticon-caret-right"></i>
						</div>
						<div id="divisor" style="background-image: url(<?php echo esc_attr($settings['image_before']['url'])?>);"></div>
					</figure>
					<input type="range" min="0" max="100" value="50" id="slider">
				</div>

			</div>

		<?php
	}

}

$widgets_manager->register( new Spalisho_Elementor_Before_After() );