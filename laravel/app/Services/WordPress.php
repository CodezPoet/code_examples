<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WordPress
{
    /**
     * GET posts from WordPress API
     * Using Mews + HTML Purifier to sanitize HTML
     * 
     */
    function getPosts()
    {
        $response = Http::get(env('WP_SITE') . '/wp-json/wp/v2/posts');
        $posts = $response->json();
        foreach ($posts as $post) {
            $htmlPurifiedId = clean($post['id']);
            $htmlPurifiedTitle = clean($post['title']['rendered'], 'titles');
            $htmlPurifiedContent = clean($post['content']['rendered']);
            if (!empty($htmlPurifiedId) && !empty($htmlPurifiedTitle) && !empty($htmlPurifiedContent)) {
                $htmlPurifiedPosts[$htmlPurifiedId]['title'] = $htmlPurifiedTitle;
                $htmlPurifiedPosts[$htmlPurifiedId]['content'] = $htmlPurifiedContent;
            }
        }
        if (isset($htmlPurifiedPosts)) {
            return $htmlPurifiedPosts;
        } else {
            return false;
        }
    }
}
