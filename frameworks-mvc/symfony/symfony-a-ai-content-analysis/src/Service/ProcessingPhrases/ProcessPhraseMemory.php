<?php

namespace App\Service\ProcessingPhrases;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\AiAnswer;
use App\Entity\AiToAsk;
use App\Repository\AiAnswerRepository;
use App\Repository\WpPhraseRepository;
use App\Service\ProcessingPhrases\ProcessWpRakeWords;
use App\Service\ProcessingPhrases\ProcessTwoWordPhrases;
use App\Service\Algorithms\WordAlgoOrg;
use App\Service\Api\ChatGptApi;

/**
 * Process the questions and answers asked by the AI
 */
class ProcessPhraseMemory
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
        public ProcessWpRakeWords $processWpRakeWords,
        public ProcessTwoWordPhrases $processTwoWordPhrases,
        public ChatGptApi $chatGptApi,
        public WordAlgoOrg $wordAlgoOrg,
        public WpPhraseRepository $wpPhraseRepository
    ) {
    }

   /**
     * Prepare for storing  in database
     * 
     * @return array
     */
    function prepareStorePhrase()
    {
        $dataToStore = [];
        $rakeList = $this->processWpRakeWords->processRakeWp();
        if ($rakeList === null || empty($rakeList)) {
            return $dataToStore;
        }
        $answerList = $this->processTwoWordPhrases->twoWordsList($rakeList);
        if ($answerList === null || empty($answerList)) {
            return $dataToStore;
        }
        $dataToStore = $this->wordAlgoOrg->phrasedbDecider($answerList);
        $this->wpPhraseRepository->saveFromArray($dataToStore);
    }

    /**
     * Get existing AI phrases from database
     * 
     * @return array
     */
    private function getAiPhrasesDb()
    {
        $aiPhrases = $this->entityManager->getRepository(AiAnswer::class)->findAll();
        $phrases = [];
        foreach ($aiPhrases as $answer) {
            $phrases[] = $answer->getPhrase();
        }

        return $phrases;
    }
}
