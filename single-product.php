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

	</div>

	<!-- Tabs -->

	<?= \includes\Bootstrap::bootstrap()->helper->render(PATH_THEME . '/views/product/tab-content.php') ?>

</div>
<?php get_footer() ?>