<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Patient.Record.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    
    <title>Admin Side | Patient Record</title>
    <script src="Navbar.js"></script>
</head>
<body>
    <div class="container-fluid">
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
            <nav id="sidebar">
                <div id="logo" class="z-n1">
                    <img src="Logo/EyeSmile_Landscape.png" alt="Client Logo" class="z-n1">
                </div>
                <ul class="z-1">
                    <li><a href="#"><img src="Icon/Dashboard.svg" alt="Dashboard"> Dashboard</a></li>
                    <li><a href="#"><img src="Icon/Patient.svg" alt="Patient"> Patient</a></li>
                    <li><a href="#"><img src="icon/Appointment.svg" alt="Appointment"> Appointment</a></li>
                    <li class="dropdown" id="appointment-dropdown">
                <a href="#"><img src="Media/icon/Appointment.svg" alt="Appointment"> Appointment</a>
                <div class="dropdown-content">
                <a href="Appoint.Walk-in.php">Walk-in Request</a>
                    <a href="Appoint.Online.php">Online Request</a>
                    <a href="Appoint.Calendar.php">Calendar</a>
                </div>
                    <li><a href="#"><img src="icon/Reports.svg" alt="Reports"> Reports</a></li>
                    <li><a href="#"><img src="icon/Staff.svg" alt="Staff"> Staff</a></li>
                    <li><a href="#"><img src="icon/Settings.svg" alt="Settings"> Settings</a></li>
                </ul>
            </nav>
        </div>
        <div class="cons">
            <div class="sam">
                <h3><span style="color: #0C6AD9;">Patient Record</h3>
                <button onclick="window.location.href='patient-add.php'">Add Patient</button>
            </div>
            <div class="container2">
                <div class="h"></div>
                <div class="tbl">
                    <table>
                        <h1 class="pat">Patients</h1>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No.</th>
                            <th>Address</th>
                            <th>Insurance</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                           <?php include "patient-display.php"?>;
                                  
                            </td>
                        </tr>
                        <!-- Additional rows go here -->
                    </table>
                    <nav class="d-flex justify-content-end mt-5" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</body>
</html>