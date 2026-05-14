<div id="mlb2-41295617" class="ml-form-embedContainer ml-subscribe-form ml-subscribe-form-41295617">
	<div class="ml-form-embedWrapper embedForm">
		<div class="ml-form-embedBody ml-form-embedBodyDefault row-form">

			<form
				class="ml-block-form download-form w-100 d-flex"
				action="https://assets.mailerlite.com/jsonp/2347679/forms/187446448240985275/subscribe"
				data-code=""
				method="post"
				target="_blank"
			>
				<input
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

<script>
	document.querySelector('.download-form').addEventListener('submit', function () {
		document.cookie = "nyssa_download=1; path=/; max-age=300"; // 5 mins
	});
</script>

<script>
	function ml_webform_success_41295617() {
		try {
			window.top.location.href = 'https://nyssa-hartwood.amd-dev.uk/thank-you/';
		} catch (e) {
			window.location.href = 'https://nyssa-hartwood.amd-dev.uk/thank-you/';
		}
	}
</script>

<script src="https://groot.mailerlite.com/js/w/webforms.min.js" type="text/javascript"></script>
<script>
	fetch("https://assets.mailerlite.com/jsonp/2347679/forms/187446448240985275/takel");
</script>