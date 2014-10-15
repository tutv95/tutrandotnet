<?php
	function v1_in($id_) {
		$category = get_the_category($id_);
		$cat_ID = $category[0]->cat_ID;
		$args = array('posts_per_page' => '5', 'cat' => $cat_ID, 'orderby' => 'rand', 'post__not_in' => array($id_));
		$query = new WP_Query($args);
		if ( $query->have_posts() ):
		echo '<h3>Có thể bạn quan tâm</h3>';
		echo '<div class="quan-tam"><ul>';
		while ( $query->have_posts() ):
			$query->the_post();
			echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
			endwhile;
		echo '</ul></div>';
		endif;
		wp_reset_query();
	}

	function tutv_filter_post($content) {
		$_like_FB ='<div class="tuTV_like_FB"><p><i class="fa fa-thumbs-o-up"></i>Theo dõi <strong>Tu Tran dot Net</strong> trên Facebook để không bỏ lỡ những kiến thức bổ ích.</p><div class="fb-like" data-href="https://facebook.com/tutran.net" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div></div>';
		return $content.$_like_FB;
	}
	add_filter('the_content', 'tutv_filter_post');

	//Delete Revisions
	$wpdb->query( "DELETE FROM $wpdb->posts WHERE post_type = 'revision'" );
?>