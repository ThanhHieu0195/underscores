<?php
namespace includes\shortcodes;

class TeamShortcode extends \includes\classes\Shortcode {
    public $shortcode = 'team';
    public $has_style = 1;
    public $attributes = [
        'title' => '',
        'description' => '',
        'bg' => '',
        'style' => '1',
        'view' => ''
    ];
}