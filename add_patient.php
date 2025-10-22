<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Patient</title>
  <style>
    /* === CSS Styling === */
    body {
      font-family: "Segoe UI", Arial, sans-serif;
      background-color: #f4f7fa;
      margin: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      background: white;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      width: 400px;
      text-align: center;
    }

    h2 {
      color: #007bff;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
    }

    input[type="text"],
    input[type="number"] {
      width: 90%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      outline: none;
      transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    input[type="number"]:focus {
      border-color: #007bff;
    }

    input[type="submit"],
    a {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 20px;
      border-radius: 6px;
      border: none;
      text-decoration: none;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: white;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    a {
      background-color: #6c757d;
      color: white;
    }

    a:hover {
      background-color: #5a6268;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>🦷 Add New Patient</h2>
    <form method="POST">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="number" name="age" placeholder="Age" required>
      <input type="text" name="treatment" placeholder="Treatment" required>
      <input type="number" step="0.01" name="cost" placeholder="Cost (₱)" required>
      <input type="text" name="dentist" placeholder="Dentist Name" required>
      <input type="submit" name="save" value="Save">
      <a href="index.php">Cancel</a>
    </form>

    <?php
    if (isset($_POST['save'])) {
      $name = $_POST['name'];
      $age = $_POST['age'];
      $treatment = $_POST['treatment'];
      $cost = $_POST['cost'];
      $dentist = $_POST['dentist'];

      $sql = "INSERT INTO patients (name, age, treatment, cost, dentist)
              VALUES ('$name', '$age', '$treatment', '$cost', '$dentist')";

      if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Patient added successfully!');
                window.location='index.php';
              </script>";
      } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
      }
    }
    ?>
  </div>
</body>
</html>
