<?php

namespace App\Http\Controllers;

use App\Services\WordPressService;

class PostController extends Controller
{
  /**
   * List Posts from WordPress
   */
  function listPosts(WordPressService $objWordpress)
  {
    $htmlPurifiedPosts = $objWordpress->getWordPressPosts();
    if (false !== ($htmlPurifiedPosts)) {
      return view('layouts/posts', compact('htmlPurifiedPosts'));
    } else {
      return abort('404');
    }
  }
}
