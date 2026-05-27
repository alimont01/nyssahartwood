<?php if ( is_single() && 'post' == get_post_type() ) : ?>
	<div class="container py-3 py-lg-5">
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-3">
				<?php if( get_sub_field('display_image_as_a_circle') ): ?>
					<?php 
					$image = get_sub_field('image_text_image');
					$size = 'square';

					if( $image ) {
						echo wp_get_attachment_image( $image, $size, false, array(
							'class' => 'w-100 rounded-circle mb-3 mb-md-0'
						));
					}
					?>
				<?php else: ?>
					<?php 
					$image = get_sub_field('image_text_image');
					$size = 'medium';

					if( $image ) {
						echo wp_get_attachment_image( $image, $size, false, array(
							'class' => 'w-100 rounded-3 text-image mb-3 mb-md-0'
						));
					}
					?>
				<?php endif; ?>
			</div>
			<div class="col-lg-7">
				<?php if( get_sub_field('block_title_text_image') ): ?>
					<h2 class="mb-3"><?php echo acf_esc_html( get_sub_field('block_title_text_image') ); ?></h2>
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
<?php else: ?> 

	<div class="container py-3 py-lg-5">
		<div class="row">
			<div class="col-md-4">
				<?php if( get_sub_field('display_image_as_a_circle') ): ?>
					<?php 
					$image = get_sub_field('image_text_image');
					$size = 'square';

					if( $image ) {
						echo wp_get_attachment_image( $image, $size, false, array(
							'class' => 'w-100 rounded-circle mb-3 mb-md-0'
						));
					}
					?>
				<?php else: ?>
					<?php 
					$image = get_sub_field('image_text_image');
					$size = 'medium';

					if( $image ) {
						echo wp_get_attachment_image( $image, $size, false, array(
							'class' => 'w-100 rounded-3 text-image mb-3 mb-md-0'
						));
					}
					?>
				<?php endif; ?>
			</div>
			<div class="col-md-8">
				<?php if( get_sub_field('block_title_text_image') ): ?>
					<h2 class="mb-3"><?php echo acf_esc_html( get_sub_field('block_title_text_image') ); ?></h2>
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

<?php endif; ?> 