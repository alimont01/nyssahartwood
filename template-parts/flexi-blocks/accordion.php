<?php 
$accordion_id = 'accordion-' . get_row_index(); 
?>

<div class="container-fluid px-0 mb-3 mb-lg-5">
	<div class="container">
		<div class="row">
			<div class="col-12 mb-3 text-center">
				<?php if( get_sub_field('faq_header') ): ?>
					<h3 class="mt-0">
						<?php echo acf_esc_html( get_sub_field('faq_header') ); ?>
					</h3>
				<?php endif; ?>
			</div>

			<?php if( have_rows('faqs_list') ): ?>
				<div class="col-12">
					<?php $counter = 1; ?>

					<div class="accordion" id="<?php echo esc_attr($accordion_id); ?>">
						<?php while( have_rows('faqs_list') ): the_row(); ?>

							<?php 
							$heading_id = $accordion_id . '-heading-' . $counter;
							$collapse_id = $accordion_id . '-collapse-' . $counter;
							?>

							<div class="position-relative">
								<h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
									<button 
										class="accordion-button collapsed purple-bg text-white border-bottom border-white" 
										type="button" 
										data-bs-toggle="collapse" 
										data-bs-target="#<?php echo esc_attr($collapse_id); ?>" 
										aria-expanded="false" 
										aria-controls="<?php echo esc_attr($collapse_id); ?>"
									>
										<?php echo acf_esc_html( get_sub_field('question') ); ?>
									</button>
								</h2>

								<div 
									id="<?php echo esc_attr($collapse_id); ?>" 
									class="accordion-collapse collapse light-grey-bg" 
									aria-labelledby="<?php echo esc_attr($heading_id); ?>" 
									data-bs-parent="#<?php echo esc_attr($accordion_id); ?>"
								>
									<div class="accordion-body">
										<?php echo acf_esc_html( get_sub_field('answer') ); ?>				
									</div>
								</div>
							</div>

							<?php $counter++; ?> 

						<?php endwhile; ?>
					</div>
					<?php if( is_page( 295 )  ): ?>
						<a class="button mt-3" href="https://www.dysguisediagnostics.com/learn-about-dara/faqs-advanced-topics" target="_self">Looking for more answers? View our FAQs Advanced Topics</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>