<?php
/**
 * Template Name: Page Without Sidebar
 */
?>
<?php get_header(); ?>
<div id="page">
	<div class="content">
		<article class="ss-full-width">
			<div id="content_box" >
				<div id="content" class="hfeed">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
							<header>
								<h1 class="title"><?php the_title(); ?></h1>
							</header>
							<div class="post-content box mark-links">
								<?php the_content(); ?>
								<div class="team-bk">
									<div class="postauthor">
										<h4><a href="http://tutran.net/author/tutv95" title="Tú Trần" target="_blank">Trần Văn Tú</a></h4>
										<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email', 1), '100' );  } ?>
										<p><?php the_author_meta('description', 1) ?></p>
									</div>

									<div class="postauthor">
										<h4><a href="http://tutran.net/author/quytm_58" title="Trần Minh Quý" target="_blank">Trần Minh Quý</a></h4>
										<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email', 3), '100' );  } ?>
										<p><?php the_author_meta('description', 3) ?></p>
									</div>

									<div class="postauthor">
										<h4><a href="http://tutran.net/author/toonies1810" title="Nguyễn TIến Minh" target="_blank">Nguyễn Tiến Minh</a></h4>
										<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email', 4), '100' );  } ?>
										<p><?php the_author_meta('description', 4) ?></p>
									</div>

									<div class="postauthor">
										<h4><a href="http://tutran.net/author/bmt-uet" title="Bùi Minh Thái" target="_blank">Bùi Minh Thái</a></h4>
										<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email', 2), '100' );  } ?>
										<p><?php the_author_meta('description', 2) ?></p>
									</div>
								</div>
								<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
							</div><!--.post-content box mark-links -->
						</div><!--.g post-->
						<?php comments_template( '', true ); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</article>
<?php get_footer(); ?>