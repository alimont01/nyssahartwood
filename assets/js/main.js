// Theme JS entry point
console.log('nyssa_hartwood theme loaded');

jQuery(function ($) {
	function getVisibleCartCount() {
		var count = 0;
		var foundInputs = false;

		$('.wc-block-components-quantity-selector__input').each(function () {
			foundInputs = true;
			count += parseInt($(this).val(), 10) || 0;
		});

		if (foundInputs) {
			$('.cart-count').text(count);
			return true;
		}

		if ($('.wc-block-cart__empty-cart').length || $('.wc-block-cart-items').length === 0) {
			$('.cart-count').text(0);
			return true;
		}

		return false;
	}

	function refreshCartCount() {
		setTimeout(getVisibleCartCount, 100);
		setTimeout(getVisibleCartCount, 400);
		setTimeout(getVisibleCartCount, 900);
	}

	$(document).on(
		'click',
		'.wc-block-components-quantity-selector__button, .wc-block-cart-item__remove-link',
		refreshCartCount
	);

	$(document).on(
		'change input',
		'.wc-block-components-quantity-selector__input',
		refreshCartCount
	);

	var cartBlock = document.querySelector('.wp-block-woocommerce-cart');

	if (cartBlock) {
		var observer = new MutationObserver(function () {
			getVisibleCartCount();
		});

		observer.observe(cartBlock, {
			childList: true,
			subtree: true,
			attributes: true,
			attributeFilter: ['value']
		});
	}
});


// HP scroll to footer form
jQuery(function ($) {
	$('.free-book-link').on('click', function (e) {
		e.preventDefault();

		const target = $('#footer-form');

		if (!target.length) {
			return;
		}

		$('html, body').animate({
			scrollTop: target.offset().top - 80
		}, 700, function () {
			const input = target.find('input[type="email"]').first();

			if (input.length) {
				input.focus();

				input.removeClass('input-highlight');

				setTimeout(function () {
					input.addClass('input-highlight');
				}, 50);

				setTimeout(function () {
					input.removeClass('input-highlight');
				}, 2000);
			}
		});
	});
});