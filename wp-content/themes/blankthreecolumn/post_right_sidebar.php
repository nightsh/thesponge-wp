<div id="right-sidebar" class="index-right-sidebar">

    <!--<div id="sidebar" class="widget-area" role="complementary">-->

    <div id="sidebar">
        <?php
        $args = array( 'numberposts' => 5, 'offset'=> 8, 'order'=>'DESC' , 'orderby' => 'post_date' );
        $lastposts = get_posts( $args );
        foreach($lastposts as $post) : setup_postdata($post); ?>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <span>By <?php the_author(); ?></span>
            <span><?php the_time(get_option('date_format')); ?></span>
            <?php endforeach; ?>
    </div>
    <div id="logo_projects">
        <a href="<?php echo site_url(); ?>/?page_id=18"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_projects.png" alt="Logo Projects"/></a>
    </div>


			<?php // The primary sidebar used in all layouts
    if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>



			<?php endif; // end primary widget area ?>

    <!--</div><!-- #primary .widget-area -->

</div>