<?php
/**
 * Awesomesauce class.
 *
 * @category   Class
 * @package    ElementorAwesomesauce
 * @subpackage WordPress
 * @author     Ben Marshall <me@benmarshall.me>
 * @copyright  2020 Ben Marshall
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       link(https://www.benmarshall.me/build-custom-elementor-widgets/,
 *             Build Custom Elementor Widgets)
 * @since      1.0.0
 * php version 7.3.9
 */

namespace ElementorWorkscout\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

/**
 * Awesomesauce widget class.
 *
 * @since 1.0.0
 */
class ListingsCarousel extends Widget_Base {

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
		return 'workscout-listings-carousel';
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
		return __( 'Listings Carousel', 'workscout_elementor' );
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
		return 'fa fa-map-marked-alt';
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
		return array( 'workscout' );
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

//             'layout'        =>'standard',


//             'relation'    => 'OR',
//         
//             '_property_type' => '',
//             '_offer_type'   => '',
//             'featured'      => '',
//             'fullwidth'     => '',
//             'style'         => '',
//             'autoplay'      => '',
//             'autoplayspeed'      => '3000',
//             'from_vs'       => 'no',


	$this->start_controls_section(
			'section_query',
			array(
				'label' => __( 'Query', 'workscout_elementor' ),
			)
		);

