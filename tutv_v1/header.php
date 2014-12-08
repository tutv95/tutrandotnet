<!DOCTYPE html>
<?php $options = get_option('great'); ?>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?></title>
	<?php mts_meta(); ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_enqueue_script("jquery"); ?>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php mts_head(); ?>
	<?php wp_head(); ?>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="http://tutran.net/wp-content/themes/tutv_v1/down.css" rel="stylesheet">
</head>
<?php flush(); ?>
<body id ="blog" <?php body_class('main'); ?>>
	<header class="main-header">
		<div id="header"">
			<div class="container">
				<?php if ($options['mts_logo'] != '') { ?>
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
							<h1 id="logo">
								<a href="<?php echo home_url(); ?>"><img src="<?php echo $options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
							</h1><!-- END #logo -->
					<?php } else { ?>
						  <h2 id="logo">
								<a href="<?php echo home_url(); ?>"><img src="<?php echo $options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
							</h2><!-- END #logo -->
					<?php } ?>
				<?php } else { ?>
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
							<h1 id="logo">
								<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
							</h1><!-- END #logo -->
					<?php } else { ?>
						  <h2 id="logo">
								<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
							</h2><!-- END #logo -->
					<?php } ?>
				<?php } ?>
				<div class="secondary-navigation">
					<nav id="navigation" >
						<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
							<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'menu', 'container' => '' ) ); ?>
						<?php } else { ?>
							<ul class="menu">
								<?php wp_list_categories('title_li='); ?>
							</ul>
						<?php } ?>
					</nav>
				</div>
			</div>
		</div><!--#header-->
	</header>
		<div class="breadcrumbs-wrap">
			<div class="breadcrumbs">
				<?php if (is_single() || is_page()) { ?>
					<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div class="breadcrumb-seo">','</div>');} ?>
				<?php } else if (is_home()) { ?>
					<h2>Chia sẻ những gì tôi biết</h2>
				<?php } else if (is_category()) { ?>
					<h1>Chuyên mục: <?php single_cat_title(); ?></h1>
				<?php } else if (is_tag()) { ?>
					<h1>Từ khoá: <?php single_tag_title(); ?></h1>
				<?php } else if (is_author()) { ?>
					<h1>Tác giả: <?php the_author(); ?></h1>
				<?php } else if (is_search()) { ?>
					<h1>Kết quả cho: <?php the_search_query(); ?></h1>
				<?php } else if(is_tax('series')) { ?>
					<h1>Seri: <?php single_term_title(); ?></h1>
				<?php } ?>
				<div class="social">
					<a target="_blank" rel="nofollow" href="http://tutran.net/go/fb" title="Tú Trần Blog trên Facebook"><i class="fa fa-facebook"></i></a>
					<a target="_blank" rel="nofollow" href="http://tutran.net/go/gplus" title="Tú Trần Blog trên Google Plus"><i class="fa fa-google-plus"></i></a>
					<a target="_blank" rel="nofollow" href="http://tutran.net/go/youtube" title="Tú Trần Blog trên Youtube"><i class="fa fa-youtube"></i></a>
				</div>
			</div>
		</div>
		<?php //include("sticky-menu.php"); ?>
<div class="main-container">