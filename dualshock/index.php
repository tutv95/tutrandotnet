<?php $mts_options = get_option('dualshock'); ?>
<?php get_header(); ?>
<div id="page">
	<div class="content">
		<article class="article">
			<div id="content_box">
				<?php //$arr = array('order'=>'desc', 'posts_per_page'=>'5'); $new_query = new WP_Query($arr); ?>
				<?php $j = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="post excerpt <?php echo (++$j % 2 == 0) ? 'last' : ''; ?>">
						<header>						
							<h2 class="title">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h2>
						</header><!--.header-->
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow">
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
						<div class="tags"><?php the_tags('<span class="tagtext">'.__('Từ khoá','mythemeshop').':</span>',', ') ?></div>
					</div><!--.post excerpt-->
                    <div class="post-info">
						<span class="thetime"><?php _e('','mythemeshop'); the_time('j M y'); ?></span>
						<span class="theauthor"><?php _e('Tác giả','mythemeshop'); the_author_posts_link(); ?></span>
						<span class="thecategory"><?php _e('Chuyên mục','mythemeshop'); the_category(' ') ?></span>
						<span class="thecomment"><?php echo comments_number(__('0 bình luận','mythemeshop'), __('1 bình luận','mythemeshop'), '<span class="comments">'.__('bình luận','mythemeshop').'</span> <span class="comm">%</span>');?></span>
						<span class="readMore"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php _e('Đọc tiếp','mythemeshop'); ?></a></span>
                    </div>
				<?php endwhile; endif; ?>	
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