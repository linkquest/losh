<?php

function sbiz_create_wlm_level($level_name, $type = null ){
    if( ! class_exists( 'wlmapiclass' )) return;
    $args= array(name => $level_name );
    $result = wlmapi_create_level($args);
printa($result);
    $levels = wlmapi_get_levels();
printa($levels);
    return $result;   
}

function sbiz_wlm_protect_page( $level_id, $page_id, $type = null){
    $args = array(
          'ContentIds' => array($page_id)
     );
     $results = wlmapi_manage_post($level_id, $page_id);;
     return $results['success'];
}

