<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Spalisho_Elementor_Icon_List extends Widget_Base {

	public function get_name() {
		return 'spalisho_elementor_icon_list';
	}

	public function get_title() {
		return esc_html__( 'Xp Icon List', 'spalisho' );
	}

	public function get_icon() {
		return 'eicon-bullet-list';
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
			
			// Add Class control

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'spalisho' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-check',
						'library' => 'all',
					],
				]
			);

			$repeater->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'spalisho' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('Quality Products', 'spalisho' ),
				]
			);

            $repeater->add_control(
				'desc',
				[
					'label' 		=> esc_html__( 'Description', 'spalisho' ),
					'type' 			=> Controls_Manager::TEXTAREA,
					'default' 		=> esc_html__('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam aperiam', 'spalisho' ),
				]
			);

			$repeater->add_control(
				'active_mode',
				[
					'label' 	=> esc_html__( 'Active', 'spalisho' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'spalisho' ),
					'label_off' => esc_html__( 'No', 'spalisho' ),
					'default' 	=> 'no',
				]
			);

			$this->add_control(
				'ico_items',
				[
					'label' 	=> esc_html__( 'Items', 'spalisho' ),
					'type' 		=> Controls_Manager::REPEATER,
					'fields' 	=> $repeater->get_controls(),
					'default' 	=> [
						[
							'title' 	=> esc_html__( 'Quality Products', 'spalisho' ),
							'active_mode' => 'no',
						],
						[
							'title' 	=> esc_html__( 'Best Pricing & 100% Organic', 'spalisho' ),
							'active_mode' => 'yes',
						],
						[
							'title' 	=> esc_html__( 'Professional & Expert Staff', 'spalisho' ),
							'active_mode' => 'no',
						],
					
					],
					'title_field' => '{{{ title }}}',
				]
			);

			$this->add_control(
				'show_line_before',
				[
					'label' 	=> esc_html__( 'Line Before', 'spalisho' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Show', 'spalisho' ),
					'label_off' => esc_html__( 'Hide', 'spalisho' ),
					'default' 	=> 'yes',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'line_background',
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .xp-icon-list .item:before',
					'condition' => [
						'show_line_before' => 'yes'
					]
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'spalisho' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'color_icon',
				[
					'label' => esc_html__( 'Color', 'spalisho' ),
					'type' 	=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-icon-list .item i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bg_color_icon',
				[
					'label' 	=> esc_html__( 'Background Color', 'spalisho' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-icon-list .item i' => 'background-color : {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'spalisho' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .xp-icon-list .item .title',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' 	=> esc_html__( 'Color', 'spalisho' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-icon-list .item .title' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_title',
				[
					'label' 		=> esc_html__( 'Padding', 'spalisho' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .xp-icon-list .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_title',
				[
					'label' 		=> esc_html__( 'Margin', 'spalisho' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .xp-icon-list .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

		$this->start_controls_section(
			'section_desc_style',
			[
				'label' => esc_html__( 'Description', 'spalisho' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'desc_typography',
					'selector' 	=> '{{WRAPPER}} .xp-icon-list .item .desc',
				]
			);

			$this->add_control(
				'color_desc',
				[
					'label' 	=> esc_html__( 'Color', 'spalisho' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-icon-list .item .desc' => 'color : {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
	}

	// Render Template Here
	protected function render() {
		$settings = $this->get_settings();

        $items 				= $settings['ico_items'];
		$show_line_before 	= $settings['show_line_before'];

		?>

			<div class="xp-icon-list">
				<?php if( !empty( $items ) ) : ?>
					<?php foreach( $items as $item ): ?>
						<div class="item <?php if ('yes' == $show_line_before) echo 'item-line'; ?> <?php if ('yes' == $item['active_mode']) echo 'active'; ?>">
							<?php if(!empty($item['icon']['value']) ) { ?>
								<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
							<?php } ?>
							<div class="info">
								<?php if( !empty($item['title']) ) { ?>
									<h3 class="title">
										<?php echo esc_html( $item['title'] );?>
									</h3>
								<?php } ?>
								<?php if( !empty($item['desc']) ) { ?>
									<p class="desc"><?php echo esc_html( $item['desc'] );?></p>
								<?php } ?>
							</div>
						</div>
					<?php endforeach; 
				endif; ?>
			</div>

		<?php
	}
	
}

$widgets_manager->register( new Spalisho_Elementor_Icon_List() );