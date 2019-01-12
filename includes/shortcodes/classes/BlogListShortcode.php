<?php
namespace includes\shortcodes;

class BlogListShortcode extends \includes\classes\Shortcode {
    public $shortcode = 'blog_list';
    public $attributes = [
        'title' => '',
        'number' => '',
        'type' => 'new'
    ];
}