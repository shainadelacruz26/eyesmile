<?php

$email = $_POST['email'];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ . "/config.php";

$sql = "UPDATE user
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

if ($mysqli->affected_rows) {
    $mail = require __DIR__ . "/mailer.php";

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END

    Click <a href="http://localhost:3000/reset-password.php?token=$token">here</a> 
    to reset your password.

    END;

    try {

        $mail->send();
    } catch (Exception $e) {

        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password?</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body style="background-color: #D7F1F6;">
    <div class="container-lg mx-auto mb-0 rounded shadow">
        <div class="row d-flex align-items-center bg-white">
            <div class="col-md-5 d-flex align-self-center bg-info justify-content-center">
                <img src="icons/groupedstaff.png" alt="dentist" class="img-fluid" id="im2">
            </div>
            <div class="col-md-7 p-5 bg-white rounded-end-2">
                    <h2>Message sent, please check your inbox.</h2>
                    <p class="fs-4">
                        You may now close this page once you have received the link...
                    </p>
            </div>
        </div>
    </div>
</body>

</html>


