<?php get_header(); ?>
<div id="page" class="single">
	<div class="content">
		<article class="article">
			<div class="single_post">
				<header>
					<div class="title">
						<h1><?php _e('Error 404 Not Found', 'mythemeshop'); ?></h1>
					</div>
				</header>
				<div class="post-content">
					<p><?php _e('Oops! We couldn\'t find this Page.', 'mythemeshop'); ?><br/>
					<?php _e('Please check your URL or use the search form below.', 'mythemeshop'); ?></p>
					<?php get_search_form();?>
				</div>
			</div>
		</article>
		<?php get_sidebar(); ?>
<?php get_footer(); ?>