<?php
/**
 * Template Name: Recipes List
 *
 */

get_header(); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/banner' ); ?>

    
    <div class="container-fluid py-4 py-lg-5">
        <div class="container">
                <div class="row">

                    <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                            $query_args = array(
                                'post_type' => 'recipe',
                                'posts_per_page' => -1,
                                'order' => 'ASC',
                                'orderby' => 'title',
                                );
                                
                        $the_query = new WP_Query( $query_args );
                        $id = get_the_ID();
                        ?>

                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();// run the loop 
                    $terms = get_the_terms( get_the_ID(), 'recipe_category' );
                    ?>

                    <a href="<?php the_permalink() ?>" class="col-12 col-sm-12 col-lg-4 mb-3 mb-lg-0">
                        <div class="bg-white rounded-4 d-flex flex-wrap flex-column flex-sm-row flex-lg-column text-center sign-post h-100">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'large', array( 'class' => 'w-100 rounded-4' ) ); ?>
								<?php else: ?>
                                    <img class="w-100 rounded-4 wp-post-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.png" alt="Shop Nyssa Hartwood  Anti-Inflammatory Healing Meals">
								<?php endif; ?>
                                <div class="recipe-cat d-block d-sm-none d-lg-block small">
                                    <span>
                                        <?php $term_names = wp_list_pluck( $terms, 'name' ); echo esc_html( implode( ', ', $term_names ) ); ?>
                                    </span>
                                </div> 
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12 p-4 d-flex flex-column flex-grow-1">
                                <span class="flex-grow-1">
                                    <div class="recipe-cat d-none d-sm-block d-lg-none small">
                                        <span>
                                            <?php $term_names = wp_list_pluck( $terms, 'name' ); echo esc_html( implode( ', ', $term_names ) ); ?>
                                        </span>
                                    </div> 
                                    <h3><?php the_title(); ?></h3>
                                    <?php if( get_field('time_to_cook') ): ?>
                                        <p class="small"><?php echo acf_esc_html( get_field('time_to_cook') ); ?></p>
                                    <?php endif; ?>
                                </span>
                                <div class="col-12 text-center green-arrow">
                                    <i class="bi bi-arrow-right-circle-fill"></i>
                                </div>
                            </div>
                        </div>
                    </a>

                    <?php endwhile; ?> 
                </div>
                <?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
                <nav class="row justify-content-between pb-4 prev-next-posts">
                    <div class="col-2">
                        <div class="prev-posts-link fw-bold">
                            <?php echo get_next_posts_link( '< View more', $the_query->max_num_pages ); ?>
                        </div>
                    </div>
                    <?php $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : false;
                        if ( $paged === false ): ?>
                        
                    <?php else: ?>
                        <div class="col-2 text-end">
                            <div class="next-posts-link text-end fw-bold">
                                <?php echo get_previous_posts_link( 'Go back >' ); ?>
                            </div>
                        </div>
                <?php endif; ?>
                </nav>
                    
                <?php } ?>

                <?php else: ?>
                <article>
                    <h3>Sorry...</h3>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                </article>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php wp_reset_postdata(); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php get_footer(); ?>