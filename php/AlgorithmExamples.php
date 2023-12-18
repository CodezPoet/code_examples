<?php

namespace App\Service\Algorithms;

use App\Service\Algorithms\ReplacementMethods;

/**
 * Run algorhitms and organize words and phrases
 */
class AlgorithmExamples
{
    /**
     * Construct dependency injection
     * 
     * @param  private
     * @param  public
     */
    public function __construct(
        private int $aiWordLimit,
        public ReplacementMethods $replacementMethods
    ) {
    }

    /**
     * Step through WordPress posts title to prepare for analysis
     * Remove things like emoijis
     * 
     * @param string $string
     * 
     * @return string
     */
    public function processTitle($string = '')
    {
        $string = strtolower($string);
        $string = $this->replacementMethods->removeHtmlEntities($string);
        $string = $this->replacementMethods->limitAllowed($string);
        $string = str_replace('-', ' ',  $string);
        $string = $this->replacementMethods->removeExtraSpaces($string);

        return $string;
    }

    /**
     * 
     * Prepare for checking if phrase occurs in database already
     * before checking with AI
     *
     * @param array $answerList
     * 
     * @return array
     */
    public function phraseDbDecider($answerList)
    {
        $results = [];
        foreach ($answerList as $string) {
            $string = trim($string);
            if (3 <= strlen($string) && 50 >= strlen($string) && 2 === str_word_count($string)) {
                if (substr($string, 0, 6) !== "makeup") {
                    $results[] = $string;
                }
            }
        }

        return $results;
    }

    /**
     * Find keywords
     *
     * @param array $words
     * 
     * @return array
     */
    public function makekeyWords($words)
    {
        $result = [];
        $count_words = count($words);
        for ($i = 0; $i <= $count_words; ++$i) {
            if (isset($words[$i])) {
                if (3 <= strlen($words[$i])) {
                    $result[] = $words[$i];
                }
            }
        }

        return $result;
    }

    /**
     * Arrange words in multiple unique pairs of two in original order based on phrase
     *
     * @param array $words
     * 
     * @return array
     */
    public function makeWordsbyTwo($words)
    {
        $results = [];
        $count_words = count($words);
        for ($i = 0; $i <= $count_words; ++$i) {
            if (!empty($words[$i]) && $i + 1 < $count_words) {
                if (3 <= strlen($words[$i]) &&  3 <= strlen($words[$i + 1])) {
                    $phrase = $words[$i] . ' ' . $words[$i + 1];
                    $results[] = $phrase;
                }
            }
        }

        return $results;
    }

    /**
     * Convert A.I. answers to array, clean up cruft and prepare for db
     * 
     * @param string $string
     * 
     * @return array
     */
    public function convertAnswerToList($string)
    {
        $list = [];
        if (3 <= strlen($string)) {
            $string = strtolower($string);
            $string = str_replace('[', '', $string);
            $string = $this->replacementMethods->removeCertainNumbers($string);
            $string = $this->replacementMethods->limitAllowed($string);
            $string = $this->replacementMethods->removeExtraSpaces($string);
            $string = str_replace('-', ',', $string);
            $string = trim($string);
        }
        if (!empty($string)) {
            $list = explode(',', $string);
            $list = array_unique($list);
            $list = array_filter($list);
        }

        return $list;
    }

    /**
     * Convert array to string for question to ask AI
     *
     * @param array $phrases
     * 
     * @return string
     */
    public function wordsForAi($phrases)
    {
        $analysisList = [];
        foreach ($phrases as $phrase) {
            $analysisList[] =  $phrase['phrase'];
        }
        $analysisList  = implode(', ', $analysisList);

        return $analysisList;
    }
}
