<?php 


add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'proyecto' ),
            'menu-2' => esc_html__( 'Secundary', 'proyecto' )
		)
	);




function project_files() {
    wp_enqueue_script('menu-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('project_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('project_extra_styles', get_theme_file_uri('/build/index.css'));
}


add_action('wp_enqueue_scripts', 'project_files' );


function project_features() {
 
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

}


add_action('after_setup_theme', 'project_features');






