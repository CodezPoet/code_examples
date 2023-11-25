<?php

/*
 * Some websites have stopped using cookies.  
 * With this code the WordPress blog doesn't use cookies for non logged in visitors.
 * Keep in mind third party content providers like YouTube may still set cookies in embedded content.
 */
add_action('init', 'remove_blog_cookies');

// function for add action to remove blog cookies
function remove_blog_cookies()
{
    if (!is_user_logged_in() && $GLOBALS['pagenow'] != 'wp-login.php') {
        if (!empty($_COOKIE)) {
            foreach ($_COOKIE as $cookie_name => $cookie) {
                unset($cookie);
                unset($_COOKIE[$cookie_name]);
            }
        }
    }
    return $_COOKIE;
}
