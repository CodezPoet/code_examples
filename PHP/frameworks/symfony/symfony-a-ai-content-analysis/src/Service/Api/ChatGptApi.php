<?php

namespace App\Service\Api;

use Symfony\Component\HttpClient\HttpClient;
use App\Service\ProcessingPhrases\ProcessTwoWordPhrases;

class ChatGptApi
{

    /**
     * Construct dependency injection
     * 
     * @param private
     * @param private
     * @param public
     */
    public function __construct(
        private $chatGptapiKey,
        private $chatGptapiUrl,
        private int $chatGptTokens,
        public ProcessTwoWordPhrases $processTwoWordPhrases
    ) {
    }

    /**
     * make request to ChatGPT AI using HTTP Client in Symfony
     * 
     * @param string $questionToAskAi
     * 
     * @return string
     */
    public function makeRequest($questionToAskAi)
    {
        $httpClient = HttpClient::create();
        $response = $httpClient->request('POST', $this->chatGptapiUrl, array(
            'headers' => array(
                "Authorization: Bearer {$this->chatGptapiKey}",
                "Content-Type: application/json"
            ),
            'json' => array(
                "model" => "gpt-3.5-turbo",
                "messages" => array(
                    array(
                        "role" => "user",
                        "content" => $questionToAskAi,
                    )
                ),
                "max_tokens" => $this->chatGptTokens,
            )
        ));

        return $response->getContent();
    }
}
