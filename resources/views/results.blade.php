<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}">
    <!-- Page title -->
    <title>A.S.A Movies | Results</title>
    <!-- External stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Internal styles for table -->
    <style>
        /* Styles for table */
        table {
            border-collapse: collapse;
            width: 70%;
        }

        /* Styles for table header and data cells */
        th,
        td {
            border: 2px solid black;
            padding: 5px;
            text-align: center;
        }

        /* Styles for table header */
        th {
            background-color: indianred;
        }
    </style>
</head>

<body>
    <!-- Center-aligned heading -->
    <center>
        <h2>{!! $title !!}</h2>
    </center>
    <!-- Center-aligned table -->
    <center>
        @include($partial)
    </center>
    <!-- Line breaks for spacing -->
    <br><br>
    <!-- Horizontal line -->
    <hr>
    <!-- Center-aligned button to navigate to home page -->
    <center>
        <p>
            <button type="button" onclick="window.location.href='{{ route('index') }}'">Home Page</button>
        </p>
    </center>
    <!-- Horizontal line -->
    <hr>
</body>

</html>
