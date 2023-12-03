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
            text-align: center;
        }

        .form-label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        #rescheduled-fields {
            margin-top: 15px;
        }

        #rescheduled-fields label,
        #rescheduled-fields input,
        #rescheduled-fields select {
            margin-top: 5px;
        }

        .button-container {
            margin-top: 20px;
        }

        .save-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .save-button:hover {
            background-color: #45a049;
        }

        .close-button {
            background-color: #FF6D33;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        .close-button:hover {
            background-color: #FF8533;
        }
    </style>
</head>

<body>

    <?php
    function sanitize_input($data)
    {
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
            // ... (existing code)

            // Display the form for editing
            echo '<form method="post" action="process-edit.php">';
            echo '<input type="hidden" name="appointment_id" value="' . $row['Appointment_Id'] . '">'; // Add this line to include the appointment ID in the form submission

            echo '<label class="form-label" for="status">Status:</label>';
            echo '<select class="form-control" name="status" id="status">';
            echo '<option value="Approved">Approved</option>';
            echo '<option value="Denied">Denied</option>';
            echo '<option value="Rescheduled">Rescheduled</option>';
            echo '</select>';

            // Additional fields for Rescheduled status
            echo '<div id="rescheduled-fields">';
            echo '<label class="form-label" for="preferred_date">Preferred Date:</label>';
            echo '<input class="form-control" type="date" name="preferred_date" id="preferred_date" value="' . $row['Preferred_date'] . '">';

            echo '<label class="form-label" for="preferred_time">Preferred Time:</label>';
            echo '<select class="form-control" name="preferred_time" id="preferred_time">';
            $timeOptions = ["9:00AM-9:30AM", "9:30AM-10:30AM", "10:30AM-11:00AM", "11:00AM-11:30AM", "11:30AM-12:00PM", "12:00PM-12:30PM", "12:30PM-1:30PM", "1:30PM-2:00PM", "2:00PM-2:30PM", "3:00PM-3:30PM", "3:30PM-4:00PM", "4:00PM-4:30PM"];
            foreach ($timeOptions as $timeOption) {
                $selected = ($timeOption === $row['Preferred_time']) ? 'selected' : '';
                echo '<option value="' . $timeOption . '" ' . $selected . '>' . $timeOption . '</option>';
            }
            echo '</select>';
            echo '</div>';

            echo '<div class="button-container">';
            echo '<button class="btn btn-success save-button" type="submit">Save Changes</button>';
            echo '<button class="btn btn-secondary close-button" type="button" onclick="window.location.href=\'Appoint.Online.php\'">Close</button>';
            echo '</div>';
            echo '</form>';

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
        // Close connection
        $conn->close();
    }
    ?>

</body>

</html>

<script src="Navbar.js"></script>
