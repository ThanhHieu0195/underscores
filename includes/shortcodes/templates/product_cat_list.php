<?php
$args = ['taxonomy' => 'product_cat'];
if (isset($params['cat_ids']) && $params['cat_ids']) {
	$args['include'] = $params['cat_ids'];
}
if (isset($params['cat_slugs']) && $params['cat_slugs']) {
	$arr = explode(',', $params['cat_slugs']);
	$args['slug'] = $arr;
}

if (isset($params['number'])) {
	$args['number'] = $params['number'];
}


$terms = get_terms($args);
?>

<div class="banner">
		<div class="container">
			<div class="row">
				<?php foreach ($terms as $term) {
					$thumbnail = get_term_meta($term->term_id, 'thumbnail_id', true);
					$thumbnail_url = '';
					if (!empty($thumbnail)) {
						$thumbnail_url = wp_get_attachment_url($thumbnail);
					}

					echo '
					<div class="col-md-4">
						<div class="banner_item align-items-center" style="background-image:url('.esc_url($thumbnail_url).')">
							<div class="banner_category">
								<a href="categories.html">'.$term->name.'</a>
							</div>
						</div>
					</div>
					';
				} ?>
			</div>
		</div>
	</div>
