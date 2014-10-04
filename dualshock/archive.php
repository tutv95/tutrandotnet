<?php $mts_options = get_option('dualshock'); ?>
<?php get_header(); ?>
<div id="page">
	<div class="content">
		<article class="article">
			<div id="content_box">
				<h1 class="postsby">
					<?php if (is_category()) { ?>
						<span><?php _e("Chuyên mục: ", "mythemeshop"); ?><?php single_cat_title(); ?></span>
					<?php } elseif (is_tag()) { ?> 
						<span><?php _e("Tag: ", "mythemeshop"); ?><?php single_tag_title(); ?></span>
					<?php } elseif (is_search()) { ?> 
						<span><?php _e("Kết quả tìm kiếm cho: ", "mythemeshop"); ?></span> <?php the_search_query(); ?>
					<?php } elseif (is_author()) { ?>
						<span><?php _e("Tác giả: ", "mythemeshop"); ?><?php the_author(); ?></span>
					<?php } elseif (is_tax('series')) { ?>
						<span><?php _e("Seri: ", "mythemeshop"); ?><?php single_term_title(); ?></span>
					<?php } ?>
				</h1>
				<?php $j = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>
					 <div class="post excerpt <?php echo (++$j % 2 == 0) ? 'last' : ''; ?>">
						<header>						
							<h2 class="title">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h2>
						</header>
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
							<?php if ( has_post_thumbnail() ) { ?> 
								<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('featured',array('title' => '')); echo '</div>'; ?>
							<?php } else { ?>
								<div class="featured-thumbnail">
									<img width="450" height="200" src="<?php echo get_template_directory_uri(); ?>/images/nothumb.png" class="attachment-featured wp-post-image" alt="<?php the_title(); ?>">
								</div>
							<?php } ?>
						</a>
						<div class="post-content image-caption-format-1">
							<?php echo excerpt(38);?>
						</div>
						<div class="tags"><?php the_tags('<span class="tagtext">'.__('Tags','mythemeshop').':</span>',', ') ?></div>
					</div>
                     <div class="post-info">
						<span class="thetime"><?php _e('','mythemeshop'); the_time('j M y'); ?></span>
						<span class="theauthor"><?php _e('Author ','mythemeshop'); the_author_posts_link(); ?></span>
						<span class="thecategory"><?php _e(' Category','mythemeshop'); the_category(', ') ?></span>
						<span class="thecomment"><?php echo comments_number(__('0 bình luận','mythemeshop'), __('1 bình luận','mythemeshop'), '<span class="comments">'.__('bình luận','mythemeshop').'</span> <span class="comm">%</span>');?></span>
						<span class="readMore"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php _e('Đọc tiếp','mythemeshop'); ?></a></span>
                    </div>
				<?php endwhile; else: ?>
					<div class="post excerpt">
						<div class="no-results">
							<p><strong><?php _e('There has been an error.', 'mythemeshop'); ?></strong></p>
							<p><?php _e('We apologize for any inconvenience, please hit back on your browser or use the search form below.', 'mythemeshop'); ?></p>
							<?php get_search_form(); ?>
						</div><!--noResults-->
					</div>
				<?php endif; ?>	
				<!--Start Pagination-->
				<?php if ( isset($mts_options['mts_pagenavigation']) == '1' ) { ?>
					<?php  $additional_loop = 0; pagination($additional_loop['max_num_pages']); ?>           
				<?php } else { ?>
					<div class="pagination">
						<ul>
							<li class="nav-previous"><?php next_posts_link( __( '&larr; '.'Older posts', 'mythemeshop' ) ); ?></li>
							<li class="nav-next"><?php previous_posts_link( __( 'Newer posts'.' &rarr;', 'mythemeshop' ) ); ?></li>
						</ul>
					</div>
				<?php } ?>
				<!--End Pagination-->
			</div>
		</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>