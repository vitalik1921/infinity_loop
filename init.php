<?php

/**
 * Plugin Name: Infinity loop
 * Plugin URI: http://site-builder.in.ua
 * Version: 1.0
 * Author: Vitaliy Shebela
 * Author URI: http://site-builder.in.ua
 */

namespace awis_infinity_loop;

if (!defined('WPINC')) exit; // Exit if accessed directly

//load plugin loader
require_once('inc/Plugin_Loader.php');

class IL_Loader extends \awis_infinity_loop\inc\Plugin_Loader
{
    function __construct($plugin_dir, $plugin_url)
    {
        parent::__construct($plugin_dir, $plugin_url);

        self::$plugin_admin = new \awis_infinity_loop\adm\IL_Admin();
        self::$plugin = new \awis_infinity_loop\IL_Plugin(0, 'Infinity Loop', '1.0.0');
        self::$plugin_public = new \awis_infinity_loop\pbl\IL_Public();
    }

    /**
     * Activation
     */
    public function activation()
    {
//      TODO: implementation
    }

    /**
     * Deactivation
     */
    public function deactivation()
    {
//      TODO: implementation
    }
}

$plugin_loader = new IL_Loader(plugin_dir_path(__FILE__), plugin_dir_url(__FILE__));

//register WP hooks
register_activation_hook(__FILE__, array($plugin_loader, 'activation'));
register_deactivation_hook(__FILE__, array($plugin_loader, 'deactivation'));


//wrapper for load more button
function il_load_more() {
    $plugin = IL_Loader::getPlugin();
    $plugin->il_load_more();
}




