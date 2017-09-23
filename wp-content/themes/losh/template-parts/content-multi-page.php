<?php
$bg = get_field('background_images', 'option');?>
<style>
<?php foreach( $bg as $i =>$image){?>
    .bg<?php echo $i;?>{ background-image: url(<?php echo $image['image']['url'];?>);}
<?php }?>
    </style>
<?php 
$bg_cnt = count($bg);
//d($bg);
//d($bg_cnt);
if( have_rows('multi_pages') ):
    $i = 0;
    while ( have_rows('multi_pages') ) : the_row();
    $page = get_sub_field('page')?>
    <?php $id = 'losh-'  . $i;?>
        <section id="<?php echo $id;?>" class="<?php echo 'post-' . $page->ID;?> multi-page" data-loshBG="<?php echo $bg[$i++]['image']['url'];?>">
            <div id="<?php echo $id . '-anchor';?>" class="anchor-spacer"></div>
            <div class="wrapper">
                <?php
                if( have_rows('page_type',$page->ID) ):

                    while ( have_rows('page_type', $page->ID) ) : the_row();

                       if( get_row_layout() == 'image_only' ):
                            get_template_part( 'template-parts/content', 'image-only' );

                       elseif( get_row_layout() == 'rich_text' ): 
                           get_template_part( 'template-parts/content', 'rich-text' );

 
get_template_part( 'template-parts/content', 'image-only' );

                       endif;

                    endwhile;
               endif;
           ?>
            </div>
        </section>

    <?php
    endwhile;
endif;?>
    <div id="scroll-down">
        <a href="#losh-1">
            <img src="<?php echo get_template_directory_uri() . '/images/scroll-down-arrow.png';?>">
        </a>
    </div>
    <div id="scroll-up">
        <a href="#page">
            <img src="<?php echo get_template_directory_uri() . '/images/scroll-up-arrow.png';?>">
        </a>
    </div>
<div class="hidden">
	<script type="text/javascript">
		<!--//--><![CDATA[//><!--
			var images = new Array()
			function preload() {
				for (i = 0; i < preload.arguments.length; i++) {
					images[i] = new Image()
					images[i].src = preload.arguments[i]
				}
			}
			preload(
				<?php 
                                foreach( $bg as $image){
                                    echo '"' . $image['image']['url'] .'",';
                                }?>
			)
		//--><!]]>
	</script>
</div>

