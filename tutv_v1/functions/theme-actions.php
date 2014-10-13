<?php
$options = get_option('great');	

/*------------[ Meta ]-------------*/
if ( ! function_exists( 'mts_meta' ) ) {
	function mts_meta() { 
	global $options
?>
<?php if ($options['mts_favicon'] != '') { ?>
<link rel="icon" href="<?php echo $options['mts_favicon']; ?>" type="image/x-icon" />
<?php } ?>
<!--iOS/android/handheld specific -->	
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<?php }
}

/*------------[ Head ]-------------*/
if ( ! function_exists( 'mts_head' ) ) {
	function mts_head() { 
	global $options
?>
<link rel="author" href="https://plus.google.com/+TuTran95">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/customscript.js" type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<style type="text/css">
	<?php if($options['mts_bg_color'] != '') { ?>
		body {background-color:<?php echo $options['mts_bg_color']; ?>;}
	<?php } ?>
	<?php if ($options['mts_bg_pattern_upload'] != '') { ?>
		body {background-image: url(<?php echo $options['mts_bg_pattern_upload']; ?>);}
	<?php } ?>
	<?php /*if ($options['mts_color_scheme'] != '') { ?>
		.mts-subscribe input[type="submit"], .breadcrumbs, #tabber ul.tabs li a.selected, .footer-social-inner, .footer-social li a, #commentform input#submit, .tagcloud a, .readMore a, .currenttext, .pagination a:hover, #tabber ul.tabs li.tab-recent-posts a.selected {background-color:<?php echo $options['mts_color_scheme']; ?>; }
		#header, #sidebars .widget, .tagcloud a, .related-posts, .postauthor, #commentsAdd, #tabber, .pagination, .single_post, .single_page, #comments, .ss-full-width {border-color:<?php echo $options['mts_color_scheme']; ?>; }
		.single_post a, a:hover, #logo a, .textwidget a, #commentform a, #tabber .inside li a, .copyrights a:hover, .fn a, #tabber .inside li .meta, .rtitle, .postauthor h5, #navigation ul ul a:hover, .post-info a, footer .widget li a:hover , #tabber .inside li div.info .entry-title a:hover, .post-date, a {color:<?php echo $options['mts_color_scheme']; ?>; }
		#navigation ul ul li:first-child { border-top-color: <?php echo $options['mts_color_scheme']; ?>; }
	<?php } */?>
	<?php //echo $options['mts_custom_css']; ?>
</style>
<!--start custom CSS-->
<?php echo $options['mts_header_code']; ?>
<!--end custom CSS-->
<?php }
}

/*------------[ footer ]-------------*/
if ( ! function_exists( 'mts_footer' ) ) {
	function mts_footer() { 
	global $options
?>
<!--start footer code-->
<?php if ($options['mts_analytics_code'] != '') { ?>
	<?php echo $options['mts_analytics_code']; ?>
<?php } ?>
<!--end footer code-->
<?php }
}

/*------------[ Copyrights ]-------------*/
if ( ! function_exists( 'mts_copyrights_credit' ) ) {
	function mts_copyrights_credit() { 
	global $options
?>
<!--start copyrights-->
<div class="row" id="copyright-note">
	<span><a href="<?php echo home_url(); ?>/" title="Chia sẻ những gì tôi biết">Tú Trần Blog</a> Copyright &copy; 2014.</span>
	<div class="top">Developed by <strong>Black KeyBoard</strong></div>
</div>
<!--end copyrights-->
<?php }
}

?>