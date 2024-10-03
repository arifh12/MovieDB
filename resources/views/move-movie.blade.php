<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}">
    <!-- Page title -->
    <title>Move a movie</title>
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
    <!-- JavaScript function for confirmation dialog -->
    <script>
        function confirmMove() {
            return confirm("Are you sure you want to move this movie?");
        }
    </script>
    @if (Session::has('alert'))
    <script>
        alert("{{Session::get('alert')}}");
    </script>
    @endif
</head>

<body>
    <!-- Center-aligned heading -->
    <center>
        <h1>Move a movie from screened list to coming soon</h1>
    </center>
 
    <!-- Center-aligned form for moving a movie -->
    <<center>
        <form action="updateMoveScreeningStatus" method="post" autocomplete="off" onsubmit="return confirmMove()">
            @csrf
            <table>
                <!-- Input field for movie ID -->
                <tr>
                    <td>Movie ID:</td> <td><input type="number" name="movieId" placeholder="Enter the movie ID" required></td>
                </tr>
                <!-- Dropdown for selecting Theatre -->
                <tr>
                    <td><label for="theatre">Theatre:</label></td>
                    <td>
                        <select id="category" name="theatre" required>
                            <option value="">Select a theatre</option>
                            <option value="1">Meadow Brook Amphitheatre</option>
                            <option value="2">Emagine</option>
                            <option value="3">IMAX</option>
                            <option value="4">AMC Forum 30</option>
                            <option value="5">MJR Troy Grand Cinema 16</option>
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
        <h2>Screenings</h2>
        @include($partial)
        <br>
    </center>
</body>
</html>