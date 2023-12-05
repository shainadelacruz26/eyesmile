<?php
require '../config/function.php';


// Function to generate a random reference number
function generateReferenceNumber() {
    $length = 12; // You can adjust the length of the reference number as needed
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Characters to use for the reference number
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

if (isset($_POST['saveAppoint'])) {
    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $middle_name = validate($_POST['middle_name']);
    $ext_name = validate($_POST['ext_name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $clinic = validate($_POST['clinic']);
    $insurance = validate($_POST['insurance']);
    $insurance_no = validate($_POST['insurance_no']);
    $insurance_exp = validate($_POST['insurance_exp']);
    $procedure_type = validate($_POST['procedure_type']);
    $preffered_date= validate($_POST['preffered_date']);
    $preffered_time= validate($_POST['preffered_time']);

    $reference_number = generateReferenceNumber();

 

    // Check if any of the required fields are empty
    if ($first_name != '' && $last_name != '' && $middle_name != '' && $ext_name != '' && $phone != '' && $email != '' && $clinic != '' && $insurance != '' &&  $insurance_no != '' && $insurance_exp != '' && $procedure_type != '' && $preffered_date !='' && $preffered_time !='' ) {
        // Establish database connection (assuming $conn is your connection variable)
        $conn = mysqli_connect("localhost", "root", "", "login_db");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // SQL query to insert user data using prepared statement
        $query = "INSERT INTO appointment (first_name, last_name,middle_name,ext_name,phone, email, clinic,insurance,insurance_no, insurance_exp,procedure_type,preffered_date,preffered_time,reference_no) VALUES (?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?)";

        // Prepare the SQL statement
        $stmt = mysqli_prepare($conn, $query);
        if ($stmt) {
            // Bind parameters to the query
            mysqli_stmt_bind_param($stmt, "ssssssssssssss", $first_name, $last_name,$middle_name, $ext_name,$phone, $email,$clinic, $insurance, $insurance_no, $insurance_exp, $procedure_type, $preffered_date,$preffered_time,$reference_number);

            // Execute the statement
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                redirect('index.php', 'User/Admin added successfully');
            } else {
                redirect('index.php', 'Something went wrong');
            }
        } else {
            redirect('index.php', 'Prepared statement error');
        }

        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        redirect('index.php', 'Please fill all the input fields');
    }
}


if (isset($_POST['updateUser'])) {
    $conn = mysqli_connect("localhost", "root", "", "login_db");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $first_name = validateInput($_POST['first_name']);
    $last_name = validateInput($_POST['last_name']);
    $email = validateInput($_POST['email']);
    $pass = validateInput($_POST['pass']);
    $phone = validateInput($_POST['phone']);
    $role = validateInput($_POST['role']);
    $status = validateInput($_POST['status']);
    $userId = validateInput($_POST['userId']);

    if ($first_name || $last_name || $email || $pass || $phone || $role || $status) {
        $user = getById('user', $userId);

        if ($user['status'] !== 200) {
            redirect('users-edit.php?id=' . $userId, 'No such id found');
        }

        $query = "UPDATE user SET 
                  first_name=?, 
                  last_name=?, 
                  email=?, 
                  password=?, 
                  phone=?, 
                  user_type=?, 
                  status=? 
                  WHERE id=?";

        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssssss", $first_name, $last_name, $email, $pass, $phone, $role, $status, $userId);

            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                redirect('users.php', 'Users/Admin Updated Successfully');
            } else {
                redirect('users-create.php', 'Something Went Wrong');
            }
        } else {
            redirect('users-create.php', 'Prepared statement error');
        }

        mysqli_stmt_close($stmt);
    } else {
        redirect('users-create.php', 'Please fill at least one input field');
    }

    mysqli_close($conn);
}

function validateInput($input)
{
    return htmlspecialchars(trim($input));
}