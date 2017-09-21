<?php

class SBIZ_theme_CodeAutoUpdate
    {
        # URL to check for updates, this is where the index.php script goes
        
        public $api_url;
        public $version;
        private $slug;

        public function __construct($api_url, $slug)
            {
                $this->api_url = $api_url;

                $this->slug = $slug;
                
                
                if(function_exists('wp_get_theme'))
                    {
                        $theme_data = wp_get_theme(get_option('template'));
                        $this->version = $theme_data->Version;  
                    } 
                else 
                    {
                        $theme_data = get_theme_data( TEMPLATEPATH . '/style.css');
                        $this->version = $theme_data['Version'];
                    }    

            }

        public function get_api_url(){
            return $this->api_url;
        }
                
        public function check_for_update($checked_data)
            {

//error_log ('check_for_update($checked_data): $checked_data= ' . print_r($checked_data, TRUE) );
                if (empty($checked_data->checked) || !isset($checked_data->checked[$this->slug]))
                    return $checked_data;
                $args = new stdClass();
                $args->license_key = get_option('sbiz_license_key') ;
                $request_string = $this->prepare_request('theme_update', $args);
                if($request_string === FALSE)
                    return $checked_data;
//error_log ('passed checks: 1: request_string = ' . print_r($request_string, true) );
                // Start checking for an update
                $request_uri = $this->api_url . '?' . http_build_query( $request_string , '', '&');
                $data = wp_remote_get( $request_uri );
//error_log ('$data = ' . print_r($data, true) );
                if(is_wp_error( $data ) || $data['response']['code'] != 200)
                    return $checked_data;

                $response_block = json_decode($data['body']);

                if(!is_array($response_block) || count($response_block) < 1)
                    {
                        return $checked_data;    
                    }

                //retrieve the last message within the $response_block
                $response_block = $response_block[count($response_block) - 1];
                $response = isset($response_block->message) ? $response_block->message : '';

                if (is_object($response) && !empty($response)) // Feed the update data into WP updater
                    {
                        $checked_data->response[$this->slug] = (array)$response;
                    }

                return $checked_data;
            }


        public function theme_api_call($def, $action, $args)
            {
//error_log ('theme_api_call($def, $action, $args): action= '. print_r($action, true).' args= '. print_r($args, true));
                if (!is_object($args) || !isset($args->slug) || $args->slug != $this->slug)
                    return false;


                //$args->package_type = $this->package_type;

                $request_string = $this->prepare_request($action, $args);
//error_log ('$request_string:  '. print_r($request_string, true));
                if($request_string === FALSE)
                return new WP_Error('theme_api_failed', __('An error occour when try to identify the theme.' , 'sbiz') . '</p> <p><a href="?" onclick="document.location.reload(); return false;">'. __( 'Try again', 'apto' ) .'</a>');;

                $request_uri = $this->api_url . '?' . http_build_query( $request_string , '', '&');
                $data = wp_remote_get( $request_uri );
//error_log ('$data:  '. print_r($data, true));
                if(is_wp_error( $data ) || $data['response']['code'] != 200)
                return new WP_Error('theme_api_failed', __('An Unexpected HTTP Error occurred during the API request.' , 'sbiz') . '</p> <p><a href="?" onclick="document.location.reload(); return false;">'. __( 'Try again', 'apto' ) .'</a>', $data->get_error_message());

                $response_block = json_decode($data['body']);
                //retrieve the last message within the $response_block
                $response_block = $response_block[count($response_block) - 1];
                $response = $response_block->message;
//printa($response, 'reponse');
//die;
                if (is_object($response) && !empty($response)) // Feed the update data into WP updater
                    {
                        //include slug and theme data
                        $response->theme = $this->slug;

                        return $response;
                    }
                    return $response_block;
            }

        public function prepare_request($action, $args)
            {

                global $wp_version;
//error_log ('prepare_request ->$args:  '. print_r($args['license_key'], true));
                return array(
                                'woo_sl_action' => $action,
                                'version' => $this->version,
                                'product_unique_id' => SL_PRODUCT_ID,
                                'licence_key' => $args->license_key,
                                'domain' => SL_INSTANCE,

                                'wp-version' => $wp_version,

                );
            }
    }

function SBIZ_theme_run_updater()
    {
        
        $SBIZ_theme_CodeAutoUpdate = new SBIZ_theme_CodeAutoUpdate(SL_APP_API_URL, SBIZ_THEME_SLUG);

        add_filter('pre_set_site_transient_update_themes', array($SBIZ_theme_CodeAutoUpdate, 'check_for_update'));
        add_filter('themes_api', array($SBIZ_theme_CodeAutoUpdate,  'theme_api_call'), 10, 3);

    }

if (is_admin())
    {
        SBIZ_theme_run_updater();
    }
