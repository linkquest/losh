<?php
/*-----------------------------------------------------------------------------------*/
/* 9. Columns
/*-----------------------------------------------------------------------------------*/
/*

Description:

Columns are named with this convention Xcol_Y where X is the total number of columns and Y is
the number of columns you want this column to span. Add _last behind the shortcode if it is the
last column.

Requires: shortcode.css
 
*/
//if ( ! function_exists( 'shortcode_scripts' )) {
//    function shortcode_scripts() {
//
//            wp_enqueue_style( 'mv-shortcodes', get_template_directory_uri().'/mv/css/shortcodes.css','20140930' );
//
//    }
//    add_action( 'wp_enqueue_scripts', 'shortcode_scripts' );
//}
/* ============= Two Columns ============= */

function woo_shortcode_twocol_one($atts, $content = null) {

    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' twocol-one">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'twocol_one', 'woo_shortcode_twocol_one' );

function woo_shortcode_twocol_one_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' twocol-one last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'twocol_one_last', 'woo_shortcode_twocol_one_last' );


/* ============= Three Columns ============= */

function woo_shortcode_threecol_one($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' threecol-one">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'threecol_one', 'woo_shortcode_threecol_one' );

function woo_shortcode_threecol_one_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' threecol-one last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'threecol_one_last', 'woo_shortcode_threecol_one_last' );

function woo_shortcode_threecol_two($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' threecol-two">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'threecol_two', 'woo_shortcode_threecol_two' );

function woo_shortcode_threecol_two_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' threecol-two last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'threecol_two_last', 'woo_shortcode_threecol_two_last' );

/* ============= Four Columns ============= */

function woo_shortcode_fourcol_one($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fourcol-one">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fourcol_one', 'woo_shortcode_fourcol_one' );

function woo_shortcode_fourcol_one_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fourcol-one last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fourcol_one_last', 'woo_shortcode_fourcol_one_last' );

function woo_shortcode_fourcol_two($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fourcol-two">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fourcol_two', 'woo_shortcode_fourcol_two' );

function woo_shortcode_fourcol_two_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fourcol-two last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fourcol_two_last', 'woo_shortcode_fourcol_two_last' );

function woo_shortcode_fourcol_three($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fourcol-three">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fourcol_three', 'woo_shortcode_fourcol_three' );

function woo_shortcode_fourcol_three_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fourcol-three last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fourcol_three_last', 'woo_shortcode_fourcol_three_last' );

/* ============= Five Columns ============= */

function woo_shortcode_fivecol_one($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fivecol-one">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fivecol_one', 'woo_shortcode_fivecol_one' );

function woo_shortcode_fivecol_one_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fivecol-one last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fivecol_one_last', 'woo_shortcode_fivecol_one_last' );

function woo_shortcode_fivecol_two($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fivecol-two">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fivecol_two', 'woo_shortcode_fivecol_two' );

function woo_shortcode_fivecol_two_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fivecol-two last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fivecol_two_last', 'woo_shortcode_fivecol_two_last' );

function woo_shortcode_fivecol_three($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fivecol-three">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fivecol_three', 'woo_shortcode_fivecol_three' );

function woo_shortcode_fivecol_three_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fivecol-three last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fivecol_three_last', 'woo_shortcode_fivecol_three_last' );

function woo_shortcode_fivecol_four($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fivecol-four">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fivecol_four', 'woo_shortcode_fivecol_four' );

function woo_shortcode_fivecol_four_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' fivecol-four last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'fivecol_four_last', 'woo_shortcode_fivecol_four_last' );


/* ============= Six Columns ============= */

function woo_shortcode_sixcol_one($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' sixcol-one">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'sixcol_one', 'woo_shortcode_sixcol_one' );

function woo_shortcode_sixcol_one_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' sixcol-one last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'sixcol_one_last', 'woo_shortcode_sixcol_one_last' );

function woo_shortcode_sixcol_two($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' sixcol-two">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'sixcol_two', 'woo_shortcode_sixcol_two' );

function woo_shortcode_sixcol_two_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' sixcol-two last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'sixcol_two_last', 'woo_shortcode_sixcol_two_last' );

function woo_shortcode_sixcol_three($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' sixcol-three">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'sixcol_three', 'woo_shortcode_sixcol_three' );

function woo_shortcode_sixcol_three_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' sixcol-three last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'sixcol_three_last', 'woo_shortcode_sixcol_three_last' );

function woo_shortcode_sixcol_four($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' sixcol-four">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'sixcol_four', 'woo_shortcode_sixcol_four' );

function woo_shortcode_sixcol_four_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' sixcol-four last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'sixcol_four_last', 'woo_shortcode_sixcol_four_last' );

function woo_shortcode_sixcol_five($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' sixcol-five">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'sixcol_five', 'woo_shortcode_sixcol_five' );

function woo_shortcode_sixcol_five_last($atts, $content = null) {
    if(isset($atts['class'])) {$class = $atts['class']; } else { $class = '';}
   return '<div  class="' . $class . ' sixcol-five last">' . mv_remove_wpautop($content) . '</div>';
}
add_shortcode( 'sixcol_five_last', 'woo_shortcode_sixcol_five_last' );

// Replace WP autop formatting
if ( ! function_exists( 'mv_remove_wpautop' ) ) {
	function mv_remove_wpautop( $content ) {
		$content = do_shortcode( shortcode_unautop( $content ) );
		$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
		return $content;
	} // End mv_remove_wpautop()
}



// Add Shortcode two column list with image
function custom_list_shortcode( $atts ) {

	// Attributes
	$a = shortcode_atts(
		array(
			'title' => '&nbsp;',
                        'indent' => '120px',
			'text' => '',
			'img' => '',
		), $atts 
	);

        $html = sprintf('<span style="%s font-weight: bold; float: left;">%s</span><span style="float: left;%s">%s</span>%s<br>',
                        'width:' . $a['indent'] . ';',
                        ('' == $a['title'] ? '&nbsp;' : $a['title']) ,
                        ($a['img']) ? 'clear:both;' : '',
                        $a['text'],
                        ($a['img'] ? sprintf('<img src="%s" alt="%s">', preg_replace("/(.*\/)(.*?)(\.)(.*?$)/", "$1$2-150x150$3$4", $a['img'] ), $a['text']) : '')
                         
                );
        return $html;
}
add_shortcode( 'mv_list', 'custom_list_shortcode' );

function nbsp_shortcode( $atts ) {
    return '&nbsp;';
}
add_shortcode( 'nbsp', 'nbsp_shortcode' );

function grey_box_shortcode($atts, $content=null){
                return sprintf('<div class="mv-grey-box">%s</div>',do_shortcode($content) );
}
add_shortcode( 'grey_box', 'grey_box_shortcode' );

function mv_button_shortcode($atts){
    // Attributes
	$a = shortcode_atts(
		array(
			'color' => '',
                        'link' => '#',
			'text' => 'Click Here',
                        'target' => '',
                        'align' => '' // center, left, right, default = none
		), $atts 
        );
    return sprintf('<a class="mv-button %s%s" href="%s" target="%s">%s</a>',
            $a['color'],
            $a['align'],
            $a['link'],
            $a['target'],
            $a['text']
            );
}
add_shortcode( 'button', 'mv_button_shortcode' );

function mv_lowercase_shortcode($atts, $content=null){
                return sprintf('<span class="mv-lowercase" style="text-transform:lowercase;">%s</span>',$content );
}
add_shortcode( 'lower', 'mv_lowercase_shortcode' );

/**
 * Get column class
 * @param int $num
 * @return boolean
 */
function get_col_class( $num ){
    switch($num){
                    case 1:
                        $col = '';
                        break;
                    case 2:
                        $col = 'twocol-one';
                        break;
                    case 3:
                        $col = 'threecol-one';
                        break;
                    case 4:
                        $col = 'fourcol-one';
                        break;
                    case 5:
                        $col = 'fivecol-one';
                        break;
                    case 6:
                        $col = 'sixcol-one';
                        break;
                    default:
                        $col = false;
                }
    return $col;            
}
