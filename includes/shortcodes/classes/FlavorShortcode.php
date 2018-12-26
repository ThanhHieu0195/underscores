<?php
namespace includes\shortcodes;

class FlavorShortcode extends \includes\classes\Shortcode {
    public $shortcode = 'flavor';
    public $has_style = 1;
    public $attributes = [
        'post_id' => '',
        'style' => '1',
    ];
}