<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Cast;
use App\Models\Movie;
use App\Models\Person;
use App\Models\Screening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MovieController extends Controller {
    const RESULTS_VIEW = 'results';
    const PARTIALS = [
        'movie' => 'partials.movie',
        'person' => 'partials.person',
        'movie-budget' => 'partials.movie-budget',
        'person-movie' => 'partials.person-movie',
        'cast' => 'partials.cast',
        'screening' => 'partials.screening'
    ];

    // 1)	List all the movies produced by a given producer. 
    // http://localhost:8000/moviesByProducer?fname=Kathy&lname=Najimy
    public function moviesByProducer(Request $req) {
        $roleName = "Producer";
        $fname = $req->query("fname");
        $lname = $req->query("lname");
        $movies = Movie::fromQuery(
            "SELECT m.*, cat_name, rating_name
            FROM movie m
            JOIN cast c ON c.m_id = m.m_id
            JOIN role r ON r.role_id = c.role_id
            JOIN person p ON p.per_ssn = c.per_ssn
            JOIN rating rg ON rg.rating_id = m.rating_id
            JOIN category c ON c.cat_id = m.cat_id
            WHERE r.role_name = ?
                AND p.per_fname = ?
                AND p.per_lname = ?",
            [$roleName, $fname, $lname]
        );

        $title = "Movies produced by <i>{$fname} {$lname}</i>";

        return view(self::RESULTS_VIEW, [
            'title' => $title,
            'partial' => self::PARTIALS['movie'],
            'movies' => $movies
        ]);
    }

    // 2)	List all the movies that were directed by a given director.
    // http://localhost:8000/moviesByDirector?fname=Mike&lname=Kelly
    public function moviesByDirector(Request $req) {
        $roleName = "Director";
        $fname = $req->query("fname");
        $lname = $req->query("lname");
        $movies = Movie::fromQuery(
            "SELECT m.*, cat_name, rating_name
            FROM movie m
            JOIN cast c ON c.m_id = m.m_id
            JOIN role r ON r.role_id = c.role_id
            JOIN person p ON p.per_ssn = c.per_ssn
            JOIN rating rg ON rg.rating_id = m.rating_id
            JOIN category c ON c.cat_id = m.cat_id
            WHERE r.role_name = ?
                AND p.per_fname = ?
                AND p.per_lname = ?",
            [$roleName, $fname, $lname]
        );

        $title = "Movies directed by <i>{$fname} {$lname}</i>";

        return view(self::RESULTS_VIEW, [
            'title' => $title,
            'partial' => self::PARTIALS['movie'],
            'movies' => $movies
        ]);
    }

    // 3)	Find the most expensive movie a produce ever cost.
    // http://localhost:8000/mostExpensiveMovieByProducer?fname=Kathy&lname=Najimy
    public function mostExpensiveMovieByProducer(Request $req) {
        $roleName = 'Producer';
        $fname = $req->query('fname');
        $lname = $req->query('lname');

        $movies = Movie::fromQuery(
            "SELECT m2.m_id, m2.m_title, sum(c2.salary) AS budget
            FROM movie m2
            JOIN cast c2 ON c2.m_id = m2.m_id
            WHERE c2.m_id IN (
                SELECT c.m_id
                FROM cast c
                JOIN ROLE r ON r.role_id = c.role_id
                JOIN person p ON p.per_ssn = c.per_ssn
                WHERE r.role_name = ?
                    AND p.per_fname = ?
                    AND p.per_lname = ?
                )
            GROUP BY m2.m_id, m2.m_title
            ORDER BY budget DESC
            FETCH FIRST row ONLY",
            [$roleName, $fname, $lname]
        );

        $title = "Most expensive movie produced by <i>{$fname} {$lname}</i>";

        return view(self::RESULTS_VIEW, [
            'title' => $title,
            'partial' => self::PARTIALS['movie-budget'],
            'movies' => $movies
        ]);
    }

    // 4)	Find all the movies that were produced in the same year.
    // http://localhost:8000/moviesByYear?year=2008
    public function moviesByYear(Request $req) {
        $year = $req->query('year');
        $movies = Movie::fromQuery(
            "SELECT m.*, cat_name, rating_name
            FROM movie m
            JOIN rating rg ON rg.rating_id = m.rating_id
            JOIN category c ON c.cat_id = m.cat_id
            WHERE extract(YEAR FROM m_date) = ?",
            [$year]
        );

        $title = "Movies produced in year <i>{$year}</i>";

        return view(self::RESULTS_VIEW, [
            'title' => $title,
            'partial' => self::PARTIALS['movie'],
            'movies' => $movies
        ]);
    }

    // 5)	Find an actress who does not join a movie produced by a producer.
    // http://localhost:8000/actressNotJoiningProducer?fname=Kathy&lname=Najimy 
    public function actressNotJoiningProducer(Request $req) {
        $producerRoleName = 'Producer';
        $actorRoleName = 'Actor';
        $gender = 'Female';
        $fname = $req->query('fname');
        $lname = $req->query('lname');

        $actresses = Person::fromQuery(
            "SELECT p2.*
            FROM person p2
            JOIN cast c2 ON c2.per_ssn = p2.per_ssn
            JOIN ROLE r2 ON r2.role_id = c2.role_id
            WHERE r2.role_name = ?
                AND p2.per_gender = ?
                AND c2.m_id NOT IN (
                    SELECT c.m_id
                    FROM cast c
                    JOIN ROLE r ON r.role_id = c.role_id
                    JOIN person p ON p.per_ssn = c.per_ssn
                    WHERE r.role_name = ?
                        AND p.per_fname = ?
                        AND p.per_lname = ?)",
            [$actorRoleName, $gender, $producerRoleName, $fname, $lname]
        );

        $title = "Actresses not joining movies produced by <i>{$fname} {$lname}</i>";

        return view(self::RESULTS_VIEW, [
            'title' => $title,
            'partial' => self::PARTIALS['person'],
            'persons' => $actresses
        ]);
    }

    // 6)	Find the highest amount of money earned by an actress in a movie.
    // http://localhost:8000/actressByHighestEarningInAMovie?fname=Selma&lname=Blair
    public function actressByHighestEarningInAMovie(Request $req) {
        $roleName = 'Actor';
        $gender = 'Female';
        $fname = $req->query('fname');
        $lname = $req->query('lname');
        $actress = Person::fromQuery(
            "SELECT p.*, c.salary
            FROM person p
            JOIN cast c ON c.per_ssn = p.per_ssn
            JOIN ROLE r ON r.role_id = c.role_id
            WHERE r.role_name = ?
                AND p.per_gender = ?
                AND p.per_fname = ?
                AND p.per_lname = ?
            ORDER BY c.salary DESC
            FETCH first row ONLY",
            [$roleName, $gender, $fname, $lname]
        );

        $title = "Highest earning by <i>{$fname} {$lname}</i> in a movie";

        return view(self::RESULTS_VIEW, [
            'partial' => self::PARTIALS['person'],
            'title' => $title,
            'persons' => $actress,
        ]);
    }

    // 7)	Find actors and actresses who joined a movie.
    // http://localhost:8000/actorsAndActressesInMovie?movie=The%20Dark%20Knight
    public function actorsAndActressesInMovie(Request $req) {
        $movieTitle = $req->query('movie');
        $roleName = 'Actor';
        $persons = Person::fromQuery(
            "SELECT p.*
            FROM person p
            JOIN cast c ON c.per_ssn = p.per_ssn
            JOIN ROLE r ON r.role_id = c.role_id
            JOIN movie m ON m.m_id = c.m_id
            WHERE r.role_name = ?
                AND m.m_title = ?",
            [$roleName, $movieTitle]
        );

        $title = "Actors/Actresses in <i>{$movieTitle}</i>";

        return view(self::RESULTS_VIEW, [
            'title' => $title,
            'partial' => self::PARTIALS['person'],
            'persons' => $persons
        ]);
    }

    // 8)	List all the movies below a price directed by a director.
    // http://localhost:8000/moviesByDirectorAndBudget?fname=Mike&lname=Kelly&budget=350000
    public function moviesByDirectorAndBudget(Request $req) {
        $roleName = 'Director';
        $fname = $req->query('fname');
        $lname = $req->query('lname');
        $budget = $req->query('budget');

        $movies = Movie::fromQuery(
            "SELECT m2.m_id, m2.m_title, sum(c2.salary) AS budget
            FROM movie m2
            JOIN cast c2 ON c2.m_id = m2.m_id
            WHERE m2.m_id IN (
                SELECT m.m_id
                FROM movie m
                JOIN cast c ON c.m_id = m.m_id
                JOIN ROLE r ON r.role_id = c.role_id
                JOIN person p ON p.per_ssn = c.per_ssn
                WHERE r.role_name = ?
                    AND p.per_fname = ?
                    AND p.per_lname = ?
                )
            GROUP BY m2.m_id, m2.m_title
            HAVING sum(c2.salary) < ?",
            [$roleName, $fname, $lname, $budget]
        );

        $title = sprintf("Movies directed by <i>{$fname} {$lname}</i> below <i>$%s</i> budget", number_format($budget, 2));

        return view(self::RESULTS_VIEW, [
            'title' => $title,
            'partial' => self::PARTIALS['movie-budget'],
            'movies' => $movies
        ]);
    }

    // 9)	List producers who produced all the most expensive movies in a given year.
    // http://localhost:8000/producersWithMostExpensiveMoviesByYear?year=2008
    public function producersWithMostExpensiveMoviesByYear(Request $req) {
        $roleName = 'Producer';
        $year = $req->query('year');

        $persons = Person::fromQuery(
            "SELECT p2.per_ssn, p2.per_fname, p2.per_lname, m2.m_id, m2.m_title, budget
            FROM movie m2
            JOIN cast c2 ON c2.m_id = m2.m_id
            JOIN ROLE r2 ON r2.role_id = c2.role_id
            JOIN person p2 ON p2.per_ssn = c2.per_ssn
            JOIN (
                SELECT m.m_id, m.m_title, sum(c.salary) AS budget
                FROM movie m
                JOIN cast c ON c.m_id = m.m_id
                JOIN ROLE r ON r.role_id = c.role_id
                JOIN person p ON p.per_ssn = c.per_ssn
                WHERE extract(YEAR FROM m_date) = ?
                GROUP BY m.m_id, m.m_title
                ) S ON S.m_id = c2.m_id
            WHERE r2.role_name = ?
            ORDER BY budget DESC",
            [$year, $roleName]
        );

        $title = "Producers with the Most Expensive Movies in <i>{$year}</i>";

        return view(self::RESULTS_VIEW, [
            'title' => $title,
            'partial' => self::PARTIALS['person-movie'],
            'persons' => $persons
        ]);
    }

    // 10)	Find movies that people are more watching for an actor or an actress.
    // http://localhost:8000/moviesWatchedForActorOrActress?fname=John&lname=Hurt
    public function moviesWatchedForActorOrActress(Request $req) {
        $roleName = 'Actor';
        $fname = $req->query('fname');
        $lname = $req->query('lname');

        $movies = Movie::fromQuery(
            "SELECT m.*, cat_name, rating_name
            FROM movie m
            JOIN cast c ON c.m_id = m.m_id
            JOIN role r ON r.role_id = c.role_id
            JOIN person p ON p.per_ssn = c.per_ssn
            JOIN rating rg ON rg.rating_id = m.rating_id
            JOIN category c ON c.cat_id = m.cat_id
            WHERE r.role_name = ?
                AND p.per_fname = ?
                AND p.per_lname = ?",
            [$roleName, $fname, $lname]
        );

        $title = "Movies watched for actor/actress <i>{$fname} {$lname}</i>";

        return view(self::RESULTS_VIEW, [
            'title' => $title,
            'partial' => self::PARTIALS['movie'],
            'movies' => $movies
        ]);
    }

    // 1)	Adding an actor into the database
    // GET
    public function addActor() {
        $casts = Cast::fromQuery(
            "SELECT c.*, r.role_name 
            FROM cast c
            JOIN role r ON r.role_id = c.role_id"
        );

        return view('add-actor', [
            'partial' => self::PARTIALS['cast'],
            'casts' => $casts
        ]);
    }
    // POST
    public function insertNewActor(Request $req) {
        $charName = $req->input('charName');
        $movieId = $req->input('movieId');
        $ssn = $req->input('ssn');
        $roleId = '1'; // Actor role id
        $salary = $req->input('salary');
        
        try {
            DB::insert(
                "INSERT INTO cast (char_name, m_id, per_ssn, role_id, salary)
                VALUES (?, ?, ?, ?, ?)",
                [$charName, $movieId, $ssn, $roleId, $salary]
            );
        } catch(Exception $e) {
            error_log($e->getMessage());
            return redirect()->back()->with("alert", "Failed to add actor!");
        }

        return redirect()->back()->with("alert", "Actor added successfully!");
    }

    // 2)	Adding a new movie to the database
    // GET
    public function addMovie() {
        $movies = Movie::fromQuery(
            "SELECT m.*, cat_name, rating_name
            FROM movie m
            JOIN rating rg ON rg.rating_id = m.rating_id
            JOIN category c ON c.cat_id = m.cat_id");

        return view('add-movie', [
            'partial' => self::PARTIALS['movie'],
            'movies' => $movies
        ]);
    }
    // POST
    public function insertNewMovie(Request $req) {
        $id = $req->input('id');
        $title = $req->input('title');
        $date = $req->input('date');
        $synopsis = $req->input('synopsis');
        $length = $req->input('length');
        $rating = $req->input('rating');
        $category = $req->input('category');
        
        try {
            DB::insert(
                "INSERT INTO movie (m_id, m_title, m_date, m_synopsis, m_length, rating_id, cat_id)
                VALUES (?, ?, ?, ?, ?, ?, ?)",
                [$id, $title, date('Y-m-d', strtotime($date)), $synopsis, $length, $rating, $category]
            );
        } catch(Exception $e) {
            error_log($e->getMessage());
            return redirect()->back()->with("alert", "Failed to add movie!");
        }

        return redirect()->back()->with("alert", "Movie added successfully!");
    }

    // 3)	Moving a movie from screened list in theatres to coming soon list
    // GET
    public function moveMovie() {
        $screenings = Screening::fromQuery("SELECT * FROM screening");

        return view('move-movie', [
            'partial' => self::PARTIALS['screening'],
            'screenings' => $screenings
        ]);
    }
    // POST
    public function updateMoveScreeningStatus(Request $req) {
        $status = 'Coming Soon';
        $movieId = $req->input('movieId');
        $theaterId = $req->input('theatre');
        $update = 0;

        try {
            $update = DB::update(
                "UPDATE screening
                SET status = ?
                WHERE m_id = ?
                    AND t_id = ?",
                [$status, $movieId, $theaterId]
            );
        } catch(Exception $e) { 
            error_log($e->getMessage());
            return redirect()->back()->with("alert", "Failed to update movie screening!");
        }

        return redirect()->back()->with("alert", 
            $update > 0 ? "Movie screening updated successfully!" : "Failed, no records were updated. Verify that inputs are correct.");
    }

    // 4)	Making a movie starts in two theatres at the same time.
    // GET
    public function screenInTwoTheaters() {
        $screenings = Screening::fromQuery("SELECT * FROM screening");

        return view('start-movie', [
            'partial' => self::PARTIALS['screening'],
            'screenings' => $screenings
        ]);
    }
    // POST
    public function insertScreeningInTwoTheaters(Request $req) {
        $theater1 = $req->input('theatre1');
        $movieId = $req->input('movieId');
        $theater2 = $req->input('theatre2');
        $time = $req->input('time');
        $status = 'Screened';

        try {
            $query = "INSERT INTO screening (t_id, m_id, start_time, status) VALUES (?, ?, ?, ?)";
            DB::insert(
                $query,
                [$theater1, $movieId, date('Y-m-d H:i:s', strtotime($time)), $status]
            );
            DB::insert(
                $query,
                [$theater2, $movieId, date('Y-m-d H:i:s', strtotime($time)), $status]
            );
        } catch(Exception $e) {
            error_log($e->getMessage());
            return redirect()->back()->with("alert", "Failed to add movie!");
        }

        return redirect()->back()->with("alert", "Movie added successfully!");
    }

}
