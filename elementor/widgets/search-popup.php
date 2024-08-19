<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Spalisho_Elementor_Search_Popup extends Widget_Base {

	
	public function get_name() {
		return 'spalisho_elementor_search_popup';
	}

	
	public function get_title() {
		return esc_html__( 'Search Popup', 'spalisho' );
	}

	
	public function get_icon() {
		return 'eicon-search';
	}

	
	public function get_categories() {
		return [ 'spalisho' ];
	}

	public function get_script_depends() {
		return [ 'spalisho-elementor-search-popup' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		// SECTION SEARCH
		$this->start_controls_section(
			'section_search',
			[
				'label' => esc_html__( 'Search', 'spalisho' ),
			]
		);	
			
			$this->add_control(
				'color_icon_search',
				[
					'label' => __( 'Icon Color', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp_wrap_search_popup i' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'color_hover_icon_search',
				[
					'label' => __( 'Icon Hover Color', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp_wrap_search_popup i:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'background_icon_search',
				[
					'label' => __( 'Background', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp_wrap_search_popup i' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'background_icon_search_hover',
				[
					'label' => __( 'Background hover', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp_wrap_search_popup i:hover' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'icon_search_padding',
				[
					'label'      => esc_html__( 'Padding', 'spalisho' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .xp_wrap_search_popup i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .xp_wrap_search_popup i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' 		=> 'border_icon',
					'label' 	=> esc_html__( 'Border', 'spalisho' ),
					'selector' 	=> '{{WRAPPER}} .xp_wrap_search_popup',
				]
			);



			$this->add_control(
				'size_icon',
				[
					'label' => __( 'Size Icon', 'spalisho' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .xp_wrap_search_popup i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		//END SECTION SEARCH

		// SECTION SEARCH POPUP
		$this->start_controls_section(
			'section_search_POPUP',
			[
				'label' => esc_html__( 'Search popup', 'spalisho' ),
			]
		);	

			$this->add_control(
				'color_icon_search_popup',
				[
					'label' => __( 'Icon Color', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp_wrap_search_popup .xp_search_popup .container .search-form .search-submit i' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'color_hover_icon_search_popup',
				[
					'label' => __( 'Icon Hover Color', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp_wrap_search_popup .xp_search_popup .container .search-form .search-submit:hover i' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'background_icon_search_popup',
				[
					'label' => __( 'Background', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp_wrap_search_popup .xp_search_popup .container .search-form .search-submit' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'background_icon_search_hover_popup',
				[
					'label' => __( 'Background hover', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp_wrap_search_popup .xp_search_popup .container .search-form .search-submit:hover' => 'background-color: {{VALUE}}',
					],
				]
			);


		$this->end_controls_section();
		//END SECTION SEARCH POPUP

		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		?>
			<div class="xp_wrap_search_popup">
				<i class="xpicon xpicon-search"></i>
				<div class="xp_search_popup">
					<div class="search-popup__overlay"></div>
					<div class="container">
						<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ; ?>">
						        <input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search …', 'spalisho' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php esc_attr_e( 'Search for:', 'spalisho' ) ?>" />
				   			 	<button type="submit" class="search-submit">
				   			 		<i class="xpicon xpicon-search"></i>
				   			 	</button>
						</form>									
					</div>
				</div>
			</div>
		<?php
	}

	
}
$widgets_manager->register( new Spalisho_Elementor_Search_Popup() );