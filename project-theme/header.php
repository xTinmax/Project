<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset');  ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="background-color: <?php echo get_field('background_color', 'option') ?>; color: <?php echo get_field('text_color', 'option') ?>">


<header id="masthead" class="site-header" >
		
		<nav id="site-navigation" class="main-navigation">
            <img src="<?php echo get_theme_file_uri('images/barras.svg') ?>" alt="" width="25" height="25" class="menu-icon">
			
			
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
            
                <a href="#">Contact</a>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
