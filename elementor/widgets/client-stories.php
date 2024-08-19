<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Spalisho_Elementor_Client_Stories extends Widget_Base {

	
	public function get_name() {
		return 'spalisho_elementor_client_stories';
	}

	
	public function get_title() {
		return esc_html__( 'Client Stories', 'spalisho' );
	}

	
	public function get_icon() {
		return 'eicon-notes';
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
				'columns',
				[
					'label' 	=> esc_html__( 'Columns', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SELECT,
					'default' 	=> 'column2',
					'options' 	=> [
						'column1' => esc_html__( 'Column 1', 'spalisho' ),
						'column2' => esc_html__( 'Column 2', 'spalisho' ),
						'column3' => esc_html__( 'Column 3', 'spalisho' ),
					],
				]
			);

			$this->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'spalisho' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'flaticon flaticon-quotation',
						'library' 	=> 'flaticon',
					],
				]
			);

			$this->add_control(
				'background_image',
				[
					'label'   => esc_html__( 'Hover Background Image', 'spalisho' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
				]
			);
			
			// Add Class control
			$repeater = new \Elementor\Repeater();

			    $repeater->add_control(
					'link_address',
					[
						'label'   => esc_html__( 'Link', 'spalisho' ),
						'type'    => \Elementor\Controls_Manager::URL,
						'dynamic' => [
							'active' => true,
						],
					]
				);

			    $repeater->add_control(
					'image_author',
					[
						'label'   => esc_html__( 'Author Image', 'spalisho' ),
						'type'    => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					]
				);

				$repeater->add_control(
					'name_author',
					[
						'label'   => esc_html__( 'Author Name', 'spalisho' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Edna Marxten', 'spalisho' ),
					]
				);

				$repeater->add_control(
					'date',
					[
						'label'   => esc_html__( 'Date', 'spalisho' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
		                'default' => '20 / 6 / 2022',
					]
				);

				$repeater->add_control(
					'story',
					[
						'label'   => esc_html__( 'Story ', 'spalisho' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( "Aliquam hendrerit a augue insuscipit. Etiam aliquam massa quis des mauris commodo venenatis ligula commodo leez sed blandit convallis dignissim simply free text onec vel pellentesque neque.", 'spalisho' ),
					]
				);

			$this->add_control(
				'tab_item',
				[
					'label'       => esc_html__( 'Items Story', 'spalisho' ),
					'type'        => Controls_Manager::REPEATER,
					'fields'      => $repeater->get_controls(),
					'default' => [
						[
							'name_author' => esc_html__('Edna Marxten', 'spalisho'),
						],
						[
							'name_author' => esc_html__('Mike Hardson', 'spalisho'),
						],
						[
							'name_author' => esc_html__('Kevin Martin', 'spalisho'),
						],
						[
							'name_author' => esc_html__('Jessica Brown', 'spalisho'),
						],
						[
							'name_author' => esc_html__('Sarah Albert', 'spalisho'),
						],
						[
							'name_author' => esc_html__('David Cooper', 'spalisho'),
						],
					],
					'title_field' => '{{{ name_author }}}',
				]
			);

		$this->end_controls_section();

		/*************  SECTION quote icon  *******************/
		$this->start_controls_section(
			'section_quote_story',
			[
				'label' => esc_html__( 'Quote', 'spalisho' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'quote_color',
				[
					'label'     => esc_html__( 'Color', 'spalisho' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-client-stories .item-client-stories .quote-icon i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'quote_bgcolor',
				[
					'label'     => esc_html__( 'Background Color', 'spalisho' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-client-stories .item-client-stories .quote-icon' => 'background-color : {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();
		###############  end quote icon  ###############

		/*************  SECTION name author story  *******************/
		$this->start_controls_section(
			'section_name_story',
			[
				'label' => esc_html__( 'Name', 'spalisho' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'name_typography',
					'selector' => '{{WRAPPER}} .ova-client-stories .item-client-stories .client_info .name',
				]
			);

			$this->add_control(
				'name_color',
				[
					'label'     => esc_html__( 'Color', 'spalisho' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-client-stories .item-client-stories .client_info .name' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'name_margin',
				[
					'label'      => esc_html__( 'Margin', 'spalisho' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-client-stories .item-client-stories .client_info .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		###############  end name author story  ###############

		/*************  SECTION date story  *******************/
		$this->start_controls_section(
			'section_date_story',
			[
				'label' => esc_html__( 'Date', 'spalisho' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'date_typography',
					'selector' => '{{WRAPPER}} .ova-client-stories .item-client-stories .client_info .date',
				]
			);

			$this->add_control(
				'date_color',
				[
					'label'     => esc_html__( 'Color', 'spalisho' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-client-stories .item-client-stories .client_info .date' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'date_bgcolor',
				[
					'label'     => esc_html__( 'Background Color', 'spalisho' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-client-stories .item-client-stories .client_info .date' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'date_padding',
				[
					'label'      => esc_html__( 'Padding', 'spalisho' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-client-stories .item-client-stories .client_info .date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		###############  end date story  ###############

		/*************  SECTION content story  *******************/
		$this->start_controls_section(
			'section_content_story',
			[
				'label' => esc_html__( 'Content Story', 'spalisho' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'content_story_typography',
					'selector' => '{{WRAPPER}} .ova-client-stories .item-client-stories .story',
				]
			);

			$this->add_control(
				'content_color',
				[
					'label'     => esc_html__( 'Color', 'spalisho' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-client-stories .item-client-stories .story' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_margin',
				[
					'label'      => esc_html__( 'Margin', 'spalisho' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-client-stories .item-client-stories .story' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label'      => esc_html__( 'Padding', 'spalisho' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-client-stories .item-client-stories .story' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section content story  ###############


		/*************  SECTION item client-stories  *******************/
		$this->start_controls_section(
			'section_item_client_stories',
			[
				'label' => esc_html__( 'Item Client Stories', 'spalisho' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'item_client_stories_background_color',
				[
					'label'     => esc_html__( 'Background Color', 'spalisho' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-client-stories .item-client-stories' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'item_client_stories_padding',
				[
					'label'      => esc_html__( 'Padding', 'spalisho' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-client-stories .item-client-stories' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'item_client_stories_border',
					'label' => esc_html__( 'Border', 'spalisho' ),
					'selector' => '{{WRAPPER}} .ova-client-stories .item-client-stories',
				]
			);

		$this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$column   = $settings['columns'];
		$icon	  = $settings['icon']['value'];
		$tab_item = $settings['tab_item'];

		// background image hover
		$background_image = $settings['background_image']['url'];

		 ?>
		    <div class="ova-client-stories <?php echo esc_attr( $column ); ?>">

				<?php if(!empty($tab_item)) : foreach ($tab_item as $item) :
                    
					$link 			  = $item['link_address']['url'];
					$link_is_external = $item['link_address']['is_external'];
					$link_target      = ( $link_is_external == 'on' ) ? 'target="_blank"' : '';

				?>

				<?php if( $link ){ ?>
					<a href="<?php echo esc_url( $link );?>" <?php printf( $link_target ); ?>>
				<?php } ?>

					<div class="item-client-stories">
                        
						<?php if( $item['image_author'] != '' ) { ?>
							<?php $alt = isset($item['name_author']) && $item['name_author'] ? $item['name_author'] : esc_html__( 'story','spalisho' ); ?>
							<img class="client-img" src="<?php echo esc_attr($item['image_author']['url']) ?>" alt="<?php echo esc_attr( $alt ); ?>" >
						<?php } ?>
                        
                        <?php if( !empty( $icon ) ) { ?>
							<div class="quote-icon">
								<i class="<?php echo esc_attr( $icon ); ?>"></i>
							</div>
                        <?php } ?>

                        <div class="client_info">
							
							<?php if( $item['name_author'] != '' ) { ?>
								<p class="name second_font">
									<?php echo esc_html($item['name_author']) ?>
								</p>
							<?php } ?>
							

							<?php if( $item['date'] != '' ) { ?>
								<p class="date">
									<?php echo esc_html($item['date']) ?>
								</p>
							<?php } ?>

						</div>

						<?php if( $item['story'] != '' ) : ?>
							<p class="story">
								<?php echo esc_html($item['story']) ?>
							</p>
						<?php endif; ?>

						<?php if ( $background_image != '' ) : ?> 
							<div class="mask-wrapper">
								<div class="mask" style="background-image: url(<?php echo esc_attr( $background_image ) ; ?>)"></div>
							</div>
					    <?php endif;?>

					</div>

				<?php if( $link ){ ?>
					</a>
				<?php } ?>
							
				<?php endforeach; endif; ?>

			</div>

		<?php
	}

	
}
$widgets_manager->register( new Spalisho_Elementor_Client_Stories() );