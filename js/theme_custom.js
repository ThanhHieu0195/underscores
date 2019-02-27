(function($) {
	let isProcess = false;
	$('.js-bt-add-to-cart').on('click', function () {
		if (!isProcess) {
			isProcess = true;
			let product_id = $(this).data('product-id');
			$.post(window.location.origin + window.location.pathname+'?add-to-cart='+product_id+'&quantity=1', function () {
				$.notify('add Product to cart!', {
					position: 'bottom',
					className: 'success'
				});
				let num = parseInt($('#checkout_items').html()) + 1;
				$('#checkout_items').html(num);
				isProcess = false;
			});
		}
	});

	$('.js-btn-product-add-to-cart').on('click', function () {
		if (!isProcess) {
			isProcess = true;
			let product_id = $(this).data('product-id');
			let quantity = parseInt($('#quantity_value').html());
			$.post(window.location.origin + window.location.pathname+'?add-to-cart='+product_id+'&quantity='+quantity, function () {
				$.notify('add Product to cart!', {
					position: 'bottom',
					className: 'success'
				});
				let num = parseInt($('#checkout_items').html()) + quantity;
				$('#checkout_items').html(num);
				isProcess = false;
			});
		}
	});
})(jQuery);
