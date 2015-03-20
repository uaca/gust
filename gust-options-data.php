<?php
class Gust_Options_Data {
	public static function list_post_types(){
	  $post_types = get_post_types(array('show_ui'=>true),'objects');
	  $result = array();
	  foreach ($post_types as $name=>$post_type) : 
	    if ($name != 'attachment') :
//	    	print_r($post_type);
	    	$result[$name] = $post_type->label;
	    endif;
		endforeach;	
		return $result;
	}
	public static function get() {
		return array(
			'page_title'        => __( 'Markdown Options', 'md' ),
			'page_description'  => false,
			'menu_title'        => __( 'Markdown', 'markdown' ),
			'permission'        => 'manage_options',
			'menu_slug'         => 'gust_options',
			'option_name'       => 'gust_options',
			'plugin_path'       => 'gust_options',
			'defaults'          => array(
				'main_endpoint'     => 'md',
				'main_posttypes'	  => array(
					'post' => true,
					'page' => true
				),
				'main_dateformat'		=> 'YYYY MMM DD hh:mm',
			),
			'section'           => array(
				array(
					'slug'  => 'main',
					'title' => __( 'Main Settings', 'markdown' ),
					'field' => array(
						array(
							'slug'        => 'endpoint',
							'title'       => __( 'URL endpoint', 'md' ),
							'type'        => 'text'
						),
						array(
							'slug'        => 'dateformat',
							'title'       => __( 'Date format', 'md' ),
							'type'        => 'text'
						),
						array(
							'slug'    => 'posttypes',
							'title'   => __( 'Use Markdown for', 'md' ),
							'type'    => 'checkbox_list',
							'options' => array(
								'list' => self::list_post_types()
							),
						),
					),
				),
			),
		);
	}
}
