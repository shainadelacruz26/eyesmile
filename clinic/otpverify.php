<?php
session_start();

include_once('connection.php');

$msg = '';

if (isset($_POST['otp_verify'])) {
    $otp = $_POST['otp'];

    $stmt = $connection->prepare("SELECT * FROM otp_check WHERE otp = ? AND is_expired != 1 AND NOW() <= DATE_ADD(create_at, INTERVAL 5 MINUTE)");
    $stmt->bind_param("s", $otp);
    $stmt->execute();

    $result = $stmt->get_result();
    $count = $result->num_rows;

    if ($count > 0) {
        $update_query = $connection->query("UPDATE otp_check SET is_expired = 1 WHERE otp = '$otp'");

        if ($update_query) {
            header('location:clinic/index.php');
            exit();
        } else {
            $msg = "Error updating OTP status!";
        }
    } else {
        $msg = "Invalid OTP or OTP has expired!";
    }
}
?>

<html>
<head>
  <title>OTP Verify</title>
</head>
<style>
  .error {
    color: red;
    font-weight: 700;
  }
</style>
<link rel="stylesheet" href="login.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
 integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<body style="background-color: #D7F1F6;">
    <div class="container-lg mx-auto mb-0 rounded shadow">
        <div class="row d-flex align-items-center bg-white">
            <div class="col-md-5 d-flex align-self-center bg-info justify-content-center">
                <img src="icons/groupedstaff.png" alt="dentist" class="img-fluid" id="im2">
            </div>
            <div class="col-md-7 p-5 bg-white rounded-end-2">
                <form action="otpverify.php" method="post">
                    <h3 class="">Email Verification</h3>
                    <p class="lead">
                        We sent a code to your email for verification.
                    </p>
                    <div class="mb-3">
                        <input type="text" name="otp" class="form-control form-control-lg shadow-sm" id="otp" placeholder="Enter your OTP code"
                               required data-parsley-type="otp" data-parsley-trigger="keyup">
                    </div>
                    <input type="submit" name="otp_verify" value="Submit" class="btn w-100 p-2 fs-5 fw-bolder" id="btn1">
                    <p class="error"><?php if (!empty($msg)) {
                        echo $msg;
                    } ?></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>