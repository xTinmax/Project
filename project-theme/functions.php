<?php 


add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'proyecto' ),
		)
	);




function university_files() {
    wp_enqueue_script('menu-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
}


add_action('wp_enqueue_scripts', 'university_files' );


function university_features() {
    // register_nav_menu('headerMenuLocation', 'Header Menu Location');
    // register_nav_menu('footerLocationOne', 'Footer Location One');      funcion para los menus dinamicos
    // register_nav_menu('footerLocationTwo', 'Footer Location Two');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
//     add_image_size('professorLandscape', 400, 260, true);
//     add_image_size('professorPortrait', 480, 650, true);
//     add_image_size('pageBanner', 1500, 350, true);
// 
}


add_action('after_setup_theme', 'university_features');






