<?php
// print array with style
if(! function_exists('printa')){
 function printa($a, $label = "debug") {
	if(is_array($a) || is_object($a)) {
	 echo '<br><pre class="debug">';
	 
	 if(is_array($a)){echo $label . ' = Array:<br>';}
	 if(is_object($a)){echo $label . ' = Object:<br>';}
	 print_r($a);
	 echo '</pre><br>';
	 } elseif(is_bool($a)){
             echo sprintf('<br><pre>%s = variable = %s</pre><br>', $label,($a ? 'TRUE' : 'FALSE'));
         } else {
	 echo '<br><pre>';
	 echo($label . ' = variable = ' . $a);
	 echo '</pre><br>';
	 }
	 
  }
}

/**
 * Send debug code to the Javascript console
 */ 
if(!function_exists( 'debug_to_console')) {
    function debug_to_console($data) {
        if(is_array($data) || is_object($data))
            {
                    echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
            } else {
                    echo("<script>console.log('PHP: ".$data."');</script>");
            }
    }
}

  /* Filter body class */
add_filter('body_class','mobile_theme_body_class');
 
/**
 * Add Mobile Body Class "wp-is-mobile" for mobile
 * and "wp-is-not-mobile" for non-mobile device
 * 
 * @since 0.1.1
 * @link http://codex.wordpress.org/Function_Reference/wp_is_mobile
 * @link https://shellcreeper.com/better-responsive-design-with-wp_is_mobile-why-responsive-design-is-not-enough/
 */
if(!function_exists( 'mobile_theme_body_class')) {
    function mobile_theme_body_class( $classes ){

        /* using mobile browser */
        if ( wp_is_mobile() ){
            $classes[] = 'wp-is-mobile';
        }
        else{
            $classes[] = 'wp-is-not-mobile';
        }
        return $classes;
    }
}
/*
 * Numeric Pagation - Prev 1 2 3 4 Next
 * 
 * if ( get_query_var('paged' ) ) { $paged = get_query_var('paged'); }
                elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
                else { $paged = 1; }
 * $args = array (
                            'pagination'             => true,
                            'paged'                  => $paged,
                            'posts_per_page'         => '12',
 * );
 */
function lqm_numeric_pagination($prev='Prev', $next='Next',&$query=NULL){
 if($query == NULL)  { 
     global $wp_query;
     $query = $wp_query;
  }
    $big = 99999999;
    echo '<section class="pagination">';
    $args = array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '&paged=%#%',
        'total' => $query->max_num_pages,
        'current' => max(1, $query->query['paged']),
        'show_all' => false,
        'end_size' => 2,
        'mid_size' => 3,
        'prev_next' => true,
        'prev_text' => $prev,
        'next_text' => $next,
        'type' => 'list'
    );
    echo paginate_links($args);

    echo '</section>';
}
/* modifed for static  home page with blog template*/
if(!function_exists( 'lqm_homepage_numeric_pagination')) {
    function lqm_homepage_numeric_pagination($prev='Prev', $next='Next',&$query=NULL){
     if($query == NULL)  { 
         global $wp_query;
         $query = $wp_query;
      }

        $big = 99999999;

        echo '<section class="pagination">';
        echo paginate_links(array(
            'base' => get_pagenum_link() . '?paged=%_%',
            'format' => '%#%',
            'total' => $query->max_num_pages,
            'current' => max(1, $query->query_vars['paged']),
            'show_all' => false,
            'end_size' => 2,
            'mid_size' => 3,
            'prev_next' => true,
            'prev_text' => $prev,
            'next_text' => $next,
            'type' => 'list'
        ));
        echo '</section>';
    }
}
/*
 * Get the font awesome social media icon
 */
if(!function_exists( 'sm_icon')) {
    function sm_icon($name = NULL){
        if( ! $name ) return NULL;
        $fa = array(
                    'facebook' => '<i class="fa fa-facebook-square"></i>',
                    'twitter' => '<i class="fa fa-twitter-square"></i>',
                    'youtube' => '<i class="fa fa-youtube-square"></i>',
                    'pinterest' => '<i class="fa fa-pinterest-square"></i>',
                    'instagram' => '<i class="fa fa-instagram"></i>',
                    'linkedin' => '<i class="fa fa-linkedin-square"></i>',
                    );
        $icon = $fa[strtolower($name)];
        return $icon;
    }
}


/*
Cut the string without breaking any words, UTF-8 aware 
* param string $str The text string to split
* param integer $start The start position, defaults to 0
* param integer $words The number of words to extract, defaults to 15
*/
if(!function_exists( 'wordCutString')) {
    function wordCutString($str, $start = 0, $words = 15 ) {
        $arr = preg_split("/[\s]+/",  $str);
        $cnd = count($arr);
        $arr = array_slice($arr, $start, $words);
        if($cnd > $words) { $arr[] = ' ...';}
        return join(' ', $arr);
    }
}

