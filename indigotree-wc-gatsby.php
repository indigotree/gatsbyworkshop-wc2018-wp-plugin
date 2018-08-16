<?php

/**
 * Plugin Name: Indigo Tree - WordCamp Brighton
 * Author: Indigo Tree
 * Author URI: https://indigotree.co.uk
 * Description: Plugin to aid integration with Gatsby.js
 */

define('INDIGOTREE_WC_GATSBY_PATH', untrailingslashit(plugin_dir_path(__FILE__)));
define('INDIGOTREE_WC_GATSBY_URI', untrailingslashit(plugin_dir_url(__FILE__)));

require_once (INDIGOTREE_WC_GATSBY_PATH.'/src/api.php');
require_once (INDIGOTREE_WC_GATSBY_PATH.'/src/theme.php');
require_once (INDIGOTREE_WC_GATSBY_PATH.'/src/fields.php');
