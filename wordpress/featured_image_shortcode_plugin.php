<?php if (!defined('ABSPATH')) die('No direct access allowed');

/*
  Plugin Name: Featured Image Shortcode Plugin
  Plugin URI: https://github.com/CodezPoet/code_examples/tree/main/wordpress
  Description: Code example, show a featured image in content through a shortcode in a plugin
  Author: CodezPoet

  // Coding standards
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

/*
* Display a featured image url with a shortcode
* Shortcode: [featured-image-url]
* Use the shortocde where you want the featured image url 
* Use <img src="[featured-image-url]" alt="" width="" height=""> to display the image for example
*/
function featured_image_url_shortcode()
{
    if (has_post_thumbnail()) {
        $thumbnail = esc_url(get_the_post_thumbnail_url());
        return $thumbnail;
    }
}

add_shortcode('featured-image-url', 'featured_image_url_shortcode');
