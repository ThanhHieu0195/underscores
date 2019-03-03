<?php
namespace includes\shortcodes;

class ProductCategoryList extends \includes\classes\Shortcode {
    public $shortcode = 'product_cat_list';
    public $attributes = [
        'cat_ids' => '',
        'number' => '',
        'cat_slugs' => ''
    ];
}