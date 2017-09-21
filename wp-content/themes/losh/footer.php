<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Losh_Bears
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
                    <div class='wrapper'>
                        <div class='losh-copyright threecol-one'>
                            <?php the_field('copyright','options');?>
                        </div>
                        <div class='losh-footer-menu threecol-one'>
                            <?php
                            wp_nav_menu( array(
                                            'theme_location' => 'footer-menu',
                                            'menu_id'        => 'footer-menu',
                                    ) );?>
                            
                        </div>
			<div class="mv-byline threecol-one last">
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Website Services by %s', 'losh' ),  '<a href="http://mediavandals.com">Mediavandals</a>' );
			?>
                        </div>
                    </div><!--.wrapper-->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
