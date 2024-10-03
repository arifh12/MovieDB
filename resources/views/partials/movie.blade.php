<table id='movie-table'>
  <!-- Table header row -->
  <tr>
      <th>Movie ID</th>
      <th>Title</th>
      <th>Date</th>
      <th>Synopsis</th>
      <th>Length</th>
      <th>Rating</th>
      <th>Category</th>
  </tr>
  <!-- Table data rows -->
  @foreach ($movies as $movie)
      <tr>
          <td>{{ $movie->m_id }}</td>
          <td>{{ $movie->m_title }}</td>
          <td>{{ date('m/d/Y', strtotime($movie->m_date)) }}</td>
          <td>{{ $movie->m_synopsis }}</td>
          <td>{{ $movie->m_length . ' mins' }}</td>
          <td>{{ $movie->rating_name }}
          <td>{{ $movie->cat_name }}</td>
      </tr>
  @endforeach
</table>