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
                    <div class="my-4">
                        <?php get_template_part( 'template-parts/mailerlite' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <img class="position-absolute top-0 start-0 cover-img" src="<?php echo $thumb['0'];?>" alt="Nyssa Hartwood Anti-Inflammatory Recipes">
    </div>
    <div class="container z-top overlap">
        <div class="row px-0 px-lg-5">
            <div class="col-lg-6 text-center text-lg-start ps-lg-5">
                <?php 
                $image_1 = get_field('image_one');
                if( !empty( $image_1 ) ): ?>
                    <img src="<?php echo esc_url($image_1['url']); ?>" alt="<?php echo esc_attr($image_1['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="col-lg-6 pe-5 text-end d-none d-lg-inline-block">
                <?php 
                $image_1 = get_field('image_two');
                if( !empty( $image_1 ) ): ?>
                    <img src="<?php echo esc_url($image_1['url']); ?>" alt="<?php echo esc_attr($image_1['alt']); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php get_template_part( 'template-parts/flexible-page-content' ); ?>

    <div id="footer-form" class="container-fluid darker-cream-bg position-relative">
        <div class="container z-top">
            <div class="row align-items-end">
                <div class="col-lg-8 py-4 pt-lg-5">
                    <h3 class="mt-0">
                        Get Your Free Healing Meals Book
                    </h3>
                    <p>A collection of simple, anti-inflammatory recipes to help you feel your best.</p>

                    <div id="mlb2-41305627" class="ml-form-embedContainer ml-subscribe-form ml-subscribe-form-41305627">
                        <div class="ml-form-embedWrapper embedForm">
                            <div class="ml-form-embedBody ml-form-embedBodyDefault row-form">

                                <form
                                    class="ml-block-form download-form download-form-home-footer w-100 d-flex flex-column flex-sm-row"
                                    action="https://assets.mailerlite.com/jsonp/2347679/forms/187458686843618940/subscribe"
                                    data-code=""
                                    method="post"
                                    target="_blank"
                                >
                                    <input
                                        aria-label="email"
                                        aria-required="true"
                                        type="email"
                                        name="fields[email]"
                                        placeholder="Add your email"
                                        autocomplete="email"
                                        required
                                    >

                                    <input type="hidden" name="ml-submit" value="1">
                                    <input type="hidden" name="anticsrf" value="true">

                                    <button type="submit">
                                        Download free book
                                    </button>
                                </form>

                            </div>

                            <div class="ml-form-successBody row-success" style="display: none;">
                                <div class="ml-form-successContent">
                                    <h4>Thank you!</h4>
                                    <p>You have successfully joined our subscriber list.</p>
                                </div>
                            </div>
                        </div>
                        <p class="small mt-3">Instant download. No spam.</p>
                    </div>

                </div>

                <div class="col-lg-4 d-none d-lg-block">
                    <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/bowl-of-food.png" alt="Nyssa Hartwood Anti-Inflammatory Recipes">
                </div>
            </div>
        </div>
        <div class="white-mask d-none d-lg-block"></div>
    </div>

<?php get_footer(); ?>