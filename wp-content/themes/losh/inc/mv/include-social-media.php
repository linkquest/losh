<?php
function sbiz_get_social_icons(){
// check if the repeater field has rows of data
                    $social_media_links = get_option('social_media_links', '');
                    if( !empty( $social_media_links ) ):?>
                        <ul class="sm-links nav-color">
                        <?php     // loop through the rows of data
                        foreach ($social_media_links as $sm ){

                            // display a sub field value
                            $sm_name = $sm['social_media_name'];
                            $sm_link = $sm['social_media_link'];
                            $sm_icon = sm_icon($sm_name);
                            echo sprintf('<li><a href="%s" target="_blank">%s</a></li>', $sm_link,$sm_icon);
                        }?>
                        </ul><!--sm-links-->
                    <?php endif;
}