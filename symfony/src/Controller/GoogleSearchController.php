<?php

// src/Controller/GoogleSearchController.php
namespace App\Controller;

use App\Service\GoogleSearchService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GoogleSearchController extends AbstractController
{
    // return the search result to the view
    #[Route('/search/results/google')]
    function displayResult(GoogleSearchService $googleSearchService, LoggerInterface $logger): Response
    {
        $results =  $googleSearchService->resultOutput($logger);
        if (false !== $results) {
            return $this->render('search/results/google.html.twig', [
                'results' => $results,
            ]);
        } else {
            $logger->error('An error occurred with the Google Search API: @displayResult');
            return $this->render('search/search_error.html.twig');
        }
    }
}
