<?php
/**
 * Template Name: Books
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>

<?php include('header.php'); ?>

<div id="container">
    <div id="content">
        <?php
        $type = 'books';
        $args=array(
            'post_type' => $type,
            'post_status' => 'publish',
            'paged' => $paged,
            'posts_per_page' => 12,
            'ignore_sticky_posts'=> 1
        );
        $temp = $wp_query;  // assign orginal query to temp variable for later use
        $wp_query = null;
        $wp_query = new WP_Query($args);
        ?>

        <div style="float:left; padding-top:32px;">
            <?php if ( have_posts() ) {

            while ( have_posts() ) {
                the_post();
                ?>
                <div style="width:220px; float:left; margin-left:12px;  margin-bottom:24px;">
                    <div style="float:left; width:220px;">
                        <?php if ( has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                            <?php the_post_thumbnail('category-thumb'); ?>
                        </a>
                        <?php endif; ?>
                    </div>

                    <div style="float:left; width:220px;">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>
                <?
            } ;
        }  ?>
        </div>
    </div><!-- #content -->
</div><!-- #container -->


<?php get_footer(); ?>
