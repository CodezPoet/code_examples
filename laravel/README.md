# Laravel Code Example

## Laravel and Headless WordPress using REST API

The code in this folder is a basic Laravel code example for interacting with the WordPress REST API. 
This to create Headless WordPress where the frontend can be designed in Laravel, while the backend keeps using WordPress. The output is in HTML with Blade templates. Since HTML output from WordPress can contain HTML, and Laravel does not have a way to deal with allowing this safely out of the box, the package MEWS using HTML Purifier is used to purify the output of  HTML.

## .env

.env needs the following information: 

```
WP_SITE=location website
```

## Composer for Mews HTML Purifier

```
:~$ composer require mews/purifier
```

