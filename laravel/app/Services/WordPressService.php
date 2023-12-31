<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WordPressService
{
     /**
     * WordPress posts using Mews + HTML Purifier to sanitize HTML 
     * 
     * @return array
     */
    public function htmlPurifiedWordPressPosts(): array
    {
        $posts = $this->getWordPressApiResponse();
        $htmlPurifiedPosts = [];

        foreach ($posts as $post) {
            $htmlPurifiedId = clean($post['id']);
            $htmlPurifiedTitle = clean($post['title']['rendered'], 'titles');
            $htmlPurifiedContent = clean($post['content']['rendered']);
            if (!empty($htmlPurifiedId) && !empty($htmlPurifiedTitle) && !empty($htmlPurifiedContent)) {
                $htmlPurifiedPosts[$htmlPurifiedId]['title'] = $htmlPurifiedTitle;
                $htmlPurifiedPosts[$htmlPurifiedId]['content'] = $htmlPurifiedContent;
            }
        }

        return $htmlPurifiedPosts;
    }

    /**
     * Get the response from the API
     * 
     * @return array
     */
    private function getWordPressApiResponse(): array
    {
        $posts = [];
        try {
            $response = Http::get(env('WP_SITE') . '/wp-json/wp/v2/posts');
            if ($response->successful()) {
                $posts = $response->json();
            }
        } catch (\Exception $e) {
            Log::error('WordPress API Exception: ' . $e->getMessage());
        }

        return $posts;
    }
}
