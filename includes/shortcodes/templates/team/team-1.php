<?php
extract($params);
?>
<div class="sc-team-block">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <div class="sc-team-block__block-image"><img src="<?= esc_url($bg) ?>" alt=""></div>
        </div>
        <div class="col-md-6 col-md-offset-1">
            <div class="sc-team-block__block-content">
                <div class="sc-main-title sc-team-block__title"><?= $title  ?></div>
                <div class="sc-team-block__description">
                    <?= $description ?>
                </div>
                <div class="sc-button sc-team-block__btn">
                    <a class="main-color" href="<?= esc_url($view) ?>"><span><?= translate_i18n('Xem Thêm') ?></span></a>
                </div>
            </div>
        </div>
    </div>
</div>