<?php 
global $post;
$gallary = get_post_meta($post->ID, '_product_image_gallery', true);
$arr_gallary = explode(',', $gallary);
$attachment_url_first = wp_get_attachment_url($arr_gallary[0]);
$avg_rating = intval(get_post_meta($post->ID, '_wc_average_rating', true));
$price = get_post_meta($post->ID, '_price', true);
$regular_price = get_post_meta($post->ID, '_regular_price', true);
$attrs = get_post_meta($post->ID, '_product_attributes', []);
?>
<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>
									<?php 
									foreach ($arr_gallary as $attachment_id):
										$attachment_url = wp_get_attachment_url($attachment_id);?>
										<li><img src="<?= $attachment_url ?>" alt="" data-image="<?= $attachment_url ?>"></li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url(<?= $attachment_url_first ?>)"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2><?= $post->post_title ?></h2>
						<p><?= $post->post_excerpt ?>...</p>
					</div>
					<?php 
					if (!empty($attrs)) {
						foreach ($attrs as $attr) {
							if (!empty($attr['code'])) {
								echo '<div class="product-code">Mã: ' .$attr['code']['value'].'</div>';
							}
						}
					}
					?>
					<div class="original_price"><?= number_format(intval($regular_price)) ?> <?= get_woocommerce_currency_symbol() ?></div>
					<div class="product_price"><?= number_format(intval($price)) ?> <?= get_woocommerce_currency_symbol() ?></div>
					<ul class="star_rating">
						<?php 
						for($i=1; $i<5; $i++) {
							if ($avg_rating == $i) {
								echo '<li><i class="fa fa-star" aria-hidden="true"></i></li>';
							} else {
								echo '<li><i class="fa fa-star-o" aria-hidden="true"></i></li>';
							}
						}
						 ?>
					</ul>
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Quantity:</span>
						<div class="quantity_selector">
							<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
							<span id="quantity_value">1</span>
							<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
						</div>
						<a href="javascript:void(0)" class="js-btn-product-add-to-cart" data-product-id="<?= $post->ID ?>">add to cart
							</a>
					</div>
				</div>
			</div>