<?php
namespace includes\shortcodes;

class ProductSlickShortcode extends \includes\classes\Shortcode {
    public $shortcode = 'product_slick';
    public $attributes = [
        'title' => '',
        'product_ids' => '',
        'cat_ids' => '',
        'cat_slugs' => ''
    ];
}