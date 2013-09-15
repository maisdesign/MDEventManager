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
if (!class_exists('MDEventManager_Admin')) {
    /**
     * MDEventManager_admin
     *
     * @since 1.0.0
     */
    class MDEventManager_Admin
    {
        /**
         * Plugin version
         *
         * @var string
         * @since 1.0.0
         */
        public $version;
        /**
         * Parameters for add_submenu_page
         *
         * @var array
         * @access public
         * @since 1.0.0
         */
        public $submenu = array();
        /**
         * Initial Options definition:
         *
         * @var array
         * @access public
         * @since 1.0.0
         */
        public $options = array();
        /**
         * Panel instance
         *
         * @var MDEventManager_PANEL
         * @since 1.0.0
         */
        public $panel;
        /**
         * Various links
         *
         * @var string
         * @access public
         * @since 1.0.0
         */

        /* TODO Add Banner e Doc */
        /*
        public $banner_url = 'http://cdn.yithemes.com/plugins/yith_maintenance_mode.php?url';
        public $banner_img = 'http://cdn.yithemes.com/plugins/yith_maintenance_mode.php';
        public $doc_url = 'http://yithemes.com/docs-plugins/MD_event_manager/';
        */

        /**
         * Constructor
         *
         * @return MDEventManager_Admin
         * @since 1.0.0
         */
        public function __construct($version)
        {
            global $MDEventManager_options;
            $this->version = $version;
            $this->submenu = apply_filters('MDEventManager_submenu', array(
                'themes.php',
                __('MD Event Manager', 'yit'),
                __('Event Manager', 'yit'),
                'administrator',
                'MD-event-manager'
            ));
            $this->options = apply_filters('MDEventManager_options', $MDEventManager_options);
            add_action('init', array(
                $this,
                'init_panel'
            ));
            add_action('init', array(
                $this,
                'default_options'
            ));
            add_filter('plugin_action_links_' . plugin_basename(dirname(__FILE__) . '/init.php'), array(
                $this,
                'action_links'
            ));
            return $this;
        }
        /**
         * Default options
         *
         * Sets up the default options used on the settings page
         *
         * @access public
         * @return void
         * @since 1.0.0
         */
        public function default_options()
        {
            foreach ($this->options as $tab) {
                foreach ($tab['sections'] as $section) {
                    foreach ($section['fields'] as $id => $value) {
                        if (isset($value['std']) && isset($id)) {
                            add_option($id, $value['std']);
                        } //isset($value['std']) && isset($id)
                    } //$section['fields'] as $id => $value
                } //$tab['sections'] as $section
            } //$this->options as $tab
        }
        /**
         * Init the panel
         *
         * @return void
         * @since 1.0.0
         *
         * Thank you guys of Yithemes :D
         */
        public function init_panel()
        { /* TODO URL e IMG */
            $this->panel = new YITH_Panel($this->submenu, $this->options, array(
                //'url' => $this->banner_url,
                //'img' => $this->banner_img
            ), 'MD-event-manager-group', 'MD-event-manager');
        }
        /**
         * action_links function.
         *
         * @access public
         * @param mixed $links
         * @return void
         */
        public function action_links($links)
        {
            $plugin_links = array(
                '<a href="' . admin_url($this->submenu[0] . '?page=' . $this->submenu[4]) . '">' . __('Settings', 'yit') . '</a>',
                '<a href="' . $this->doc_url . '">' . __('Docs', 'yit') . '</a>'
            );
            return array_merge($plugin_links, $links);
        }
    }
} //!class_exists('MDEventManager_Admin')