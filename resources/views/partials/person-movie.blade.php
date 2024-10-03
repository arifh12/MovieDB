<table>
  <!-- Table header row -->
  <tr>
    <th>SSN</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Movie ID</th>
    <th>Title</th>
    <th>Budget</th>
  </tr>
  <!-- Table data rows -->
  @foreach ($persons as $person)
      <tr>
        <td>{{ $person->per_ssn }}</td>
        <td>{{ $person->per_fname }}</td>
        <td>{{ $person->per_lname }}</td>
        <td>{{ $person->m_id }}</td>
        <td>{{ $person->m_title }}</td>
        <td>{{ "$" . number_format($person->budget, 2) }}</td>
      </tr>
  @endforeach
</table>