<?php
/**
 * @package nyssa_hartwood_theme
 */
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
get_header(); ?>


    <div class="container-fluid hero-hp">
        <div class="container z-top pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="mt-0">
                        <?php the_title(); ?>
                    </h1>
                </div>
                <div class="col-lg-6 mt-4 text-center">
                    <?php if ( get_field('sub_title') ): ?>
						<h2 class="fs-4">
							<?php echo acf_esc_html( get_field('sub_title') ); ?>
						</h2>
					<?php endif; ?>
                    <span class="p-4 d-block">{ -- Get form -- }</span>
                    <p class="small">Instant download. No spam.</p>
                </div>
            </div>
        </div>
        <img class="position-absolute top-0 start-0 cover-img" src="<?php echo $thumb['0'];?>" alt="Nyssa Hartwood Healing Meals">
    </div>

    <?php get_template_part( 'template-parts/flexible-page-content' ); ?>


<?php get_footer(); ?>