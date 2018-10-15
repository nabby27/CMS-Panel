# CMS with MVC and PHP
Generic Content Management System (CMS) with menu structure stored in database. 
Created in PHP with OOP and architecture model, view, controller (MVC) using PDO, MySQL and Bootstrap

## Getting Started

### Prerequisites

* Php 7.2+
* MySQL
* Apache2

or server like [xamp](https://www.apachefriends.org/es/index.html)

### Installing

First of all create the database with the script that is in the database folder, 
then insert data example (use the script 'test_insertion.sql'). 
Modify the `app/core/settings.php` file by putting your connection data to the database and the diferents paths. 
Finally, copy the files in your workplace on the server

### Running

Access to CMS app in the url of server. ex:

```
http://localhost
```

## Structure
```
    |--app
    |   |--controller
    |   |--core
    |   |--entity
    |   |--model
    |   |--view
    |
    |--assets
    |   |--images
    |   |--plugins
    |
    |--database
```
## Authors

* **[Ivan Cordoba](https://github.com/nabby27)**
