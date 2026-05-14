<?php
/**
 * Template Name: Free download
 *
 */

if ( ! isset($_COOKIE['nyssa_download']) ) {
	wp_redirect( home_url() );
	exit;
}

get_header(); 
?>


<main class="site-main thank-you-page">

	<section class="container-fluid hero cream-bg">
		<div class="container pb-4 pb-lg-5">
			<div class="row justify-content-center text-center">
				<div class="col-lg-8">

					<h1 class="mb-4">Your free book is ready</h1>

					<p class="fs-5 mb-4">
						Thank you for signing up. You can download your free book below.
					</p>

                    <a
                        id="free-book-download"
                        href="https://nyssa-hartwood.amd-dev.uk/wp-content/uploads/2026/05/Healing-Meals-Prep-to-Pain-Free.pdf"
                        class="button"
                        download
                    >
                        <span class="download-text">Download your free book</span>
                    </a>

					<p class="small mt-4 mb-0">
						You’re now subscribed to receive occasional recipes and updates.
						You can unsubscribe at any time.
					</p>

				</div>
			</div>
		</div>
	</section>

	<section class="container py-5">
		<div class="row justify-content-center text-center">
			<div class="col-lg-8">

				<h2 class="h3 mb-3">While you’re here</h2>

				<p class="mb-4">
					Explore more nourishing recipes and books from Nyssa Hartwood.
				</p>

				<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-outline-dark rounded-pill px-4">
					Visit the shop
				</a>

			</div>
		</div>
	</section>

</main>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const downloadButton = document.getElementById('free-book-download');

		if (!downloadButton) {
			return;
		}

		const downloadText = downloadButton.querySelector('.download-text');
		const fileUrl = downloadButton.href;

		downloadText.textContent = 'Downloading…';

		setTimeout(function () {
			const tempLink = document.createElement('a');

			tempLink.href = fileUrl;
			tempLink.download = 'healing-meals-free-book.pdf';
			tempLink.style.display = 'none';

			document.body.appendChild(tempLink);
			tempLink.click();
			document.body.removeChild(tempLink);

			// Clear the access cookie after download starts
			document.cookie = "nyssa_download=; path=/; max-age=0";

			setTimeout(function () {
				downloadText.textContent = 'Download your free book';
			}, 2000);
		}, 800);
	});
</script>

<?php get_footer(); ?>