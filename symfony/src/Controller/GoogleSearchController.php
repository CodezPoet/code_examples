<?php

// src/Controller/GoogleSearchController.php
namespace App\Controller;

use App\Service\GoogleSearchService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Controller for the Google Search API handling
class GoogleSearchController extends AbstractController
{
    /**
     * return the search result to the view
     * 
     * @param GoogleSearchService $googleSearchService
     * @param LoggerInterface $logger
     * 
     * @return Response
     */
    #[Route('/search/results/google')]
     function displayResult(GoogleSearchService $googleSearchService, LoggerInterface $logger): Response
    {
        $results =  $googleSearchService->resultOutput($logger);
        if (false !== $results) {
            return $this->render('search/results/google.html.twig', [
                'results' => $results,
            ]);
        } else {
            $logger->error('Google Search API error with: method displayResult in class GoogleSearchController');
            return $this->render('search/search_error.html.twig');
        }
    }
}
