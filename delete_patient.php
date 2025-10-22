<?php
include 'db.php';

// Check if ID exists
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Security: ensure it's an integer

    // Check if patient exists
    $check = $conn->query("SELECT * FROM patients WHERE id = $id");
    if ($check->num_rows == 0) {
        echo "<script>alert('Patient not found!'); window.location='index.php';</script>";
        exit;
    }

    // Delete record
    $sql = "DELETE FROM patients WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Patient deleted successfully!'); window.location='index.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "<script>alert('No ID specified!'); window.location='index.php';</script>";
}
?>
