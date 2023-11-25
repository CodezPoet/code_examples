/**
* Remove all blog cookies for non logged in visitors
* While the “cookie law” by the EU was a good idea in theory: in practice
* it leads to a lot of complicated annoying forms when you visit a website.
* Some websites have stopped using cookies.  
* With this code the WordPress blog shouldn't use cookies for visitors.
*/

add_action('init', 'remove_blog_cookies');

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
