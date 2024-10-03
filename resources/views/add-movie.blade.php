<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}">
    <!-- Page title -->
    <title>Add a movie</title>
    <!-- Internal styles for button, body, and heading -->
    <style>
        /* Styles for buttons */
        button {
            padding: 10px 10px; 
            font-size: 15px; 
            background-color: indianred;
            color: white;
            border: none;
            cursor: pointer;
        }
        /* Styles for body */
        body {
            background-color: cornsilk;
            border-color: black;
            border-width: 5px;
            border-style: solid;
        }
        /* Styles for heading */
        h1 {
                background-color: indianred;
                color: black;
                padding: 8px;
                text-align: center;
        }
        /* Styles for table */
        #movie-table {
            border-collapse: collapse;
            width: 70%;
        }

        /* Styles for table header and data cells */
        #movie-table th,
        #movie-table td {
            border: 2px solid black;
            padding: 5px;
            text-align: center;
        }

        /* Styles for table header */
        #movie-table th {
            background-color: indianred;
        }
    </style>

    @if (Session::has('alert'))
        <script>
            alert("{{Session::get('alert')}}");
        </script>
    @endif
</head>

<body>
    <!-- Center-aligned heading -->
    <center>
        <h1>Add a Movie</h1>
    </center>
 
    <!-- Center-aligned form for adding a movie -->
    <center>
        <form action="insertNewMovie" method="post" autocomplete="off">
            @csrf
            <table>
                <!-- Input field for movie ID -->
                <tr>
                    <td>Movie ID:</td> <td><input type="number" name="id" placeholder="Enter the movie ID" required></td>
                </tr>
                <!-- Input field for movie title -->
                <tr>
                    <td>Movie Title:</td> <td><input type="text" name="title" placeholder="Enter the movie name" required></td>
                </tr>
                <!-- Input field for release date -->
                <tr>
                    <td><label for="releaseDate">Release Date:</label></td>
                    <td><input type="date" id="releaseDate" name="date" required></td>
                </tr>
                <!-- Input field for movie synopsis -->
                <tr>
                    <td>Synopsis:</td> <td><input type="text" name="synopsis" placeholder="Write about the movie" required></td>
                </tr>
                <!-- Input field for movie length -->
                <tr>
                    <td>Length (mins):</td> <td><input type="number" name="length" placeholder="Duration of the movie" required></td>
                </tr>
                <!-- Input field for movie rating -->
                <tr>
                    <td>Rating:</td> 
                    <td>
                        <select id="rating" name="rating" required>
                            <option value="">Select a rating</option>
                            <option value="1">R</option>
                            <option value="2">G</option>
                            <option value="3">PG</option>
                            <option value="4">PG-13</option>
                        </select>
                    </td>
                </tr>
                <!-- Dropdown menu for selecting movie category -->
                <tr>
                    <td><label for="category">Category:</label></td>
                    <td>
                        <select id="category" name="category" required>
                            <option value="">Select a category</option>
                            <option value="1">Action</option>
                            <option value="2">Animation</option>
                            <option value="3">Comedy</option>
                            <option value="4">Drama</option>
                            <option value="5">Family</option>
                            <option value="6">Horror</option>
                            <option value="7">Romance</option>
                            <option value="8">Fantasy</option>
                        </select>
                    </td>
                </tr> 
                <!-- Submit button -->                           
                <tr>
                    <td></td> <td><input type="submit"><input type="reset"></td> 
                </tr>
            </table>
        </form>
    </center>
    <hr>

    <!-- Center-aligned button to navigate to home page -->
    <center>
        <p>
            <button type="button" onclick="window.location.href = '{{ route('index') }}'">Home Page</button>
        </p>        
    </center>
    <hr>
    <center>
        <h2>Movies</h2>
        @include($partial)
    </center>
    <br>
</body>
</html>