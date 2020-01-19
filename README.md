# Technologies stack

 - PHP
 - MySQL
 - HTML/CSS
 - Bootstrap 4
 - Javascript

 GoMail - it's just a web application which simplify interaction between users.
 Here you can write messages between each other.

 Active link - [GoMail](http://gmlme.000webhostapp.com)

 # Directories

 ### /application

 The main directory where contains all classes which responsible for visualizing of this web application. Here we have a `Controllers`, `Http`, `Models` directories. `Controllers` directory contains all controllers files which realize the 'C' letter of MVC design pattern. All subdirectories speak for themselves. All I want to tell about `/application/Controllers/Multiple` and
 `/application/Controllers/Single` they realize multiple and single replacing and deletion of this application.

 `Http` directory. There contains one file `/application/Http/routes.php` where contains all routes of
 this application.

 `Models` directory. Here we have all models which realize a 'M' letter of MVC design pattern. Here we have all business logic of this application.

 ### /bootstrap

 This is access point. Here we have main configuration file `/bootstrap/app.php` which active database and routing in application.

 ### /config

 Here we have configuration files which contains database properties `/config/database.php` for sucessfull connection with database and file `/config/route_params.php` with route parameters which you can use in `/application/Http/routes.php`.

 ### /core

 The main directory of this application which contains all functionality of this we application. I will be not paint in details. You can go to the `/core` directory and look at the code. I will just list all subdirectories and will set small description about it. 

 * Auth - Authentification on site
 * Database - Database connection and interaction with database tables
 * Hasher - Responsible for crypting and decrypting passwords and another data
 * Pagination - Pagination on site
 * Request - Processing requests on site (cookies, sessions, working with HTTP requests)
 * Routing - Handling all HTTP requests from request line and bingind with controllers
 * Searching - Responsible for searching in application
 * View - Processing and visualizing all templates on site

 ### /public

 Here we have all styles, javascript code, and images for our web application.

 ### /tests

 There contains all unit tests which was writed with PHPUnit framework. 

 ### /views 

 Here we have all templates which was writed with Bootstrap 4 framework. 
