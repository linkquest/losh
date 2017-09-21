<?php
define('SL_APP_API_URL','https://footprintthemes.com/index.php');
define('SL_PRODUCT_ID','sbiz-10');
define('SBIZ_THEME_SLUG', 'spartanbiz');
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
define('SL_INSTANCE',str_replace($protocol, "", get_bloginfo('wpurl')));

require_once get_template_directory() . '/inc/mv/class-licence.php';

function is_sbiz_licensed($reset= FALSE){

    if( ! $reset && TRUE === ($status = get_transient( 'sbiz_license_status' ) ) ) return $status; // return contents of valid transient
    // otherwise, get new status and set transient
    if( class_exists('SBIZ_theme_CodeAutoUpdate')) {
        $SBIZ_theme_CodeAutoUpdate = new SBIZ_theme_CodeAutoUpdate(SL_APP_API_URL, SBIZ_THEME_SLUG);
    }else{ 
        die("ERROR: SBIZ_theme_CodeAutoUpdate class not available");
    }
    $license = get_option('sbiz_license_key');
//    printa($license);
        $args = new stdClass();
        $args->slug = SBIZ_THEME_SLUG;
        $args->license_key = $license;
    
    $response = $SBIZ_theme_CodeAutoUpdate->theme_api_call('', 'status-check', $args);
//printa($response);//die;
    if( 'success' == $response->status && 's205' == $response->status_code){
        set_transient('sbiz_license_status', true, 12 * HOUR_IN_SECONDS);
        return true;
    } else {
        set_transient('sbiz_license_status', false, 12 * HOUR_IN_SECONDS);
        return false;
    }
}

function sbiz_update_status(){
    
    if( class_exists('SBIZ_theme_CodeAutoUpdate')) {
        $SBIZ_theme_CodeAutoUpdate = new SBIZ_theme_CodeAutoUpdate(SL_APP_API_URL, SBIZ_THEME_SLUG);
    }else{ 
        die("ERROR: SBIZ_theme_CodeAutoUpdate class not available");
    }
    $license = get_option('sbiz_license_key');
//    printa($license);
        $args = new stdClass();
        $args->slug = SBIZ_THEME_SLUG;
        $args->license_key = $license;
    $response = $SBIZ_theme_CodeAutoUpdate->theme_api_call('', 'status-check', $args);
//printa($response);//die;
    if( 'success' == $response->status && 's205' == $response->status_code){
        set_transient('sbiz_license_status', true, 12 * HOUR_IN_SECONDS);
        return true;
    } else {
        set_transient('sbiz_license_status', false, 12 * HOUR_IN_SECONDS);
        return false;
    }
}