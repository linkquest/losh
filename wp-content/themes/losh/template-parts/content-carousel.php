<?php
/**
 * Character Carousel
 * Uses slick.js - http://kenwheeler.github.io/slick/
 */
?>


<section id="losh-carousel">
    <?php 
    $args = array(  'post_type' => 'character',
                    'posts_per_page' => -1,
                    );
            
    $carousel_query = new WP_Query($args); 
d($carousel_query->have_posts());
    if($carousel_query->have_posts() ):
        while($carousel_query->have_posts()) : $carousel_query->the_post();
            $image = get_field('character_image');
            $name = get_the_title();
            printf('<div class="losh-slide"><a href="%s"><img src="%s" alt="%s"></a></div>',
                    get_the_permalink(),                    
                    $image['url'],
                    $name);
        endwhile;
        wp_reset_postdata(); // reset the query 
    endif;
?>
    
</section>

