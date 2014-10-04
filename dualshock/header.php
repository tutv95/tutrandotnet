<!DOCTYPE html>
<?php $mts_options = get_option('dualshock'); ?>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php mts_meta(); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<?php flush(); ?>
<body id ="blog" <?php body_class('main'); ?>>
	<header class="main-header">
		<div class="secondary-navigation">
			<nav id="navigation" >
				<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
					<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'menu', 'container' => '' ) ); ?>
				<?php } else { ?>
					<ul class="menu">
						<?php wp_list_categories('title_li='); ?>
					</ul>
				<?php } ?>
				<a href="#" id="pull"><?php _e('Menu','mythemeshop'); ?></a>  
			</nav>
		</div>
		<div class="container">
			<div id="header">
				<?php if ($mts_options['mts_logo'] != '') { ?>
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
							<h1 id="logo" class="image-logo">
								<a href="<?php echo home_url(); ?>"><img src="<?php echo $mts_options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
							</h1>
					<?php } else { ?>
						  <h2 id="logo" class="image-logo">
								<a href="<?php echo home_url(); ?>"><img src="<?php echo $mts_options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
							</h2>
					<?php } ?>
				<?php } else { ?>
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
							<h1 id="logo" class="text-logo">
								<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
							</h1>
					<?php } else { ?>
						  <h2 id="logo" class="text-logo">
								<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
							</h2>
					<?php } ?>
				<?php } ?>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Header Banner') ) : ?><?php endif; ?>              
			</div>
		</div>
	</header>
	<div class="main-container">