<?php
if ($params['type'] == 'company_news') {
   $posts = get_posts(array(
        'numberposts' => $params['number'],
         'meta_query' => array(
           array(
               'key' => 'company_new',
               'value' => 's:1',
               'compare' => 'like',
           )
       )
    ));

} else if($params['type'] == 'insight') {
    $posts = get_posts(array(
        'numberposts' => $params['number'],
          'meta_query' => array(
              array(
                    'relation' => 'OR',
                   array(
                        'key' => 'company_new',
                      'compare' => 'NOT EXISTS',
                    ),
                     array(
                        'key' => 'company_new',
                        'value' => '',
                      'compare' => '=',
                    )
           )
          
       )
));
} else {
    $posts = get_posts(array(
        'numberposts' => $params['number'],
       ));
}
?>
<div class="carousel-post">
    <div class="carousel-slide">
        <div class="container">
            <div class="carousel-slide-wrapper">
                <div class="sc-main-title sc-team-block__title"><?= $params['title'] ?></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-md-10">
                        <div class="carousel-slide-for">
                            <?php foreach ($posts as $post):
                            $thumnail_url = get_the_post_thumbnail_url($post->ID);
                            ?>
                            <div class="carousel-slide-for__item">
                                <div class="holder-wrapper"><img class="img-responsive" src="<?= $thumnail_url ?>" alt="slide-01"></div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 custom-nav-for">
                        <div class="carousel-slide-nav">
                            <?php foreach ($posts as $post):
                                $cats = wp_get_post_categories($post->ID);
                                $cat_name = '';
                                if (!empty($cats)) {
                                    $cat_name = get_cat_name($cats[0]);
                                }
                                $permalink = get_permalink($post->ID);
                                ?>
                            <div class="carousel-slide-nav__item">
                                <p class="title"><?= $post->post_title ?></p>
                                <p class="info"><?= $post->post_date ?>   |   <?= $cat_name ?></p>
                                <p class="content-text"><?= get_the_excerpt($post->ID) ?></p>
                                <div class="sc-button"><a class="main-color" href="<?= $permalink ?>"><span><?= translate_i18n('xem thêm') ?>  </span></a></div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
