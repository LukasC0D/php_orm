### Welcome to Practical Project 8

## Product name 

Content management system.

## Product is capable of(with admin rights):

- Create a new page. 
- Delete a page.
- Edit a page 
- Add a different content to page.
- Add a html script.

## How to setup MySQL server?
- Database with empty tables will be created on launch or you can launch MySQL Workbench before opening project and run SQL file provided (creates database with tables and data).
- MySQL database file is atached into the project.
- Just dump the file to MySQL workbech, or follow instructions below.
- Go to MySQL workbench and create new schema called "random_database".
- Import MySQL database file to a new schema you just created.
- If everything  succeeded you can go to next step.

## How to run project?

- Download [XAMPP](https://www.apachefriends.org/index.html) and install it.
- Clone or download git repository https://github.com/LukasC0D/php_orm.git 
- Add repository to htdocs. The folder is located in the C drive (C:/xampp/htdocs).
- Or clone repository directly to htdocs. In htdocs directory right mouse click Git Bash Here. Type in:
```sh
git clone https://github.com/LukasC0D/php_orm.git
```
- Open cloned repository with VS Code. Optional but not necessary. You can already.
- Run XAMPP. In the C drive run (C:/xampp/xampp-control.exe) and start the Apache server.
- If the Apache server strated successfully open Your browser.
- In Your browser on the searchbar type in:

```sh
localhost/php_orm
```
-Login as ADMIN to manage content!!!
```sh
localhost/php_orm/admin
```

## What technologies I used?

PHP ORM, Doctrine, MySQL, CSS, BOOTSTRAP.






