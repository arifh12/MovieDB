<table id='screening-table'>
  <!-- Table header row -->
  <tr>
      <th>Theater ID</th>
      <th>Movie ID</th>
      <th>Start Time</th>
      <th>Status</th>
  </tr>
  <!-- Table data rows -->
  @foreach ($screenings as $screening)
      <tr>
          <td>{{ $screening->t_id }}</td>
          <td>{{ $screening->m_id }}</td>
          <td>{{ $screening->start_time }}</td>
          <td>{{ $screening->status }}</td>
      </tr>
  @endforeach
</table>