<div class="container-fluid position-relative">
	<div class="container pb-3 pb-lg-5">
		<div class="row">
			<div class="col-12">
				<div class="w-100 p-4 rounded-4 <?php echo acf_esc_html( get_sub_field('background_colour_call_to') ); ?>">
					<?php if( get_sub_field('title_call_to') ): ?>
						<h2 class="mb-3"><?php echo acf_esc_html( get_sub_field('title_call_to') ); ?></h2>
					<?php endif; ?>
					<?php if( get_sub_field('body_text_call_to') ): ?>
						<p class="">
							<?php echo acf_esc_html( get_sub_field('body_text_call_to') ); ?>
						</p>
					<?php endif; ?>
					<?php 
					$link = get_sub_field('button_link_call_to');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a class="

						<?php if( get_sub_field('background_colour_call_to') == 'cream-bg' ): ?>
							button
						<?php else: ?>
							button-white
						<?php endif; ?>
						
						" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>