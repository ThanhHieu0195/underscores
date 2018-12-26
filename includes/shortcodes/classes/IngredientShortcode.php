<?php
namespace includes\shortcodes;

class IngredientShortcode extends \includes\classes\Shortcode {
    public $shortcode = 'ingredient';
    public $has_style = 1;
    public $attributes = [
        'title' => '',
        'description' => '',
        'bg' => '',
        'link' => '',
        'style' => '1'
    ];
}