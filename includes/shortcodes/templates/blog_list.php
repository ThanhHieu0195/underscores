<?php 
extract($params);
$args = [
	'post_type' => 'post'
];

if (!empty($number)) {
	$args['number'] = $number;
}

$posts = get_posts($args);
?>

<div class="blogs">
		<div class="container">
			<?php if (!empty($title)): ?>
			<div class="row">
				<div class="col text-center">
					<div class="section_title">
						<h2><?= $title ?></h2>
					</div>
				</div>
			</div>
			<?php endif ?>
			
			<div class="row blogs_container">
				<?php foreach ($posts as $post): 
					$thumbnail_url = get_the_post_thumbnail_url($post->ID);
					$author_id=$post->post_author;
					$post_date = $post->post_date;
					$date_format = get_option('date_format');
					?>
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url(<?= esc_url($thumbnail_url) ?>)"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title"><?= $post->post_title ?></h4>
							<span class="blog_meta">by <?= the_author_meta( 'user_nicename' , $author_id ); ?>  | <?= date($date_format, strtotime($post_date)) ?></span>
							<a class="blog_more" href="<?= get_permalink($post->ID) ?>"><?= esc_html__('Read more', 'underscores') ?></a>
						</div>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>