		$this->add_control(
			'limit',
			[
				'label' => __( 'Listings to display', 'workscout_elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 21,
				'step' => 1,
				'default' => 6,
			]
		);


		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order by', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'none' =>  __( 'No order', 'workscout_elementor' ),
					'ID' =>  __(  'Order by post id. ', 'workscout_elementor' ),
					'author'=>  __(  'Order by author.', 'workscout_elementor' ),
					'title' =>  __(  'Order by title.', 'workscout_elementor' ),
					'name' =>  __( ' Order by post name (post slug).', 'workscout_elementor' ),
					'type'=>  __( ' Order by post type.', 'workscout_elementor' ),
					'date' =>  __( ' Order by date.', 'workscout_elementor' ),
					'modified' =>  __( ' Order by last modified date.', 'workscout_elementor' ),
					'parent' =>  __( ' Order by post/page parent id.', 'workscout_elementor' ),
					'rand' =>  __( ' Random order.', 'workscout_elementor' ),
					'comment_count' =>  __( ' Order by number of commen', 'workscout_elementor' ),
					
				],
			]
		);
		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' =>  __( 'Descending', 'workscout_elementor' ),
					'ASC' =>  __(  'Ascending. ', 'workscout_elementor' ),
				
					
				],
			]
		);


		$this->add_control(
			'_listing_type',
			[
				'label' => __(
					'Show only Listing Types',
					'workscout_elementor'
				),
				'type' => \Elementor\Controls_Manager::SELECT,
				'label_block' => true,
				'default' => '',
				'options' => [
					'' =>  __('All', 'workscout_elementor'),
					'service' =>  __('Service', 'workscout_elementor'),
					'rental' =>  __('Rentals. ', 'workscout_elementor'),
					'event' =>  __('Events. ', 'workscout_elementor'),
					'classifieds' => __('Classifieds', 'workscout_elementor'),

				],
			]
		);

			$this->add_control(
				'tax-listing_category',
				[
					'label' => __( 'Show only from listing categories', 'workscout_elementor' ),
					'type' => Controls_Manager::SELECT2,
					'label_block' => true,
					'multiple' => true,
					'default' => [],
					'options' => $this->get_terms('listing_category'),
					
				]
			);				

			$this->add_control(
				'tax-service_category',
				[
					'label' => __( 'Show only from service categories', 'workscout_elementor' ),
					'type' => Controls_Manager::SELECT2,
					'label_block' => true,
					'multiple' => true,
					'default' => [],
					'options' => $this->get_terms('service_category'),
					
				]
			);	

			$this->add_control(
				'tax-rental_category',
				[
					'label' => __( 'Show only from rental categories', 'workscout_elementor' ),
					'type' => Controls_Manager::SELECT2,
					'label_block' => true,
					'multiple' => true,
					'default' => [],
					'options' => $this->get_terms('rental_category'),
					
				]
			);				

			$this->add_control(
				'tax-event_category',
				[
					'label' => __( 'Show only from event categories', 'workscout_elementor' ),
					'type' => Controls_Manager::SELECT2,
					'label_block' => true,
					'multiple' => true,
					'default' => [],
					'options' => $this->get_terms('event_category'),
					
				]
			);	

			$this->add_control(
				'exclude_posts',
				[
					'label' => __( 'Exclude listings', 'workscout_elementor' ),
					'type' => Controls_Manager::SELECT2,
					'label_block' => true,
					'multiple' => true,
					'default' => [],
					'options' => $this->get_posts(),
					
				]
			);	
			$this->add_control(
				'include_posts',
				[
					'label' => __( 'Include listings', 'workscout_elementor' ),
					'type' => Controls_Manager::SELECT2,
					'label_block' => true,
					'multiple' => true,
					'default' => [],
					'options' => $this->get_posts(),
					
				]
			);

			

			$this->add_control(
				'feature',
				[
					'label' => __( 'Show only listings with features', 'workscout_elementor' ),
					'type' => Controls_Manager::SELECT2,
					'label_block' => true,
					'multiple' => true,
					'default' => [],
					'options' => $this->get_terms('listing_feature'),
				]
			);

			$this->add_control(
				'region',
				[
					'label' => __( 'Show only listings from region', 'workscout_elementor' ),
					'type' => Controls_Manager::SELECT2,
					'label_block' => true,
					'multiple' => true,
					'default' => [],
					'options' => $this->get_terms('region'),
				]
			);	


			$this->add_control(
			'relation',
			[
				'label' => __( 'Taxonomy Relation', 'workscout_elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'OR' =>  __( 'OR (listings in one of selected taxonomies)', 'workscout_elementor' ),
					'AND' =>  __(  'AND  (listings in all of selected taxonomies) ', 'workscout_elementor' ),
				
					
				],
			]
			);

					$this->add_control(
				'featured',
				[
					'label' => __( 'Show only featured listings', 'workscout_elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'your-plugin' ),
					'label_off' => __( 'Hide', 'your-plugin' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);

	$this->end_controls_section();
$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Settings', 'workscout_elementor' ),
			)
		);
	

			$this->add_control(
				'fullwidth',
				[
					'label' => __( 'Show fullwidth slider', 'workscout_elementor'),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'your-plugin' ),
					'label_off' => __( 'Hide', 'your-plugin' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);

			$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'workscout_elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1' =>  __( 'Compact', 'workscout_elementor' ),
					'style-2' =>  __( 'Grid. ', 'workscout_elementor' ),
				
					
				],
			]
		);

		
		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Auto Play', 'workscout_elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				
			]
		);


		$this->add_control(
			'autoplayspeed',
			array(
				'label'   => __( 'Auto Play Speed', 'workscout_elementor' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => __( 'Subtitle', 'workscout_elementor' ),
				'min' => 1000,
				'max' => 10000,
				'step' => 500,
				'default' => 3000,
			)
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
		// 'limit'         =>'6',
  //           'layout'        =>'standard',
  //           'orderby'       => 'date',
  //           'order'         => 'DESC',
  //           'tax-listing_category'    => '',
  //           'tax-service_category'    => '',
  //           'tax-rental_category'    => '',
  //           'tax-event_category'    => '',
  //           'relation'    => 'OR',
  //           'exclude_posts' => '',
  //           'include_posts' => '',
  //           'feature'       => '',
  //           'region'        => '',
  //           '_property_type' => '',
  //           '_offer_type'   => '',
  //           'featured'      => '',
  //           'fullwidth'     => '',
  //           'style'         => '',
  //           'autoplay'      => '',
  //           'autoplayspeed'      => '3000',
  //           'from_vs'       => 'no',
		$settings = $this->get_settings_for_display();


		$limit = $settings['limit'] ? $settings['limit'] : 3;
		$orderby = $settings['orderby'] ? $settings['orderby'] : 'title';
		$order = $settings['order'] ? $settings['order'] : 'ASC';
		$exclude_posts = $settings['exclude_posts'] ? $settings['exclude_posts'] : array();
		$include_posts = $settings['include_posts'] ? $settings['include_posts'] : array();
		
		
	//var_dump($settings);

		$output = '';
        $randID = rand(1, 99); // Get unique ID for carousel

        $meta_query = array();

       
        $args = array(
            'post_type' => 'listing',
            'post_status' => 'publish',
            'posts_per_page' => $limit,
            'orderby' => $orderby,
            'order' => $order,
            'tax_query'              => array(),
            );

        if(isset($settings['featured']) && $settings['featured'] == 'yes'){
            $args['meta_key'] = '_featured';
            $args['meta_value'] = 'on';
 
        }
 
        if(!empty($exclude_posts)) {
            $exl = is_array( $exclude_posts ) ? $exclude_posts : array_filter( array_map( 'trim', explode( ',', $exclude_posts ) ) );
            $args['post__not_in'] = $exl;
        }

        if(!empty($include_posts)) {
            $inc = is_array( $include_posts ) ? $include_posts : array_filter( array_map( 'trim', explode( ',', $include_posts ) ) );
            $args['post__in'] = $inc;
        }

        if($settings['feature']){
            $feature = is_array( $settings['feature'] ) ? $settings['feature'] : array_filter( array_map( 'trim', explode( ',', $settings['feature'] ) ) );
            foreach ($feature as $key) {
                array_push($args['tax_query'] , array(
                   'taxonomy' =>   'listing_feature',
                   'field'    =>   'slug',
                   'terms'    =>   $key,
                   
                ));
            }
        }

        if(isset($settings['tax-listing_category'])){
            $category = is_array( $settings['tax-listing_category'] ) ? $settings['tax-listing_category'] : array_filter( array_map( 'trim', explode( ',', $settings['tax-listing_category'] ) ) );
            
            foreach ($category as $key) {
                array_push($args['tax_query'] , array(
                   'taxonomy' =>   'listing_category',
                   'field'    =>   'slug',
                   'terms'    =>   $key,
                   
                ));
            }
        }

        if(isset($settings['tax-service_category'])){
            $category = is_array( $settings['tax-service_category'] ) ? $settings['tax-service_category'] : array_filter( array_map( 'trim', explode( ',', $settings['tax-service_category'] ) ) );
            foreach ($category as $key) {
                array_push($args['tax_query'] , array(
                   'taxonomy' =>   'service_category',
                   'field'    =>   'slug',
                   'terms'    =>   $key,
                   
                ));
            }
        }
        if(isset($settings['tax-rental_category'])){
            $category = is_array( $settings['tax-rental_category'] ) ? $settings['tax-rental_category'] : array_filter( array_map( 'trim', explode( ',', $settings['tax-rental_category'] ) ) );
            foreach ($category as $key) {
                array_push($args['tax_query'] , array(
                   'taxonomy' =>   'rental_category',
                   'field'    =>   'slug',
                   'terms'    =>   $key,
                   
                ));
            }
        }

        if(isset($settings['tax-event_category'])){
            $category = is_array( $settings['tax-event_category'] ) ? $settings['tax-event_category'] : array_filter( array_map( 'trim', explode( ',', $settings['tax-event_category'] ) ) );
            foreach ($category as $key) {
                array_push($args['tax_query'] , array(
                   'taxonomy' =>   'event_category',
                   'field'    =>   'slug',
                   'terms'    =>   $key,
                   
                ));
            }
        }

        if($settings['region']){
            
                array_push($args['tax_query'] , array(
                   'taxonomy' =>   'region',
                   'field'    =>   'slug',
                   'terms'    =>   $settings['region'],
                   'operator' =>   'IN'
                   
                ));
            
        }
         $args['tax_query']['relation'] =  $settings['relation'];

        
     

        if(!empty($tags)) {
            $tags         = is_array( $tags ) ? $tags : array_filter( array_map( 'trim', explode( ',', $tags ) ) );
            $args['tag__in'] = $tags;
        }
       
        
        $i = 0;

        $wp_query = new \WP_Query( $args );
        if(!class_exists('Workscout_Core_Template_Loader')) {
            return;
        }
        $template_loader = new \Workscout_Core_Template_Loader;

        ob_start();
        if($settings['fullwidth']) { ?>
        <!-- Carousel / Start -->
        	<div class="simple-fw-slick-carousel dots-nav" <?php if($settings['autoplay'] == 'yes') { ?> data-slick='{"autoplay": true, "autoplaySpeed": <?php echo $settings['autoplayspeed']; ?>}' <?php } ?> >
        <?php } else { ?>
        <!-- Carousel / Start -->
        	<div class="simple-slick-carousel dots-nav" <?php if($settings['autoplay'] == 'yes') { ?> data-slick='{"autoplay": true, "autoplaySpeed": <?php echo $settings['autoplayspeed']; ?>}' <?php } ?>>
        <?php } 
            if ( $wp_query->have_posts() ) {
               
                    while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                    <div class="fw-carousel-item">                    
                        <?php
                        if($settings['style']=="style-1") { 
                            $template_loader->get_template_part( 'content-listing-compact' );  
                        } else {
                            $template_loader->get_template_part( 'content-listing-grid' );  
                        }
                        ?>

                    </div>
                  <?php endwhile; // end of the loop. 
            } ?>
        </div>
        <?php wp_reset_postdata();
        wp_reset_query();

        echo ob_get_clean();
	
	
		
	}


		protected function get_terms($taxonomy) {
			$taxonomies = get_terms( array( 'taxonomy' =>$taxonomy,'hide_empty' => false) );

			$options = [ '' => '' ];
			
			if ( !empty($taxonomies) ) :
				foreach ( $taxonomies as $taxonomy ) {
					if($taxonomy){
					$options[ $taxonomy->slug ] = $taxonomy->name;
								}
				}
			endif;

			return $options;
		}

		protected function get_posts() {
			$posts = get_posts( 
				array( 
					'numberposts' => -1, 
					'post_type' => 'listing', 
					'suppress_filters' =>true
				) );

			$options = [ '' => '' ];
			
			if ( !empty($posts) ) :
				foreach ( $posts as $post ) {
					$options[ $post->ID ] = get_the_title($post->ID);
				}
			endif;

			return $options;
		}
	
}