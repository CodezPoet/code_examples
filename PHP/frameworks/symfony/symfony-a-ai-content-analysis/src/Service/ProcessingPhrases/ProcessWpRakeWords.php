<?php

namespace App\Service\ProcessingPhrases;

use DonatelloZa\RakePlus\RakePlus;
use App\Repository\WpContentRepository;
use App\Service\ProcessingPhrases\ProcessWpDbPosts;

/**
 * Class to process words from WP Content through RAKE
 */
class ProcessWpRakeWords
{
    /**
     * Construct dependency injection
     * 
     * @param  public
     * @param  public
     * @param  public
     */
    public function __construct(
        public WpContentRepository $wpContentTableRepository,
        public ProcessWpDbPosts $processWpDbPosts,
        public RakePlus $rakePlus
    ) {
    }

    /**
     * Take titles from WordPress posts and convert it to phrases
     * 
     * @return (int|string)[]
     */
    public function processRakeWp()
    {
        $rakeList = [];
        $queryData = $this->wpContentTableRepository->getAllPostTitles();
        if (!empty($queryData)) {
            $titleList = $this->processWpDbPosts->processWpTitles($queryData);
            foreach ($titleList as $post_id => $text) {
                $phrases = $this->rakePlus->create($text)->get();
                $rakeList['all']['phrases'][] = $phrases;
                $rakeList['post'][$post_id]['phrases'] = $phrases;
            }
            $rakeList['all']['phrases'] = call_user_func_array('array_merge', $rakeList['all']['phrases']);
            $rakeList['all']['phrases'] = array_unique($rakeList['all']['phrases']);
        }

        return $rakeList;
    }
}
