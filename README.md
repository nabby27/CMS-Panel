# CMS Panel with MVC and PHP

This project consists of a CMS Panel (Content Management System) which only uses HTML, PHP, Bootstrap, Fontawesome icons and PDO statements to connect to the MySQL database. 

##### Some of the features are: 
> - Encryption of passwords 
> - OOP (object-oriented programming)
> - Sentences with PDO
> - Architecture pattern MVC (Model, View, Controller)
> - Upload and delete images
> - URL friendly with .htacces
> - 404 page not found implement

## Getting Started

### Prerequisites

* [Php 7.2+](http://php.net/downloads.php)
* [MySQL](https://www.mysql.com/downloads/)
* [Apache2](https://httpd.apache.org/download.cgi)

or server like [xamp](https://www.apachefriends.org/es/index.html)

### Installing

First of all create the database with the script that is in the database folder. 
Modify the `app/core/settings.php` file by putting your connection data to the database and the diferents paths and environment. Finally, copy the files in your public folder on the server.

> **Note 1:** Make sure that the `assets/images` folder is created and there are write permissions for all (necessary when uploading the different images).

> **Note 2:** Make sure that the `rewrite` module of Apache is installed (necessary for the `.htacces` file that makes the routes friendly).

### Running

Make sure that the apache server is started.
Access to CMS Panel app in the URL of server. ex:

```
http://localhost
```

### Testing with test data

To testing the app, you have to execute the data script that is in the folder `./resources/test`, also you have to copy the images of `./resources/test/images` to `./assets/images`

## Structure

```
    .
    +-- _app
    |   +-- _controller
    |   +-- _core
    |   +-- _entity
    |   +-- _model
    |   +-- _styles
    |   +-- _utils
    |   +-- _view
    +-- _assets
    |   +-- _images
    |   +-- _plugins
    +-- _database
    +-- _resources
        +-- _images
        +-- _test
```

## LICENSE

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details

## Authors

* **[Ivan Cordoba](https://github.com/nabby27)**
