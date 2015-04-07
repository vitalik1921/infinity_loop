<?php

namespace awis_infinity_loop\adm;

class IL_Admin extends \awis_infinity_loop\inc\Plugin_Admin
{
    /**
     * Add plugin styles/scripts
     * @return mixed
     */
    function add_enqueue_scripts()
    {
        //we do nothing here
    }

    /**
     * @return mixed
     */
    function register_admin_settings()
    {
        //register fields
        register_setting( 'il-settings-group', 'il_loop_container_selector' );
        register_setting( 'il-settings-group', 'il_loop_item_selector' );
        register_setting( 'il-settings-group', 'il_load_more_id' );
    }

    /**
     * Add admin menu items
     * @return mixed
     */

    function add_admin_items()
    {
        // Add a new submenu under Options:
        add_options_page('Infinity Loop Options', 'Infinity Loop', 'manage_options', 'if_options', array($this, 'if_options_page'));
    }

    /**
     * Infinity loop options
     */
    function if_options_page() {

        ?>

        <div class="wrap">
            <h2>Infinity Loop</h2>

            <form method="post" action="options.php">
                <?php settings_fields( 'il-settings-group' ); ?>

                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Loop container selector</th>
                        <td><input type="text" name="il_loop_container_selector" value="<?php echo get_option('il_loop_container_selector'); ?>" /></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Loop item selector</th>
                        <td><input type="text" name="il_loop_item_selector" value="<?php echo get_option('il_loop_item_selector'); ?>" /></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Load more block class</th>
                        <td><input type="text" name="il_load_more_id" value="<?php echo get_option('il_load_more_id'); ?>" /></td>
                    </tr>
                </table>

                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
                </p>
            </form>
        </div>

        <?php
    }
}