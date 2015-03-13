<?php
	function v1_in($id_) {
		$category = get_the_category($id_);
		$cat_ID = $category[0]->cat_ID;
		$args = array('posts_per_page' => '5', 'cat' => $cat_ID, 'orderby' => 'rand', 'post__not_in' => array($id_));
		$query = new WP_Query($args);
		if ( $query->have_posts() ):
		echo '<h4 class="interested">Có thể bạn quan tâm</h4>';
		echo '<div class="quan-tam"><ul>';
		while ( $query->have_posts() ):
			$query->the_post();
			echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
			endwhile;
		echo '</ul></div>';
		endif;
		wp_reset_query();
	}

	//Delete Revisions
	$wpdb->query( "DELETE FROM $wpdb->posts WHERE post_type = 'revision'" );

	function v1_views() {
		$_views = get_post_meta(get_the_ID(), 'views', true);

		if ($_views<1000) {
			echo $_views;
		}
		else {
			echo number_format($_views/1000, 1, '.', '').'K';
		}
	}


//Making jQuery Google API
function modify_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', false, '1.8.2');
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'modify_jquery');

?>