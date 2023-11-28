# Symfony Code Example

## Versions

Symfony: 6

## Symfony and Google Search API

This is a Symfony code example for interacting with the Google Search API with REST and Json. 
It searches with the Google Search Engine for data for a set value (in this case formal blue dresses) at a set store (in this case Macy's) along with other parameters, such as region. The code returns the data such as image of the dress, the link to the store, and the name of the dress. The output is in a basic HTML template with Twig.


The Google API Key, and search engine ID are stored seperate from the code, through Symfony Secrets and services.yaml
The HTML output is checked before output using the Symfony HTML purifier, since dealing with third party data coming from the outside.

This code is a proof of concept which intended use is as a code example. 

## Screenshot Result in Browser

![alt text](screenshot_code_example_symfony.png)
