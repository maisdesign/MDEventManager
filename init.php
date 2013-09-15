<?php
/*
Plugin Name: MD Event Manager
Plugin Script: MDEventManager_Base.php
Plugin URI: http://maisdesign.it/MDEventManager (where should people go for this plugin?)
Description: This simple plugin will create a custom post type that will help you manage events and their template.
Version: 0.1
License: GPL
Author: maisdesign
Author URI: http://maisdesign.it
*/

/*
=== RELEASE NOTES ===
2013-08-26 - v1.0 - first version
*/

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Online: http://www.gnu.org/licenses/gpl.txt
*/

/**
 * Required functions
 */

if( !defined('YITH_FUNCTIONS') ) {
    //require_once( 'yit-common/yit-functions.php' );
    require_once('yit-common/google_fonts.php');
    require_once('yit-common/yit-functions.php');
    require_once('yit-common/yith-panel.php');
}

load_plugin_textdomain( 'mdeventor', false, dirname( plugin_basename( __FILE__ ) ). '/languages/' );

define('MDEventManager', true );
define('MDEventManager_ACTIVE', true);
define('MDEventManager_URL', plugin_dir_url( __FILE__ ) );
define('MDEventManager_URL_FUNCTIONS', MDEventManager_URL.'/functions' );
define('MDEventManager_DIR', plugin_dir_path( __FILE__ ) );

/* Load required classes and functions*/

/* Versione 1 */
require_once('MDEventManager_Base.php'); // Everything starts from here
require_once('MDEventManager_Enabler.php'); // Checks if plugin is enabled or not
require_once('MDEventManager_FrontEnd.php'); // Enqueues styles and templates
require_once('MDEventManager_Backend.php'); // TODO Delete this
require_once('MDEventManager_Options.php'); // Creates the options
require_once('MDEventManager_Admin.php'); // Creates the options
require_once('MDEventManager_CPost.php'); // Creates the Custom Posts


/* Versione 2

foreach ( glob( plugin_dir_path( __FILE__ )."functions/*.php" ) as $file )
    include_once $file;

/* Versione 3

foreach ( glob( MDEventManager_URL_FUNCTIONS ) as $file )
    require_once $file;
*/

global $MD_event_manager;
$MD_event_manager = new MDEventManager();
?>