# Laravel Code Example

## Laravel and WordPress using REST API

The code in this folder is a basic Laravel code example for interacting with the WordPress REST API as a logged in user. 
This to create a headless WordPress where the frontend can be designed in Laravel, while the backend keeps using WordPress. For the output of the WordPress posts the HTML is build in Blade templates.


**Please note:** there is no real reason to use Laravel as a frontend for WordPress unless in certain use cases. It is merely meant as code example and proof of concept. If anything I would advise against it with the exception of certain situations (if only because the maintenance of keeping both Laravel and WordPress up to date). 

## .env

.env needs the following information: 

```
WP_SITE=location website
WP_USERNAME=user name
WP_PASSWORD=user password
```



