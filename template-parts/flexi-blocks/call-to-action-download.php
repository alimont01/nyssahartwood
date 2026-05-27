<div class="container-fluid position-relative">
	<div class="container pb-3 pb-lg-5">
		<div class="row">
			<div class="col-12">
				<div class="w-100 p-4 rounded-4 green-bg">
					<?php if( get_sub_field('title_call_to_download') ): ?>
						<h2 class="mb-3"><?php echo acf_esc_html( get_sub_field('title_call_to_download') ); ?></h2>
					<?php endif; ?>
					<?php if( get_sub_field('body_text_call_to_download') ): ?>
						<p class="">
							<?php echo acf_esc_html( get_sub_field('body_text_call_to_download') ); ?>
						</p>
					<?php endif; ?>
                    <div class="my-4">
                        <?php get_template_part( 'template-parts/mailerlite' ); ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>