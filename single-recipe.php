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
                    <div class="col-lg-6">
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

		</article>

		<?php
	endwhile;
endif;
?>

</main>

<?php
get_footer();