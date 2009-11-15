<?php

class random_image_wiget extends WP_Widget {
  function random_image_wiget() {
    $currentLocale = get_locale();
    if(!empty($currentLocale)) {
      $moFile = dirname(__FILE__) . "/languages/random_image_wiget_" .  $currentLocale . ".mo";
      if(@file_exists($moFile) && is_readable($moFile)) load_textdomain('', $moFile);
    }
    $random_image_wiget_name = __('Random Image Wiget', 'random_image_wiget');
    $random_image_wiget_description = __('Random Image Wiget for WordPress', 'random_image_wiget');
    $widget_ops = array('classname' => 'random_image_wiget', 'description' => $random_image_wiget_description );
    $this->WP_Widget('random_image_wiget', $random_image_wiget_name, $widget_ops);
  }  

  function widget($args, $instance) {
    extract($args);
    $image_height = empty($instance['image_height']) ? '&nbsp;' : apply_filters('image_height', $instance['image_height']);
  }
  
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['posts_per_page'] = strip_tags($new_instance['posts_per_page']);
    $instance['number_rows'] = strip_tags($new_instance['number_rows']);
    return $instance;
  }

  function form($instance) {
    $posts_per_page = strip_tags($instance['posts_per_page']);
    ?>
    <p><label for="<?php echo $this->get_field_id('posts_per_page'); ?>"><?php _e('Posts per Page', 'colored-posts-wiget')?>:<input class="widefat" id="<?php echo $this->get_field_id('posts_per_page'); ?>" name="<?php echo $this->get_field_name('posts_per_page'); ?>" type="text" value="<?php echo attribute_escape($posts_per_page); ?>" /></label></p>
    <?php
  }
  
}

add_action('widgets_init', 'random_image_wiget_init');
function random_image_wiget_init() {
        register_widget('random_image_wiget');
}

?>
