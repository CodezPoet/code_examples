<?php

namespace App\Http\Controllers;

use App\Services\WordPressService;

class WordPressController extends Controller
{
  // List Posts from WordPress   
  function listPosts(WordPressService $objWordpress)
  {
    $htmlPurifiedPosts = $objWordpress->getWordPressPosts();
    if (false !== ($htmlPurifiedPosts)) {
      return view('layouts/wordpress/archive', compact('htmlPurifiedPosts'));
    } else {
      return view('layouts/wordpress/error');
    }
  }
}
