<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !spalisho_is_woo_active() ) {
	return ;
}


class Spalisho_Elementor_Latest_Products extends Widget_Base {

	
	public function get_name() {
		return 'spalisho_elementor_latest_products';
	}

	
	public function get_title() {
		return esc_html__( 'Latest Products', 'spalisho' );
	}

	
	public function get_icon() {
		return 'eicon-post-list';
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
			$args = array(
				'taxonomy' 	=> 'product_cat',
				'orderby' 	=> 'name',
				'order' 	=> 'ASC'
			);
  
		  	$categories 		= get_categories( $args );
		  	$category_args 		= [];
		  	$default_category 	= [];
		  	
		  	if ( ! empty( $categories ) && is_array( $categories ) ) {
			  	foreach ( $categories as $k => $category ) {
				  	$category_args[$category->term_id] = $category->name;

				  	if ( $k <= 3 ) array_push( $default_category, $category->term_id );
			  	}
		  	} else {
			  	$category_args[''] = esc_html__( 'Category not found', 'spalisho' );
		  	}

		  	$this->add_control(
				'categories',
				[
					'label' 		=> esc_html__( 'Select Category', 'spalisho' ),
					'type' 			=> \Elementor\Controls_Manager::SELECT2,
					'label_block' 	=> true,
					'multiple' 		=> true,
					'options' 		=> $category_args,
					'default' 		=> $default_category,
				]
			);

			$this->add_control(
				'show_featured',
				[
					'label' 		=> esc_html__( 'Only Show Featured', 'spalisho' ),
					'type' 			=> \Elementor\Controls_Manager::SWITCHER,
					'label_on' 		=> esc_html__( 'Yes', 'spalisho' ),
					'label_off' 	=> esc_html__( 'No', 'spalisho' ),
					'default' 		=> 'no',
				]
			);

			$this->add_control(
				'total_count',
				[
					'label' 	=> esc_html__( 'Total', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::NUMBER,
					'default' 	=> 3,
				]
			);

			$this->add_control(
				'order',
				[
					'label' 	=> esc_html__('Order', 'spalisho'),
					'type' 		=> \Elementor\Controls_Manager::SELECT,
					'default' 	=> 'desc',
					'options' 	=> [
						'asc' => esc_html__('Ascending', 'spalisho'),
						'desc' => esc_html__('Descending', 'spalisho'),
					]
				]
			);

			$this->add_control(
				'order_by',
				[
					'label' 	=> esc_html__('Order By', 'spalisho'),
					'type' 		=> \Elementor\Controls_Manager::SELECT,
					'default' 	=> 'ID',
					'options' 	=> [
						'none' 		=> esc_html__('None', 'spalisho'),
						'ID' 		=> esc_html__('ID', 'spalisho'),
						'title' 	=> esc_html__('Title', 'spalisho'),
						'date' 		=> esc_html__('Date', 'spalisho'),
						'modified' 	=> esc_html__('Modified', 'spalisho'),
						'rand' 		=> esc_html__('Rand', 'spalisho'),
					]
				]
			);

		$this->end_controls_section();

		//SECTION TAB STYLE GENERAL
		$this->start_controls_section(
			'section_general_style',
			[
				'label' => esc_html__( 'General', 'spalisho' ),
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_responsive_control(
				'item_gap',
				[
					'label' 	=> esc_html__( 'Column Gap', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::SLIDER,
					'range' 	=> [
						'px' 	=> [
							'min' => 0,
							'max' => 50,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .xp-latest-products .item' => 'gap: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'margin_item',
				[
					'label' 		=> esc_html__( 'Margin', 'spalisho' ),
					'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .xp-latest-products .item ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs(
				'general_tabs'
			);

			$this->start_controls_tab(
				'general_normal_tab',
				[
					'label' => esc_html__( 'Normal', 'spalisho' ),
				]
			);

				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'general_background',
						'types' => [ 'classic', 'gradient'],
						'selector' => '{{WRAPPER}} .xp-latest-products .item',
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'general_hover_tab',
				[
					'label' => esc_html__( 'Hover', 'spalisho' ),
				]
			);

				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'general_background_hover',
						'types' => [ 'classic', 'gradient'],
						'selector' => '{{WRAPPER}} .xp-latest-products .item:hover',
					]
				);

			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'general_box_shadow',
					'selector' => '{{WRAPPER}} .xp-latest-products .item',
				]
			);

		$this->end_controls_section();
		// END SECTION TAB STYLE General

		//  Image
		$this->start_controls_section(
			'section_image',
			[
				'label' => esc_html__( 'Image', 'spalisho' ),
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
 			$this->add_responsive_control(
				'img_width',
				[
					'label' 		=> esc_html__( 'Width', 'spalisho' ),
					'type' 			=> \Elementor\Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 80,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .xp-latest-products .item .media a img' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'img_height',
				[
					'label' 		=> esc_html__( 'Height', 'spalisho' ),
					'type' 			=> \Elementor\Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 80,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .xp-latest-products .item .media a img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

 		$this->end_controls_section();
		 
		//SECTION TAB STYLE TITLE
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'spalisho' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .xp-latest-products .item .info .title',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' 	=> esc_html__( 'Color', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-latest-products .item .info .title' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_title_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-latest-products .item:hover .info .title' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_title',
				[
					'label' 	=> esc_html__( 'Margin', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .xp-latest-products .item .info .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();


		//SECTION TAB STYLE PRICE
		$this->start_controls_section(
			'section_price_style',
			[
				'label' => esc_html__( 'Price', 'spalisho' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'price_typography',
					'selector' 	=> '{{WRAPPER}} .xp-latest-products .item .info .price',
				]
			);

			$this->add_control(
				'color_price',
				[
					'label' 	=> esc_html__( 'Color', 'spalisho' ),
					'type' 		=> \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .xp-latest-products .item .info .price' => 'color : {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings 		= 	$this->get_settings();

		$categories 	= 	$settings['categories'];
		$total_count 	= 	$settings['total_count'];
		$order 			= 	$settings['order'];
		$order_by 		= 	$settings['order_by'];

		$base_query = [
            'post_type'         => 'product',
            'post_status'       => 'publish',
            'posts_per_page'    => $total_count,
            'orderby'           => $order_by,
            'order'             => $order,
        ];

        if ( ! empty( $categories ) && is_array( $categories ) ) {
            $base_query['tax_query'] = [
                array(
                    'taxonomy'  => 'product_cat',
                    'field'     => 'term_id',
                    'terms'     => $categories,
                    'operator'  => 'IN',
                ),
            ];
        }

        if ( 'yes' === $settings['show_featured'] ) {
	        $featured = [
	        	'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
                'operator' => 'IN'
	        ];

	        array_push( $base_query['tax_query'], $featured );
	    }

        $products = new WP_Query( $base_query );

		?>

		<div class="xp-latest-products">

			<?php if($products->have_posts()) : while($products->have_posts()) : $products->the_post(); 
				$pid = get_the_ID();
				$product   = wc_get_product( $pid );
				$image_id  = $product->get_image_id();
				$url_thumb = wp_get_attachment_image_url( $image_id, 'thumbnail' );
			?>

				<div class="item">
					<div class="media">
			        	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			        		<img src="<?php echo esc_url( $url_thumb ) ?>" alt="<?php the_title(); ?>">
			        	</a>
			        </div>

			        <div class="info">
			        	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			            	<h4 class="title">
					          	<?php the_title(); ?>
					   	 	</h4>
					    </a>
					    <div class="price">
					    	<?php echo $product->get_price_html();; ?>
					    </div>
			        </div>
				</div>

			<?php endwhile; endif; wp_reset_postdata(); ?>

		</div>

		 	
		<?php
	}

	
}
$widgets_manager->register( new Spalisho_Elementor_Latest_Products() );