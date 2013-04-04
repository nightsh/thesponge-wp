<?php
/**
 * Template Name: Projects
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>

<?php include('header_projects.php'); ?>
<div class="subpages projects-subpages">
    <ul>
        <?php
        if($post->post_parent) {
            $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=1&menu_order=$sort_column");
            //$title_heading = get_the_title($post->post_parent);
        }

        else {
            $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=1");
            $title_heading = get_the_title($post->ID);
        }
        ?>
		<li id="projects_right"><a href="<?php echo site_url(); ?>/?page_id=32" alt="Link projects right">projects</a></li>
    </ul>


</div>

<?php 
$type = 'projects';
$args=array(
  'post_type' => $type,
  'post_status' => 'publish',
  'paged' => $paged,
  'posts_per_page' => 9,
  'ignore_sticky_posts'=> 1
);
$temp = $wp_query;  // assign orginal query to temp variable for later use   
$wp_query = null;
$wp_query = new WP_Query($args); 
?>

    <div id="projects-container">
        <div id="content">

    <div style="float:left; padding-top:32px;">
                <?php if ( have_posts() ) {

                while ( have_posts() ) {
                    the_post();
                    ?>
                    <div class="project-block">
                        <div style="float:left; width:200px;">
                             <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                                <img src="<?php echo_first_image(get_the_ID()); ?>" width="200" height="120"/>                           </a>
                        </div>

                        <div style="float:left; width:200px;">
                            <a class="project_title" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo project_title(get_the_title()); ?></a>
                        </div>
                    </div>
                    <?
                } ;
            }  ?>
    </div>
				<div class="navigation-projects-page">
<div class="alignleft"><?php previous_posts_link('&larr; Previous Page') ?></div>
<div class="alignright"><?php next_posts_link('Next Page &rarr;','') ?></div>
</div>

            <div id="logo_blog">
                <a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_blog.png" alt="Logo Blog"></a>
            </div>
            <div class="read_this_projects">
                 <?php
        global $post;
        $args = array( 'numberposts' => 1, 'offset'=> 0,  'post_type'  => 'books' );
        $myposts = get_posts( $args );
        foreach( $myposts as $post ) :	setup_postdata($post); ?>

            <a href="https://crji.org/sponge/?page_id=312"><img src="<?php echo get_template_directory_uri(); ?>/images/read_this_book.png" alt="Read this book"></a>

            <?php endforeach; ?>
            </div>



			</div><!-- #content -->
		</div><!-- #container -->


<?php get_footer(); ?>