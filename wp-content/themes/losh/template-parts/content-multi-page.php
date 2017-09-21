<?php
$bg = get_field('background_images', 'option');
$bg_cnt = count($bg);
d($bg);
d($bg_cnt);
if( have_rows('multi_pages') ):
    $i = 0;
    while ( have_rows('multi_pages') ) : the_row();
    $page = get_sub_field('page')?>
        <section id="losh-<?php echo $i;?>" class="<?php echo 'post-' . $page->ID;?> multi-page" data-loshBG="<?php echo $bg[$i++]['image']['url'];?>">
            <div class="wrapper">
<div class="entry-title"><?php echo $page->post_title;?></div>
            </div>
        </section>

    <?php
    endwhile;
endif;

