<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dentist Management System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <h2>🦷 Dentist Patient List</h2>

  <a href="add_patient.php">Add New Patient</a> |
  <a href="analytics.php">View Analytics</a>

  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Age</th>
      <th>Treatment</th>
      <th>Cost</th>
      <th>Dentist</th>
      <th>Actions</th>
    </tr>

    <?php
    $result = $conn->query("SELECT * FROM patients ORDER BY id DESC");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['treatment']}</td>
                    <td>₱{$row['cost']}</td>
                    <td>{$row['dentist']}</td>
                    <td>
                      <a href='edit_patient.php?id={$row['id']}'>Edit</a> |
                      <a href='delete_patient.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this patient?\")'>Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No patients found.</td></tr>";
    }
    ?>
  </table>

</body>
</html>
