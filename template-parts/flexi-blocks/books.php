
<?php if( have_rows('three_column_layout') ): ?>
	<div class="container-fluid py-3 py-lg-5 book-block">
		<div class="container">
			<div class="row">
				<?php while( have_rows('three_column_layout') ): the_row(); ?>
					<a href="<?php echo acf_esc_html( get_sub_field('button_link_three_col') ); ?>" class="col-12 col-sm-12 col-lg-4 mb-3 mb-lg-0">
						<div class="<?php echo acf_esc_html( get_sub_field('background_colour_three_col') ); ?> h-100 rounded-3 d-flex flex-wrap text-center text-white sign-post">
							<div class="col-12 col-sm-6 col-lg-12 book-cover-height">
								<?php 
								$image = get_sub_field('book_cover_three_col');
								$size = 'medium';

								if( $image ) {
									echo wp_get_attachment_image( $image, $size, false, array(
										'class' => 'book-cover z-top'
									));
								}
								?>
								<div class="book-bg-circle d-none d-lg-block <?php echo acf_esc_html( get_sub_field('background_colour_three_col') ); ?>"></div>
							</div>
							<div class="col-12 col-sm-6 col-lg-12 py-0 pt-sm-4 px-4 text-sm-start text-lg-center z-top">
								<?php if( get_sub_field('title_three_col_copy') ): ?>
									<h3 class=""><?php echo acf_esc_html( get_sub_field('title_three_col_copy') ); ?></h3>
								<?php endif; ?>
								<?php if( get_sub_field('title_three_col') ): ?>
									<h3 class="mb-3"><?php echo acf_esc_html( get_sub_field('title_three_col') ); ?></h3>
								<?php endif; ?>
								<?php if( get_sub_field('body_text_three_col') ): ?>
									<?php echo acf_esc_html( get_sub_field('body_text_three_col') ); ?>
								<?php endif; ?>
							</div>
							<div class="col-12 d-flex align-items-center p-4">
								<?php if( get_sub_field('book_price') ): ?>
									<div class="col-6 text-start"><?php echo acf_esc_html( get_sub_field('book_price') ); ?></div>
								<?php endif; ?>
								<div class="col-6 text-end">
									<i class="bi bi-arrow-right-circle-fill"></i>
								</div>
							</div>
						</div>
					</a>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
<?php endif; ?>