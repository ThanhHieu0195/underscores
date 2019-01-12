<?php
namespace includes\shortcodes;

class CountDownShortcode extends \includes\classes\Shortcode {
    public $shortcode = 'countdown';
    public $attributes = [
        'title' => '',
        'deadline' => '',
       	'btn_text' => '',
       	'btn_link' => '',
       	'background_id' => ''
    ];
}