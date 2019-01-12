<?php
namespace includes\shortcodes;

// [banner attachment_id="94" title="Get up to 30% Off New Arrivals" subtitle="SPRING / SUMMER COLLECTION 2017" btn_text="shop now" btn_link="//facebook.com"/]

class BannerShortcode extends \includes\classes\Shortcode {
    public $shortcode = 'banner';
    public $attributes = [
    	'attachment_id' => '',
    	'title' => '',
    	'subtitle' => '',
    	'btn_text' => '',
    	'btn_link' => ''
    ];
}