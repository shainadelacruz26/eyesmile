<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password?</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Attribution
    <a href="https://www.freepik.com/icon/dentist_846989">Icon by Kiranshastry</a>
    <a href="https://www.freepik.com/icon/doctor_847020#fromView=resource_detail&position=6">Icon by Kiranshastry</a>
     -->
</head>

<body style="background-color: #D7F1F6;">
    <div class="container-lg mx-auto mb-0 rounded shadow">
        <div class="row d-flex align-items-center bg-white">
            <div class="col-md-5 d-flex align-self-center bg-info justify-content-center">
                <img src="icons/groupedstaff.png" alt="dentist" class="img-fluid" id="im2">
            </div>
            <div class="col-md-7 p-5 bg-white rounded-end-2">
                <form action="send-password-reset.php" method="post">
                    <h3 class="">Forgot Password?</h3>
                    <p class="lead">
                        We'll send a link through email. 
                    </p>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control form-control-lg shadow-sm" id="" placeholder="Enter your email">
                    </div>
                    <input type="submit" name="submit" value="Send" class="btn w-100 p-2 fs-5 fw-bolder" id="btn1">
                </form>
            </div>
        </div>
    </div>
</body>

</html>