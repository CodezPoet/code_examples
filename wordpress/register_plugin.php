<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

/*
  Plugin Name: WordPress Common Functions Plugin
  Plugin URI: https://github.com/CodezPoet/code_examples/tree/main/wordpress
  Description: Customization functions that are used theme inspecific
  Version: 1.4
  Author: CodezPoet
  Author URI: https://github.com/CodezPoet/code_examples/tree/main/wordpress
  Text Domain: wordpress-common-functions

  //
  // Coding standards
  //
  See: WordPress Coding Standards

  Copyright (C) 2013 
  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// error_reporting(0); // Turn off all error reporting

/*
 * Router 
 */
add_action('init', 'plugin');

function plugin() {
    require_once('plugin-router.php');
}

?>
