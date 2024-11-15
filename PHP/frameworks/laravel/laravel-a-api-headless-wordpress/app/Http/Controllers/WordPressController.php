<?php

namespace App\Http\Controllers;

use App\Services\WordPressService;

class WordPressController extends Controller
{
   /**
   * List Posts from WordPress
   * 
   * @param WordPressService $objWordpress
   * 
   * @return [type]
   */
  public function listPosts(WordPressService $objWordpress)
  {
    $htmlPurifiedPosts = $objWordpress->htmlPurifiedWordPressPosts();

    if (!empty($htmlPurifiedPosts)) {
      return view('layouts/wordpress/archive', compact('htmlPurifiedPosts'));
    } else {
      return view('layouts/wordpress/error');
    }
  }
}
