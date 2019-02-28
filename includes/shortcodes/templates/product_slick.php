<?php 
extract($params);
$products = get_posts([
	'post_type' => 'product',
	'include' => $product_ids
]);

?>
	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2><?= $title ?></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product_slider_container">
						<div class="owl-carousel owl-theme product_slider">

							<!-- Slide 1 -->
							<?php 
							foreach ($products as $product):
								$thumbnail = get_the_post_thumbnail_url($product->ID);
								$price = get_post_meta($product->ID, '_regular_price', true);
								$saleprice = get_post_meta($product->ID, '_sale_price', true);
								$type = 1;
								if (!empty($saleprice)) {
									$type = 2;
								}
								
							?>
							<div class="owl-item product_slider_item">
								<div class="product-item">
									<div class="product discount">
										<div class="product_image">
											<img src="<?= esc_url($thumbnail) ?>" alt="">
										</div>
										<div class="favorite favorite_left"></div>
										<?php if ($type == 2): ?>
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-<?= ($price-$saleprice)/$price*100 ?>%</span></div>
										<div class="product_info">
											<h6 class="product_name"><a href="<?= get_permalink($product->ID) ?>"><?= $product->post_title ?></a></h6>
											<div class="product-code">123456</div>
											<div class="product_price"><?= $saleprice ?>VND<span><?= $price ?>VND</span></div>
										</div>
										<?php else: ?>
										<div class="product_info">
											<h6 class="product_name"><a href="<?= get_permalink($product->ID) ?>"><?= $product->post_title ?></a></h6>
											<div class="product-code">123456</div>
											<div class="product_price"><?= $price ?>VND</div>
										<?php endif; ?>
										
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>

						<!-- Slider Navigation -->

						<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>