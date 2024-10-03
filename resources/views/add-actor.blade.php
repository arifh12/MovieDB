<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}">
    <!-- Page title -->
    <title>Add an actor</title>
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
        #cast-table {
            border-collapse: collapse;
            width: 70%;
        }

        /* Styles for table header and data cells */
        #cast-table th,
        #cast-table td {
            border: 2px solid black;
            padding: 5px;
            text-align: center;
        }

        /* Styles for table header */
        #cast-table th {
            background-color: indianred;
        }
    </style>

    @if (session('alert'))
    <script>
        alert("{{session('alert')}}");
    </script>
@endif
</head>
<body>
    <!-- Center-aligned heading -->
    <center>
        <h1>Add an Actor/Actress</h1>
    </center>
 
    <!-- Center-aligned form for adding actor/actress -->
    <center>
        <form action="insertNewActor" method="post" autocomplete="off">
            @csrf
            <table>
                <!-- Input fields for character name -->
                <tr>
                    <td>Character Name:</td> <td><input type="text" name="charName" placeholder="Enter the character name" required></td>
                </tr>
                <!-- Input fields for Movie ID -->
                <tr>
                    <td>Movie ID:</td> <td><input type="number" name="movieId" placeholder="Enter the Movie ID" required></td>
                </tr>
                <!-- Input fields for role -->
                <tr>
                    <td>Person SSN:</td> <td><input type="number" name="ssn" placeholder="Enter the role" required></td>
                </tr>
                <!-- Input fields for salary -->
                <tr>
                    <td>Salary:</td> <td><input type="number" name="salary" placeholder="Enter the salary" required></td>
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
        <h2>Cast</h2>
        @include($partial)
    </center>
    <br>
</body>
</html>