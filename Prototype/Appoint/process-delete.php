<?php
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Include your database connection code here if not already included
$conn = new mysqli("localhost", "root", "", "clinic_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize input values
    $appointment_id = isset($_POST['appointment_id']) ? sanitize_input($_POST['appointment_id']) : "";

    // Delete the appointment from the database
    $delete_sql = "DELETE FROM appointment_tbl WHERE Appointment_Id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $appointment_id);
    $stmt->execute();
    $stmt->close();

    // Redirect back to Appoint.Online.php
    header("Location: Appoint.Online.php");
    exit();
} else {
    // If form is not submitted, redirect to Appoint.Online.php
    header("Location: Appoint.Online.php");
    exit();
}

// Close connection
$conn->close();
?>
