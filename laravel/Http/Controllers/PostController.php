<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
  /**
   * GET posts from WordPress API
   * Using Mews + HTML Purifier to sanitize HTML
   * 
   * @return response()
   */
  public function index(Request $request)
  {
    $response = Http::get(env('WP_SITE') . '/wp-json/wp/v2/posts');
    $posts = $response->json();
    foreach ($posts as $post) {
      $html_purified_id = clean($post['id']);
      $html_purified_title = clean($post['title']['rendered'], 'titles');
      $html_purified_content = clean($post['content']['rendered']);
      if (!empty($html_purified_id) && !empty($html_purified_title) && !empty($html_purified_content)) {
        $html_purified_posts[$html_purified_id]['title'] = $html_purified_title;
        $html_purified_posts[$html_purified_id]['content'] = $html_purified_content;
      }
    }
    if (isset($html_purified_posts)) {
      return view('layouts/posts', compact('html_purified_posts'));
    } else {
      return abort('404');
    }
  }
}
