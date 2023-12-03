<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/config.php";

    $sql = sprintf(
        "SELECT * FROM user
        WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        // Check if the entered password matches the stored password
        if (password_verify($_POST['password'], $user['password'])) {
            session_start();
            // Session setup and other operations...

            include_once('connection.php');
            if (isset($_REQUEST['login'])) {
                $email = $_REQUEST['email'];
                $select_query = mysqli_query($connection, "select * from user where email='$email'");
                $res = mysqli_num_rows($select_query);
                if ($res > 0) {
                    $data = mysqli_fetch_array($select_query);
                    $name = $data['first_name'];
                    $_SESSION['name'] = $name;
                    $otp = rand(10000, 99999);   //Generate OTP

                    $message = '<div>
                        <p><b>Hello!</b></p>
                        <p>You are receiving this email because we received an OTP request for your account.</p>
                        <br>
                        <p>Your OTP is: <b>' . $otp . '</b></p>
                        <br>
                        <p>If you did not request an OTP, no further action is required.</p>
                        </div>';
                    $email = $email;

                    $mail = require __DIR__ . "/mailer.php";
                    $mail->AddAddress($email);
                    $mail->Subject = "OTP";
                    $mail->isHTML(TRUE);
                    $mail->Body = $message;
                    if ($mail->send()) {
                        $insert_query = mysqli_query($connection, "insert into otp_check set otp='$otp', is_expired='0'");
                        header('location:otpverify.php');
                        exit(); // Terminate script after redirection
                    } else {
                        $msg = "Email not delivered";
                    }
                } else {
                    $msg = "Invalid Email";
                }
            }
        } else {
            // Incorrect password, set a message or handle it accordingly
            $is_invalid = true; // Set the flag for displaying an invalid login message
        }
    }

    $is_invalid = true; // Set the flag for displaying an invalid login message
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head content remains unchanged -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>

<body style="background-color: #D7F1F6;">
   <div class="container-lg bg-info mx-auto mb-4 rounded shadow">
        <div class="row d-flex align-items-end">
            <form class="col-md-7 p-5 bg-white rounded-start-2" action="" method="post">
        
                <img src="logo/EyeSmile_Horitzontal.png" alt="Client Logo" class="img-fluid">
             
                <?php if ($is_invalid) : ?>
                    <h5 class="p-2 text-danger  my-2 w-0">Invalid login. Please check your email and password.</h5>
                <?php endif; ?>
                
                <div class="mb-3">
                    <input type="text" name="email" class="form-control form-control-lg shadow-sm" id="" placeholder="Email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control form-control-lg shadow-sm" id="" placeholder="Password">
                </div>
                <p class="text-end pe-2"><a href="forgot-password.php" class="link-primary" target="_blank">Forgot Password?</a></p>
                <input type="submit" name="login" value="Login" class="btn w-100 p-2 fs-5 fw-bolder" id="btn1">

              
            </form>

            <div class="col-md-5 d-none d-md-block align-self-center justify-content-center ps-5">
                <img src="icons/dentist.png" alt="dentist" class="img-fluid" id="im2">
            </div>
        </div>
    </div>
 
</body>

</html>