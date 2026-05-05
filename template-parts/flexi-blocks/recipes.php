<div class="container-fluid grey-bg py-3 py-lg-5 bg-img" style="background-image:url(<?php echo acf_esc_html( get_sub_field('block_background_image_recipe_block') ); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
					<?php if( get_sub_field('section_title_recipe_block') ): ?>
						<h3 class="fs-1 mb-3"><?php echo acf_esc_html( get_sub_field('section_title_recipe_block') ); ?></h3>
					<?php endif; ?>
					<?php if( get_sub_field('section_intro_recipe_block') ): ?>
						<h4 class="mb-5"><?php echo acf_esc_html( get_sub_field('section_intro_recipe_block') ); ?></h4>
					<?php endif; ?>
                </div>
            </div>
        </div>
		<?php
		$featured_recipes = get_sub_field('select_recipe'); 
		if( $featured_recipes ): ?>
			<div class="container pb-3 pb-lg-5">
				<div class="row">
					<?php foreach( $featured_recipes as $post ): setup_postdata($post); ?>
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
										<i class="bi bi-arrow-right-circle-fill"></i>
									</div>
								</div>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		 <div class="container">
            <div class="row">
                <div class="col-12 text-center">
					<a class="button" href="/recipes/">View all recipes</a>
                </div>
            </div>
        </div>
    </div>