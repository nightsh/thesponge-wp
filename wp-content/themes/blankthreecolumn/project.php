<?php
/**
 * Template Name: Projects
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>

<?php include('header_projects.php'); ?>

		<div id="content-container">
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

<?php include(TEMPLATEPATH."/right.php");?>
<?php get_footer(); ?>