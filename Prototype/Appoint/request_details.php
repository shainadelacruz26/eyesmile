<?php
// Function to sanitize user input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Include your database connection code here if not already included

// Check if the appointment ID is set in the URL
if (isset($_GET['id'])) {
    // Get and sanitize the appointment ID
    $appointment_id = sanitize_input($_GET['id']);

    // Include your database connection code here if not already included
    $conn = new mysqli("localhost", "root", "", "clinic_management");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform database query to get appointment details
    $sql = "SELECT * FROM appointment_tbl WHERE Appointment_Id = $appointment_id";
    
    // Execute the query
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Fetch appointment details
        $row = $result->fetch_assoc();

        // Display appointment details
        echo '<div class="appointment-details">';
        echo '<p><strong>ID:</strong> ' . $row['Appointment_Id'] . '</p>';
        echo '<p><strong>Status:</strong> ' . $row['Status'] . '</p>';
        echo '<p><strong>Name:</strong> ' . $row['First_name'] . ' ' . $row['Last_name'] . '</p>';
        echo '<p><strong>Clinic:</strong> ' . $row['Clinic'] . '</p>';
        echo '<p><strong>Type of Procedure:</strong> ' . $row['Type_of_procedure'] . '</p>';
        echo '<p><strong>Preferred Date:</strong> ' . $row['Preferred_date'] . '</p>';
        echo '<p><strong>Preferred Time:</strong> ' . $row['Preferred_time'] . '</p>';
        echo '<p><strong>Date Encoded:</strong> ' . $row['Date_encoded'] . '</p>';
        echo '<p><strong>Email:</strong> ' . $row['Email'] . '</p>';
        echo '<p><strong>Contact No.:</strong> ' . $row['Contact_no'] . '</p>';
        echo '<p><strong>Insurance:</strong> ' . $row['Insurance'] . '</p>';
        echo '<p><strong>Insurance ID No.:</strong> ' . ($row['Insurance_id_no'] ? $row['Insurance_id_no'] : 'None') . '</p>';
        echo '<p><strong>Card Expiration Date:</strong> ' . ($row['Card_expiration'] ? $row['Card_expiration'] : 'None') . '</p>';
        echo '<p><strong>Reference Number:</strong> ' . $row['Reference_no'] . '</p>';
        echo '</div>';

       

        echo '</div>';
    } else {
        // No appointment found
        echo '<p>No appointment found with ID ' . $appointment_id . '</p>';
    }

    // Close connection
    $conn->close();
} else {
    // No appointment ID provided
    echo '<p>No appointment ID provided</p>';
}
?>
