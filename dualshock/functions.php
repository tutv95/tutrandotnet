<?php
/*-----------------------------------------------------------------------------------*/
/*	Do not remove these lines, sky will fall on your head.
/*-----------------------------------------------------------------------------------*/
require_once( dirname( __FILE__ ) . '/theme-options.php' );
if ( ! isset( $content_width ) ) $content_width = 960;

/*-----------------------------------------------------------------------------------*/
/*	Load Translation Text Domain
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain( 'mythemeshop', get_template_directory().'/lang' );
if ( function_exists('add_theme_support') ) add_theme_support('automatic-feed-links');

/*-----------------------------------------------------------------------------------*/
/*	Post Thumbnail Support
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 450, 200, true );
	add_image_size( 'featured', 450, 200, true ); //featured
	add_image_size( 'widgetthumb', 85, 65, true ); //widget
}

/*-----------------------------------------------------------------------------------*/
/*	Javascsript
/*-----------------------------------------------------------------------------------*/
function mts_add_scripts() {
	$mts_options = get_option('dualshock');
	global $data; //get theme options
	
	wp_enqueue_script('jquery');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Site wide js
	wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/js/modernizr.min.js');
	wp_enqueue_script('customscript', get_stylesheet_directory_uri() . '/js/customscript.js');

	global $is_IE;
    if ($is_IE) {
        wp_register_script ('html5shim', "http://html5shim.googlecode.com/svn/trunk/html5.js");
        wp_enqueue_script ('html5shim');
	}
}
add_action('wp_enqueue_scripts','mts_add_scripts');

/*-----------------------------------------------------------------------------------*/
/* Enqueue CSS
/*-----------------------------------------------------------------------------------*/
function mts_enqueue_css() {
	$mts_options = get_option('dualshock');
	global $data; //get theme options
	
	wp_enqueue_style('stylesheet', get_stylesheet_directory_uri() . '/style.css', 'style');
	
	wp_register_style( 'GoogleFonts', 'http://fonts.googleapis.com/css?family=Play:regular,bold&v1'); 
    wp_enqueue_style( 'GoogleFonts' ); 
	
	$mts_sclayout = ''; 
	$mts_bg = '';
	if ($mts_options['mts_layout'] == 'sclayout') {
		$mts_sclayout = '.article { float: right;}
		.sidebar.c-4-12 { float: left; padding-right: 0; }';
	}
	$custom_css = "
		{$mts_sclayout}
		{$mts_options['mts_custom_css']}
			";
	wp_add_inline_style( 'stylesheet', $custom_css );
	
}
add_action('wp_enqueue_scripts', 'mts_enqueue_css');

/*-----------------------------------------------------------------------------------*/
/*	Enable Widgetized sidebar
/*-----------------------------------------------------------------------------------*/
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name'=>'Sidebar',
		'description'   => __( 'Appears on homepage, posts and pages', 'mythemeshop' ),
		'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Header Banner',
		'description'   => __( 'Appears on header. Use this section to show header Ad.', 'mythemeshop' ),
		'id' => 'widget-header',
		'before_widget' => '<div class="widget-header">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => ''
	));
	register_sidebar(array(
		'name' => 'Left Footer',
		'description'   => __( 'Appears in left side of footer.', 'mythemeshop' ),
		'id' => 'footer-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Center Footer',
		'description'   => __( 'Appears in center of footer.', 'mythemeshop' ),
		'id' => 'footer-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Right Footer',
		'description'   => __( 'Appears in right side of footer.', 'mythemeshop' ),
		'id' => 'footer-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

/*-----------------------------------------------------------------------------------*/
/*	Load Widgets & Shortcodes
/*-----------------------------------------------------------------------------------*/
// Add the 125x125 Ad Block Custom Widget
include("functions/widget-ad125.php");

// Add the 300x250 Ad Block Custom Widget
include("functions/widget-ad300.php");

// Add the 728x90 Ad Block Custom Widget
include("functions/widget-ad728.php");

// Add the Tabbed Custom Widget
include("functions/widget-tabs.php");

// Add the Latest Tweets Custom Widget
include("functions/widget-tweets.php");

// Add Subscribe Widget
include("functions/widget-subscribe.php");

// Add Welcome message
include("functions/welcome-message.php");

// Theme Functions
include("functions/theme-actions.php");

/*-----------------------------------------------------------------------------------*/
/*	Filters customize wp_title
/*-----------------------------------------------------------------------------------*/
function mts_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'mythemeshop' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'mts_wp_title', 10, 2 );

/*-----------------------------------------------------------------------------------*/
/*	Custom Comments template
/*-----------------------------------------------------------------------------------*/
function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" style="position:relative;">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment->comment_author_email, 80 ); ?>
				<?php printf(__('<span class="fn">%s</span>', 'mythemeshop'), get_comment_author_link()) ?> 
				<time><?php comment_date('F j, Y \a\t g:i a'); ?></time>
			</div>
			<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.', 'mythemeshop') ?></em>
				<br />
			<?php endif; ?>
			<div class="comment-meta">
				<?php edit_comment_link(__('(Edit)', 'mythemeshop'),'  ','') ?>
			</div>
			<div class="commentmetadata">
				<?php comment_text() ?>
			</div>
			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
		</div>
	</li>
<?php }


