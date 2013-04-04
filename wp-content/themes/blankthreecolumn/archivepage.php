<?php
/*
Template Name: Archive Page
*/
?>
<?php
get_header(); ?>



<div id="content-container" class="archive-content-container">
    <div id="content" role="content-box">
	<div class="archive-page-top">
		<div class="search-archive">
		<?php get_search_form(); ?>
		</div> 
	</div>
	
	<div class="recent-posts-archive">
		
		<h1 class="recent-posts-title">Archive</h1>
		
		<?php
		
		query_posts( array( 'cat' => 0, 'paged' => get_query_var('paged') ) );
		
		?>


		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		
		
			  <div class="books_titles">
				<div>
				<h1 class="archive-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>
				<div class="archive-meta">
	                <span class="author-name-caps"><?php the_author(); ?></span>
	                <span class="post-date-small"><?php the_time(get_option('date_format')); ?></span>
					 <span class="post-comment-count"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></span>
				</div>
				<div class="archive-excerpt">
                            <?php echo get_the_excerpt(); ?>
                </div>
                
			  </div>		

				  
		
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
			
	</div>

<div class="navigation">
<div class="alignleft"><?php previous_posts_link('&larr; Previous Page') ?></div>
<div class="alignright"><?php next_posts_link('Next Page &rarr;','') ?></div>
</div>
    </div><!-- #content -->
	
</div><!-- #content-container -->
<?php include(TEMPLATEPATH."/right.php");?>

<?php get_footer(); ?>