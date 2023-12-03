<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="Patient.Record.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <title>Admin Side | Patient Record</title>
    <script src="Navbar.js"></script>
</head>
<body style="background-color: #D7F1F6;">
<div id="header-container">
        <div id="content-header">

            <div id="navbar-toggle" onclick="toggleNavbar(event)">
                <i class="fas fa-bars fa-2x"></i>
            </div>

            <div id="profile-section">
                <div id="notification-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <img id="user-image" src="path/to/user-image.jpg" alt="User Image">
                <div id="user-name">John Doe</div>
            </div>
        </div>
    </div>
            
 
            
            <nav id="sidebar">
        <div id="logo" class="z-n1">
            <img src="Logo/EyeSmile_Landscape.png" alt="Client Logo" class="z-n1">
        </div>
        <ul class="z-1">
            <li><a href="#"><img src="Icon/Dashboard.svg" alt="Dashboard"> Dashboard</a></li>
            <li><a href="Payment.record.php"><img src="Icon/Patient.svg" alt="Patient"> Patient</a></li>
            <li class="dropdown" id="appointment-dropdown">
                <a href="#"><img src="Icon/Appointment.svg" alt="Appointment"> Appointment</a>
                <div class="dropdown-content">
                    <a href="Appoint.Walk-in.php">Walk-in Request</a>
                    <a href="Appoint.Online.php">Online Request</a>
                    <a href="Appoint.Calendar.php">Calendar</a>
                </div>
            </li>
            <li><a href="#"><img src="Icon/Reports.svg" alt="Reports"> Reports</a></li>
            <li><a href="#"><img src="Icon/Staff.svg" alt="Staff"> Staff</a></li>
            <li><a href="#"><img src="Icon/Settings.svg" alt="Settings"> Settings</a></li>
        </ul>
    </nav>
        <div class="container-lg mt-5">
    <nav>
        <div class="nav nav-tabs nav-fill " id="nav-tab" role="tablist">
          <button class="nav-link text-dark fw-semibold active" id="nav-personal-tab" data-bs-toggle="tab" data-bs-target="#nav-personal" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Personal Info</button>
          <button class="nav-link text-dark fw-semibold" id="nav-history-tab" data-bs-toggle="tab" data-bs-target="#nav-history" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Medical History</button>
          <button class="nav-link text-dark fw-semibold" id="nav-dental-tab" data-bs-toggle="tab" data-bs-target="#nav-dental" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Dental Charting</button>
          <button class="nav-link text-dark fw-semibold" id="nav-payment-tab" data-bs-toggle="tab" data-bs-target="#nav-payment" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Payment Record</button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-personal" role="tabpanel" aria-labelledby="nav-personal-tab" tabindex="0">
            <!--Personal info-->
            <?php include "Patient.Info.php"?>
        </div>
        <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab" tabindex="0">
            <!--Medical History-->
           
        </div>
        <div class="tab-pane fade" id="nav-dental" role="tabpanel" aria-labelledby="nav-dental-tab" tabindex="0">
            <!--Dental Charting-->

        </div>
        <div class="tab-pane fade" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab" tabindex="0">
            <!--Payment Record-->

        </div>
      </div>
</div>



</body>
</html>