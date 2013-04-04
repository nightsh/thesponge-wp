<?php
/**
 * @package WordPress
 * @subpackage Blank Three Column
 * @since BTC 1.0
 */

get_header(); ?>



<div id="content-container" class="book-content-container">
    <div id="book_cover">
        <?php the_post_thumbnail('book-thumb'); ?>
    </div>

    <div id="content" class="book_content" role="content-box">

        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="entry-title"><?php the_title(); ?></h1>

            <div class="entry-meta">
                <span>By <span class="post_author"><?php the_author(); ?></span>&nbsp<span style="display: inline;"><?php the_time(get_option('date_format')); ?></span>
            </div><!-- .entry-meta -->



            <div class="book_entry_content">
                <?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'BTC' ), 'after' => '</div>' ) ); ?>
            </div><!-- .entry-content -->

            <div class="entry-info">
                <?php BTC_posted_in(); ?>
                <?php edit_post_link( __( 'Edit', 'BTC' ), '<span class="edit-link">', '</span>' ); ?>
            </div><!-- .entry-info -->
        </div><!-- #post-## -->

        <div id="nav-below" class="navigation">
            <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'BTC' ) . '</span> %title' ); ?></div>
            <div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'BTC' ) . '</span>' ); ?></div>
        </div><!-- #nav-below -->

        <?php comments_template( '', true ); ?>

        <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
    <div class="book-sidebar">

    <div class="read_this_books">
        <?php
        global $post;
        $args = array( 'numberposts' => 1, 'offset'=> 0,  'post_type'  => 'books' );
        $myposts = get_posts( $args );
        foreach( $myposts as $post ) :	setup_postdata($post); ?>

            <a href="https://crji.org/sponge/?page_id=312"><img src="<?php echo get_template_directory_uri(); ?>/images/read_this_book.png" alt="Read this book"></a>

            <?php endforeach; ?>
    </div>


    <!--<div id="sidebar" class="widget-area" role="complementary">-->

    <div id="sidebar">
        <?php
        $args = array( 'numberposts' => 5, 'order'=>'DESC' , 'orderby' => 'post_date', 'post_type'  => 'books' );
        $lastposts = get_posts( $args );
        foreach($lastposts as $post) : setup_postdata($post); ?>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="right-meta">
            <span class="author-name-caps">By <?php the_author(); ?></span>
            <span class="post-date-small"><?php the_time(get_option('date_format')); ?></span>
			</div>
            <?php endforeach; ?>
    </div>
        </div>
		
</div><!-- #content-container -->


<?php get_footer(); ?>