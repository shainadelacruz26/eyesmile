
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Side | Online Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="Appoint.Online.css">
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
            <img src="Media/Logo/EyeSmile_Landscape.png" alt="Client Logo" class="z-n1">
        </div>
        <ul class="z-1">
            <li><a href="#"><img src="Media/Icon/Dashboard.svg" alt="Dashboard"> Dashboard</a></li>
            <li><a href="Payment.record.php"><img src="Media/Icon/Patient.svg" alt="Patient"> Patient</a></li>
            <li class="dropdown" id="appointment-dropdown">
                <a href="#"><img src="Media/icon/Appointment.svg" alt="Appointment"> Appointment</a>
                <div class="dropdown-content">
                <a href="Appoint.Walk-in.php">Walk-in Request</a>
                    <a href="Appoint.Online.php">Online Request</a>
                    <a href="Appoint.Calendar.php">Calendar</a>
                </div>
            </li>
            <li><a href="#"><img src="Media/icon/Reports.svg" alt="Reports"> Reports</a></li>
            <li><a href="#"><img src="Media/icon/Staff.svg" alt="Staff"> Staff</a></li>
            <li><a href="#"><img src="Media/icon/Settings.svg" alt="Settings"> Settings</a></li>
        </ul>
    </nav>

</head>

    <div class="table-container  p-5 mt-5">
        <div class="container p-5 bg-white m-5">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Name</th>
                    <th>Clinic</th>
                    <th>Type of Procedure</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Date Encoded</th>
                    <th>Action</th>
                
                </tr>
            </thead>
            <tbody>
            <?php
                $conn = new mysqli("localhost", "root", "", "clinic_management");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM appointment_tbl";

                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['Appointment_Id'] . '</td>';
                    echo '<td>' . $row['Status'] . '</td>';
                    echo '<td>' . $row['First_name'] . ' ' . $row['Last_name'] . '</td>';
                    echo '<td>' . $row['Clinic'] . '</td>';
                    echo '<td>' . $row['Type_of_procedure'] . '</td>';
                    echo '<td>' . $row['Preferred_date'] . '</td>';
                    echo '<td>' . $row['Preferred_time'] . '</td>';
                    echo '<td>' . $row['Date_encoded'] . '</td>';
                    echo '<td>';
                    // View button
                    echo '<div class="btn-group-vertical">';
                    echo '<a href="request-view-info.php?id=' . $row['Appointment_Id'] . '" class="btn btn-primary">View</a>';
                    // Edit button
                    echo '<a href="request-edit-info.php?id=' . $row['Appointment_Id'] . '" class="btn btn-warning">Edit</a>';
                    // Delete button
                    echo '<a href="request-delete-info.php?id=' . $row['Appointment_Id'] . '" class="btn btn-danger">Delete</a>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                }

                $conn->close();
                ?>
            </tbody>
        </table>
        </div>
    </div>


    
</body>

</html>

<script src="Navbar.js"></script>
