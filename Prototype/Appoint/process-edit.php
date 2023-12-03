<?php
// Function to sanitize user input
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
    $status = isset($_POST['status']) ? sanitize_input($_POST['status']) : "";
    $preferred_date = isset($_POST['preferred_date']) ? sanitize_input($_POST['preferred_date']) : "";
    $preferred_time = isset($_POST['preferred_time']) ? sanitize_input($_POST['preferred_time']) : "";

    // Prepare and bind update statement
    $update_sql = "UPDATE appointment_tbl SET Status = ?";
    $types = "s";
    $values = [$status];

    // If status is "Rescheduled," add Preferred Date and Preferred Time to the update statement
    if ($status == "Rescheduled") {
        $update_sql .= ", Preferred_date = ?, Preferred_time = ?";
        $types .= "ss";
        $values[] = $preferred_date;
        $values[] = $preferred_time;
    }

    $update_sql .= " WHERE Appointment_Id = ?";
    $types .= "i";
    $values[] = $appointment_id;

    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param($types, ...$values);
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
