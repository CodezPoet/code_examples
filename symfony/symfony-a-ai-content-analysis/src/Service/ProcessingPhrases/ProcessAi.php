<?php

namespace App\Service\ProcessingPhrases;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\AiAnswer;
use App\Repository\AiAnswerRepository;
use App\Repository\AiAskedRepository;
use App\Repository\WpPhraseRepository;
use App\Service\Algorithms\WordAlgoOrg;
use App\Service\Api\ChatGptApi;

/**
 * Process the questions and answers asked by the AI
 */
class ProcessAi
{
    /**
     * Construct dependency injection
     * 
     * @param  public
     * @param  public
     * @param  public
     * @param  public
     */
    public function __construct(
        public EntityManagerInterface $entityManager,
        public AiAnswerRepository $aiAnswersTableRepository,
        public ChatGptApi $chatGptApi,
        public WordAlgoOrg $wordAlgoOrg,
        public WpPhraseRepository $wpPhraseRepository,
        public AiAskedRepository $aiAskedRepository
    ) {
    }

    /**
     * Get answer AI from API
     * 
     * @return array
     */
    public function getAnswerAi()
    {
        $answerAi = [];
        $phrases = [];
        $dataToStore = [];
        $questionToAskAi = $this->questionToAskAi();
        if (!empty($questionToAskAi)) {
            $aiResult = json_decode($this->chatGptApi->makeRequest($questionToAskAi), true);
        }
        if ($aiResult !== null) {
            $answerAi = $aiResult['choices'][0]['message']['content'];
            $answerAi = $this->wordAlgoOrg->convertAnswerToLIst($answerAi);
        }
        if (!empty($answerAi)) {
            $phrasesAsked = $this->wpPhraseRepository->findTop20PhrasesNotAsked();
            foreach ($phrasesAsked as $phrase) {
                $phrases[] = $phrase['phrase'];
            }
            $this->aiAskedRepository->saveToAsked($phrases);
            $dataToStore = $this->wordAlgoOrg->phraseDbDecider($answerAi);
        }

        return $dataToStore;
    }

    /**
     * Send phrases to AI and ask which words combinatons together are logical for fashion.
     * 
     * @return string
     */
    public function questionToAskAi()
    {
        $question = '';
        $analysisList = $this->prepareQuestionAi();
        if (!empty($analysisList)) {
            $question =
                "What are the logical combinations of these 2 words
          per line for the fashion industry (including things
          like makeup, hairstyling, clothes, nails). Very important: Only return a combinations that makes sense to someone working in fashion.
           Remove all the combinations from the list that don't 
          make sense, and return the answer in a comma seperated list. 
          Keep the original word order, and check with NLP Natural language processing. Here is the list of words: " .  $analysisList;
        }

        return $question;
    }

    /**
     * prepare the question for AI
     * 
     * @return string
     */
    public function prepareQuestionAi()
    {
        $phrases = '';
        $phrases = $this->wpPhraseRepository->findTop20PhrasesNotAsked();
        if (!empty($phrases)) {
            $phrases = $this->wordAlgoOrg->wordsForAi($phrases);
        }
        return $phrases;
    }

    /**
     * Get existing AI phrases from database
     * 
     * @return array
     */
    public function getAiPhrasesDb()
    {
        $phrases = [];
        $aiPhrases = $this->entityManager->getRepository(AiAnswer::class)->findAll();
        foreach ($aiPhrases as $answer) {
            $phrases[] = $answer->getPhrase();
        }

        return $phrases;
    }

    /**
     * Prepare and save to database
     * 
     * @return void
     */
    public function saveToDatabase()
    {
        $answerAi = $this->getAnswerAi();
        $this->aiAnswersTableRepository->setDataToStore($answerAi);
    }
}
