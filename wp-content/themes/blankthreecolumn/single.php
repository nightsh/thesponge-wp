<?php
/**
 * @package WordPress
 * @subpackage Blank Three Column
 * @since BTC 1.0
 */

get_header(); ?>



		<div id="single-content-container" >
			<div id="content" role="content-box">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta-single">
					<div style="float:left; margin-bottom:10px">
						<?php BTC_posted_on(); ?>
						<?php edit_post_link( __( 'Edit', 'BTC' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?></div>
						<div style="float:left; margin-left:10px; margin-bottom:10px"><?php
            $category = get_the_category();
            if($category[0]){
                echo '<span class="tag-post"><ul><li class="cat-item cat-item-'.$category[0]->cat_ID.'"><a href="'.get_category_link($category[0]->term_id).'" class="cat-item">'.$category[0]->cat_name.'</a></li></ul></span>';
            }
            ?></div>

					</div><!-- .entry-meta -->


			<?php the_post_thumbnail('featured-post-thumbnail'); ?>

					<div class="entry-content-books">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'BTC' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

					<!--<div class="entry-info">
						<?php BTC_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'BTC' ), '<span class="edit-link">', '</span>' ); ?>

					</div><!-- .entry-info -->
				</div><!-- #post-## -->

				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'BTC' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'BTC' ) . '</span>' ); ?></div>
				</div><!-- #nav-below -->



<?php
global $post;
$category = get_the_category($post->ID);
$category = $category[0]->cat_ID;
$myposts = get_posts(array('numberposts' => 5, 'offset' => 0, 'category__in' => array($category), 'post__not_in' => array($post->ID),'post_status'=>'publish'));
foreach($myposts as $post) :
setup_postdata($post);
?>
<h1 class="archive-title"><a href="<?php the_permalink(); ?>">
<?php the_title(); ?></a></h1>
<div class="single-meta">
<span class="author-name-caps"><?php the_author(); ?></span>
<span class="post-date-small"><?php the_time(get_option('date_format')); ?></span>
<span class="post-comment-count"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></span>
</div>

<?php endforeach; ?>
<?php wp_reset_query(); ?>

				</div>
				<div class="posts-block">

				<?php comments_template( '', true ); ?>



			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->


		</div><!-- #content-container -->

<?php include(TEMPLATEPATH."/right.php");?>
<?php get_footer(); ?>
