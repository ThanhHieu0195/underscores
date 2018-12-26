<?php
extract($params);
$idx = 0;
?>
<div class="nmorale">
    <div class="ncontainer">
        <div class="nheading__wrap">
            <h5 class="nheading__wrap-h5 heading-h5 f--400 txt--up cl--white"><?= $subtitle ?></h5>
            <h2 class="heading-h2 f--600 txt--cap lh--12 cl--white inlineb-t">
                <?= $title ?>
                <div class="nline-title bl-after"></div>
            </h2>
            <p class="ntext-des cl--white f--16">
                <?= $description ?>
            </p>
        </div>
        <ul class="nmorale__wrap wp-inlineb list-clm clm-04">
            <?php while(isset(${'name' . $idx})): ?>
            <li class="nitem inlineb-t">
                <div class="nmorale__img">
                    <img src="<?= ${'background' . $idx} ?>"
                         alt="<?= ${'name' . $idx} ?>" class="nimg nratio--img">
                </div>
                <div class="nmorale__info txt--l">
                    <span class="nmorale__info-num cl--white"><?= ($idx+1) < 10 ? '0.' . ($idx+1) : $idx+1 ?></span>
                    <h3 class="nmorale__info-title heading-h3 txt--up f--900 cl--white"><?= ${'name' . $idx} ?></h3>
                    <p class="nmorale__info-des cl--white lh--13"><?= ${'description' . $idx} ?></p>
                </div>
            </li>
                <?php $idx ++; ?>
            <?php endwhile; ?>
        </ul>
    </div>
</div>