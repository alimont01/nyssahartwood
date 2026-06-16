<?php
$books = get_sub_field( 'choose_and_order_products' );

if ( $books ) : ?>
	<div class="container-fluid pb-5">
		<div class="container ">
			<div class="row g-4">

				<?php foreach ( $books as $book ) : ?>

					<?php
					$book_id   = is_object( $book ) ? $book->ID : $book;
					$product   = wc_get_product( $book_id );
					$permalink = get_permalink( $book_id );
					$title     = get_the_title( $book_id );
					$excerpt   = get_the_excerpt( $book_id );
					$bg_colour = get_field( 'book_background_colour', $book_id );
					?>

					<?php if ( ! $product ) : ?>
						<?php continue; ?>
					<?php endif; ?>

					<div class="col-12 col-lg-6 mb-3 mb-lg-0 mt-5">
						<a href="<?php echo esc_url( $permalink ); ?>" class="text-decoration-none d-block h-100">
							<div class="rounded-4 d-flex flex-wrap align-items-start h-100 sign-post-2 <?php echo esc_attr( $bg_colour ); ?>">

								<div class="col-12 col-md-6 d-flex justify-content-center">
									<?php if ( has_post_thumbnail( $book_id ) ) : ?>
										<?php echo get_the_post_thumbnail( $book_id, 'large', array( 'class' => 'shop-book-cover' ) ); ?>
									<?php else : ?>
										<img class="shop-book-cover" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/placeholder.png' ); ?>" alt="Shop Nyssa Hartwood Anti-Inflammatory Healing Meals">
									<?php endif; ?>
								</div>

								<div class="col-12 col-md-6 p-4 text-white d-flex flex-column h-100">
									<h3><?php echo esc_html( $title ); ?></h3>

									<?php if ( $excerpt ) : ?>
										<p><?php echo esc_html( $excerpt ); ?></p>
									<?php endif; ?>

									<div class="col-12 d-flex align-items-center mt-auto">
										<div class="col-6 text-start">
											<?php echo wp_kses_post( $product->get_price_html() ); ?>
										</div>

										<div class="col-6 text-end">
											<i class="bi bi-arrow-right-circle-fill"></i>
										</div>
									</div>
								</div>

							</div>
						</a>
					</div>

				<?php endforeach; ?>

			</div>
		</div>
	</div>
<?php endif; ?>