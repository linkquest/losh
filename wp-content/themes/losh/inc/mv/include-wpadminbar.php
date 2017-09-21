<?php

/* 
 * Mediavandals
 * Modify WPAminBar
 */
// move admin bar to bottom
function fb_move_admin_bar() { ?>
	<style type="text/css">
            @media screen and (max-width: 767px){
                html #wpadminbar {
                    display: none!important;
                }
                html { margin-top: 0 !important; }
		* html body { margin-top: 0 !important; }

            }
	</style>
<?php }
// on backend area
//add_action( 'admin_head', 'fb_move_admin_bar' );
// on frontend area
add_action( 'wp_head', 'fb_move_admin_bar',99 );

