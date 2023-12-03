<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">

    <style>
        body {
            background-color: #D7F1F6;
            font-family: 'Poppins', sans-serif;
        }

        .confirmation-box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
            max-width: 600px;
            margin-top: 50px;
            text-align: center; /* Center text in confirmation box */
        }

        .delete-button {
            background-color: #FF6D33;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px; /* Add margin to the top */
        }

        .delete-button:hover {
            background-color: #FF8533; /* Lighter shade on hover */
        }

        .cancel-button {
            background-color: #6C757D;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px; /* Add margin to the top */
        }

        .cancel-button:hover {
            background-color: #5A6268; /* Lighter shade on hover */
        }
    </style>
</head>
<body>

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

// Check if the appointment ID is set in the URL
if (isset($_GET['id'])) {
    // Get and sanitize the appointment ID
    $appointment_id = sanitize_input($_GET['id']);

    // Display confirmation box
    echo '<div class="confirmation-box">';
    echo '<h3>Are you sure you want to delete this appointment?</h3>';

    // Display buttons for confirmation and cancellation
    echo '<form method="post" action="process-delete.php">';
    echo '<input type="hidden" name="appointment_id" value="' . $appointment_id . '">';
    echo '<button type="submit" class="delete-button">Delete</button>';
    echo '<button type="button" class="cancel-button" onclick="window.location.href=\'Appoint.Online.php\'">Cancel</button>';
    echo '</form>';

    echo '</div>';

} else {
    // No appointment ID provided
    echo '<p>No appointment ID provided</p>';
}

// Close connection
$conn->close();
?>

</body>
</html>

<script src="Navbar.js"></script>
