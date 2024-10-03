<table>
    <!-- Table header row -->
    <tr>
        <th>Movie ID</th>
        <th>Title</th>
        <th>Budget</th>
    </tr>
    <!-- Table data rows -->
    @foreach ($movies as $movie)
        <tr>
            <td>{{ $movie->m_id }}</td>
            <td>{{ $movie->m_title }}</td>
            <td>{{ "$" . number_format($movie->budget, 2) }}</td>
        </tr>
    @endforeach
</table>
