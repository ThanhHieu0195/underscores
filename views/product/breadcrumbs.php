<div class="breadcrumbs d-flex flex-row align-items-center">
	<ul>
		<li><a href="<?= home_url() ?>">Home</a></li>
		<?php 
			global $post;
			$post_categories = wp_get_post_terms( $post->ID , 'product_cat');
			if (!empty($post_categories)) {
				echo '<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>'.$post_categories[0]->name.'</a></li>';		
			}
		?>
		<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i><?= $post->post_title ?></a></li>
	</ul>
</div>