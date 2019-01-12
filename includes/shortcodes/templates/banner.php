<?php  
$url = '';
if (isset($params['attachment_id']))  {
	$url = wp_get_attachment_url($params['attachment_id']);
}
?>
<div class="main_slider" style="background-image:url(<?= esc_url($url) ?>)">
	<div class="container fill_height">
		<div class="row align-items-center fill_height">
			<div class="col">
				<div class="main_slider_content">
					<?php if (!empty($params['subtitle'])): ?>
					<h6><?= $params['subtitle'] ?></h6>
					<?php endif; ?>
					
					<?php if (!empty($params['title'])): ?>
					<h1><?= $params['title'] ?></h1>
					<?php endif; ?>
					
					<?php if (!empty($params['btn_link'])): ?>
					<div class="red_button shop_now_button"><a href="<?= esc_url($params['btn_link']) ?>">
						<?= $params['btn_text'] ?></a></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>