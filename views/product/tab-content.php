<div class="tabs_section_container">

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabs_container">
						<ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
							<li class="tab active" data-active-tab="tab_1"><span><?= esc_html__('Description', 'build') ?></span></li>
							<li class="tab" data-active-tab="tab_2"><span><?= esc_html__('Additional Information', 'build') ?></span></li>
							<li class="tab" data-active-tab="tab_3"><span><?= esc_html__('Reviews', 'build') ?></span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">

					<!-- Tab Description -->
					<?php 
					$tab_desc = get_field('desc', get_the_ID());
					?>
					<div id="tab_1" class="tab_container active">
						<div class="row">
							<?php 
							if (!empty($tab_desc)):
							foreach($tab_desc as $desc): ?>
							<div class="desc_col">
								<div class="tab_image">
									<img src="<?= $desc['img']['url'] ?>" alt="">
								</div>
								<div class="tab_text_block">
									<h2><?= $desc['title'] ?></h2>
									<p><?= $desc['desc'] ?></p>
								</div>
							</div>
							<?php 
							endforeach;
							endif;	
							 ?>
						
							
						</div>
					</div>

					<!-- Tab Additional Info -->
					<?php 
					$tab_info = get_field('info', get_the_ID());
					?>
					<div id="tab_2" class="tab_container">
						<div class="row">
							<div class="col additional_info_col">
								<div class="tab_title additional_info_title">
									<h4><?= esc_html__('Additional Information', 'build') ?></h4>
								</div>
								<?php 
								if (!empty($tab_info)):
									foreach($tab_info as $info):

								?>
								<p><?= $info['title'] ?>:<span><?= $info['desc'] ?></span></p>
								<?php 
								endforeach;
								endif;
								?>
							</div>
						</div>
					</div>

					<!-- Tab Reviews -->

					<div id="tab_3" class="tab_container">
						<div class="row">

							<!-- User Reviews -->

							<div class="col-lg-6 reviews_col">
								<div class="tab_title reviews_title">
									<h4><?= esc_html__('Reviews', 'build') ?></h4>
								</div>

								<!-- User Review -->
									<?php 
								$comments = get_comments(get_the_ID());
								foreach($comments as $comment) : 
									?>
								<div class="user_review_container d-flex flex-column flex-sm-row">
									<div class="review">
										<div class="review_date">
											<?= date(get_option('date_format'), strtotime($comment->comment_date)) ?>
										</div>
										<div class="user_name">
											<?= $comment->comment_author ?>	
										</div>
										<p>
											<?= $comment->comment_content ?>
										</p>
									</div>
								</div>
								<?php	
								endforeach;
								?>
							</div>
							<!-- Add Review -->
							<div class="col-lg-6 add_review_col">

								<div class="add_review">
									<?php comment_form(); ?>
								</div>

							</div>

						</div>
					</div>

				</div>
			</div>
		</div>

	</div>