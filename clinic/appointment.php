<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services</title>
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: #D7F1F6;">
  
     

        <!-- Navbar -->
  <nav class="navbar navbar-expand-lg py-3 bg-white shadow sticky-top">
    <div class="container">
      <a class="navbar-brand" href="">
        EyeSmile
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="appointment.php">Appointment</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    </div>
    
   
   

    <div class="container-md shadow-lg bg-white p-5 justify-content-center mt-5 mb-4" id="cons">
           

          
                <h1 class="fw-bold" style="color: #FF6D33;">Walk In Appointment</h1>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <h2 class="mb-4 text-center orange"></h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Fisrt Name</label>
                                                <input type="text" name="first_name"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Middle Name</label>
                                                <input type="text" name="middle_name"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Extension Name</label>
                                                <input type="text" name="ext_name"  class="form-control" required>
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
                                                <label>Email</label>
                                                <input type="email" name="email"  class="form-control" required>
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-6">
                                            <label>Clinic</label>
                                            <div class="mb-3">
                                                <select name="clinic" class="form-select" required>
                                                    <option disabled selected>Clinic</option>
                                                    <option value="clinic1">Dental Clinic</option>
                                                    <option value="clinic2">Optical Clinic</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Procedure</label>
                                            <div class="mb-3">
                                                <select name="procedure_type" class="form-select" required>
                                                    <option disabled selected >procedure</option>
                                                    <option value="procedure1">Check Up</option>
                                                    <option value="procedure2">Cleaning</option>
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="col-md-4">
                                            <label>Insurance</label>
                                            <div class="mb-3">
                                                <select name="insurance" class="form-select" required>
                                                    <option disabled selected >Insurance</option>
                                                    <option value="maxicare">Maxicare</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Insurance No.</label>
                                                <input type="text" name="insurance_no"  class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Insurance Expiration Date</label>
                                                <input type="date" name="insurance_exp"  class="form-control" required>
                                            </div>
                                        </div>
                                            <div class="col-md-6" >
                                                <div class="mb-3 ">
                                                    <label>Preffered Date</label>
                                                    <input type="date" name="preffered_date" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Preffered Time</label>
                                                <div class="mb-3">
                                                    <select name="preffered_time" class="form-select" required>
                                                        <option disabled selected>Preffered Time</option>
                                                        <option value="10:00:00">10:00 am - 11:00 am</option>
                                                        <option value="11:00:00">11:00 am - 12:00 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                       
                                        
                                        <div class="col-md-12" >
                                            <div class="mb-3 text-end" >
                                                <br>
                                                <button type="submit" name="saveAppoint" class="btn btn-submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                    </form>
                </div>
    
            </div>
    </div>
    
</body>


</html>