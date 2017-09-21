<?php

/* 
 * Register Custom Widgets
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ClassMenu extends WP_Widget {

	function ClassMenu() {
		// Instantiate the parent object
		parent::__construct( false, 'Class Menu',
                        array( 'description' => 'Show the class menu')
                        );
	}

function widget( $args, $instance ) {
            global $wpdb, $course_meta;
		// Widget output
    if(!empty($course_meta) && $course_meta['title']){
        
            $title = apply_filters( 'widget_title', $instance['title'] );
            echo $args['before_widget'];
            echo '<div class="widget-wrap background2">';
            if ( ! empty( $title ) )
                echo $args['before_title'] . $title . $args['after_title'];
            
    // loop through course_meta
            echo '<ul class="class-menu">';
            foreach($course_meta['course_classes'] as $class){
                $class_status = get_post_status($class['course_class_id']);
                if( 'publish' == $class_status || 'draft' == $class_status ){
                    echo sprintf('<li><a href="%s">%s</a></li>',  get_permalink($class['course_class_id'], false),$class['class_title']);
                }
            }
            echo '</ul>';
        echo '</div><!--.widget-wrap-->';
            echo $args['after_widget'];
    }
}

	function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
                }
                else {
                $title = __( 'New title', 'wpb_widget_domain' );
                }
                // Widget admin form
                ?>
                <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
<?php	}
}
function lqm_register_widgets() {
	register_widget( 'ClassMenu' );
}

add_action( 'widgets_init', 'lqm_register_widgets' );

