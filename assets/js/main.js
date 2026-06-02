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


// MailerLite
window.ml_webform_success_41295617 = function () {
	try {
		window.top.location.href = 'https://nyssahartwood.com/thank-you/';
	} catch (e) {
		window.location.href = 'https://nyssahartwood.com/thank-you/';
	}
};

window.ml_webform_success_41305627 = function () {
	try {
		window.top.location.href = 'https://nyssahartwood.com/thank-you/';
	} catch (e) {
		window.location.href = 'https://nyssahartwood.com/thank-you/';
	}
};

document.addEventListener('submit', function (event) {
	if (event.target.classList.contains('download-form')) {
		document.cookie = "nyssa_download=1; path=/; max-age=300";
	}
}, true);

fetch("https://assets.mailerlite.com/jsonp/2347679/forms/187446448240985275/takel");
fetch("https://assets.mailerlite.com/jsonp/2347679/forms/187458686843618940/takel");


// Mobile menu
document.addEventListener("DOMContentLoaded", function () {
    const menu = document.querySelector("#mobile-menu");
    const openButton = document.querySelector(".mobile-menu");
    const closeButton = document.querySelector(".mobile-menu-close");
    const body = document.body;

    if (!menu || !openButton) return;

    function openMenu() {
        body.classList.add("mobile-menu-open");
        openButton.setAttribute("aria-expanded", "true");
        menu.setAttribute("aria-hidden", "false");
    }

	function closeMenu() {
		body.classList.remove("mobile-menu-open");
		openButton.setAttribute("aria-expanded", "false");
		menu.setAttribute("aria-hidden", "true");
	}

    openButton.addEventListener("click", openMenu);

    if (closeButton) {
        closeButton.addEventListener("click", closeMenu);
    }

    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            closeMenu();
        }
    });
});