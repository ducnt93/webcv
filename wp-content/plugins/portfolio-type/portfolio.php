<?php
/**
 * Plugin Name: Portfolio Post
 * Description: Custom Portfolio and Taxonomy functionality for themes
 * Version: 1.0.0
 * Author: Burak Aydin
 * Author URI: http://burak-aydin.com
 * Text Domain: portfolio-type
 * License: GPLv2 or later
 */


function portfolio_post(){

	register_post_type('portfolio',array(
		'labels' => array('name' => 'Portfolio'),
		'public' => true,
		'supports' => array('title','editor','thumbnail','post-formats'),
		'menu_icon' => 'dashicons-portfolio',
		'menu_position' => 5
		));	


	/* Taxanomy */
	register_taxonomy('port_tax','portfolio',array(
		'hierarchical' => true,
		'label' => 'Category',
		'query_var' => true,
		'rewrite' => true
	));	
}

add_action('init','portfolio_post');



class PageTemplater {

		
		 protected $plugin_slug;

        private static $instance;

        protected $templates;


        public static function get_instance() {

                if( null == self::$instance ) {
                        self::$instance = new PageTemplater();
                } 

                return self::$instance;

        } 

      
        private function __construct() {

                $this->templates = array();


                add_filter(
					'page_attributes_dropdown_pages_args',
					 array( $this, 'register_project_templates' ) 
				);


                add_filter(
					'wp_insert_post_data', 
					array( $this, 'register_project_templates' ) 
				);


                add_filter(
					'template_include', 
					array( $this, 'view_project_template') 
				);			


         
                $this->templates = array(
                        'page-portfolio.php'     => 'Portfolio'                      
                );

				
        } 


        public function register_project_templates( $atts ) {

                $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

      
                $templates = wp_get_theme()->get_page_templates();
                if ( empty( $templates ) ) {
                        $templates = array();
                } 

                wp_cache_delete( $cache_key , 'themes');

                $templates = array_merge( $templates, $this->templates );

            
                wp_cache_add( $cache_key, $templates, 'themes', 1800 );

                return $atts;

        } 

      
        public function view_project_template( $template ) {

                global $post;

                if (!isset($this->templates[get_post_meta( 
					$post->ID, '_wp_page_template', true 
				)] ) ) {
					
                        return $template;
						
                } 

                $file = plugin_dir_path(__FILE__). get_post_meta( 
					$post->ID, '_wp_page_template', true 
				);
				
            
                if( file_exists( $file ) ) {
                        return $file;
                } 
				else { echo $file; }

                return $template;

        } 


} 

add_action( 'plugins_loaded', array( 'PageTemplater', 'get_instance' ) );