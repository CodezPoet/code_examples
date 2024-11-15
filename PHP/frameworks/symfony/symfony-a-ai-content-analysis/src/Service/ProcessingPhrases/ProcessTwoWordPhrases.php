<?php

namespace App\Service\ProcessingPhrases;

use Doctrine\ORM\EntityManagerInterface;
use App\Service\Algorithms\WordAlgoOrg;
use App\Service\ProcessingPhrases\ProcessWpRakeWords;

/**
 * Process the WP content into Two Word Phrases 
 * and store in Database
 */
class ProcessTwoWordPhrases
{
    /**
     * Construct dependency injection
     * 
     * @param  public
     * @param  public
     * @param  public
     */
    public function __construct(
        public EntityManagerInterface $entityManager,
        public WordAlgoOrg $wordAlgoOrg,
        public ProcessWpRakeWords $processWpRakeWords
    ) {
    }

    /**
     * Prepare for storing  in database
     * 
     * @return array
     */
    function prepareForDb()
    {
        $dataToStore = [];
        $rakeList = $this->processWpRakeWords->processRakeWp();
        if ($rakeList === null || empty($rakeList)) {
            return $dataToStore;
        }
        $answerList = $this->twoWordsList($rakeList);
        if ($answerList === null || empty($answerList)) {
            return $dataToStore;
        }
        $dataToStore = $this->wordAlgoOrg->phrasedbDecider($answerList);

        return $dataToStore;
    }

    /**
     * Get two word phrases 
     * 
     * @param array $analysisList
     * 
     * @return array
     */
    public function twoWordsList($analysisList)
    {
        $twoWordsList = [];
        foreach ($analysisList['all']['phrases'] as $phrase) {
            $phraseArray = explode(' ', $phrase);
            $twoWordsList[] = $this->wordAlgoOrg->makeWordsbyTwo($phraseArray);
        }
        $twoWordsList = call_user_func_array('array_merge', $twoWordsList);
        $twoWordsList = array_unique(($twoWordsList));

        return $twoWordsList;
    }
}
