<?php
/**
 * Template Name: Projects
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>

<?php include('header_projects.php'); ?>


		<div id="content-container">


            <div id="left_projects">
                <?php
                $type = 'projects';
                $args=array(
                    'post_type' => $type,
                    'post_status' => 'publish',
                    'paged' => $paged,
                    'posts_per_page' => 6,
                    'ignore_sticky_posts'=> 1
                );
                $postslist = get_posts( $args );
                foreach ($postslist as $post) :  setup_postdata($post); ?>

                    <div style="width:220px; float:left; margin-left:12px;  margin-bottom:24px;">
                        <div style="float:left; width:220px;">

                          
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                                <img src="<?php echo_first_image(get_the_ID()); ?>"/>                           </a>
                           


                        </div>

                        <div style="float:left; width:220px;">
                            <a class="project_title" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
				<div id="logo_projects">
        <a href="<?php echo site_url(); ?>/?page_id=32"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_projects_single.png" alt="Logo Projects Single"/></a>
    </div>
            </div>


			<div id="content" class="project_page" role="content-box">



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

<div id="nav-below" class="navigation-single-projects">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'BTC' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'BTC' ) . '</span>' ); ?></div>
				</div><!-- #nav-below -->

				<?php comments_template( '', true ); ?>


			<?php endwhile; ?>

			</div><!-- #content -->
		</div><!-- #content-container -->


<?php get_footer(); ?>