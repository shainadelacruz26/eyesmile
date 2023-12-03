<?php
require '../config/function.php';

if (isset($_POST['saveUser'])) {
    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['pass']);
    $role = validate($_POST['role']); // Fetch the role from the form
 

    // Check if any of the required fields are empty
    if ($first_name != '' && $last_name != '' && $email != '' && $pass != '' && $role != '') {
        // Establish database connection (assuming $conn is your connection variable)
        $conn = mysqli_connect("localhost", "root", "", "login_db");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // SQL query to insert user data using prepared statement
        $query = "INSERT INTO user (first_name, last_name, email, password, user_type) VALUES (?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = mysqli_prepare($conn, $query);
        if ($stmt) {
            // Bind parameters to the query
            mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $email, $pass, $role);

            // Execute the statement
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                redirect('users.php', 'User/Admin added successfully');
            } else {
                redirect('users-create.php', 'Something went wrong');
            }
        } else {
            redirect('users-create.php', 'Prepared statement error');
        }

        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        redirect('users-create.php', 'Please fill all the input fields');
    }
}
?>