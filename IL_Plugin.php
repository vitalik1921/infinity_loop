<?php

namespace awis_infinity_loop;

class IL_Plugin extends \awis_infinity_loop\inc\Plugin
{
    function __construct($id, $name, $version)
    {
        parent::__construct($id, $name, $version);
    }

    function il_load_more() {
        $load_more_id = get_option('il_load_more_id');
        $load_more_id =  $load_more_id ? $load_more_id : 'il_load_more';

        echo "<div id=\"$load_more_id\">";
        echo get_next_posts_link('Load More');
        echo '</div>';
    }
}