<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
  /**
   * GET posts from WordPress API
   *
   * @return response()
   */
  public function index(Request $request)
  {
    $response = Http::get(env('WP_SITE') . '/wp-json/wp/v2/posts');
    $posts = $response->json();
    return view('layouts/posts', compact('posts'));
  }
}
