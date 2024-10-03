<table>
  <!-- Table header row -->
  <tr>
      <th>SSN</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Date of Birth</th>
      <th>Gender</th>
      @if (isset($persons[0]->salary)) <th>Salary</th> @endif
  </tr>
  <!-- Table data rows -->
  @foreach ($persons as $person)
      <tr>
          <td>{{ $person->per_ssn }}</td>
          <td>{{ $person->per_fname }}</td>
          <td>{{ $person->per_lname }}</td>
          <td>{{ date('m/d/Y', strtotime($person->per_dob)) }}</td>
          <td>{{ $person->per_gender }}</td>
          @if (isset($person->salary)) <td>{{ "$".number_format($person->salary, 2) }}</td> @endif
      </tr>
  @endforeach
</table>