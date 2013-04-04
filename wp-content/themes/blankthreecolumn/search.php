<?php
/**
 * @package WordPress
 * @subpackage Blank Three Column
 * @since BTC 1.0
 */

get_header(); ?>



		<div id="content-container">
			<div id="content" role="content-box">
                <div class="search-archive"><?php get_search_form(); ?></div>
				<div class="search-posts-archive">

			<?php if ( have_posts() ) : ?>
				<h1 class="recent-posts-title"><?php printf( __( 'Search Results for: %s', 'BTC' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php get_template_part( 'loop', 'search' ); ?>
			<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title-search"><?php _e( 'Nothing Found', 'BTC' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'BTC' ); ?></p>

					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
			<?php endif; ?>
			</div>
			</div><!-- #content -->
		</div><!-- #content-container -->

<?php get_footer(); ?>