# Laravel Code Examples

**Version:** Laravel 10/11

## A. Laravel and Headless WordPress using REST API

### Summary
The code in this folder is a basic Laravel code example for interacting with the WordPress REST API. 
This to create a Headless WordPress where the frontend can be designed in Laravel, while the backend keeps using WordPress. The output is in HTML with Blade templates. Since HTML output from WordPress can contain HTML, the package Mews with HTML Purifier is used to purify the output of  HTML. This code is a proof of concept which intended use is as a code example. It is not an opinion on whether one should use Laravel as frontend for WordPress.

## B. Task List App

### Summary

An app that allows the creation, viewing, editing, and deleting of tasks, using pagination, as well as marking it as complete or still to complete.Uses Blade for templates and Tailwind for styling.

## C. Book reviews

### Summary

A books review portal. A list of books where individual have a review rating. It is possible to leave a review. 
Books can be listed by latest, popular (last month, last 6 months), and highest rated (last month, last 6 months). 
On a book page all the reviews can be seen. Books can be searched by title. Uses Blade for templates and Tailwind for styling.


## D. Events Management

### Summary

Building a REST API for events management. Uses database and JSON when processing user created events and attendees. Data can be created, updated, and deleted. Authentication with Sanctum, authorization with Policies (or Gates optionally instead), (JWT) Tokens (setting, revoking), ques, route protection and rate limiting. Reminders of events are sent at a schedule to attendees using a custom Artisan Command and cron. Used Postman to test and browse Api. 
Uses Blade for templates and Tailwind for styling.

## D. Lifewire Polls

### Summary

Using Lifewire and Laravel to create dynamic frontend website for Polls. Using Livewire it instantly updates forms and voting. Polls and options can be created and voted upon. Uses Blade for templates and Tailwind for styling.

## D. Job Boards

### Summary

Under construction
