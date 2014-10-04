<?php get_header(); ?>
<?php $options = get_option('great'); ?>
<div id="page" class="single">
	<div class="content">
		<article class="article">
			<div id="content_box" >
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
						<div class="single_post">
							<header>
								<h1 class="entry-title title single-title"><?php the_title(); ?></h1>
								<div class="single-postmeta">
									<span class="author"><i class="fa fa-user"></i><?php the_author_posts_link(); ?></span><span class="category"><i class="fa fa-bars"></i><?php $category = get_the_category(); echo '<a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a>';?></span><span class="time date updated"><i class="fa fa-calendar"></i><time><?php the_time('j/m/Y'); ?></time></span>
								</div>
							</header><!--.headline_area-->
							<div class="post-single-content box mark-links entry-content">
								<?php if (get_post_meta($post->ID, '_yoast_wpseo_metadesc', true)) { ?>
									<h2 class="metadesc"><?php echo get_post_meta($post->ID, '_yoast_wpseo_metadesc', true); ?></h2>
								<?php } ?>
								<?php the_content(); ?>
								<?php wp_link_pages('before=<div class="pagination2">&after=</div>'); ?>
								<?php if ($options['mts_postend_adcode'] != '') { ?>
									<div class="bottomad">
										<?php echo $options['mts_postend_adcode'];?>
									</div>
								<?php } ?> 
								<div class="tags"><?php the_tags('<span class="tagtext">Từ khoá: </span>',', ') ?></div>
								<?php v1_in($post->ID); ?>
							</div>
						</div><!--.post-content box mark-links--> 
						<div class="postauthor">
							<h4><?php _e('Giới thiệu về tác giả', 'mythemeshop'); ?></h4>
							<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '100' );  } ?>
							<p><?php the_author_meta('description') ?>. <span class="vcard author"><span class="fn"><a href="https://plus.google.com/+TuTran95" rel="author" target="_blank">Tú Trần</a> trên Google Plus.</span></span></p>
						</div>
					</div><!--.g post-->
					<?php comments_template( '', true ); ?>
				<?php endwhile; /* end loop */ ?>
			</div>
		</article>
		<?php get_sidebar(); ?>
<?php get_footer(); ?>