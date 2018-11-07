# Basic gamer blog

## Getting started
It's very easy to install. You need only two programs.

### Programs needed
* [Xampp](https://www.apachefriends.org/hu/index.html) - For php and the database
* A browser for running the application

### How to install
Put the project in the xampp/htdocs folder. In the browser url type: localhost/phpmyadmin. Here you can import the database. If you keep the basic options, you don't have to change the username and password of the objects in the Site_0001 - Blog/models folder.

Change this line in xampp/php/php.ini from
```
file_uploads=Off
```
to
```
file_uploads=On
```
if it's not already on.