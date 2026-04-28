<div class="container py-3 py-lg-5">
	<div class="row align-items-center">
		<div class="col-md-4">
			<?php 
			$image = get_sub_field('image_text_image');
			$size = 'medium';

			if( $image ) {
				echo wp_get_attachment_image( $image, $size, false, array(
					'class' => 'w-100 rounded-3 text-image mb-3 mb-md-0'
				));
			}
			?>
		</div>
		<div class="col-md-8">
			<?php if( get_sub_field('block_title_text_image') ): ?>
				<h3 class="fs-1 mb-3"><?php echo acf_esc_html( get_sub_field('block_title_text_image') ); ?></h3>
			<?php endif; ?>
			<?php if( get_sub_field('body_text_text_image') ): ?>
				<?php echo acf_esc_html( get_sub_field('body_text_text_image') ); ?>
			<?php endif; ?>
			<?php 
			$link = get_sub_field('block_link_text_image');
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
