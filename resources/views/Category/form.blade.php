<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Complaint Category</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #e0eafc, #cfdef3);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background: white;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }

    h1 {
      text-align: center;
      color: #1c2649;
      margin-bottom: 25px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 6px;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #1c2649;
      color: white;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #39446c;
    }

    .back-link {
      margin-top: 20px;
      text-align: center;
    }

    .back-link a {
      text-decoration: none;
      color: #1c2649;
      font-weight: bold;
    }

    .back-link a:hover {
      text-decoration: underline;
      color: #39446c;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h1>Complaints Category</h1>
    <form action="{{ route('category.store') }}" method="post">
      @csrf
      <label for="categoryName">Category Name:</label>
      <input type="text" id="categoryName" name="Name" required>
      <input type="submit" value="Add Category">
    </form>
    <div class="back-link">
      <a href="{{ route('admin.dashboard') }}">Back to Dashboard</a>
    </div>
  </div>

</body>
</html>
