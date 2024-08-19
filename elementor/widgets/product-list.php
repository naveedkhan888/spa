<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !spalisho_is_woo_active() ) {
	return ;
}

class Spalisho_Elementor_Product_List extends Widget_Base {

	public function get_name() {
		return 'spalisho_elementor_product_list';
	}

	public function get_title() {
		return esc_html__( 'Product List', 'spalisho' );
	}

	public function get_icon() {
		return 'eicon-products';
	}

	public function get_categories() {
		return [ 'spalisho' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_product_list_content',
			[
				'label' => esc_html__( 'Content', 'spalisho' ),
			]
		);

			$this->add_control(
				'show_featured',
				[
					'label' 		=> __( 'Only Show Featured', 'spalisho' ),
					'type' 			=> \Elementor\Controls_Manager::SWITCHER,
					'label_on' 		=> __( 'Show', 'spalisho' ),
					'label_off' 	=> __( 'Hide', 'spalisho' ),
					'default' 		=> 'no',
				]
			);

			$this->add_control(
				'columns',
				[
					'label' 	=> esc_html__( 'Columns', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SELECT,
					'default' 	=> 'column3',
					'options' 	=> [
						'column1' => esc_html__( 'Column 1', 'spalisho' ),
						'column2' => esc_html__( 'Column 2', 'spalisho' ),
						'column3' => esc_html__( 'Column 3', 'spalisho' ),
						'column4' => esc_html__( 'Column 4', 'spalisho' ),
					],
				]
			);

			$args_query	= [
				'taxonomy' 	=> 'product_cat',
				'orderby' 	=> 'name',
	        	'order'   	=> 'ASC'
			];

			$categories 		= get_categories( $args_query );
			$defautl_category 	= array( 'all' => esc_html__( 'All', 'spalisho' ) );
			$args_category 		= array();
			$result 			= array();

			if ( $categories && is_array( $categories ) ) {
				foreach ( $categories as $category ) {
					$args_category[$category->slug] = $category->cat_name;
				}
			}

			$result = array_merge( $defautl_category, $args_category );

			$this->add_control(
				'categories',
				[
					'label' 	=> esc_html__( 'Select Category', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SELECT,
					'default' 	=> 'all',
					'options' 	=> $result,
				]
			);

			$this->add_control(
				'posts_per_page',
				[
					'label' 	=> esc_html__( 'Posts Per Page', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::NUMBER,
					'default' 	=> 3,
				]
			);

			$this->add_control(
				'orderby',
				[
					'label' 	=> esc_html__( 'Order By', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SELECT,
					'default' 	=> 'title',
					'options' 	=> [
						'title' => esc_html__( 'Title', 'spalisho' ),
						'ID' 	=> esc_html__( 'ID', 'spalisho' ),
						'date' 	=> esc_html__( 'Date', 'spalisho' ),
					],
				]
			);

			$this->add_control(
				'order',
				[
					'label' 	=> esc_html__( 'Order', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SELECT,
					'default' 	=> 'ASC',
					'options' 	=> [
						'ASC' 	=> esc_html__( 'Ascending', 'spalisho' ),
						'DESC' 	=> esc_html__( 'Descending', 'spalisho' ),
					],
				]
			);

			$this->add_control(
				'category_in',
				[
					'label'   		=> esc_html__( 'Category In', 'spalisho' ),
					'type'    		=> Controls_Manager::TEXT,
					'description' 	=> esc_html__( 'Enter the product category IDs. IDs are separated by "|". Ex: 1|2|3.', 'spalisho' ),
				]
			);

			$this->add_control(
				'category_not_in',
				[
					'label'   		=> esc_html__( 'Category Not In', 'spalisho' ),
					'type'    		=> Controls_Manager::TEXT,
					'description' 	=> esc_html__( 'Enter the product category IDs. IDs are separated by "|". Ex: 1|2|3.', 'spalisho' ),
				]
			);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_product_list_style',
			[
				'label' => esc_html__( 'Content', 'spalisho' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'content_gap',
				[
					'label' 		=> esc_html__( 'Gap', 'spalisho' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 10,
						],
					],
					'default' => [
						'size' => 30,
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .xp-product-list' => 'grid-gap: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'content_background',
				[
					'label' 	=> esc_html__( 'Background', 'spalisho' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-product-list li.product' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' 		=> 'content_box_shadow',
					'label' 	=> esc_html__( 'Box Shadow', 'spalisho' ),
					'selector' 	=> '{{WRAPPER}} .xp-product-list li.product',
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' 		=> 'content_border',
					'label' 	=> esc_html__( 'Border', 'spalisho' ),
					'selector' 	=> '{{WRAPPER}} .xp-product-list li.product',
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'content_border_radius',
				[
					'label' 		=> esc_html__( 'Border Radius', 'spalisho' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .xp-product-list li.product' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'spalisho' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .xp-product-list li.product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
        
        // Title
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
					'selector' 	=> '{{WRAPPER}} .xp-product-list li.product .woocommerce-loop-product__title',
				]
			);

			$this->start_controls_tabs( 'title_tabs' );
				$this->start_controls_tab(
					'title_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'spalisho' ),
					]
				);

					$this->add_control(
						'title_normal_color',
						[
							'label' 	=> esc_html__( 'Color', 'spalisho' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .xp-product-list li.product .woocommerce-loop-product__title' => 'color: {{VALUE}}',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'title_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'spalisho' ),
					]
				);

					$this->add_control(
						'title_hover_color',
						[
							'label' 	=> esc_html__( 'Color', 'spalisho' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .xp-product-list li.product .woocommerce-loop-product__title:hover' => 'color: {{VALUE}}',
							],
						]
					);

				$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_responsive_control(
				'title_margin',
				[
					'label' 		=> esc_html__( 'Margin', 'spalisho' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .xp-product-list li.product .woocommerce-loop-product__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_review_style',
			[
				'label' => esc_html__( 'Review', 'spalisho' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'star_color',
				[
					'label' 	=> esc_html__( 'Star Color', 'spalisho' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-product-list li.product .star-rating' => 'color: {{VALUE}}',
					],
				]
			);

		$this->end_controls_section();

        // Price
		$this->start_controls_section(
			'section_price_style',
			[
				'label' => esc_html__( 'Price', 'spalisho' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'price_typography',
					'selector' 	=> '{{WRAPPER}} .xp-product-list li.product .price',
				]
			);

			$this->add_control(
				'price_color',
				[
					'label' 	=> esc_html__( 'Color', 'spalisho' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-product-list li.product .price' => 'color: {{VALUE}}',
					],
				]
			);

		$this->end_controls_section();

		// Button style
		$this->start_controls_section(
			'section_button',
			[
				'label' => esc_html__( 'Button', 'spalisho' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs_button'
		);

			$this->start_controls_tab(
				'style_normal_tab',
				[
					'label' => esc_html__( 'Normal', 'spalisho' ),
				]
			);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'button_typography',		
						'label' => esc_html__( 'Typography', 'spalisho' ),
						'selector' => '{{WRAPPER}} .xp-product-list li.product a.add_to_cart_button',
						
					]
				);

				$this->add_control(	
					'color_button',
					[
						'label' => esc_html__( 'Color', 'spalisho' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .xp-product-list li.product a.add_to_cart_button' => 'color : {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'color_button_background',
					[
						'label' => esc_html__( 'Background ', 'spalisho' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .xp-product-list li.product a.add_to_cart_button' => 'background-color : {{VALUE}};',
						],
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'button_border',
						'label' => esc_html__( 'Border', 'spalisho' ),
						'selector' => '{{WRAPPER}} .xp-product-list li.product a.add_to_cart_button',
					]
				);
				
				$this->add_control(
					'border_radius_button',
					array(
						'label'      => esc_html__( 'Border Radius', 'spalisho' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => array( 'px', '%' ),
						'selectors'  => array(
							'{{WRAPPER}} .xp-product-list li.product a.add_to_cart_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						),
					)
				);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'style_hover_tab',
				[
					'label' => esc_html__( 'Hover', 'spalisho' ),
				]
			);

				$this->add_control(	
					'color_button_hover',
					[
						'label' => esc_html__( 'Color', 'spalisho' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .xp-product-list li.product:hover a.add_to_cart_button' => 'color : {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'color_button_background_hover',
					[
						'label' => esc_html__( 'Background ', 'spalisho' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .xp-product-list li.product:hover a.add_to_cart_button' => 'background-color : {{VALUE}};',
						],
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'button_border_hover',
						'label' => esc_html__( 'Border', 'spalisho' ),
						'selector' => '{{WRAPPER}} .xp-product-list li.product:hover a.add_to_cart_button',
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();


	}

	protected function spalisho_get_product_list( $args ) {

		$args_query = [
			'post_type' 		=> 'product',
		    'post_status' 		=> 'publish',
		    'posts_per_page' 	=> $args['posts_per_page'],
		    'orderby' 			=> $args['orderby'],
		    'order'				=> $args['order'],
		    'tax_query' 		=> [],
		];

		if ( 'yes' === $args['show_featured'] ) {
	        $featured = [
	        	'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
                'operator' => 'IN'
	        ];

	        array_push( $args_query['tax_query'], $featured );
	    }

		if ( 'all' != $args['category_slug'] ) {
			$category_args = [
				'taxonomy' 	=> 'product_cat',
            	'field' 	=> 'slug',
            	'terms'     => $args['category_slug'],
            	'operator'  => 'IN',
			];
			array_push( $args_query['tax_query'], $category_args );
		}

		if ( $args['category_in'] ) {
			$category_in = [
				[
					'taxonomy' 	=> 'product_cat',
					'field'    	=> 'term_id',
					'terms'    	=> explode( '|', $args['category_in'] ),
					'operator'  => 'IN',
				],
			];
			array_push( $args_query['tax_query'], $category_in );
		}

		if ( $args['category_not_in'] ) {
			$category_not_in = [
				[
					'taxonomy' 	=> 'product_cat',
					'field'    	=> 'term_id',
					'terms'    	=> explode( '|', $args['category_not_in'] ),
					'operator' 	=> 'NOT IN',
				],
			];
			array_push( $args_query['tax_query'], $category_not_in );
		}

		$result  = new \WP_Query( $args_query );

		return $result;
	}

	protected function render() {
		$settings 	= $this->get_settings();
		$column 	= $settings['columns'];

		$args = [
			'posts_per_page' 	=> $settings['posts_per_page'],
			'orderby' 			=> $settings['orderby'],
			'order' 			=> $settings['order'],
			'category_slug'		=> $settings['categories'],
			'category_in' 		=> $settings['category_in'],
			'category_not_in' 	=> $settings['category_not_in'],
			'show_featured'		=> $settings['show_featured']
		];
		
		$products = $this->spalisho_get_product_list( $args );

		?>

		<?php if ( $products->have_posts() ): ?>
			<ul class="xp-product-list <?php echo esc_attr( $column ); ?>">
				<?php while( $products->have_posts() ) : $products->the_post(); ?>
					<?php wc_get_template_part( 'content', 'product' ); ?>
				<?php endwhile; ?>
			</ul>

		<?php else: ?>
			<div class="xp-no-products-found">
				<?php echo esc_html__( 'No products found', 'spalisho' ); ?>
			</div>
		<?php endif; wp_reset_postdata(); ?>

		<?php

	}
}

$widgets_manager->register( new Spalisho_Elementor_Product_List() );