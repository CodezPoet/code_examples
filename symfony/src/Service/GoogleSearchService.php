<?php

// src/Service/GoogleSearchService.php
namespace App\Service;

class GoogleSearchService
{
    // private variables for the Google API keys
    private $paramGoogleApiKey;
    private $paramGoogleCxKey;
    
    /*
    * __construct the Google API keys. See config/services.yaml for more information
    * about things like configuration and how to set different keys
    */
    public function __construct(string $googleApiKey, string $googleCxKey) {
        $this->paramGoogleApiKey = $googleApiKey;
        $this->paramGoogleCxKey = $googleCxKey;
    }

    // Parameters for the search Query for the code example, in a more extensive application would seperate this
    public function searchQuery()
    {
        $searchQuery = array(
            'key' => $this->paramGoogleApiKey,
            'cx' => $this->paramGoogleCxKey,
            'q' => 'blue+dress+clothes+women+store',
            'filter' => 1,
            'gl' => 'countryUS',
            'lr' => 'lang_us',
            'siteSearch' => 'macys.com',
            'siteSearchFilter' => 'i',
            'searchType' => 'image',
        );
        return $searchQuery;
    }

    // Set the timer for the cache
    public function searchRunTimer()
    {
        $startTime = strtotime('08:00:00');
        $endTime = strtotime('22:00:00');
        $totalHours = ($endTime - $startTime) / 3600;
        return $totalHours;
    }

    // get the search result from Google through the Google Search API
    public function getSearchResult($logger)
    {
        $searchQuery = $this->searchQuery();
        $searchRunTimer = $this->searchRunTimer();
        $fileName = '/var/www/html/files/feed_temp.xml';
        $cacheOverride = 0;
        if (14 > $searchRunTimer || 1 === $cacheOverride) {
            $feedLink = 'https://www.googleapis.com/customsearch/v1?' . http_build_query($searchQuery);
            $feedXml = file_get_contents($feedLink);
            file_put_contents($fileName, $feedXml);
        } else {
            $feedXml = file_get_contents($fileName);
        }
        if ((is_file($fileName)) && (0 !== filesize($fileName))) {
            return $feedXml;
        } else {
            $logger->error('An error occurred with the Google Search API: @getSearchResult');
            return false;
        }
    }

    // transfer the json output from Google into local array, sanitize it, and select specific data for the application
    public function resultOutput($logger)
    {
        $searchResult = $this->getSearchResult($logger);
        if (false !== $searchResult) {
            $searchResult = json_decode($searchResult, true);
            $count = 0;
            if (isset($searchResult['items']) && !empty($searchResult['items'])) {
                foreach ($searchResult['items'] as $items) {
                    $count++;
                    if (isset($items['title']) && !empty($items['title'])) {
                        $title = $items['title'];
                    }
                    if (isset($items['snippet']) && !empty($items['snippet'])) {
                        $excerpt = $items['snippet'];
                    }
                    if (isset($items['image']['contextLink']) && !empty($items['image']['contextLink'])) {
                        $link = $items['image']['contextLink'];
                    }
                    if (isset($items['image']['thumbnailLink']) && !empty($items['image']['thumbnailLink'])) {
                        $image = $items['image']['thumbnailLink'];
                    }
                    if (isset($title) && isset($excerpt) && isset($link) && isset($image)) {
                        $results[$count]['title'] = $title;
                        $results[$count]['excerpt'] = $excerpt;
                        $results[$count]['link'] = $link;
                        $results[$count]['image'] = $image;
                    }
                }
            }
        }
        if (isset($results)) {
            return $results;
        } else {
            $logger->error('An error occurred with the Google Search API: @resultOutput');
            return false;
        }
    }
}
