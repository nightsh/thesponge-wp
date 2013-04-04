<?php
/**
 * @package WordPress
 * @subpackage Blank Three Column
 * @since BTC 1.0
 */

get_header(); ?>



		<div id="content-container-author">
			<div id="content" role="content-box">

				<h1 class="page-title"><?php
					printf( __( 'Category Archives: %s', 'BTC' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';
					
					get_template_part( 'loop', 'category' );
				?>
				<div class="navigation">
<div class="alignleft"><?php previous_posts_link('&larr; Previous Page') ?></div>
<div class="alignright"><?php next_posts_link('Next Page &rarr;','') ?></div>
</div>

			</div><!-- #content -->
		</div><!-- #content-container -->

<?php include(TEMPLATEPATH."/right.php");?>
<?php get_footer(); ?>