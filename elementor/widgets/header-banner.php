<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Mellis_Elementor_Header_Banner extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'mellis_elementor_header_banner';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Header Banner', 'mellis' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'hf' ];
	}

	

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'mellis' ),
			]
		);

			
			$this->add_control(
				'header_boxed_content',
				[
					'label'        => esc_html__( 'Display Boxed Content', 'mellis' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'no'
				]
			);

			$this->add_control(
				'header_bg_source',
				[
					'label'        => esc_html__( 'Display Background by Feature Image in Post/Page', 'mellis' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'no'
				]
			);


			// Background Color
			$this->add_control(
				'cover_color',
				[
					'label' => esc_html__( 'Background Cover Color', 'mellis' ),
					'type' => Controls_Manager::COLOR,
					'default' => 'rgba(0,0,0,0.51)',
					'description' => esc_html__( 'You can add background image in Advanced Tab', 'mellis' ),
					'selectors' => [
						'{{WRAPPER}} .cover_color' => 'background-color: {{VALUE}};',
					],
					'separator' => 'after'
				]
			);

			// Title
			$this->add_control(
				'show_title',
				[
					'label'        => esc_html__( 'Show Title', 'mellis' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'yes',
					'selector'	=> '{{WRAPPER}} .header_banner_el .header_title',
				]
			);
			
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Title Color', 'mellis' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#343434',
					'selectors' => [
						'{{WRAPPER}} .header_banner_el .header_title' => 'color: {{VALUE}};',
					]
				]
			);

			$this->add_responsive_control(
				'title_padding',
				[
					'label' => esc_html__( 'Title Padding', 'mellis' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .header_banner_el .header_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'title_tag',
				[
					'label' => esc_html__( 'Choose Title Format', 'mellis' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'h1' => esc_html__('H1', 'mellis'),
						'h2' => esc_html__('H2', 'mellis'),
						'h3' => esc_html__('H3', 'mellis'),
						'h4' => esc_html__('H4', 'mellis'),
						'h5' => esc_html__('H5', 'mellis'),
						'h6' => esc_html__('H6', 'mellis'),
						'div' => esc_html__('DIV', 'mellis'),
					],
					'default' => 'h1'
				]
			);

			

			

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'header_title',
					'label' => esc_html__( 'Title Typo', 'mellis' ),
					'selector'	=> '{{WRAPPER}} .header_banner_el .header_title'
				]
			);


			// Breadcrumbs
			$this->add_control(
				'show_breadcrumbs',
				[
					'label'        => esc_html__( 'Show Breadcrumbs', 'mellis' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'yes',
					'selector'	=> '{{WRAPPER}} .header_breadcrumbs',
					'separator' => 'before'
				]
			);
			
			$this->add_control(
				'breadcrumbs_color',
				[
					'label' => esc_html__( 'Breadcrumbs Color', 'mellis' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#343434',
					'selectors' => [
						'{{WRAPPER}} .header_banner_el ul.breadcrumb li' => 'color: {{VALUE}};',
						'{{WRAPPER}} .header_banner_el ul.breadcrumb li a' => 'color: {{VALUE}};',
						'{{WRAPPER}} .header_banner_el ul.breadcrumb a' => 'color: {{VALUE}};',
						'{{WRAPPER}} .header_banner_el ul.breadcrumb li .separator i' => 'color: {{VALUE}};',
					]
				]
			);

			$this->add_control(
				'breadcrumbs_color_hover',
				[
					'label' => esc_html__( 'Breadcrumbs Color hover', 'mellis' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#343434',
					'selectors' => [
						'{{WRAPPER}} .header_banner_el ul.breadcrumb li a:hover' => 'color: {{VALUE}};',
					]
				]
			);

			

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'header_breadcrumbs_typo',
					'label' => esc_html__( 'Breadcrumbs Typography', 'mellis' ),
					'selector'	=> '{{WRAPPER}} .header_banner_el ul.breadcrumb li'
				]
			);

			$this->add_responsive_control(
				'breadcrumbs_padding',
				[
					'label' => esc_html__( 'Breadcrumbs Padding', 'mellis' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .header_banner_el .header_breadcrumbs' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			


			// Style
			$this->add_responsive_control(
				'align',
				[
					'label' => esc_html__( 'Alignment', 'mellis' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'mellis' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'mellis' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'mellis' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .wrap_header_banner' => 'text-align: {{VALUE}};',
						'{{WRAPPER}} .wrap_header_banner ul.breadcrumb' => 'width: auto; display: initial;'
					],
					'default'	=> 'center',
					'separator' => 'before'
				]
			);
			

			$this->add_control(
				'class',
				[
					'label' => esc_html__( 'Class', 'mellis' ),
					'type' => Controls_Manager::TEXT,
				]
			);

		$this->end_controls_section();

		
	}



	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();

		$class_bg = $attr_style = '';
		if( $settings['header_bg_source'] == 'yes' ){
			$current_id = mellis_get_current_id();
			$header_bg_source =  get_the_post_thumbnail_url( $current_id, 'full' );	
			$class_bg = 'bg_feature_img';
			$attr_style = 'style="background: url( '.$header_bg_source.' )" ';
		}

		$align = isset( $settings['align'] ) ? $settings['align'] : '';

		 ?>
		 	<!-- Display when you choose background per Post -->
		 	<div class="wrap_header_banner <?php echo esc_attr($class_bg).' '.$align; ?> " <?php printf( '%s', $attr_style ); ?> >

		 		<?php if( $settings['header_boxed_content'] == 'yes' ){ ?><div class="row_site"><div class="container_site"><?php } ?>
			 	
				 	<div class="cover_color"></div>

					<div class="header_banner_el <?php echo esc_attr( $settings['class'] ); ?>">
						
						<?php if( $settings['show_breadcrumbs'] == 'yes' ){ ?>
							<div class="header_breadcrumbs">
								<?php echo get_template_part( 'template-parts/parts/breadcrumbs' ); ?>
							</div>
						<?php } ?>

						<?php if( $settings['show_title'] == 'yes' ){ ?>
							
							<?php add_filter( 'mellis_show_singular_title', '__return_false' ); ?>

							<?php $title_tag = $settings['title_tag']; ?>
							<<?php echo esc_html( $title_tag ); ?> class=" header_title">
								<?php echo get_template_part( 'template-parts/parts/breadcrumbs_title' ); ?>
							</<?php echo esc_html( $title_tag ); ?>>
								
						<?php } ?>

					</div>

				<?php if( $settings['header_boxed_content'] == 'yes' ){ ?> </div></div> <?php } ?>

			</div>
		<?php
	}

	
}
$widgets_manager->register( new Mellis_Elementor_Header_Banner() );