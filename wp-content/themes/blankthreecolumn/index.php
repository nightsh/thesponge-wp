<?php
/**
 * @package WordPress
 * @subpackage Blank Three Column
 * @since BTC 1.0
 */

get_header();
?>

<?php include(TEMPLATEPATH."/topic_of_the_month.php");?>

		<div id="content-container" class="index-content-container">
			<div id="content" role="content-box">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <?php
                    $args = array( 'numberposts' => 8, 'offset'=> 0, 'order'=>'DESC' , 'orderby' => 'post_date', 'category' => -12 );
                    $lastposts = get_posts( $args );
                    $i=0;
                    $j=1;
                    foreach($lastposts as $post) : setup_postdata($post);
                        if($i<2){

                            if($i<1) echo '<tr>';
                            echo '<td valign="top"><div class="sections">';
                        $category = get_the_category();
                            if($category[0]){
                                echo '<ul><li class="index-cat cat-item cat-item-'.$category[0]->cat_ID.'"><a href="'.get_category_link($category[0]->term_id).'">'.$category[0]->cat_name.'</a></li></ul>';
                            }
                            ?>
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <div class="meta-posts-index"><span class="post_details">By <span class="post_author"><?php the_author(); ?></span></span></div>
                            <div class="excerpt">
                            <?php echo get_the_excerpt(); ?>
                            </div>
                            <?php
                            echo '</div></td>';
                            echo "\n<!-- [$j] -->\n";
                            $i++;
                            if ($j==8) {
                                echo '<td valign="top">';
                                include(TEMPLATEPATH."/right.php");
                                echo '</td></tr>';
                            }
                        } else {
                            echo '<td valign="top"><div class="sections">';
                            $category = get_the_category();
                            if ($category[0]) {
                                echo '<ul><li class="index-cat cat-item cat-item-'.$category[0]->cat_ID.'"><a href="'.get_category_link($category[0]->term_id).'">'.$category[0]->cat_name.'</a></li></ul>';
                            }
                            ?>
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <div class="meta-posts-index"><span class="post_details">By <span class="post_author"><?php the_author(); ?></span></span></div>
                            <div class="excerpt">
                                <?php echo get_the_excerpt(); ?>
                            </div>
                            <?php
                            echo '</div></td>';
                            echo "\n<!-- [$j] -->\n";
                            echo "\n<!-- ----------------------[ another row ]-------------------------- -->\n";
                            if ($j!=8) {
                                echo '</tr>';
                            }
                            $i=0;

                        }
                        $j++;
                        ?>

                        <?php endforeach; ?>

                </table>




                    </div>


        </div><!-- #content -->

		</div><!-- #content-container -->


<?php get_footer(); ?>
