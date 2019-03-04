<?php get_header() ?>
<div class="product-detail">
	<div class="container single_product_container">
		<div class="row">
			<div class="col">
				<!-- Breadcrumbs -->
				<?= \includes\Bootstrap::bootstrap()->helper->render(PATH_THEME . '/views/product/breadcrumbs.php') ?>

			</div>
		</div>

		<div class="row">
				<?= \includes\Bootstrap::bootstrap()->helper->render(PATH_THEME . '/views/product/product-description.php') ?>
		</div>

			<div class="row">
		<?= \includes\Bootstrap::bootstrap()->helper->render(PATH_THEME . '/views/product/tab-content.php') ?>
	</div>

	<div class="row">
		<?php 
		$product_id = get_the_ID();
		$terms = get_the_terms($product_id, 'product_cat');
		$arr_id = [];
		if (count($terms) > 0) {
			for ($i = 0; $i < count($terms); $i++) {
				$arr_id[] = $terms[$i]->term_id;
			}

			echo do_shortcode('[product_slick title="sản phẩm liên quan" cat_ids="'.implode(',', $arr_id).'"/]');
		}
		?>
		</div>
	</div>

</div>
<?php get_footer() ?>