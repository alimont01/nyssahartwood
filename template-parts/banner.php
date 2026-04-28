<?php
/** Banner area on on pages */
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
?>

<?php if ( has_post_thumbnail() ) : ?>
	<header class="container-fluid hero-hp cream-bg position-relative">
		<div class="container pb-5">
			<div class="row justify-content-end">
				<div class="col-lg-6 ps-lg-5">
					<h1 class="mt-0 fs-1">
						<?php the_title(); ?>
						<?php woocommerce_page_title(); ?>
					</h1>
					<?php if ( get_field('sub_title') ): ?>
						<h2 class="fs-4">
							<?php echo acf_esc_html( get_field('sub_title') ); ?>
						</h2>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="w-50 h-100 position-absolute start-0 top-0">
			<img class="position-absolute top-0 start-0 feat-img" src="<?php echo $thumb['0'];?>" alt="Shop Healing Meals">
		</div>
	</header>
<?php else: ?> 
	<header class="container-fluid hero cream-bg">
		<div class="container pb-5">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<h1 class="mt-0">
						<?php the_title(); ?>
					</h1>
				</div>
			</div>
		</div>
	</header>
<?php endif; ?> 
