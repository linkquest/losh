<?php
/* set define('ACF_DEBUG', false); OR remove from wp-config to activate these field groups.
 * The field groups in the ACF UI must be in the trash before this will work properly
 * To make changes to the field groups,
 * 1) Remove field groups from trash OR recover them useing the XML export or 
 *     https://github.com/seamusleahy/ACF-PHP-Recovery
 * 2) Set ACF_DEBUG to true in wp-config
 */

if(! ACF_DEBUG ){
if( function_exists('acf_add_local_field_group')  ):

// Field Group export goes here

endif;
}
