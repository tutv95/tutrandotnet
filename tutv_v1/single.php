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
									<span class="vcard author"><i class="fa fa-user"></i><span class="fn"><?php the_author_posts_link(); ?></span></span><span class="category"><i class="fa fa-bars"></i><?php $category = get_the_category(); echo '<a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a>';?></span><span class="time date updated"><i class="fa fa-calendar"></i><time><?php the_time('j/m/Y'); ?></time></span><span class="views"><i class="fa fa-eye"></i><?php v1_views(); ?></span>
								</div>
							</header><!--.headline_area-->
							<div id="ads-top">
								<script src="http://170.hoiquantinhoc.com/free_host_2/images.js" language="javascript" type="text/javascript"></script>
							</div>
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
								<div class="tuTV_like_FB"><p><i class="fa fa-thumbs-o-up"></i>Theo dõi <strong>Tu Tran dot Net</strong> trên Facebook để không bỏ lỡ những kiến thức bổ ích.</p><div class="fb-like" data-href="https://facebook.com/tutran.net" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div></div>
								<div class="tags"><?php the_tags('<span class="tagtext">Từ khoá: </span>',', ') ?></div>
								<?php v1_in($post->ID); ?>
							</div>
						</div><!--.post-content box mark-links--> 
						<div class="postauthor">
							<h4><?php _e('Giới thiệu về tác giả', 'mythemeshop'); ?></h4>
							<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '100' );  } ?>
							<p><?php the_author_meta('description') ?></p>
						</div>
					</div><!--.g post-->
					<?php comments_template( '', true ); ?>
				<?php endwhile; /* end loop */ ?>
			</div>
		</article>
		<?php get_sidebar(); ?>
<?php get_footer(); ?>