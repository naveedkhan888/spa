<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Spalisho_Elementor_Canvas_Menu extends Widget_Base {

	public function get_name() {
		return 'spalisho_elementor_menu_canvas';
	}

	public function get_title() {
		return esc_html__( 'Menu Canvas', 'spalisho' );
	}

	public function get_icon() {
		return 'eicon-menu-bar';
	}

	public function get_categories() {
		return [ 'hf' ];
	}

	public function get_script_depends() {
		return [ 'spalisho-elementor-menu-canvas' ];
	}
	

	protected function register_controls() {


		/* Global Section *******************************/
		/***********************************************/
		$this->start_controls_section(
			'section_menu_type',
			[
				'label' => esc_html__( 'Global', 'spalisho' ),
			]
		);


			$menus = \wp_get_nav_menus();
			$list_menu = array();
			foreach ($menus as $menu) {
				$list_menu[$menu->slug] = $menu->name;
			}

			$this->add_control(
				'menu_slug',
				[
					'label' => esc_html__( 'Select Menu', 'spalisho' ),
					'type' => Controls_Manager::SELECT,
					'options' => $list_menu,
					'default' => '',
					'prefix_class' => 'elementor-view-',
				]
			);

			$this->add_control(
				'menu_dir',
				[
					'label' => esc_html__( 'Menu Direction', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'dir_left' => [
							'title' => esc_html__( 'Left', 'spalisho' ),
							'icon' => 'eicon-h-align-left',
						],
						'dir_right' => [
							'title' => esc_html__( 'Right', 'spalisho' ),
							'icon' => 'eicon-h-align-right',
						],
					],
					'default' => 'dir_left'
				]
			);

			$this->add_control(
				'show_button',
				[
					'label' 		=> __( 'Show Button', 'spalisho' ),
					'type' 			=> \Elementor\Controls_Manager::SWITCHER,
					'label_on' 		=> __( 'Show', 'spalisho' ),
					'label_off' 	=> __( 'Hide', 'spalisho' ),
					'default' 		=> 'no',
				]
			);

			$this->add_control(
				'link_button',
				[
					'label'   => esc_html__( 'Link Button', 'spalisho' ),
					'type'    => \Elementor\Controls_Manager::URL,
					'description' => esc_html__( 'https://your-domain.com', 'spalisho' ),
					'show_external' => false,
					'default' => [
						'url' => '#',
						'is_external' => false,
						'nofollow' => false,
					],
					'condition' => [
						'show_button' => 'yes'
					]
				]
			);

			$this->add_control(
				'text_button',
				[
					'label' 	=> esc_html__( 'Text Button', 'spalisho' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' => esc_html__('Book Now','spalisho'),
					'condition' => [
						'show_button' => 'yes'
					]
				]
			);
			
		$this->end_controls_section();	


		/* Style Section *******************************/
		/***********************************************/
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Style', 'spalisho' ),
			]
		);
			
			
			// Background Button
			$this->add_control(
				'btn_color',
				[
					'label' => esc_html__( 'Button', 'spalisho' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .menu-toggle:before' => 'background-color: {{VALUE}};',
						'{{WRAPPER}} .menu-toggle span:before' => 'background-color: {{VALUE}};',
						'{{WRAPPER}} .menu-toggle:after' => 'background-color: {{VALUE}};',
					]
				]
			);

			// Background Menu
			$this->add_control(
				'bg_color',
				[
					'label' => esc_html__( 'Menu Background', 'spalisho' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .container-menu' => 'background-color: {{VALUE}};',
					],
					'separator' => 'before'
				]
			);

			// Typography Menu Item
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography',
					'selector'	=> '{{WRAPPER}} ul li a'
				]
			);

			// Control Tabs
			$this->start_controls_tabs(
				'style_tabs_text'
			);

				// Normal Tab
				$this->start_controls_tab(
					'style_normal_tab_text',
					[
						'label' => esc_html__( 'Normal', 'spalisho' ),
					]
				);
			
					$this->add_control(
						'text_color',
						[
							'label' => esc_html__( 'Menu Color', 'spalisho' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul li a' => 'color: {{VALUE}};',
							]
						]
					);

				$this->end_controls_tab();


				// Hover Tab
				$this->start_controls_tab(
					'style_hover_tab_text',
					[
						'label' => esc_html__( 'Hover', 'spalisho' ),
					]
				);

					$this->add_control(
						'text_color_hover',
						[
							'label' => esc_html__( 'Menu Color', 'spalisho' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul li a:hover' => 'color: {{VALUE}};',
							]
							
						]
					);

				$this->end_controls_tab();
				

				// Active Tab
				$this->start_controls_tab(
					'style_active_tab_text',
					[
						'label' => esc_html__( 'Active', 'spalisho' ),
					]
				);

					$this->add_control(
						'text_color_active',
						[
							'label' => esc_html__( 'Menu Color', 'spalisho' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul li.current-menu-item > a' => 'color: {{VALUE}};',
								'{{WRAPPER}} ul li.current-menu-ancestor > a' => 'color: {{VALUE}};',
								'{{WRAPPER}} ul li.current-menu-parent > a' => 'color: {{VALUE}};',
							]
							
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();	
			

		$this->end_controls_section();
		
	}

	
	protected function render() {
		
		$settings = $this->get_settings();

		$show_button = $settings['show_button'];
		$link_button = isset($settings['link_button']['url']) ? $settings['link_button']['url'] : '';
		$text_button = isset($settings['text_button']) ? $settings['text_button'] : '' ;

		$target      = ( isset( $settings['link_button']['is_external'] ) && $settings['link_button']['is_external'] !== '' ) ? 'target=_blank' : 'target=_self';
		
		?>

		<nav class="menu-canvas">
            <button class="menu-toggle">
            	<span></span>
            </button>
            <nav class="container-menu <?php echo  esc_attr( $settings['menu_dir'] ); ?>" >
	            <div class="close-menu">
	            	<i class="xpicon-cancel"></i>
	            </div>
				<?php
					wp_nav_menu( [
						'theme_location'  => $settings['menu_slug'],
						'container_class' => 'primary-navigation',
						'menu'            => $settings['menu_slug'],
					] );
				?>
				<?php if( $show_button == "yes" ) : ?>
					<div class="menu-button">
						<a class="book-a-table" href="<?php echo esc_url($link_button);?>" <?php echo esc_attr( $target ) ;?>>
							<?php echo esc_html($text_button);?>
						</a>
					</div>
				<?php endif;?>
			</nav>
			<div class="site-overlay"></div>
        </nav>
		

	<?php }
	
}


$widgets_manager->register( new Spalisho_Elementor_Canvas_Menu() );


