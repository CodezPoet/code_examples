<?php

namespace App\Http\Controllers;

use App\Services\WordPress;

class PostController extends Controller
{
  
  /**
   * List Posts from WordPress
   */
  function list_posts()
  {
    $obj_wordpress = new WordPress();
    $html_purified_posts = $obj_wordpress->get_posts();
    if (false !== ($html_purified_posts)) {
      return view('layouts/posts', compact('html_purified_posts'));
    } else {
      return abort('404');
    }
  }
}
