<?php include('includes/header.php');?>
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
    
   
   

    <div class="container-md shadow-lg bg-white p-5 justify-content-center mt-5 mb-4" id="cons">
           
    <button class="btn float-end" id="button" ><a href="users.php" style="text-decoration: none; color:white" >Back</a></button>
          
                <h1 class="fw-bold" style="color: #FF6D33;">Users List</h1>
                <div class="card-body">
                <form action="code.php" method="POST">

                <?php
                            $paramResult = checkParamId('id');
                            if(!is_numeric($paramResult)){
                                echo'<h5>'.$paramResult.'</h5>';
                                return false;
                            }

                            $user = getById('user',checkParamId('id'));
                            if($user['status'] == 200){
                                ?>

                        <input type="hidden" name="userId" value="<?=$user['data']['id'];?>"required>
                        <h2 class="mb-4 text-center orange"></h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Fisrt Name</label>
                                                <input type="text" name="first_name" value="<?=$user['data']['first_name'];?>" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" value="<?=$user['data']['last_name'];?>"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="text" name="email" value="<?=$user['data']['email'];?>"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone" value="<?=$user['data']['phone'];?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Password</label>
                                                <input type="password" name="pass" value="<?=$user['data']['password'];?>" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label>Select Role</label>
                                                <select name="role" class="form-select">
                                                    <option value="Select Role">Select Role</option>
                                                    <option value="admin" <?=$user['data']['user_type'] == 'admin' ? 'selected':'';?>>Admin</option>
                                                    <option value="optic" <?=$user['data']['user_type'] == 'optic' ? 'selected':'';?>>Optical</option>
                                                    <option value="staff"  <?=$user['data']['user_type'] == 'staff' ? 'selected':'';?>>Staff</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <select name="status" class="form-select">
                                                    <option selected disabled value="status">status</option>
                                                    <option value="0" <?= ($user['data']['status'] == 0) ? 'selected' : ''; ?>>Active</option>
                                                    <option value="1" <?= ($user['data']['status'] == 1) ? 'selected' : ''; ?>>Deactivate</option>
                                                    </select>
                                                </select>
                                            </div>
                                        </div>
    
                                        
                                        
                                        <div class="col-md-12" >
                                            <div class="mb-3 text-end" >
                                                <br>
                                                <button type="submit" name="updateUser" class="btn btn-submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                            }
                            else {
                                echo'<h5>'.$user['message'].'<h5>';
                            }
                        ?>  
                    </form>
                </div>
    
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