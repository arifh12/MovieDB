<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
</p>

# CSI 5510 Final Project - A.S.A Movie Database

Laravel web application developed for CSI 5510 final project. This app allows the user to execute the following actions:
- List all the movies produced by a given producer.
- List all the movies that were directed by a given director.
- Find the most expensive movie a produce ever cost.
- Find all the movies that were produced in the same year.
- Find an actress who does not join a movie produced by a producer.
- Find the highest amount of money earned by an actress in a movie. 
- Find actors and actresses who joined a movie.
- List all the movies below a price directed by a director.
- List producers who produced all the most expensive movies in a given year. 
- Find movies that people are more watching for an actor or an actress.
- Add an actor into the database
- Add a new movie to the database
- Move a movie from screened list in theatres to coming soon list
- Make a movie starts in two theatres at the same time.

## Instructions to run

### Prerequisites
- [PHP v8.3](https://www.php.net/downloads.php)
- [Composer v2.7.2](https://getcomposer.org/download/)
- [Oracle SQL Database 19c](https://www.oracle.com/database/technologies/oracle-database-software-downloads.html)
    - Set up Oracle DB with the following configurations:
        - Hostname: `localhost`
        - Port: `1521`
        - Service name: `ORCL`
        - Username: `project`
        - Password: `project`
    - In the `project` schema, execute the `project-setup.sql` file found in the root directory of this project to set up the database.
### Start the application
First, run the following command to install all the required dependencies:
```bash
$ composer install
```
To start the application locally, execute the following command from the project root directory:
```bash
$ php artisan serve
```
Then, open <http://localhost:8000> in your browser to view the home page of the website.