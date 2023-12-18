<?php

namespace App\Service\Algorithms;

/**
 * Replacement methods that can be used by more than one algorhtym or for clarity
 */
class ReplacementMethods
{

    /**
     * Remove answer begin sentence of AI answer
     * It keeps finding new ways to answer the first sentence
     * 
     * @param string
     * 
     * @return string
     */
    public function removeSentencesFromAnswer($string = '')
    {
        return str_replace(
            [
                'the logical combinations of the given words for the fashion industry that make sense are',
                'the logical combinations in the fashion industry that make sense are',
                'the logical combinations that make sense for the fashion industry from the given list of words are',
                'based on the provided list, here are the logical combinations for the fashion industry',
                'by analyzing the combinations, the following logical combinations related to the fashion industry can be identified',
                'here are the logical combinations that make sense in the fashion industry',
                'logical combinations of these 2 words for the fashion industry',
                'here are the logical combinations for the fashion industry',
                'some logical combinations for the fashion industry are-',
                'the logical combinations of these words per line for the fashion industry are',
                'the logical combinations of the two words per line for the fashion industry are',
                'the logical combinations for the fashion industry are',
                'tere is the array of logical combinations of the given words for the fashion industry',
            ],
            '',
            $string
        );
    }

    /**
     * Remove HTML entities and special characters from a string
     * 
     * @param string $string
     * 
     * @return string
     */
    public function removeHtmlEntities($string = '')
    {
          return preg_replace('/&[a-zA-Z0-9#]+;/', '', html_entity_decode($string, ENT_COMPAT | ENT_HTML401, 'UTF-8'));
    }

    /**
     * Only allow certain: text, numbers, etc
     * 
     * @param string $string
     * 
     * @return string
     */
    function limitAllowed($string = '')
    {
        return preg_replace('/[^A-Za-z0-9, ]/', '',  $string);
    }

    /**
     * Remove all extra spaces
     * 
     * @param string 
     * 
     * @return string
     */
    function removeExtraSpaces($string = '')
    {
        return preg_replace('/  */', ' ', $string);
    }

    /**
     * Remove numbers with a . e.g. 1., 2. but keep years for example
     *
     * @param string $string
     * 
     * @return [type]
     */
    function removeCertainNumbers($string = '')
    {
        return preg_replace('/^\d+\./m', '', $string);
    }
}
