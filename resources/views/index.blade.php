<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}">
    <!-- Page title and linking external stylesheet -->
    <title>A.S.A Movies🎥</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<body>
    <!-- Center-aligned heading and introductory message -->
    <center>
        <h1>Welcome To The A.S.A Movie Database 🎥</h1>
        <div class="head">
            <p>
                Welcome to our Movie Database! Explore a vast collection of films, directors, actors, and more. Discover
                hidden gems, check out top-rated movies, and stay updated with the latest releases. Dive into the world
                of cinema with our comprehensive database.
            </p>
        </div>
    </center>
    <br>

    <!-- Container for displaying movie thumbnails -->
    <div class="container">
        <!-- Individual movie boxes with images -->
        <div class="movie">
            <img src="{{ asset('images/img1.jpg') }}" alt="Movie 1">
        </div>
        <div class="movie">
            <img src="{{ asset('images/img2.jpg') }}" alt="Movie 2">
        </div>
        <div class="movie">
            <img src="{{ asset('images/img3.jpg') }}" alt="Movie 3">
        </div>
        <div class="movie">
            <img src="{{ asset('images/img4.jpg') }}" alt="Movie 4">
        </div>
        <div class="movie">
            <img src="{{ asset('images/img5.jpeg') }}" alt="Movie 5">
        </div>
        <div class="movie">
            <img src="{{ asset('images/img6.jpg.avif') }}" alt="Movie 6">
        </div>
        <div class="movie">
            <img src="{{ asset('images/img7.avif') }}" alt="Movie 7">
        </div>
    </div>

    <!-- Center-aligned heading for user queries -->
    <center>
        <h2>What Do You Wanna Know?</h2>
    </center>

    <!-- Container for search forms -->
    <div class="container">
        <!-- Left box for searching movies by producer -->
        <div class="left-box">
            <h3 class="heading">Movies By Producer</h3>
            <form action="moviesByProducer" method="get" autocomplete="off">
                <input type="text" name="fname" class="input-box" placeholder="Producer's First Name" required>
                <input type="text" name="lname" class="input-box" placeholder="Producer's Last Name" required>
                <input type="submit" value="Submit" class="submit-button">
            </form>
        </div>
        <!-- Right box for searching movies by director -->
        <div class="right-box">
            <h3 class="heading">Movies By Director</h3>
            <form action="moviesByDirector" method="get" autocomplete="off">
                <input type="text" name="fname" class="input-box" placeholder="Director's First Name" required>
                <input type="text" name="lname" class="input-box" placeholder="Director's Last Name" required>
                <input type="submit" value="Submit" class="submit-button">
            </form>
        </div>
    </div>

    <div class="container">
        <!-- Left box for searching Most Expensive Movie By a Producer -->
        <div class="left-box">
            <h3 class="heading">Most Expensive Movie By a Producer</h3>
            <form action="mostExpensiveMovieByProducer" method="get" autocomplete="off">
                <input type="text" name="fname" class="input-box" placeholder="Producer's First Name" required>
                <input type="text" name="lname" class="input-box" placeholder="Producer's Last Name" required>
                <input type="submit" value="Submit" class="submit-button">
            </form>
        </div>
        <!-- Right box for searching Actress Income -->
        <div class="right-box">
            <h3 class="heading">Actress' Highest Earning in a Movie</h3>
            <form action="actressByHighestEarningInAMovie" method="get" autocomplete="off">
                <input type="text" name="fname" class="input-box" placeholder="Actress' First Name" required>
                <input type="text" name="lname" class="input-box" placeholder="Actress' Last Name" required>
                <input type="submit" value="Submit" class="submit-button">
            </form>
        </div>
    </div>
    <div class="container">
        <!-- Left box for searching Actress Not Joining a Movie -->
        <div class="left-box">
            <h3 class="heading">Actress Not Joining a Producer</h3>
            <form action="actressNotJoiningProducer" method="get" autocomplete="off">
                <input type="text" name="fname" class="input-box" placeholder="Producer's First Name" required>
                <input type="text" name="lname" class="input-box" placeholder="Producer's Last Name" required>
                <input type="submit" value="Submit" class="submit-button">
            </form>
        </div>
        <!-- Right box for searching Movie By Budget -->
        <div class="right-box">
            <h3 class="heading">Movie By Budget</h3>
            <form action="moviesByDirectorAndBudget" method="get" autocomplete="off">
                <input type="text" name="fname" class="input-box" placeholder="Director's First Name" required>
                <input type="text" name="lname" class="input-box" placeholder="Director's Last Name" required>
                <input type="number" name="budget" class="input-box" placeholder="Budget" required>
                <input type="submit" value="Submit" class="submit-button">
            </form>
        </div>
    </div>
    <div class="container">
        <!-- Left box for searching Movies Watched for an Actor/Actress -->
        <div class="left-box">
            <h3 class="heading">Movies Watched for an Actor/Actress</h3>
            <form action="moviesWatchedForActorOrActress" method="get" autocomplete="off">
                <input type="text" name="fname" class="input-box" placeholder="Actor/Actress' First name"
                    required>
                <input type="text" name="lname" class="input-box" placeholder="Actor/Actress' Last name"
                    required>
                <input type="submit" value="Submit" class="submit-button">
            </form>
        </div>
        <!-- Right box for searching Movies By Year -->
        <div class="right-box">
            <h3 class="heading">Movies By Year</h3>
            <form action="moviesByYear" method="get" autocomplete="off">
                <input type="number" name="year" class="input-box" placeholder="Enter the Year" required>
                <input type="submit" value="Submit" class="submit-button">
            </form>
        </div>
    </div>

    <div class="container">
        <!-- Left box for searching Most Expensive Movies of the Year -->
        <div class="left-box">
            <h3 class="heading">Producers with Most Expensive Movies of the Year</h3>
            <form action="producersWithMostExpensiveMoviesByYear" method="get" autocomplete="off">
                <input type="number" name="year" class="input-box" placeholder="Enter the Year" required>
                <input type="submit" value="Submit" class="submit-button">
            </form>
        </div>
        <!-- Right box for searching Actors/Actress Joining a Movie -->
        <div class="right-box">
            <h3 class="heading">Actors/Actress Joining a Movie</h3>
            <form action="actorsAndActressesInMovie" method="get" autocomplete="off">
                <input type="text" name="movie" class="input-box" placeholder="Movie Name" required>
                <input type="submit" value="Submit" class="submit-button">
            </form>
        </div>
    </div>
    <!-- Line breaks for spacing -->
    <br>
    <!-- Horizontal line -->
    <hr>
    <!-- Line breaks for spacing -->
    <br>

    <!-- Section for updating database with new entries -->
    <center>
        <h2>What Do You Wanna Update?</h2>
        <!-- Button container for navigation to update forms -->
        <div class="button-container">
            <button onclick="window.location.href='{{ route('add-actor') }}'">Add an Actor/Actress</button>
            <button onclick="window.location.href='{{ route('add-movie') }}'">Add a New Movie</button>
            <button onclick="window.location.href ='{{ route('move-movie') }}'">Move a movie from screened list to
                coming soon</button>
            <button onclick="window.location.href ='{{ route('start-movie') }}'">Make a movie start in two theatres at
                the same time</button>
        </div>

    </center>

    <!-- Line breaks for spacing -->
    <br><br>
    <!-- Horizontal line -->
    <hr>
    <!-- Line breaks for spacing -->
    <br>

    <!-- Section for credits -->
    <center>
        <div class="box">
            <h2>Created By</h2>
            <ul>
                <li>Arif Hasan</li>
                <li>Sebastian Ivezaj</li>
                <li>Arathi Unnikrishnan</li>
            </ul>
        </div>
    </center>
    <!-- Line breaks for spacing -->
    <br>
</body>

</html>
