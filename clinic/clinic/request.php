<?php include('includes/header.php');
$requests = getAll('appointment'); // Assuming your table name is 'users'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Appointment Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https:/cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">




<!-- Font Awesome CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
   integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
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

        <nav id="sidebar">
            <div id="logo" class="z-n1">
                <img src="logo/EyeSmile_Horitzontal.png" alt="Client Logo" class="z-n1">
            </div>
            <ul class="z-1">
                <li><a href="#"><img src="Icon/Dashboard.svg" alt="Dashboard"> Dashboard</a></li>
                <li><a href="#"><img src="Icon/Patient.svg" alt="Patient"> Patient</a></li>
                <li><a href="#"><img src="icon/Appointment.svg" alt="Appointment"> Appointment</a></li>
                <li><a href="#"><img src="icon/Reports.svg" alt="Reports"> Reports</a></li>
                <li><a href="#"><img src="icon/Staff.svg" alt="Staff"> Staff</a></li>
                <li><a href="#"><img src="icon/Settings.svg" alt="Settings"> Settings</a></li>
            </ul>
        </nav>
    </div>
    
   
   

    <div class="container-xl shadow-lg bg-white p-5 justify-content-center mt-5" id="cons" >
                <?= alertMessage();?>

                <h1 class="fw-bold" style="color: #FF6D33;">Online Appointment Requests</h1>
                <table id="example" class="table table-striped" style="width:100%; text-align:center">
                    <thead style="width: max-content;">
                        <tr>
                            <th>ID</th>
                            <th>Appointment Number</th>
                            <th>Patient Name</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if ($requests && mysqli_num_rows($requests) > 0) {
                        while ($row = mysqli_fetch_assoc($requests)) {
                        
                    ?>
                         
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['reference_no']; ?></td>
                            <td><?= $row['first_name'] . ' ' . $row['last_name']. ' ' . $row['middle_name']. ' ' . $row['ext_name']; ?></td>
                            <td><?= $row['phone']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['status']; ?></td>
                      
                            
                            <td>
                            <a href="request-view.php?id=<?= $row['id']; ?>" class="btn btn-primary" style="background-color: #0399FE;">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="request-delete.php?id=<?= $row['id']; ?>" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this record?')"
                            style="background-color: #FF5050;">
                                <i class="fa-solid fa-trash"></i>
                            </a></td>
                        </tr>
         
         
                    <?php
                        }
                    } else {
                        echo '<tr><td colspan="6">No users found</td></tr>';
                    }
                    ?>
                          
                    </tbody>
                        
                </table>
            </div>
    </div>
    
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $('#example').DataTable({
            "lengthMenu":[
                [5,10,15,20,25,50,-1],
                [5,10,15,20,25,50,"All"]
            ]
        });
    });
</script>
</html>