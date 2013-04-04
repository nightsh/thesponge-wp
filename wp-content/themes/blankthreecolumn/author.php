<?php
/**
 * @package WordPress
 * @subpackage Blank Three Column
 * @since BTC 1.0
 Template Name: Author Page
 */

get_header(); ?>
	
		<div id="content-container-author">
			<div id="content" role="content-box">
			
			<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

    <h1 id="posts-by-author">Posts by <?php echo $curauth->nickname; ?>:</h1>

			<?php if ( have_posts() ) the_post(); ?>

			<h1 class="page-title">
			<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: <span>%s</span>', 'BTC' ), get_the_date() ); ?>
			<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'BTC' ), get_the_date( 'F Y' ) ); ?>
			<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'BTC' ), get_the_date( 'Y' ) ); ?>
			<?php else : ?>
				<?php _e( '', 'BTC' ); ?>
			<?php endif; ?>
			</h1>

			<?php
				rewind_posts();
				get_template_part( 'loop', 'archive' );
			?>
			<div class="navigation">
<div class="alignleft"><?php previous_posts_link('&larr; Previous Page') ?></div>
<div class="alignright"><?php next_posts_link('Next Page &rarr;','') ?></div>
</div>
			</div><!-- #content -->
	
		</div><!-- #content-container -->
		
		
		<?php include(TEMPLATEPATH."/right.php");?>

<?php get_footer(); ?>