/*-----------------------------------------------------------------------------------*/
/*	Custom Menu Support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'primary-menu' => 'Primary Menu'
		)
	);
}

/*-----------------------------------------------------------------------------------*/
/*	excerpt
/*-----------------------------------------------------------------------------------*/
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/*-----------------------------------------------------------------------------------*/
/* nofollow to next/previous links
/*-----------------------------------------------------------------------------------*/
function pagination_add_nofollow($content) {
    return 'rel="nofollow"';
}
add_filter('next_posts_link_attributes', 'pagination_add_nofollow' );
add_filter('previous_posts_link_attributes', 'pagination_add_nofollow' );

/*-----------------------------------------------------------------------------------*/
/* Nofollow to category links
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_category', 'add_nofollow_cat' ); 
function add_nofollow_cat( $text ) {
$text = str_replace('rel="category tag"', 'rel="nofollow"', $text); return $text;
}

/*-----------------------------------------------------------------------------------*/	
/* nofollow post author link
/*-----------------------------------------------------------------------------------*/
add_filter('the_author_posts_link', 'mts_nofollow_the_author_posts_link');
function mts_nofollow_the_author_posts_link ($link) {
return str_replace('<a href=', '<a rel="nofollow" href=',$link); 
}

/*-----------------------------------------------------------------------------------*/	
/* nofollow to reply links
/*-----------------------------------------------------------------------------------*/
function add_nofollow_to_reply_link( $link ) {
return str_replace( '")\'>', '")\' rel=\'nofollow\'>', $link );
}
add_filter( 'comment_reply_link', 'add_nofollow_to_reply_link' );

/*-----------------------------------------------------------------------------------*/
/* removes detailed login error information for security
/*-----------------------------------------------------------------------------------*/
add_filter('login_errors',create_function('$a', "return null;"));
	
/*-----------------------------------------------------------------------------------*/
/* removes the WordPress version from your header for security
/*-----------------------------------------------------------------------------------*/
function wb_remove_version() {
	return '<!--Theme by MyThemeShop.com-->';
}
add_filter('the_generator', 'wb_remove_version');
	
/*-----------------------------------------------------------------------------------*/
/* Removes Trackbacks from the comment count
/*-----------------------------------------------------------------------------------*/
add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}

/*-----------------------------------------------------------------------------------*/
/* adds a class to the post if there is a thumbnail
/*-----------------------------------------------------------------------------------*/
function has_thumb_class($classes) {
	global $post;
	if( has_post_thumbnail($post->ID) ) { $classes[] = 'has_thumb'; }
		return $classes;
}
add_filter('post_class', 'has_thumb_class');

/*-----------------------------------------------------------------------------------*/	
/* Breadcrumb
/*-----------------------------------------------------------------------------------*/
function the_breadcrumb() {
	echo '<a href="';
	echo home_url();
	echo '" rel="nofollow"><i class="icon-home"></i>&nbsp;'.__('Home','mythemeshop');
	echo "</a>";
	if (is_category() || is_single()) {
		echo "&nbsp;/&nbsp;";
		the_category(' &bull; ');
			if (is_single()) {
				echo "&nbsp;/&nbsp;";
				the_title();
			}
	} elseif (is_page()) {
		echo "&nbsp;/&nbsp;";
		echo the_title();
	} elseif (is_search()) {
		echo "&nbsp;/&nbsp;".__('Search Results for','mythemeshop')."... ";
		echo '"<em>';
		echo the_search_query();
		echo '</em>"';
	}
}

/*-----------------------------------------------------------------------------------*/	
/* Pagination
/*-----------------------------------------------------------------------------------*/
function pagination($pages = '', $range = 3) { 
	$showitems = ($range * 3)+1;
	global $paged; if(empty($paged)) $paged = 1;
	if($pages == '') {
		global $wp_query; $pages = $wp_query->max_num_pages; 
		if(!$pages){ $pages = 1; } 
	}
	if(1 != $pages) { 
		echo "<div class='pagination'><ul>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
			echo "<li><a rel='nofollow' href='".get_pagenum_link(1)."'>&laquo; ".__('First','mythemeshop')."</a></li>";
		if($paged > 1 && $showitems < $pages) 
			echo "<li><a rel='nofollow' href='".get_pagenum_link($paged - 1)."' class='inactive'>&lsaquo; ".__('Previous','mythemeshop')."</a></li>";
		for ($i=1; $i <= $pages; $i++){ 
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) { 
				echo ($paged == $i)? "<li class='current'><span class='currenttext'>".$i."</span></li>":"<li><a rel='nofollow' href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
			} 
		} 
		if ($paged < $pages && $showitems < $pages) 
			echo "<li><a rel='nofollow' href='".get_pagenum_link($paged + 1)."' class='inactive'>".__('Next','mythemeshop')." &rsaquo;</a></li>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
			echo "<a rel='nofollow' class='inactive' href='".get_pagenum_link($pages)."'>".__('Last','mythemeshop')." &raquo;</a>";
			echo "</ul></div>"; 
	}
}

/*-----------------------------------------------------------------------------------*/
/* Single Post Pagination
/*-----------------------------------------------------------------------------------*/
function wp_link_pages_args_prevnext_add($args)
{
    global $page, $numpages, $more, $pagenow;
    if (!$args['next_or_number'] == 'next_and_number')
        return $args; 
    $args['next_or_number'] = 'number'; 
    if (!$more)
        return $args; 
    if($page-1) 
        $args['before'] .= _wp_link_page($page-1)
        . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
    ;
    if ($page<$numpages) 
    
        $args['after'] = _wp_link_page($page+1)
        . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
        . $args['after']
    ;
    return $args;
}
add_filter('wp_link_pages_args', 'wp_link_pages_args_prevnext_add');

//Fuction custom
require_once('inc/tuTV_func.php');
?>