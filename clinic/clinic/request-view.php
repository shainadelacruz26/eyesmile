<?php include('includes/header.php');?>
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
<body>
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

    <?php
        $paramResult = checkParamId('id');
            if(!is_numeric($paramResult)){
                echo'<h5>'.$paramResult.'</h5>';
                return false;
        }

            $appoint= getById('appointment',$paramResult);
            if($appoint){
                if($appoint['status'] == 200){
            ?>
    <table id="example" class="table table-striped" style="width:100%; text-align:center">
          <tbody>
            <tr>
                <th>Last Name</th>
                <td><?= $appoint['data']['last_name']?></td>
            </tr>
            <tr>
                <th>First Name</th>
                <td><?= $appoint['data']['first_name']?></td>
            </tr>
            <tr>
                <th>Middle Name</th> 
                <td><?= $appoint['data']['middle_name']?></td> 
            </tr>
            <tr>
                <th>Extension Name</th> 
                <td><?= $appoint['data']['ext_name']?></td>
            </tr>
            <tr>
                <th>Phone</th> 
                <td><?= $appoint['data']['phone']?></td>
            </tr>
            <tr>
                <th>Phone</th> 
                <td><?= $appoint['data']['email']?></td>
            </tr>
            <tr>
                <th>Phone</th> 
                <td><?= $appoint['data']['clinic']?></td>
            </tr>
            
                
        
                
               
          
                <td><?= $appoint['data']['clinic']?></td>
                <td><?= $appoint['data']['insurance']?></td>
                <td><?= $appoint['data']['insurance_no']?></td>
                <td><?= $appoint['data']['insurance_exp']?></td>
                <td><?= $appoint['data']['procedure_type']?></td>
                <td><?= $appoint['data']['procedure_data']?></td>
                <td><?= $appoint['data']['procedure_time']?></td>

          </tbody>                      
    </table><?php
            }
            else{
                    echo"<h5>No Record Found</h5>";    
                }
                }
                ?>
</body>
</html>