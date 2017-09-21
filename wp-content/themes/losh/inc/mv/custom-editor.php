<?php
add_editor_style();

// Customize mce editor font sizes
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
	function wpex_mce_text_sizes( $initArray ){
		$initArray['fontsize_formats'] = "10px 12px 13px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px";
		return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );


// Add fonts
function add_font_selection_to_tinymce($buttons) {
     array_unshift($buttons, 'fontsizeselect');
     array_unshift($buttons, 'fontselect');

     return $buttons;
 }
 add_filter('mce_buttons_2', 'add_font_selection_to_tinymce');

// helps you to add the custom font to your tinyMCE editor. 
function kv_add_google_webfonts_to_editor() {
    $font_url = 'https://fonts.googleapis.com/css?family=Lato|Montserrat:400,700|Open+Sans:400,700|Oswald:400,700|Playball:400|Raleway:400,700|Roboto+Slab:400,700|Roboto:400,700|Titillium+Web';
    add_editor_style( str_replace( ',', '%2C', $font_url ) );
}
add_action( 'init', 'kv_add_google_webfonts_to_editor' );

function kv_custom_font_list($in){
    $google_font =  'Roboto = Roboto, sans-serif;';
    $google_font .=  'Roboto Slab = Roboto Slab, sans-serif;';
    $google_font .=  'Open Sans = Open Sans, sans-serif;';
    $google_font .=  'Lato = Lato, sans-serif;';
    $google_font .=  'Oswald = Oswald, sans-serif;';
    $google_font .=  'Montserrat = Montserrat, sans-serif;';
    $google_font .=  'Raleway = Raleway, sans-serif;';
    $google_font .=  'Titillium Web = Titillium Web, sans-serif;';
    $google_font .=  'Playball = Playball, cursive;';
    
    $web_fonts = 'Arial=Arial, Helvetica, sans-serif;';
    $web_fonts .= 'Arial Black=Arial Black, Avant Garde;';
    $web_fonts .= 'Book Antiqua=Book Antiqua, Palatino;';
    $web_fonts .= 'Comic Sans MS=Comic Sans MS, sans-serif;';
    $web_fonts .= 'Courier web=Courier web, Courier;';
    $web_fonts .= 'Georgia=Georgia, Palatino;';
    $web_fonts .= 'Helvetica=Helvetica;';
    $web_fonts .= 'Impact=Impact, Chicago;';
    $web_fonts .= 'Symbol=Symbol;';
    $web_fonts .= 'Tahoma=Tahoma, Arial, Helvetica, sans-serif;';
    $web_fonts .= 'Terminal=Terminal, Monaco;';
    $web_fonts .= 'Times web Roman=Times web Roman, Times;';
    $web_fonts .= 'Trebuchet MS=Trebuchet MS, Geneva;';
    $web_fonts .= 'Verdana=Verdana, Geneva;';
    
    
    $in['font_formats']= $google_font . $web_fonts ;
 
 return $in;
}
add_filter('tiny_mce_before_init', 'kv_custom_font_list' );