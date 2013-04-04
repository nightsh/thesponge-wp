<?php
/** Tell WordPress to run BTC_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'BTC_setup' );

if ( ! function_exists( 'BTC_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * To override BTC_setup() in a child theme, add your own BTC_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since BTC 1.0
 */
function BTC_setup() {


if ( ! isset( $content_width ) ) $content_width = 500;

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

// Enable post thumbnails
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50, true );
add_image_size( 'project-post-thumbnail', 240, 135,true);
add_image_size( 'category-thumb', 180, 9999 );
add_image_size( 'book-thumb', 280, 9999 );
add_image_size( 'cover-thumb', 60, 9999 );

    /**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'BTC' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/headers/1.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to BTC_header_image_width and BTC_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'BTC_header_image_width', 940 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'BTC_header_image_height', 220 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 220 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Don't support text inside the header image.
	define( 'NO_HEADER_TEXT', true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See BTC_admin_header_style(), below.
	add_custom_image_header( '', 'BTC_admin_header_style' );


	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'1' => array(
			'url' => '%s/images/headers/1.jpg',
			'thumbnail_url' => '%s/images/headers/1-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( '1', 'BTC' )
		),
		'2' => array(
			'url' => '%s/images/headers/2.jpg',
			'thumbnail_url' => '%s/images/headers/2-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( '2', 'BTC' )
		),
		'3' => array(
			'url' => '%s/images/headers/3.jpg',
			'thumbnail_url' => '%s/images/headers/3-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( '3', 'BTC' )
		)
	) );
}
endif;

if ( ! function_exists( 'BTC_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in BTC_setup().
 *
 * @since BTC 1.0
 */
function BTC_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since BTC 1.0
 */
function BTC_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'BTC_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * @since BTC 1.0
 * @return int
 */
function BTC_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'BTC_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since BTC 1.0
 * @return string "Continue Reading" link
 */
function BTC_continue_reading_link() {
    return ' <a href="'. get_permalink() . '" class="read_more">' . __( 'Continue Reading <span class="meta-nav">&rarr;</span>', 'BTC' ) . '</a>';
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and BTC_continue_reading_link().
 *
 * @since BTC 1.0
 * @return string An ellipsis
 */
function BTC_auto_excerpt_more( $more ) {
	return ' &hellip;' . BTC_continue_reading_link();
}
add_filter( 'excerpt_more', 'BTC_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * @since BTC 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function BTC_custom_excerpt_more( $output ) {
    if ( has_excerpt() && ! is_attachment() ) {
        $output .= BTC_continue_reading_link();
    }
    return $output;
}
add_filter( 'get_the_excerpt', 'BTC_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in BTC's style.css.
 *
 * @since BTC 1.0
 * @return string The gallery style filter, with the styles themselves removed.
 */
function BTC_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'BTC_remove_gallery_css' );

if ( ! function_exists( 'BTC_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own BTC_comment(), and that function will be used instead.
 *
 * @since BTC 1.0
 */
function BTC_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
		<div class="gravreply">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'add_below' =>
 $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
		</div><!-- end gravreply -->
			<cite class="fn"><?php comment_author_link(); ?></cite>

			<span class="comment-meta commentmetadata">
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s', 'BTC' ),
						get_comment_date()
					); ?></a>
					<?php edit_comment_link( __( 'Edit', 'BTC' ), '' );
				?>
			</span><!-- .comment-meta .commentmetadata -->
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'BTC' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-body"><?php comment_text(); ?></div>

	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'BTC' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'BTC' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;
/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * @since BTC 1.0
 * @uses register_sidebar
 */
function BTC_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Left Sidebar', 'BTC' ),
		'id' => 'sidebar-1',
		'description' => __( 'The primary widget area', 'BTC' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'BTC' ),
		'id' => 'sidebar-2',
		'description' => __( 'Right Sidebar area', 'BTC' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running BTC_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'BTC_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * @since BTC 1.0
 */
function BTC_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'BTC_remove_recent_comments_style' );

if ( ! function_exists( 'BTC_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 *
 * @since BTC 1.0
 */
function BTC_posted_on() {
	// use the "byline" class to hide the author name and link. We should make this appear automatically with a multi-author conditional tag in the future
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="%4$s"><span class="meta-sep">by</span> %3$s</span>', 'BTC' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'BTC' ), get_the_author() ),
			get_the_author()
		),
		'byline'
	);
}
endif;

if ( ! function_exists( 'BTC_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since BTC 1.0
 */
function BTC_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'BTC' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'BTC' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'BTC' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function echo_first_image ($postID)
{					
	$args = array(
	'numberposts' => 1,
	'order'=> 'DESC',
	'post_mime_type' => 'image',
	'post_parent' => $postID,
	'post_status' => null,
	'post_type' => 'attachment'
	);
	
	$attachments = get_children( $args );
	
	//print_r($attachments);
	
	if ($attachments) {
		foreach($attachments as $attachment) {
				
			$thumb = wp_get_attachment_image_src( $attachment->ID, 'project-post-thumbnail' );
			echo $thumb[0];
			
		}
	}
}

function project_title($titlu)
{
	if (strlen($titlu)< 65) return $titlu;
	else return (substr($titlu,0,65)."...");
}


?>


