<?php
/**
 * Create html code for PayPal button
 * @param intiger $sku
 * @return string html
 */
function mk_paypal_button( $sku = null){
    if( empty( $sku ) || ! $course = get_post( $sku, ARRAY_A ) ) return 'ERROR: no sku';
        $pp['sandbox'] = get_theme_mod('pp_sandbox',true);
        if (! $pp['email'] = get_theme_mod('pp_email','') ) return 'ERROR: no store email';
        $pp['currency'] = get_theme_mod('pp_currency','CAD');
        $pp['is_tax'] = get_theme_mod('pp_is_tax',true);
        $pp['tax_rate'] = get_theme_mod('pp_tax_rate',0);
        $pp['sbiz_thankyou'] = get_theme_mod('sbiz_thankyou','');
        $pp['price'] = get_field('course_price',$sku);
        $pp['title'] = $course['post_title'];
        $url =  sprintf('https://www.%spaypal.com/cgi-bin/webscr?cmd=_xclick&business=%s&item_name=%s&item_number=%s&amount=%s&currency_code=%s%s%s%s',
                ( $pp['sandbox'] ? 'sandbox.' : ''),
                $pp['email'],
                $pp['title'],
                $sku,
                $pp['price'],
                $pp['currency'],
                ( $pp['is_tax'] ? '&tax='.( $pp['price'] * ( $pp['tax_rate'] / 100 )) : ''),
//                '&notify_url='. get_option( 'siteurl' ) .'/?AngellEYE_Paypal_Ipn_For_Wordpress&action=ipn_handler'
                '',
                '&return=' . get_permalink($pp['sbiz_thankyou'])
                );
        return sprintf('<a class="sbiz-pp-button" href="%s"><img src="%s" /></a><style>a.sbiz-pp-button img{backface-visibility: hidden;transform: translateZ(0);}a.sbiz-pp-button img:hover {transform: scale(1.03);}</style>',
                $url,
                get_option( 'pp_button', get_template_directory_uri() . '/images/buy-course-today-200.png')              
                );
}

/**
 * Short code for paypal button
 * @param integer $atts sku= course post ID
 * @return string html
 */
function pp_button_shortcode($atts){
    // Attributes
	$a = shortcode_atts(
		array(
			'sku' => '',
                    ), $atts 
        );
    return mk_paypal_button($a['sku']);
}
add_shortcode( 'pp_button', 'pp_button_shortcode' );

