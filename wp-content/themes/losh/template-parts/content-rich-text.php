<?php 
$content = get_sub_field('wysiwyg');
d($content);
?>
<div class="wysiwyg">
    <?php echo do_shortcode( $content );?>
</div>
