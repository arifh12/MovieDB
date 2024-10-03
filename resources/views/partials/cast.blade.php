<table id='cast-table'>
  <!-- Table header row -->
  <tr>
      <th>Character Name</th>
      <th>Movie ID</th>
      <th>SSN</th>
      <th>Role</th>
      <th>Salary</th>
  </tr>
  <!-- Table data rows -->
  @foreach ($casts as $cast)
      <tr>
          <td>{{ $cast->char_name }}</td>
          <td>{{ $cast->m_id }}</td>
          <td>{{ $cast->per_ssn }}</td>
          <td>{{ $cast->role_name }}</td>
          <td>{{ "$".number_format($cast->salary, 2) }}</td>
      </tr>
  @endforeach
</table>