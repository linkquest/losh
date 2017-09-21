<?php
add_action( 'admin_menu', 'sbiz_admin_page' );
function sbiz_admin_page(){
    $page_title = 'Theme Activation';
    $menu_title = 'Theme Activation';
    $capability = 'manage_options';
    $menu_slug = 'sbiz-activation';
    $function = 'sbiz_activation_page';

    add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
}
function sbiz_activation_page(){
    $licence_option = get_option('sbiz_license_key');
    if( !isset($_POST['update']) ){
        if(is_sbiz_licensed(true) ) {
            update_option('sbiz_license_status','License Active' );
        } else {
             update_option('sbiz_license_status','License Not Active' );
        }
    }

    $licence_status_option = get_option('sbiz_license_status');
?>
<style>
    .dashicons-no{
        font-size: 34px;
        margin-right: 10px;
        color: #cc0000;
    }
    .dashicons-yes{
        font-size: 34px;
        margin-right: 10px;
        color: #00cc00;
    }
</style>
<h1>Activate Theme</h1>
    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
        <input type="hidden" name="action" value="activate_theme">
        <label name="licence"><span class="dashicons <?php echo ('License Active' == $licence_status_option) ? 'dashicons-yes' :'dashicons-no' ?>"></span></label>
       <input type="text" name="license" style="width:300px;" value="<?php echo $licence_option;?>"> 
       <input type="submit" name="submit" value="<?php echo ('License Active' == $licence_status_option) ? 'Deactivate' :'Activate' ?>">
       <div class="sbiz-message" style="margin-left: 40px;">Status:&nbsp;<?php echo ('License Active'== $licence_status_option ) ? 'Licence Active' : $licence_status_option ?></div>
    </form>
<br>
<div class="sbiz-update-status">
    <?php // printa( sbiz_update_status(), 'sbiz_update_status' );?>
</div>
<?php }

function sbiz_activate_theme_form() {
    if('activate_theme' != $_POST['action']) die;
    $licence = sanitize_text_field($_POST['license']);
    $action = sanitize_text_field($_POST['submit']);
    $licence_option = get_option('sbiz_license_key');
    $new_license = ($licence != $licence_option);
//printa($new_license);printa($_POST); die;
    $licence_status_option = get_option('sbiz_license_status');
    if( class_exists('SBIZ_theme_CodeAutoUpdate')) {
        $SBIZ_theme_CodeAutoUpdate = new SBIZ_theme_CodeAutoUpdate(SL_APP_API_URL, SBIZ_THEME_SLUG);
    }else{ 
        die("ERROR: SBIZ_theme_CodeAutoUpdate class not available");
    }
    // save the licence key and set  statuse to false
    if( $new_license ){
        update_option( 'sbiz_license_key', $licence );

    }
// activate Key
    if( 'Activate' == $action){
        $args = new stdClass();
        $args->slug = SBIZ_THEME_SLUG;
        $args->license_key = $licence;
        $response = $SBIZ_theme_CodeAutoUpdate->theme_api_call('', 'activate', $args );
    //printa($response);die;
        if('success' == $response->status){
            update_option( 'sbiz_license_status', 'License Active' );
        } else {
            update_option( 'sbiz_license_status', $response->message );
        }
    }
// deactivate Key
    if( 'Deactivate' == $action){
        $args = new stdClass();
        $args->slug = SBIZ_THEME_SLUG;
        $args->license_key = $licence;
        $response = $SBIZ_theme_CodeAutoUpdate->theme_api_call('', 'deactivate', $args);
    //printa($response);die;
        if('success' == $response->status){
            update_option( 'sbiz_license_status', 'License Not Active' );
        } else {
            update_option( 'sbiz_license_status', $response->message );
        }
    }
// back to the admin page we came from
wp_redirect(admin_url('admin.php?page=sbiz-activation&update=yes'));
die;
}

add_action( 'admin_post_activate_theme', 'sbiz_activate_theme_form' );



