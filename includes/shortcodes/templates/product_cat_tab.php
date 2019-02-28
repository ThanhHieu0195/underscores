<?php 
extract($params);
$cat_slugs = explode(',', $cat_slugs);
$arr_termname = [];
$arr = [];
if (!empty($cat_slugs)) {
	foreach ($cat_slugs as $slug) {
		$term = get_term_by('slug', $slug, 'product_cat');
		if (!empty($term)) {
			$posts = get_posts(array( 
			    'post_type' => 'product',
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'product_cat',
			            'terms' => $term->term_id,
			            'field' => 'term_id',
			        )
			    )
			));
			$arr_termname[$slug] = $term->name;
			foreach ($posts as $post) {
				if (!isset($arr[$post->ID])) {
					$arr[$post->ID] = [
						'slug' => [],
						'data' => $post

					];
				}
				$arr[$post->ID]['slug'][] = $slug;
			}
		}
	}
}
?>

<div class="new_arrivals">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2><?= $title ?></h2>
				</div>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col text-center">
				<div class="new_arrivals_sorting">
					<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
						<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
						<?php 
						foreach ($arr_termname as $key => $value) {
							echo '<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".'.$key.'">'.$value.'</li>';
						}
						 ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

					<!-- Product 1 -->
					<?php  foreach ($arr as $obj): 
						$thumbnail_url = get_the_post_thumbnail_url($obj['data']->ID);
						$price = get_post_meta($obj['data']->ID, '_regular_price', true);
						$saleprice = get_post_meta($obj['data']->ID, '_sale_price', true);
						$type = 1;
						if (!empty($saleprice)) {
							$type = 2;
						}
						$attrs = get_post_meta($obj['data']->ID, '_product_attributes', []);
						?>
					<div class="product-item <?= implode(' ', $obj['slug']) ?>">
						<div class="product discount product_filter">
							<div class="product_image">
								<img src="<?= esc_url($thumbnail_url) ?>" alt="">
							</div>
							<div class="favorite favorite_left"></div>
							<?php if ($type == 2): ?>
							<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-<?= ($price - $saleprice)/$price*100 ?>%</span></div>
							<div class="product_info">
								<h6 class="product_name"><a href="<?= get_permalink($obj['data']->ID) ?>"><?= $obj['data']->post_title ?></a></h6>
								<?php 
								if (!empty($attrs)) {
									foreach ($attrs as $attr) {
										if (!empty($attr['code'])) {
											echo '<div class="product-code">Mã: ' .$attr['code']['value'].'</div>';
										}
									}
								}
								?>
								<div class="product_price"><?= number_format($saleprice) ?>VND<span><?= number_format($price) ?>VND</span></div>
							</div>
							<?php else: ?>
							<div class="product_info">
								<h6 class="product_name">
									<a href="<?= get_permalink($obj['data']->ID) ?>"><?= $obj['data']->post_title ?></a>
								</h6>
								<?php 
								if (!empty($attrs)) {
									foreach ($attrs as $attr) {
										if (!empty($attr['code'])) {
											echo '<div class="product-code">Mã: ' .$attr['code']['value'].'</div>';
										}
									}
								}
								?>
								<div class="product_price"><?= number_format($price) ?>VND</div>
							</div>
							<?php endif; ?>
						</div>
						<div class="red_button add_to_cart_button">
							<a href="javascript:void(0)" data-product-id="<?= $obj['data']->ID ?>" class="js-bt-add-to-cart"><?= esc_html__('add to cart', 'build') ?></a>
						</div>
						<div class="cd-cart-container empty">
							<a href="#0" class="cd-cart-trigger">
								Cart
								<ul class="count"> <!-- cart items count -->
									<li>0</li>
									<li>0</li>
								</ul> <!-- .count -->
							</a>

							<div class="cd-cart">
								<div class="wrapper">
									<header>
										<h2>Cart</h2>
										<span class="undo">Item removed. <a href="#0">Undo</a></span>
									</header>

									<div class="body">
										<ul>
											<!-- products added to the cart will be inserted here using JavaScript -->
										</ul>
									</div>

									<footer>
										<a href="#0" class="checkout btn"><em>Checkout - $<span>0</span></em></a>
									</footer>
								</div>
							</div> <!-- .cd-cart -->
						</div> <!-- cd-cart-container -->
					</div>
					<?php endforeach; ?>
					
				</div>
			</div>
		</div>
	</div>
</div>