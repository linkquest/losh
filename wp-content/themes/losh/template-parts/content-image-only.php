<?php 
$image = get_sub_field('image');
$vertical_position = get_sub_field('vertical_position');
?>
<div class="image-only" style="background-image:url(<?php echo $image['url'];?>); <?php echo ($vertical_position ? "background-position-y: $vertical_position% ;" : '');?>">
</div>
        
        