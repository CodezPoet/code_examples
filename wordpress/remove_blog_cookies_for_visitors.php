/**
 * remove all blog cookies for non logged in visitors
 */

add_action('init', 'remove_blog_cookies');

function remove_blog_cookies()
{
    if (! is_user_logged_in() && $GLOBALS['pagenow'] != 'wp-login.php') {
        if (! empty($_COOKIE)) {
            foreach ($_COOKIE as $cookie_name => $cookie) {
                unset($cookie);
                unset($_COOKIE[$cookie_name]);
            }
        }
    }
    return $_COOKIE;
}
