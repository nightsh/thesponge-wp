<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Blank Three Column
 * @since BTC 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'BTC' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

<div id="top_links">
    <div id="links_container"">
    <div id="left_links">
        <ul>
            <li>
                <a id="top" href="#">join the <span id="italic">network</span></a>
            </li>
        </ul>
    </div>
    <div id="right_links">
      <ul>
        <li>
            <a id="top" href="http://www.crji.org/" target="_blank">crji</span></a>
        </li>
        <li>
            <a id="top" href="http://www.activewatch.ro/" target="_blank">active watch</span></a>
        </li>
          <li>
              <a id="top" href="http://www.fspub.unibuc.ro/" target="_blank">fsp</span></a>
          </li>
          <li>
              <a id="top" href="http://leap.ro/" target="_blank">leap</span></a>
          </li>
          <li>
              <a id="top" href="http://ceata.org/" target="_blank">ceata</span></a>
          </li>
          <li>
              <a id="top" href="http://geo-spatial.org" target="_blank">geo_spatial</span></a>
          </li>
    </ul>
    </div>
    <div id="search_form">
        <?php get_search_form(); ?>
    </div>
</div>
</div>
<div id="container">

	
<div id="header">
		
	<div id="logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"></a>
    </div>
	<div id="bloginfo">
        <h2 class="top_h"><?php bloginfo('description'); ?></h2>
    </div>
	
		
		<!--<div id="headersearch">
				<?php get_search_form(); ?>
		</div>-->
</div>
	
		
	
<div id="access">
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
    <div id="button_projects">
    <a href="<?php echo site_url(); ?>/?page_id=32"><img id="top_nav_projects" src="<?php echo get_template_directory_uri(); ?>/images/button_projects.png"></a>
</div>
</div>
	
<!--<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" class="header-img" alt="" />-->


<div id="content-box">
