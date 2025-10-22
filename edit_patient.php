<?php
include 'db.php';

// Get patient ID from URL
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM patients WHERE id=$id");
$row = $result->fetch_assoc();

// Handle update form submission
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $treatment = $_POST['treatment'];
  $cost = $_POST['cost'];
  $dentist = $_POST['dentist'];

  $sql = "UPDATE patients 
          SET name='$name', age='$age', treatment='$treatment', cost='$cost', dentist='$dentist' 
          WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Patient updated successfully!');
            window.location='index.php';
          </script>";
  } else {
    echo "<p style='color:red;'>Error updating record: " . $conn->error . "</p>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Patient</title>
  <style>
    /* === Modern Centered Form Styling === */
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
    <h2>🦷 Edit Patient</h2>
    <form method="POST">
      <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
      <input type="number" name="age" value="<?php echo $row['age']; ?>" required>
      <input type="text" name="treatment" value="<?php echo $row['treatment']; ?>" required>
      <input type="number" step="0.01" name="cost" value="<?php echo $row['cost']; ?>" required>
      <input type="text" name="dentist" value="<?php echo $row['dentist']; ?>" required>
      <input type="submit" name="update" value="Update">
      <a href="index.php">Cancel</a>
    </form>
  </div>
</body>
</html>
