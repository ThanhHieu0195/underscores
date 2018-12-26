<?php
extract($params);
/**
 * @var $post WP_Post
 */
$post = get_post($post_id);
$bg = get_the_post_thumbnail_url($post_id);
$title = $post->post_title;
$description = $post->post_excerpt;
$permalink = get_permalink($post_id);
?>
<div class="block-item left">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 item">
            <div class="block-image"><a href="<?= esc_url($permalink) ?>"><img src="<?= esc_url($bg) ?>"></a></div>
        </div>
        <div class="col-lg-offset-4 col-md-offset-0 col-xs-12 col-sm-12 col-md-8">
            <div class="block-content">
                <div class="title">
                    <a href="<?= esc_url($permalink) ?>"><?= esc_html($title) ?></a>
                </div>
                <div class="description">
                    <?= $description ?>
                </div>
                <div class="read-more"><?= translate_i18n('xem thêm') ?></div>
            </div>
        </div>
    </div>
</div>

