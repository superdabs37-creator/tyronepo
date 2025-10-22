<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Analytics</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>🦷 Dentist Analytics</h2>
<a href="index.php">Back</a>

<h3>1️⃣ Most Expensive Treatment</h3>
<?php
$sql = "SELECT name, treatment, cost 
        FROM patients 
        WHERE cost = (SELECT MAX(cost) FROM patients)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<div class='card'>Most Expensive: {$row['treatment']} ({$row['cost']}) by {$row['name']}</div>";
?>

<h3>2️⃣ Average Cost per Dentist</h3>
<?php
$sql = "SELECT dentist, 
        (SELECT AVG(cost) FROM patients p2 WHERE p2.dentist = p1.dentist) AS avg_cost
        FROM patients p1 GROUP BY dentist";
$result = $conn->query($sql);
echo "<table><tr><th>Dentist</th><th>Average Cost</th></tr>";
while($row = $result->fetch_assoc()) {
  echo "<tr><td>{$row['dentist']}</td><td>{$row['avg_cost']}</td></tr>";
}
echo "</table>";
?>
</body>
</html>
