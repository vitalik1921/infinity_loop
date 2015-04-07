<?php

namespace awis_infinity_loop\pbl;

use awis_infinity_loop\IL_Loader;

class IL_Public extends \awis_infinity_loop\inc\Plugin_Public
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Add plugin styles/scripts
     * @return mixed
     */
    function add_enqueue_scripts()
    {
        wp_enqueue_style('infinity-loop', IL_Loader::getPluginUrl() . '/pbl/css/infinity-loop.css');
        wp_enqueue_script( 'infinity-loop', IL_Loader::getPluginUrl(). '/pbl/js/infinity-loop.js', array('jquery'));

        //get loop id
        $loop_container_selector = get_option('il_loop_container_selector');
        $loop_item_selector = get_option('il_loop_item_selector');
        $il_load_more_id = get_option('il_load_more_id');

        wp_localize_script('infinity-loop', 'il_settings', array('loop_container_selector' => $loop_container_selector, 'loop_item_selector' => $loop_item_selector, 'load_more_id' => $il_load_more_id));
    }
}