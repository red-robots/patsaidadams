<?php
/*
Plugin Name: Block & Disable All New User Registrations & Comments Completely
Plugin URI: http://whoischris/wordpress-DABARACC.zip
Description:  This simple plugin blocks all users from being able to register no matter what, this also blocks comments
			  from being able to be inserted into the database.
Author: Chris Flannagan
Version: 1.0
Author URI: http://whoischris.com/
*/


/**
 * WordPress Disable & Block All Registration And Comments Completely (DABARACC) core file
 *
 * This file contains all the logic required for the plugin
 *
 * @link		http://whoischris/DABARACC.zip
 *
 * @package 	WordPress DABARACC
 * @copyright	Copyright (c) 2016, Chris Flannagan
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 *
 * @since 		WordPress DABARACC 1.0
 *
 *
 */

//block any chance of user registering, still allow admins though
function prevent_any_registration( $user_login, $user_email, $errors ) {
    if ( ! current_user_can( 'manage_options' ) ) {
        $errors->add('no_registration_allowed', '<strong>ERROR</strong>: Registration is disabled for this website.');
    }
}
add_action( 'register_post', 'prevent_any_registration', 10, 3 );
