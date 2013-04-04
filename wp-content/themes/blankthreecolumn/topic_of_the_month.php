
<div id="left-sidebar">
   <div class="topic_title">
    <?php
    global $post;
    $args = array( 'numberposts' => 1, 'offset'=> 0, 'category'=>12 );
    $myposts = get_posts( $args );
    foreach( $myposts as $post ) :	setup_postdata($post); ?>

        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/topic_of_month.png" alt="Topic of the month"></a>
        <?php endforeach; ?>
   </div>
    <div class="topic_content">
        <?php
        $args = array( 'numberposts' => 1, 'offset'=> 0, 'category' => 12, 'order'=>'DESC' , 'orderby' => 'post_date' );
        $lastposts = get_posts( $args );
        foreach($lastposts as $post) : setup_postdata($post); ?>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <span class="post_details">By <span class="post_author"><?php the_author(); ?></span></span></br>
            <span class="post_details">Published: <?php the_date(); ?></span>
            <!--<?php
            $category = get_the_category();
            if($category[0]){
                echo '<ul><li class="cat-item cat-item-'.$category[0]->cat_ID.'"><a href="'.get_category_link($category[0]->term_id).'" class="cat-item">'.$category[0]->cat_name.'</a></li></ul>';
            }
            ?>-->
			<div class="left_content_home">
            <?php the_content(); ?>
			</div>
            <?php endforeach; ?>

    </div>
    <div id="logo_projects">
        <a href="<?php echo site_url(); ?>/?page_id=32"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_projects.png" alt="Logo Projects"/></a>
    </div>
</div>