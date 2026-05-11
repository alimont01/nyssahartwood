<div class="container-fluid position-relative">
	<div class="container py-3 py-lg-5">
		<div class="row justify-content-center">
			<div class="col-md-8 text-lg-center">
				<?php if( get_sub_field('intro_title') ): ?>
					<h2 class="mb-3"><?php echo acf_esc_html( get_sub_field('intro_title') ); ?></h2>
				<?php endif; ?>
				<?php if( get_sub_field('intro_body_text') ): ?>
					<?php echo acf_esc_html( get_sub_field('intro_body_text') ); ?>
				<?php endif; ?>
				<?php 
				$link = get_sub_field('intro_link');
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
