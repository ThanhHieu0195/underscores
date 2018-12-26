<?php
extract($params);
?>
<div class="block-item">
    <div class="block-image"><img src="<?= esc_url($bg) ?>"></div>
    <div class="block-content">
        <a href="<?= $link ?>">
            <div class="title"><?= $title ?></div>
        </a>
        <div class="description">
            <?= $description ?>
        </div>
    </div>
</div>
