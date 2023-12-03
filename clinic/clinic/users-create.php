<?php include('includes/header.php');?>
<?php include('includes/navbar.php');?>
<body style="background-color: #D7F1F6;">
    
    
   
    <div class="container-md shadow-lg bg-white p-5 justify-content-center mt-5 mb-4" id="cons">
           
    <button class="btn float-end" id="button" ><a href="users.php" style="text-decoration: none; color:white" >Back</a></button>
          
                <h1 class="fw-bold" style="color: #FF6D33;">Users List</h1>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <h2 class="mb-4 text-center orange"></h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>First Name</label>
                                                <input type="text" name="first_name"  class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="text" name="email"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Password</label>
                                                <input type="password" name="pass"  class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label>Select Role</label>
                                                <select name="role" class="form-select">
                                                    <option value="Select Role">Select Role</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="optic">Optical</option>
                                                    <option value="staff">Staff</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <select name="status" class="form-select">
                                                    <option selected disabled value="status">status</option>
                                                    <option value="active">active</option>
                                                    <option value="deactivate">deactivate</option>
                                                </select>
                                            </div>
                                        </div>
    
                                        
                                        
                                        <div class="col-md-12" >
                                            <div class="mb-3 text-end" >
                                                <br>
                                                <button type="submit" name="saveUser" class="btn btn-submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
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