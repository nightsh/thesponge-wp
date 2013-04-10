<div id="right-sidebar" class="index-right-sidebar">

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

<div id="read_gray">
    <a href="https://crji.org/sponge/?page_id=312"><div id="read_text">READ THIS BOOK</div></a>
</div>

