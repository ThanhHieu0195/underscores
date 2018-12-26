<?php
namespace includes\shortcodes;

class PostCarouselShortcode extends \includes\classes\Shortcode {
    public $shortcode = 'post-carousel';
    public $attributes = [
        'title' => '',
        'number' => '',
        'type' => 'post'
    ];
}