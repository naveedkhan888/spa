<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Spalisho_Elementor_Heading extends Widget_Base {

	
	public function get_name() {
		return 'spalisho_elementor_heading';
	}

	
	public function get_title() {
		return esc_html__( 'Ova Heading', 'spalisho' );
	}

	
	public function get_icon() {
		return 'eicon-heading';
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
				'template',
				[
					'label' => esc_html__( 'Template', 'spalisho' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'template_1',
					'options' => [
						'template_1' => esc_html__( 'Template 1', 'spalisho' ),
						'template_2' => esc_html__( 'Template 2', 'spalisho' ),
						'template_3' => esc_html__( 'Template 3', 'spalisho' ),
					]
				]
			);	

			$this->add_control(
				'sub_title_icon_visible',
				[
					'label' => esc_html__( 'Sub Icon Visible', 'spalisho' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'none',
					'options' => [
						'none' => esc_html__( 'None', 'spalisho' ),
						'left' => esc_html__( 'Only Left', 'spalisho' ),
						'right' => esc_html__( 'Only Right', 'spalisho' ),
						'both' => esc_html__( 'Both', 'spalisho' ),
					]
				]
			);

			$this->add_control(
				'sub_title_icon',
				[
					'label' => esc_html__( 'Sub Icon', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'flaticon flaticon-spa-2',
						'library' 	=> 'flaticon',
					],
					'condition' => [
						'sub_title_icon_visible!' => 'none'
					]
				]
			);	
			
			$this->add_control(
				'sub_title',
				[
					'label' 	=> esc_html__( 'Sub Title', 'spalisho' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> 'Sub title',
				]
			);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'spalisho' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__( 'Title', 'spalisho' ),
				]
			);

			$this->add_control(
				'description',
				[
					'label' 	=> esc_html__( 'Description', 'spalisho' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> ''
				]
			);

			$this->add_control(
				'link_address',
				[
					'label'   		=> esc_html__( 'Link', 'spalisho' ),
					'type'    		=> \Elementor\Controls_Manager::URL,
					'show_external' => false,
					'default' 		=> [
						'url' 			=> '',
						'is_external' 	=> false,
						'nofollow' 		=> false,
					],
				]
			);
			
			$this->add_control(
				'html_tag',
				[
					'label' 	=> esc_html__( 'HTML Tag', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SELECT,
					'default' 	=> 'h2',
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

			$this->add_responsive_control(
				'align_heading',
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
					'default' 	=> 'center',
					'toggle' 	=> true,
					'selectors' => [
						'{{WRAPPER}} .ova-title' => 'text-align: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'show_line',
				[
					'label' => esc_html__( 'Show Line', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'spalisho' ),
					'label_off' => esc_html__( 'Hide', 'spalisho' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);

		$this->end_controls_section();

		
		//SECTION TAB STYLE TITLE
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'spalisho' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'content_typography_title',
					'label' 	=> esc_html__( 'Typography', 'spalisho' ),
					'selector' 	=> '{{WRAPPER}} .ova-title .title',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' 	=> esc_html__( 'Color', 'spalisho' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title .title' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-title .title a' => 'color : {{VALUE}};',	
					],
				]
			);

			$this->add_control(
				'color_title_hover',
				[
					'label' 	=> esc_html__( 'Color hover', 'spalisho' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title .title a:hover' => 'color : {{VALUE}};'
					],
					
				]
			);

			$this->add_responsive_control(
				'padding_title',
				[
					'label' 	 => esc_html__( 'Padding', 'spalisho' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title .title ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_title',
				[
					'label' 	 => esc_html__( 'Margin', 'spalisho' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'color_last_text_title',
				[
					'label'	 	=> esc_html__( 'Color Last Text', 'spalisho' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title .title .last-text' => 'color : {{VALUE}};'
						
						
					],
					'condition' =>[
						'template' => 'template_2'
					],
				]
			);

		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE

		//SECTION TAB STYLE SUB TITLE
		$this->start_controls_section(
			'section_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'spalisho' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'content_typography_sub_title',
					'label' 	=> esc_html__( 'Typography', 'spalisho' ),
					'selector' 	=> '{{WRAPPER}} .ova-title h3.sub-title',
				]
			);

			$this->add_control(
				'color_sub_title',
				[
					'label'	 	=> esc_html__( 'Color', 'spalisho' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title h3.sub-title' => 'color : {{VALUE}};'
					],
				]
			);

			$this->add_control(
				'color_sub_title_icon',
				[
					'label'	 	=> esc_html__( 'Icon Color', 'spalisho' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title .sub-title-wrapper i' => 'color : {{VALUE}};'
					],
				]
			);

			$this->add_responsive_control(
				'padding_sub_title',
				[
					'label' 	 => esc_html__( 'Padding', 'spalisho' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title h3.sub-title ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_sub_title',
				[
					'label' 	 => esc_html__( 'Margin', 'spalisho' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title h3.sub-title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		$this->end_controls_section();
		//END SECTION TAB STYLE SUB TITLE

		//SECTION TAB STYLE DESCRIPTION
		$this->start_controls_section(
			'section_description',
			[
				'label' => esc_html__( 'Description', 'spalisho' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'content_typography_description',
					'label' 	=> esc_html__( 'Typography', 'spalisho' ),
					'selector' 	=> '{{WRAPPER}} .ova-title .description',
				]
			);

			$this->add_control(
				'color_description',
				[
					'label'	 	=> esc_html__( 'Color', 'spalisho' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title .description' => 'color : {{VALUE}};'		
					],
				]
			);

			$this->add_responsive_control(
				'padding_description',
				[
					'label' 	 => esc_html__( 'Padding', 'spalisho' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title .description ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_description',
				[
					'label' 	 => esc_html__( 'Margin', 'spalisho' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title .description ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		$this->end_controls_section();
		//END SECTION TAB STYLE DESCRIPTION
		
		//SECTION TAB STYLE LINE
		$this->start_controls_section(
			'section_line',
			[
				'label' => esc_html__( 'Line', 'spalisho' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_line' => 'yes',
					'title!' => ''
				],
			]
		);

			$this->add_control(
				'color_bg_line',
				[
					'label'	 	=> esc_html__( 'Background', 'spalisho' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title.line-title .title:before, .ova-title.line-title .title:after' => 'background-color : {{VALUE}};'		
					],
				]
			);

			$this->add_responsive_control(
				'color_bg_line_width',
				[
					'label' => esc_html__( 'Width', 'spalisho' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 50,
							'max' => 150,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .ova-title.line-title .title:before, .ova-title.line-title .title:after' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'color_bg_line_height',
				[
					'label' => esc_html__( 'Height', 'spalisho' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 5,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .ova-title.line-title .title:before, .ova-title.line-title .title:after' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		//END SECTION TAB STYLE LINE
		
	}

	// Render Template Here
	protected function render() {
		$settings 		= $this->get_settings();
		$template 		= $settings['template'];

		$title     		= $settings['title'];
		$sub_title 		= $settings['sub_title'];
		$description	= $settings['description']; 
		$link      		= $settings['link_address']['url'];
		$target    		= $settings['link_address']['is_external'] ? ' target="_blank"' : '';
		$html_tag  		= $settings['html_tag'];
		$show_line 		= $settings['show_line'] == 'yes' ? 'line-title' : '';

		$sub_title_icon_visible = $settings['sub_title_icon_visible'];
		$sub_title_icon 		= $settings['sub_title_icon'];

		// replace % to %% avoid printf error
		if(strpos($title, '%') !== false){
		    $title = str_replace('%', '%%', $title);
		}

		if( $template == 'template_2' ){
			$explode_fullname 	= explode(' ', $title);
			$last_name        	= $explode_fullname[count($explode_fullname) - 1];

			$replace 	= '<span class="last-text">' . $last_name .  '</span>' ;
			$title     	= str_replace( $last_name, $replace, $title ) ;
        }

		?>

		<div class="ova-title <?php echo esc_attr($template); ?> <?php echo esc_attr($show_line); ?>">

			<?php if($sub_title): ?>
				<div class="sub-title-wrapper">
					<?php if($sub_title_icon_visible == 'left' || $sub_title_icon_visible == 'both' ) {
				        \Elementor\Icons_Manager::render_icon( $sub_title_icon, [ 'aria-hidden' => 'true' ] );
					} ?>
					<h3 class="sub-title"><?php echo esc_html( $sub_title ); ?></h3>
					<?php if($sub_title_icon_visible == 'right' || $sub_title_icon_visible == 'both' ) {
				        \Elementor\Icons_Manager::render_icon( $sub_title_icon, [ 'aria-hidden' => 'true' ] );
					} ?>
				</div>
			<?php endif; ?>

			<?php if($title): ?>
				<div class="title-wrapper">
				<?php if( $link ) { ?>
				
					<<?php echo esc_attr($html_tag); ?> class="title"><a href="<?php echo esc_url( $link ); ?>"<?php printf( $target ); ?>><?php printf( $title ); ?></a>
					</<?php echo esc_attr($html_tag); ?>>

				<?php } else { ?>

					<<?php echo esc_attr($html_tag); ?> class="title"><?php printf($title);?></<?php echo esc_attr($html_tag); ?>>

				<?php } ?>
				</div>
			<?php endif; ?>

			<?php if($description): ?>
				<p class="description"><?php echo esc_html($description); ?></p>
			<?php endif; ?>

		</div>
		 	

		<?php
	}

	
}
$widgets_manager->register( new Spalisho_Elementor_Heading() );