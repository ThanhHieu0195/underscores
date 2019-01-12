<?php 
extract($params);
$background_url = '';
if (isset($background_id)) {
	$background_url = wp_get_attachment_url($background_id);
}

if (isset($deadline)) {
	$deadline = strtotime($deadline) * 1000;
}
?>
<div class="deal_ofthe_week">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="deal_ofthe_week_img">
					<img src="<?= esc_url($background_url) ?>" alt="">
				</div>
			</div>
			<div class="col-lg-6 text-right deal_ofthe_week_col">
				<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
					<div class="section_title">
						<h2><?= $title ?></h2>
					</div>
					<ul class="timer" data-time="<?= $deadline ?>">
						<li class="d-inline-flex flex-column justify-content-center align-items-center">
							<div id="day" class="timer_num">00</div>
							<div class="timer_unit"><?= esc_html__('Day', 'build') ?></div>
						</li>
						<li class="d-inline-flex flex-column justify-content-center align-items-center">
							<div id="hour" class="timer_num">00</div>
							<div class="timer_unit"><?= esc_html__('Hours', 'build') ?></div>
						</li>
						<li class="d-inline-flex flex-column justify-content-center align-items-center">
							<div id="minute" class="timer_num">00</div>
							<div class="timer_unit"><?= esc_html__('Mins', 'build') ?></div>
						</li>
						<li class="d-inline-flex flex-column justify-content-center align-items-center">
							<div id="second" class="timer_num">00</div>
							<div class="timer_unit"><?= esc_html__('Sec', 'build') ?></div>
						</li>
					</ul>
					<div class="red_button deal_ofthe_week_button"><a href="<?= $btn_link ?>"><?= $btn_text ?></a></div>
				</div>
			</div>
		</div>
	</div>
</div>