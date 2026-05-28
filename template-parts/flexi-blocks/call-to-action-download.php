<div class="container-fluid position-relative d-none d-lg-block">
	<div class="container pb-4 pb-lg-5">
		<div class="row">
			<div class="col-12">
				<div class="w-100 p-4 rounded-4 green-bg text-white repeating-heart d-flex sign-post">
					<div class="col-12 col-lg-8">
						<?php if( get_field('title_call_to_download', 'option') ): ?>
							<h2 class="mb-3"><?php echo acf_esc_html( get_field('title_call_to_download', 'option') ); ?></h2>
						<?php endif; ?>
						<?php if( get_field('body_text_call_to_download', 'option') ): ?>
							<p class="">
								<?php echo acf_esc_html( get_field('body_text_call_to_download', 'option') ); ?>
							</p>
						<?php endif; ?>
						<div class="my-4">
							<?php get_template_part( 'template-parts/mailerlite' ); ?>
						</div>
					</div>
					<div class="col-lg-4 text-center book-cover-height-download">
							<?php 
							$image = get_field('book_cover', 'option');
							$size = 'large';

							if( $image ) {
								echo wp_get_attachment_image( $image, $size, false, array(
									'class' => 'download-book-cover z-top shadow'
								));
							}
							?>
							<div class="book-bg-circle d-none d-lg-block <?php echo acf_esc_html( get_sub_field('background_colour_three_col') ); ?>"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid position-relative d-block d-lg-none">
	<div class="container pb-4 pb-lg-5">
		<div class="row">
			<div class="col-12">
				<div class="w-100 p-4 rounded-4 green-bg text-white repeating-heart sign-post">
					<div class="d-flex flex-wrap">
						<div class="col-8">
							<?php if( get_field('title_call_to_download', 'option') ): ?>
								<h2 class="mb-3"><?php echo acf_esc_html( get_field('title_call_to_download', 'option') ); ?></h2>
							<?php endif; ?>
							<?php if( get_field('body_text_call_to_download', 'option') ): ?>
								<p class="">
									<?php echo acf_esc_html( get_field('body_text_call_to_download', 'option') ); ?>
								</p>
							<?php endif; ?>
						</div>
						<div class="col-4 text-end book-cover-height-download">
								<?php 
								$image = get_field('book_cover', 'option');
								$size = 'large';

								if( $image ) {
									echo wp_get_attachment_image( $image, $size, false, array(
										'class' => 'download-book-cover z-top shadow'
									));
								}
								?>
								<div class="book-bg-circle d-none d-lg-block <?php echo acf_esc_html( get_sub_field('background_colour_three_col') ); ?>"></div>
						</div>
						<div class="col-12">
							<div class="my-4">
								<?php get_template_part( 'template-parts/mailerlite' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>