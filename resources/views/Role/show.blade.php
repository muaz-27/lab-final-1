<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Roles Data</title>
  <style>
    body {
      margin: 0;
      padding: 30px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #f3f4f6, #d7e1ec);
      color: #333;
    }

    h1 {
      text-align: center;
      color: #1c2649;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #1c2649;
      color: white;
    }

    tr:hover {
      background-color: #f1f5fb;
    }

    form {
      display: inline;
    }

    input[type="submit"] {
      background-color: #1c2649;
      color: white;
      padding: 8px 12px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #39446c;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 30px;
    }

    .back-link a {
      color: #1c2649;
      text-decoration: none;
      font-weight: bold;
      font-size: 16px;
    }

    .back-link a:hover {
      color: #39446c;
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <h1>Roles Data</h1>

  <table>
    <tr>
      <th>Name</th>
      <th>ID</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    @foreach($role as $role)
    <tr>
      <td>{{ $role->Name }}</td>
      <td>{{ $role->id }}</td>
      <td>
        <form action="{{ route('role.edit') }}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{ $role->id }}">
          <input type="submit" value="Edit">
        </form>
      </td>
      <td>
        <form action="{{ route('role.delete') }}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{ $role->id }}">
          <input type="submit" value="Delete">
        </form>
      </td>
    </tr>
    @endforeach
  </table>

  <div class="back-link">
    <a href="{{ route('admin.dashboard') }}">Back to Dashboard</a>
  </div>

</body>
</html>
