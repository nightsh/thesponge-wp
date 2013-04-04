<?php
/**
 * @package WordPress
 * @subpackage Blank Three Column
 * @since BTC 1.0
 */
 $parent_id = get_post($post_id)->post_parent;
 if ($parent_id=32)
 include ('header_projects.php');
 else get_header();
?>

<div class="subpages">
    <ul>
    <?php
  if($post->post_parent) {
     $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=1&menu_order=$sort_column");
     //$title_heading = get_the_title($post->post_parent);
  }
 
  else {
  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=1");
  $title_heading = get_the_title($post->ID);

  }
  ?>
  <?php if ($post->post_parent=='32') { ?>
	<li id="projects_right"><a href="<?php echo site_url(); ?>/?page_id=32" alt="Link projects right">projects</a></li>
  <?php } ?>
   </ul>

</div>

		<div id="content-container" class="page-content-container">
			<div id="content" role="content-box">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'BTC' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'BTC' ), '<p class="edit-link">', '</p>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
				
				
				<?php /* Enable/disable comments in pages */
			if( get_option('of_pages_comments') == 'true') { ?>
				<?php comments_template( '', true ); ?>
				<?php } ?>

			<?php endwhile; ?>

			</div><!-- #content -->
		</div><!-- #content-container -->

<?php get_footer(); ?>