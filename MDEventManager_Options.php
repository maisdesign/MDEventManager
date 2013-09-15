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

if ( !defined( 'MDEventManager' ) ) { exit; } // Exit if accessed directly
$pluralname = get_option('MDEventManager_cposts_name_plural');
$pluralnameArr = explode('|',$pluralname);
global $MDEventManager_options;
$MDEventManager_options = array(
    //tab general
    'general' => array(
        'label' => __('General', 'yit'),
        'sections' => array(
            'general' => array(
                'title' =>  __('General Settings', 'yit'),
                'description' => '',
                'fields' => array(
                    'MDEventManager_enable' => array(
                        'title' => __('Enable MDEvent Manager Custom Posts', 'yit'),
                        'description' => __( 'Enables the custom posts. (Default: Off)', 'yit' ),
                        'type' => 'checkbox',
                        'std' => false
                    ),
                    'MDEventManager_info_cpost' => array(
                        'title' => __('How does it works? You must use the same amount of Custom posts names or it wont work!', 'yit'),
                        'type' => 'info',
                        'std' => false
                    ),
                    'MDEventManager_cposts_name' => array(
                        'title' => __('Custom Posts Names', 'yit'),
                        'description' => __( 'Singular names of the custom post.Separe them using <code>"|"</code>.', 'yit' ),
                        'type' => 'text',
                        'std' => __( 'event', 'yit' )
                    ),
                    'MDEventManager_cposts_name_plural' => array(
                        'title' => __('Custom Posts Plural Names', 'yit'),
                        'description' => __( 'Plural names of the custom post (Same order of the above ones).Separe them using <code>"|"</code>.', 'yit' ),
                        'type' => 'text',
                        'std' => __( 'events', 'yit' )
                    ),
                    /*'MDEventManager_cposts_icons' => array(
                        'title' => 'Custom Posts Icons',
                        'description' => __( 'Upload an image. (Tip: Size 13px X 13px)', 'yit' ),
                        'type' => 'upload',
                        'std' => MDEventManager_URL . 'assets/img/plan.png'
                    ),*/
                    'MDEventManager_custom_style' => array(
                        'title' => 'Custom style',
                        'description' => __( 'Insert here your custom CSS style.', 'yit' ),
                        'type' => 'textarea',
                        'std' => ''
                    ),
                )//fields
            ),//general
        ) //sections
    ),//Top General
); //whole array

/**
 * Let's start a loop that will create more options tabs if needed
 */


foreach( $pluralnameArr as $tabby){

    $tabby = array(
        'label' => __($tabby, 'yit'),
        'sections' => array(
            $tabby => array(
                'title' =>  $tabby.__(' General Settings', 'yit'),
                'description' => '',
                'fields' => array(
                    'MDEventManager_'.$tabby => array(
                        'title' => __('Enable MDEvent Manager Custom Posts', 'yit'),
                        'description' => __( 'Enables the custom posts. (Default: Off)', 'yit' ),
                        'type' => 'checkbox',
                        'std' => false
                    ),
                )//fields
            ),//general
        ) //sections
    );//Top General
    array_push($MDEventManager_options, $tabby);
}