<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">

<style>
         body {
            background-color: #D7F1F6;
            font-family: 'Poppins', sans-serif;
        }

        .appointment-details {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
            max-width: 600px;
            margin-top: 50px;
            text-align: center; /* Center text in appointment details */
        }

        .close-button {
            background-color: #FF6D33;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px; /* Add margin to the top */
        }

        .close-button:hover {
            background-color: #FF8533; /* Lighter shade on hover */
        }
    </style>
</head>
<body>

    <!-- Your existing navigation and sidebar content -->

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

    // Check if the appointment ID is set in the URL
    if (isset($_GET['id'])) {
        // Get and sanitize the appointment ID
        $appointment_id = sanitize_input($_GET['id']);

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
            echo '<button type="button" class="close-button" onclick="window.location.href=\'Appoint.Online.php\'">Close</button>';
            echo '</div>';
            // Close connection
            $conn->close();
        } else {
            // No appointment found
            echo '<p>No appointment found with ID ' . $appointment_id . '</p>';
            // Close connection
            $conn->close();
            exit; // Stop further execution
        }
    } else {
        // No appointment ID provided
        echo '<p>No appointment ID provided</p>';
        // Close connection
        $conn->close();
        exit; // Stop further execution
    }
    ?>

    <!-- Close button to go back to Appoint.Online.php -->
   

    <!-- Your existing script imports and custom scripts -->

    <script src="Navbar.js"></script>

</body>
</html>
