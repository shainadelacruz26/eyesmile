<?php
// Function to calculate age based on birthdate
function calculateAge($birthdate) {
    $birthdateObj = new DateTime($birthdate);
    $currentDateObj = new DateTime();
    $ageInterval = $birthdateObj->diff($currentDateObj);
    return $ageInterval->y;
}

// Include your database connection code here if not already included
$conn = new mysqli("localhost", "root", "", "clinic_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the patient ID parameter is set in the URL
if (isset($_GET['patient_id'])) {
    // Retrieve patient ID from the URL
    $patient_id = $_GET['patient_id'];

    // Query to retrieve patient details based on the patient ID
    $patientQuery = "SELECT First_name, Middle_name, Last_name, Birthdate, Sex, Martial_status, Occupation, Telephone_no, Address, Email, Insurance, Insurance_id_no FROM patient_tbl WHERE Patient_Id = ?";
    $stmtPatient = $conn->prepare($patientQuery);
    $stmtPatient->bind_param("i", $patient_id);
    $stmtPatient->execute();
    $stmtPatient->bind_result($first_name, $middle_name, $last_name, $birthdate, $sex, $marital_status, $occupation, $telephone_no, $address, $email, $insurance, $insurance_id_no);
    $stmtPatient->fetch();
    $stmtPatient->close();
} else {
    // Handle the case where patient ID is not provided
    echo "Patient ID not provided.";
    exit();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Patient.info.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"> <!-- Include Poppins font -->
    <title>Admin Side | Patient Record</title>
</head>
<body>
    

        <div class="container-lg bg-white p-3">
            <div class="row">
                <div class="col-6">
                <p>Name: <?php echo $first_name . ' ' . $middle_name . ' ' . $last_name; ?></p>
                    <p>Age: <?php echo calculateAge($birthdate); ?></p>
                    <p>Sex: <?php echo $sex; ?></p>
                    <p>Birthdate: <?php echo $birthdate; ?></p>
                </div>
                <div class="col-6">
                <p>Martial Status: <?php echo $marital_status; ?></p>
                    <p>Occupation: <?php echo $occupation; ?></p>
                    <p>Telephone No: <?php echo $telephone_no; ?></p>
                    <p>Address: <?php echo $address; ?></p>
                </div>
            </div>

            <hr>

            <div>
            <h2 id="additional-info-h2">Additional Information:</h2>
                <p>Date Issued: <?php echo date("Y-m-d"); ?></p>
                <p>Email: <?php echo $email; ?></p>
                <p>Contact No: <?php echo $telephone_no; ?></p>
                <p>Maxicare Status: <?php echo $insurance; ?></p>
                <p>Maxicare ID Card No: <?php echo $insurance_id_no; ?></p>
                <a href="patientinfo-edit.php?patient_id=<?php echo $patient_id; ?>" class="edit-button">
            <img src="Icon/Edit.svg" alt="Edit Icon">
            Edit</a>
            </div>
        </div>
        



</body>
</html>