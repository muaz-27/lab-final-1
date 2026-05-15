<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Category Update</title>
  <style>
    body {
      margin: 0;
      padding: 40px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #e0eafc, #cfdef3);
      color: #333;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }

    .form-container {
      background-color: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      max-width: 500px;
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
      margin-bottom: 8px;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      margin-bottom: 20px;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #1c2649;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
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
      font-size: 16px;
    }

    .back-link a:hover {
      text-decoration: underline;
      color: #39446c;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h1>Update Category</h1>
    <form action="{{ route('category.update') }}" method="post">
      @csrf
      <label for="categoryName">Category:</label>
      <input type="text" id="categoryName" name="Name" value="{{ $edit->Name }}" required>

      <input type="hidden" name="id" value="{{ $edit->id }}">

      <input type="submit" value="Update">
    </form>

    <div class="back-link">
      <a href="{{ route('admin.dashboard') }}">Back to Dashboard</a>
    </div>
  </div>

</body>
</html>
