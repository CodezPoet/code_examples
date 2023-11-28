# Symfony Code Example

## Versions

** Symfony: ** 6

## Symfony and Google Search API

This is a Symfony code example for interacting with the Google Search API with REST and Json. 
It searches with the Google Search Engine for data for a set value (in this case formal blue dresses) at a set store (in this case Macy's) along with other parameters, such as region. For the purpose of the code example the parameters are set manually with a narrow focus, but these could be set with a wider focus, multiple focuses, dynamically,  through user input, or a combination of those factors. The code returns the data such as image of the dress, the link to the store, and the name of the dress. The output is in a basic HTML template with Twig so that the user can see the image and name of the dress, and check the availability at the store by clicking on a link. Besides the Symfony standard installation the Component HTML Sanitizer. While Twig already checks some output out of the box, because dealing with 3rd party data here brought in through the API sanitizing the data before output using HTML Sanitizer.  

This code is a proof of concept which intended use is as a code example. 

## Screenshot Result in Browser

![alt text](screenshot_code_example_symfony.png)
