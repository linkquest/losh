<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Losh_Bears
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'losh' ); ?></a>

	<header id="masthead" class="site-header">
            <div id="pre-header">
                <div class="announcement-bar">
                    <div class="wrapper">
                        <div class="announcement">
                            <?php the_field('announcement_text', 'option');?>
                        </div>
                        <div class="losh-search">
                            <?php get_search_form();?>
                        </div>
                    </div>
                </div>
                <div class="header-slider">

                        <?php get_template_part( 'template-parts/content', 'carousel' );?>

                </div>
            </div>
		<div class="site-branding">
                    <div class="wrapper">
			<?php the_custom_logo();?>
                    <nav id="site-navigation" class="main-navigation">
                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'losh' ); ?></button>
                            <?php
                                    wp_nav_menu( array(
                                            'theme_location' => 'menu-1',
                                            'menu_id'        => 'primary-menu',
                                    ) );
                            ?>
                        </div><!--.wrapper-->
                    </nav><!-- #site-navigation -->
                </div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

