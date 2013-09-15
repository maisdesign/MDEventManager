<?php
        /***************/
        /* MaisDesign  */
        /***************/
        
        /***********************************/
        /*                                 */
        /* Written on: 30/08/13            */
        /* @ 20.36                         */
        /* For the project: MDEventManager */
        /* By: marco@maisdesign.it         */
        /*                                 */
        /***********************************/

/**
 * Main class
 * @version 1.0.0
 */
if (!defined('MDEventManager_URL')) {
    echo 'not defined but... <br /><br />'.MDEventManager_URL;
    exit;
} // Exit if accessed directly
if (!class_exists('MDEventManager')) {
    /**
     * YITH Newsletter Popup
     *
     * @since 1.0.0
     */
    class MDEventManager
    {
        /**
         * Plugin version
         *
         * @var string
         * @since 1.0.0
         */
        public $version = '1.0.0';
        /*
         * Generated variables
         */
        public $nsg;
        public $npg;

        /**
         * Plugin object
         *
         * @var string
         * @since 1.0.0
         */
        public $obj = null;

        public function MDEventNameSingleGenerator(){
            $singlename = get_option('MDEventManager_cposts_name');
            $singlenameArr = explode('|',$singlename);
            $this->SingleGenerator = $singlenameArr;
            return $singlenameArr;
        }

        public function MDEventNamePluralGenerator(){
            $pluralname = get_option('MDEventManager_cposts_name_plural');
            $pluralnameArr = explode('|',$pluralname);
            $this->PluralGenerator = $pluralnameArr;
            global $pluralnameArr;
            return $pluralnameArr;
        }

        /**
         * Constructor
         *
         * @return mixed|MDEventManager_Admin|MDEventManager_Frontend
         * @since 1.0.0
         */


        public function __construct()
        {
            /* TODO parti da qui */
            if (is_admin()) {
                $this->obj = new MDEventManager_Admin($this->version);
            } //is_admin()
            else {
                //$this->obj = new MDEventManager_Frontend($this->version);
            }

            $nsg = $this->MDEventNameSingleGenerator();
            $npg = $this->MDEventNamePluralGenerator();


            if (
                ((count($nsg))==(count($npg))
                && (get_option('MDEventManager_enable')==true)
                )
            ){

                for($i = 0; $i< count($nsg);$i++){
                    $this->obj = new CPT(array(
                        'post_type_name' => $nsg[$i],
                        'singular' => $nsg[$i],
                        'plural' => $npg[$i],
                        'slug' => $nsg[$i]
                        )
                    );
                };
            }
            return $this->obj;

        }
    }
} //!class_exists('MDEventManager')