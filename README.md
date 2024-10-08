
#  Table of Contents Code Examples

Examples of code for job applications 

- [Introduction](#introduction)
- [Coding Convention](#coding-convention)
- [Code Examples](#code-examples)
- [Versions Code Examples were made](#versions-code-examples-were-made)
- [Bugs/ Errors/Feedback](#bugs-errors-or-feedback)

## Introduction

This Code Examples repository was started around November 2023. It is meant as a showcase
of examples, for examples issues a developer may run into on a daily basis. The intention is not to put entire code bases or projects here. Often I am not allowed to discuss code of projects publicly, so I have to write code examples from scratch. Which entails figuring out which examples a developer could like to see, writing the code, testing it, commenting it, revisions, etc. There is quite a lot that goes in to it, besides other obligations I have. 

If there is some example of code you would like to see, please contact me first before assuming I don't know how, or to judge me. It is complicated to know what a developer is looking for in a  code example, and I am more than happy to write an example, at the same time, I could spend months writing code, that has no use other than code examples, and that is a bit much too. I am writing this because have noticed this a few times now. Hopefully can find each other in a middle ground. 

## Coding Convention

Different frameworks, cms, and projects can use different coding conventions. Some examples may use different coding conventions, however within each example a consistent coding style was chosen. Currently in the process of updating some examples. In general the following coding conventions are used in the code examples:

- [PHP PSR Coding Standards](https://www.php-fig.org/psr/)
- [.NET C# Coding Conventions](https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/coding-style/coding-conventions)
- [W3C Coding Standards](https://www.w3.org/)
- [Symfony Coding Standards](https://symfony.com/doc/current/contributing/code/standards.html)
- [Laravel Coding Style](https://laravel.com/docs/10.x/contributions#coding-style) 
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/)
  
## Code Examples

### Algorithms and Calculations

Various code examples of C# and PHP, with algorithms and calculations, for example Blood Pressure or BMI, using things such as classes, methods, arrays, functions, loops, and switches. 

### Api

Example of an API

### CMS

#### WordPress

Code examples for WordPress like custom plugin, shortcode, and correct text in posts.

### Conversions

Examples how to write from a Excel file to a database for example 

### Database

Examples of SQL (e.g. MySQL, MariaDB, or MS SQL), PDO, Doctrine (DQL and Query Builder), NoSQL MongoDB, and database design

### Design Patterns in C# and PHP

Various Design Patterns in C# or PHP such as Singleton and Factory

### Design Principles Solid in C# and PHP

Various SOLID Design Principles in C# or PHP such as Single Responsibility

### Frameworks MVC

#### Laravel

a. Laravel and Headless WordPress using REST API

The code in this folder is a basic Laravel code example for interacting with the WordPress REST API. This to create a Headless WordPress where the frontend can be designed in Laravel, while the backend keeps using WordPress. The output is in HTML with Blade templates. Since HTML output from WordPress can contain HTML, and Laravel does not have a way to deal with allowing this safely out of the box, the package Mews with HTML Purifier is used to purify the output of HTML. This code is a proof of concept which intended use is as a code example. It is not an opinion on whether one should use Laravel as frontend for WordPress.

b. Task List App

An app that allows the creation, editing, and deleting of tasks. As well as marking it as complete or still to complete. It uses a custom table in Laravel and MySQL to store the tasks, and a factory to populate it with dummy data.

c. Book reviews

A books review portal. A list of books where individual have a review rating. It is possible to leave a review. Books can be listed by latest, popular (last month, last 6 months), and highest rated (last month, last 6 months). On a book page all the reviews can be seen. Books can be searched by title. Uses Blade for templates and Tailwind for styling.

d. Events Management

Building a REST API for events management. Uses database and JSON when processing user created events and attendees. Data can be created, updated, and deleted. Authentication with Sanctum, authorization with Policies (or Gates optionally instead), Tokens (setting, revoking), ques, route protection and rate limiting. Reminders of events are sent at a schedule to attendees using a custom Artisan Command and cron. Used Postman to test and browse Api. Uses Blade for templates and Tailwind for styling.

e. Lifewire Polls

Using Lifewire and Laravel to create dynamic frontend website for Polls. Using Livewire it instantly updates forms and voting. Polls and options can be created and voted upon. Uses Blade for templates and Tailwind for styling.

f. Job Board

A job board where applicants and employers can log in. Applicants can apply to jobs. Employers can create, edit, and delete job postings. Jobs have a title, description, salary indication, location, and various categories such as which sector and what level.Jobs are searchable and filterable. Uses Tailwind and Vite.

#### Microsoft .NET Core

Examples of OOP MVC apps in .NET Core, C#, and SQL. First example shows a simple website with jokes database, user registration and login, CRUD and search operations. 

#### Symfony

##### Symfony A. A.I. Content Analysis and Budget Track

a. Example of MVC PHP OOP in Symfony framework. The code takes content from a WordPress blog (with about 17000 posts) and does analysis using algorithms for logical phrases with AI. The next step is for the AI answers to be processed to select the most logical phrases for humans. These results can then be used to automatically classify content on a blog for example. For reading and storing data multiple tables in a database are used using Doctrine and Entity. A cron Command is used to run on regular intervals. 

b. A Budget tracker application made with Symfony and using Bootstrap framework for styling.

### Screenshots

Directory for screenshots of images used in README.md to show output for example

### Unit Testing

Examples of Unit Testing such as PHPUnit for PHP

## Versions Code Examples were made

- PHP: 8
- Symfony: 6 LTS
- WordPress: 6
- Laravel: 10/11
- .NET Core: 8
- C#: 12

## Bugs, Errors, or Feedback

While I do my best to present code examples, when there is a bug or error it is appreciated if you let me know. 
Constructive criticism and feedback is welcome after code review. I like to learn and improve.