if(!function_exists( 'cut_word')) {
    function cut_word($string, $length = 100){
        if (strlen($string) > $length) {$string = substr($string, 0, strrpos(substr($string, 0, $length), ' '));}
        return $string;
    }
}
/**
 * Set the menu text to lowercase and allow the CSS to control capitalization
 * @param type $atts
 * @param type $item change $item->title
 * @param type $args
 * @return type
 */
if(!function_exists( 'sbiz_lowercase_menu_item')) {
    function sbiz_lowercase_menu_item( $atts, $item ) {
        $item->title = strtolower($item->title);
        return $atts;
    }
}
add_filter( 'nav_menu_link_attributes', 'sbiz_lowercase_menu_item', 10, 2 );
/**
 * Add course to the user_meta course list
 * @param string $sku course number
 * @param int $user user number
 * @return none
 */
function add_class_to_user( $sku = null , $user = null  ){
        if( empty( $sku ) ) return;
        if ( null === $user ) {
        $current_user = wp_get_current_user();
        if ( !($current_user instanceof WP_User) ) return;
        $user = $current_user->ID;
    }
    $course_list = get_user_meta($user, '_course_list', true);

    if( ! in_array( $sku , $course_list )){
        $course_list[] = $sku;
        update_user_meta( $user,  '_course_list', $course_list );
        if( isset($_SESSION['paypal']) ) {
            unset($_SESSION['paypal']);
            $_SESSION['registered'] = true;
        }
        
    } 

}

/**
 * Check if user has access to the course
 * @param int $course_id
 * @param int $user_id
 * @return boolean true if user owns course
 */
function user_has_access(  $course_id=null, $user_id=null){
    if( ! is_admin() && null == $course_id) return false;
    if ( null === $user_id ) {
        $current_user = wp_get_current_user();
        if ( !($current_user instanceof WP_User) ) return false; // not a valid user
        $user_id = $current_user->ID;
    }
    if ( current_user_can( 'manage_options' ) ) return true; //give admins access
    $membership_type = get_theme_mod( 'membership_plugin', 'int' );

    //Wishlist member
    if( 'wlm' == $membership_type) {
        if(!function_exists('wlmapi_is_user_a_member')) die('Wishlist Member is not installed');
        $course_wlm_levels = get_field('sbiz_membership',$course_id );
 
        foreach( $course_wlm_levels as $level){
            $check = wlmapi_is_user_a_member($level, $user_id);
                if( $check )return true;
            }
            //no match
            return false;
        
    }
    // Paid Memership Pro  pmpro_hasMembershipLevel($levels)
    if( 'pmp' == $membership_type) {
        if(!function_exists('pmpro_hasMembershipLevel')) die('Paid Memberships Pro is not installed');
        $course_wlm_levels = get_field('sbiz_membership',$course_id);
        $check = pmpro_hasMembershipLevel($course_wlm_levels);
        return $check;
    }
    // internal 
    $course_list = get_user_meta($user_id, '_course_list', true);
    if( in_array( $sku, (array)$course_list ) ) return true;
    return false;
}

/**
 * Get list of course ids
 * @return array cpt course ids
 */
function get_course_id(){
$course_ids = get_posts(array(
        'numberposts'   => -1, // get all posts.
        'post_type' => 'course',
        'fields'        => 'ids', // Only get post IDs
    ));
return $course_ids;
}

function get_users_course_list( $user_id = null, $array = false){
    if ( null === $user_id ) {
        $current_user = wp_get_current_user();
        if ( !($current_user instanceof WP_User) ) return false; // not a valid user
        $user_id = $current_user->ID;
    }
    $courses = get_course_id();

    foreach($courses as $course ){
        if( user_has_access($course,$user_id ) ) {
            $list[] = $course;
        }
    }
    if( true == $array ) return $list;
  
    ob_start();
    echo '<ul class="course-list">';
    if(0 == count($list)) {
        echo '<li>No Courses in Users Account</li>';
    }else {
        foreach($list as $id ){
            printf('<li><a href="%1$s" alt="%2$s">%2$s</a>%3$s</li>',
            get_permalink($id),
            get_the_title($id, false),
            ( ($text = get_field('course_description', $id, false) ) ? '<span>:&nbsp;</span>' . $text : '')
            );
        }
    }

    echo '</ul><!-- .course-list-->';
    $course_list = ob_get_clean();

    return $course_list;
}

/**
 * Get page ID with slug
 * @param string $page_slug
 * @return integer
 */
function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
} 

/**
 * Used in landing page
 * Uses 'add_background', and 'background_color' from landing page settings
 * @return string
 */
function mk_background(){
    if(! get_sub_field('add_background')) return;
    $color = get_sub_field('background_color');
    return sprintf(' style="background-color:%s; padding-top:50px; padding-bottom:50px;margin-bottom:0;"',$color);
}

