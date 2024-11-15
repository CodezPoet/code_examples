<?php

namespace App\Service\ProcessingPhrases;

use App\Service\Algorithms\WordAlgoOrg;

/**
 * Get WP content from the database and prepare it for
 * further use by the AI
 */
class ProcessWpDbPosts
{

    /**
     * Construct dependency injection
     *
     * @param public
     */
    public function __construct(
        public WordAlgoOrg $wordAlgoOrg
    ) {
    }

    /**
     * Get the post titles from the database and adjust them and combine in array
     * 
     * @param array $queryData
     * 
     * @return array
     */
    public function processWpTitles($queryData)
    {
        $titleList = [];
        foreach ($queryData as $post) {
            $processedTitle = $this->wordAlgoOrg->processTitle($post['post_title']);
            if (!in_array($processedTitle, $titleList) && !empty($processedTitle)) {
                $titleList[$post['ID']] = trim($processedTitle);
            }
        }

        return $titleList;
    }
}
