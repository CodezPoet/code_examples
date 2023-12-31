# Laravel Code Example

## Versions
**Laravel:** 10

**WordPress:** 6.4.1

## Laravel and Headless WordPress using REST API

### Summary
The code in this folder is a basic Laravel code example for interacting with the WordPress REST API. 
This to create a Headless WordPress where the frontend can be designed in Laravel, while the backend keeps using WordPress. The output is in HTML with Blade templates.

Since HTML output from WordPress can contain HTML, and Laravel does not have a way to deal with allowing this safely out of the box, the package Mews with HTML Purifier is used to purify the output of  HTML.

This code is a proof of concept which intended use is as a code example. It is not an opinion on whether one should use Laravel as frontend for WordPress.

### Screenshot Result in Browser

![screenshot of Laravel code example](https://github.com/CodezPoet/code_examples/blob/main/screenshots/screenshot_result.png)

## .env

.env needs the following information: 

```
WP_SITE=location WordPress Blog
```

## Composer for Mews HTML Purifier

```
:~$ composer require mews/purifier
```

## Build CSS

To compile and build the CSS with Vite run:

```
nvm run build
```
