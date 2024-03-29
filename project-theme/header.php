<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset');  ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<style>
	:root{
		--main-color: <?php echo get_field('background_color', 'option') ?>;
		--text-color: <?php echo get_field('text_color', 'option') ?>;
		--nav-menu-color: <?php echo get_field('nav_menu_color', 'option') ?>;
		--selected-tab-color: <?php echo get_field('selected_tab_color', 'option') ?>;
	}
</style>
<body <?php body_class(); ?>">


<header id="masthead" class="site-header" >
		
		<nav id="site-navigation" class="main-navigation">
			<?php if ( has_nav_menu( 'menu-1' ) ) { ?>
            <div class="menu-icon">
				<div id="nav-icon3">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			
			
			<?php
			
				wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
		   }
			
			?>
            
			<div class="nav-logo"><img src="<?php echo get_field('logo') ['sizes'] ['medium']; ?>);" alt=""></div>

			<?php
			if ( has_nav_menu( 'menu-2' ) ) {
				wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'secundary-menu',
				)
			);
		   }
			
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
