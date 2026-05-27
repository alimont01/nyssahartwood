<?php
get_header();
?>

    <header class="container-fluid hero cream-bg">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="mt-0">
                        <?php
                        $title = get_the_archive_title();

                        if ( is_category() || is_tag() || is_tax() ) {
                            $title = single_term_title( '', false );
                        } elseif ( is_post_type_archive() ) {
                            $title = post_type_archive_title( '', false );
                        }

                        echo esc_html( $title );
                        ?>
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <div class="container py-5">

        <div class="row g-4">

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <a href="<?php the_permalink() ?>" class="col-12 col-sm-12 col-lg-4 mb-3 mb-lg-0">
                        <div class="bg-white rounded-4 d-flex flex-wrap text-center sign-post h-100">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'large', array( 'class' => 'w-100 rounded-4 shadow-lg' ) ); ?>
								<?php else: ?>
                                    <img class="w-100 rounded-4 shadow wp-post-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.png" alt="Shop Nyssa Hartwood  Anti-Inflammatory Healing Meals">
								<?php endif; ?>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-12 p-4">
                                <h3><?php the_title(); ?></h3>
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="col-12 d-flex align-items-center p-4">
                                <div class="col-12 text-center green-arrow">
                                    <i class="bi bi-arrow-right-circle-fill"></i>
                                </div>
                            </div>
                        </div>
                    </a>

                <?php endwhile; ?>
            <?php else : ?>

            <div class="col-12">
                <p>No recipes found.</p>
            </div>

        <?php endif; ?>

        </div>

        <div class="mt-5">
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( '« Previous', 'your-textdomain' ),
                'next_text' => __( 'Next »', 'your-textdomain' ),
            ) );
            ?>
        </div>

    </div>

<?php
get_footer();