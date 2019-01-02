	<?php
/**
 * Plugin Name: CS Block
 * Plugin URI: https://catapultthemes.com/
 * Description: Add feature blocks using Gutenberg
 * Author: Catapult Themes
 * Author URI: https://catapultthemes.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Cs_Block
 */
// Exit if accessed directly.

define('CS_BLOCK_NAME', 'cs-block');
require_once WP_PLUGIN_DIR . '/' . CS_BLOCK_NAME . '/block/block-title/index.php';
defined('ABSPATH') || exit;