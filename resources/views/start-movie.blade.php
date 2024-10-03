<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}">
    <!-- Page title -->
    <title>Start a movie</title>
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
        #screening-table {
            border-collapse: collapse;
            width: 70%;
        }

        /* Styles for table header and data cells */
        #screening-table th,
        #screening-table td {
            border: 2px solid black;
            padding: 5px;
            text-align: center;
        }

        /* Styles for table header */
        #screening-table th {
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
        <h1>Make a movie start in two theatres at the same time</h1>
    </center>
 
    <!-- Center-aligned form for starting a movie -->
    <center>
        <form action="insertScreeningInTwoTheaters" method="post" autocomplete="off">
            @csrf
            <table>
                <!-- Input field for movie ID -->
                <tr>
                    <td>Movie ID:</td> <td><input type="number" name="movieId" placeholder="Enter the movie ID" required></td>
                </tr>
                <!-- Dropdown for selecting Theatre 1 -->
                <tr>
                    <td><label for="theatre">Theatre 1:</label></td>
                    <td>
                        <select id="category" name="theatre1" required>
                            <option value="">Select a theatre</option>
                            <option value="1">Meadow Brook Amphitheatre</option>
                            <option value="2">Emagine</option>
                            <option value="3">IMAX</option>
                            <option value="4">AMC Forum 30</option>
                            <option value="5">MJR Troy Grand Cinema 16</option>
                        </select>
                    </td>
                </tr>   
                <!-- Dropdown for selecting Theatre 2 -->
                <tr>
                    <td><label for="theatre">Theatre 2:</label></td>
                    <td>
                        <select id="category" name="theatre2" required>
                            <option value="">Select a theatre</option>
                            <option value="1">Meadow Brook Amphitheatre</option>
                            <option value="2">Emagine</option>
                            <option value="3">IMAX</option>
                            <option value="4">AMC Forum 30</option>
                            <option value="5">MJR Troy Grand Cinema 16</option>
                        </select>
                    </td>
                </tr>
                <!-- Input field for start time  -->
                <tr>
                    <td><label for="time">Start Time:</label></td> <td><input type="datetime-local" id="time" name="time" required></td>
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
        <h2>Screenings</h2>
        @include($partial)
        <br>
    </center>
</body>
</html>