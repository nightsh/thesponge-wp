<div id="right-sidebar" class="index-right-sidebar">
    <h1 class="white_title">tags</h1>

      <ul class="categories_right">
            <?php
            $args=array(
                'orderby' => 'name',
                'order' => 'ASC',
				'hide_empty' => '0',
				'exclude' => '1, 12'
            );
            $categories=get_categories($args);
            foreach($categories as $category) {
                //$category = get_the_category();
                echo '<li class="cat-item cat-item-'.$category->cat_ID.'"><a href="' . get_category_link($category->cat_ID) . '" title="' . sprintf( __( "View all posts in %s" ), $category->category_nicename ) . '" ' . '>' . $category->name.'</a>';
            }
            ?>
        </ul>

<div class="read_this">
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
                <h1 class="read-this-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="right-meta">
                <span class="author-name-caps"><?php the_author(); ?></span>
                <span class="post-date-small"><?php the_time(get_option('date_format')); ?></span>
				</div>
                <?php endforeach; ?>
        </div>

    

 


    <!--<ul class="xoxo">

			<?php // The primary sidebar used in all layouts
			if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>



			<?php endif; // end primary widget area ?>
			</ul>-->
		<!--</div><!-- #primary .widget-area -->

</div>