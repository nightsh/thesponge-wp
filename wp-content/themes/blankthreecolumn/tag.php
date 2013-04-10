<?php
/**
 * @package WordPress
 * @subpackage Blank Three Column
 * @since BTC 1.0
 */

get_header(); ?>

<?php include(TEMPLATEPATH."/left.php");?>

		<div id="content-container">
			<div id="content" role="content-box">

				<h1 class="page-title"><?php
					printf( __( 'Tag Archives: %s', 'BTC' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h1>

				<?php get_template_part( 'loop', 'tag' ); ?>
			</div><!-- #content -->
		</div><!-- #content-container -->

<?php include(TEMPLATEPATH."/right.php");?>
<?php get_footer(); ?>
