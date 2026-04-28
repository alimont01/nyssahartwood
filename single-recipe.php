<?php
get_header();
?>

<main id="primary" class="site-main">

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="container-fluid hero grey-bg recipe-bg">
                <div class="container pb-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <h1 class="mt-0">
                                <?php the_title(); ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

           <div class="container py-3 py-lg-5">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large', array( 'class' => 'w-100 rounded-4 shadow-lg' ) ); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex small">
                            <div class="recipe-categories me-3">
                                <?php the_terms( get_the_ID(), 'recipe_category', '', ', ' ); ?>
                            </div>
                            <?php if( get_field('time_to_cook') ): ?>
                                <?php echo acf_esc_html( get_field('time_to_cook') ); ?>
                            <?php endif; ?>
                        </div>

                        <?php if( get_field('ingredients_title') ): ?>
                            <h3 class="mt-3 mt-lg-5 mb-3"><?php echo acf_esc_html( get_field('ingredients_title') ); ?></h3>
                        <?php endif; ?>
                        <?php if( get_field('ingredients') ): ?>
                            <?php echo acf_esc_html( get_field('ingredients') ); ?>
                        <?php endif; ?>
                        <?php if( get_field('instructions_title') ): ?>
                            <h3 class="mt-3 mt-lg-5 mb-3"><?php echo acf_esc_html( get_field('instructions_title') ); ?></h3>
                        <?php endif; ?>
                        <?php if( get_field('instructions') ): ?>
                            <?php echo acf_esc_html( get_field('instructions') ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php
            $args = array(
                'post_type'      => 'recipe',
                'posts_per_page' => 3,
                'orderby'        => 'rand',
                'post__not_in'   => array( get_the_ID() ),
            );

            $recipes = new WP_Query( $args );

            if ( $recipes->have_posts() ) : ?>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3 class="">Other Recipes</h3>
                        </div>
                    </div>
                </div>
                <div class="container py-3 py-lg-5">
                    <div class="row">
                        <?php while ( $recipes->have_posts() ) : $recipes->the_post(); ?>
                        <?php
						$terms = get_the_terms( get_the_ID(), 'recipe_category' );
						$term_names = ( $terms && ! is_wp_error( $terms ) ) ? wp_list_pluck( $terms, 'name' ) : array();
						?>
                            
                            <a href="<?php the_permalink() ?>" class="col-12 col-sm-12 col-lg-4 mb-3 mb-lg-0">
                                <div class="bg-white rounded-4 d-flex flex-wrap flex-column flex-sm-row flex-lg-column text-center sign-post h-100">
                                    <div class="col-12 col-sm-6 col-lg-12">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail( 'large', array( 'class' => 'w-100 rounded-4' ) ); ?>
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
                                            <i class="bi bi-arrow-right-circle-fill fs-1"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif;

            wp_reset_postdata();
            ?>

		</article>

		<?php
	endwhile;
endif;
?>

</main>

<?php
get_footer();