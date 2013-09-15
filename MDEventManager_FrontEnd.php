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

if( !class_exists( 'MD_event_frontend' ) ) {
    /**
     * Admin class.
     * The class manage all the Frontend behaviors.
     *
     * @since 1.0.0
     */
    class MD_event_frontend {
        /**
         * Plugin version
         *
         * @var string
         * @since 1.0.0
         */
        public $version;

        // uncomment next line if you need functions in external PHP script;
        // include_once(dirname(__FILE__).'/some-library-in-same-folder.php');

        public function __construct($version) {
            MDEventManager_event_manager_add_options();

            add_filter( 'template_include', 'MDE_insert_my_template' );
        }

// ------------------
// MDEventManager_event_manager parameters will be saved in the database
        public function MDEventManager_event_manager_add_options() {
// MDEventManager_event_manager_add_options: add options to DB for this plugin
            add_option('MDEventManager_event_manager_nb_widgets', '75');
// add_option('MDEventManager_event_manager_...','...');
        }




        /**
         * Template Fix
         *
         * http://wordpress.stackexchange.com/questions/96660/custom-post-type-plugin-where-do-i-put-the-template
         */
        /* Filter the single_template with our custom function


            add_filter( 'template_include', 'MDE_insert_my_template' );

            function MDE_insert_my_template( $template )
            {
                if ( 'event' === get_post_type() ){
                    return dirname( __FILE__ ) . '/pages/single-event.php';
                    return dirname( __FILE__ ) . '/pages/archive-event.php';
                }
                return $template;
            }
        */

        public function MDE_insert_my_template($template) {
            $filename = 'single-event.php';
            $template = dirname( __FILE__ ) . '/pages/single-event.php';
            $plugin_path   = array( 'path' => plugin_dir_path(__FILE__) . '/pages/single-event.php', 'url' => MDEventManager_URL . 'assets/css/frontend.css' );
            $template_path = array( 'path' => get_template_directory() . '/' . $filename,         'url' => get_template_directory_uri() . '/' . $filename );
            $child_path    = array( 'path' => get_stylesheet_directory() . '/' . $filename,       'url' => get_stylesheet_directory_uri() . '/' . $filename );
            foreach ( array( 'child_path', 'template_path', 'plugin_path' ) as $var ) {
                if ( file_exists( ${$var}['path'] ) ) {
                    return ${$var}['url'];
                }
            }
            // exit();
        }   // MDE_insert_my_template


    }// class MDEventManager_Frontend
}//Closing IF