<?php
        /***************/
        /* MaisDesign  */
        /***************/

        /***********************************/
        /*                                 */
        /* Written on: 27/08/13            */
        /* @ 20.17                         */
        /* For the project: MDEventManager */
        /* By: marco@maisdesign.it         */
        /*                                 */
        /***********************************/
if (!defined('MDEventManager')) {
    exit;
} // Exit if accessed directly

if( !function_exists( 'MDEventManager_is_enabled' ) ) {
    /**
     * Locate the templates and return the path of the file found
     *
     * @param string $path
     * @param array $var
     * @return void
     * @since 1.0.0
     */
    function MDEventManager_is_enabled() {
        return get_option('MDEventManager_enabled_plugin') == 'yes';
    }
} //MDEventManager_is_enabled
