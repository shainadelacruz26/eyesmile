<?php
require '../config/function.php';

if (isset($_POST['saveUser'])) {
    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['pass']);
    $phone = validate($_POST['phone']);
    $role = validate($_POST['role']); // Fetch the role from the form
    $status = validate($_POST['status']);
 

    // Check if any of the required fields are empty
    if ($first_name != '' && $last_name != '' && $email != '' && $pass != '' && $phone != '' && $role != '' && $status != '' ) {
        // Establish database connection (assuming $conn is your connection variable)
        $conn = mysqli_connect("localhost", "root", "", "login_db");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // SQL query to insert user data using prepared statement
        $query = "INSERT INTO user (first_name, last_name, email, password,phone, user_type,status) VALUES (?, ?, ?, ?, ?,?,?)";

        // Prepare the SQL statement
        $stmt = mysqli_prepare($conn, $query);
        if ($stmt) {
            // Bind parameters to the query
            mysqli_stmt_bind_param($stmt, "sssssss", $first_name, $last_name, $email, $pass, $phone, $role,$status);

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

$paraResult = checkParamId('id');
if(is_numeric($paraResult)){

    $userId = validate($paraResult);

    $user = getById('user',$userId);
    if($user['status'] == 200) {

        $userDeleteRes = deleteQuery('user',$userId);
        if($userDeleteRes){
            redirect('users.php','User Deleted Successfully');
        }
    }else{
        redirect('users.php',$user['Something Went Wrong']);
    }
}else {
    redirect('users.php',$paraResult);
}
?>



