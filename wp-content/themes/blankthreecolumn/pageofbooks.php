<?php
/*
Template Name: Page of Books
*/
?>
<?php
/**
 * @package WordPress
 * @subpackage Blank Three Column
 * @since BTC 1.0
 */

get_header(); ?>



<div id="content-container" class="archive-content-container">
    <div id="content" role="content-box">
	<h1>Read This Book</h1>
	<?php
	$args = array( 'numberposts' => 10, 'order'=>'DESC' , 'orderby' => 'post_date', 'post_type'  => 'books' );
            $lastposts = get_posts( $args );
            foreach($lastposts as $post) : setup_postdata($post); ?>
                <div class="books_titles"><div id="cover_thumb"><?php the_post_thumbnail( 'cover-thumb' ); ?></div><h1 class="archive-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>
				<div class="archive-meta">
                <span class="author-name-caps"><?php the_author(); ?></span>
                <span class="post-date-small"><?php the_time(get_option('date_format')); ?></span>
				 <span class="post-comment-count"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></span>
				</div>
				<div class="archive-excerpt">
                            <?php echo get_the_excerpt(); ?>
                            </div>
                <?php endforeach; ?>
				</div>				
<div class="navigation">
<div class="alignleft"><?php previous_posts_link('&larr; Previous Page') ?></div>
<div class="alignright"><?php next_posts_link('Next Page &rarr;','') ?></div>
</div>
    </div><!-- #content -->
	
</div><!-- #content-container -->
<?php include(TEMPLATEPATH."/right.php");?>

<?php get_footer(); ?>