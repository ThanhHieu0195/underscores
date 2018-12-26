<?php
namespace includes\shortcodes;

class AboutShortcode extends \includes\classes\Shortcode {
    public $shortcode = 'about';
    public $attributes = [
        'title' => '',
        'subtitle' => '',
        'description' => '',
        'background_url' => ''
    ];
}