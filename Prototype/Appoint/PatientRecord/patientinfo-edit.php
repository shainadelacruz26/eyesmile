<?php
// Function to calculate age based on birthdate
function calculateAge($birthdate) {
    $birthdateObj = new DateTime($birthdate);
    $currentDateObj = new DateTime();
    $ageInterval = $birthdateObj->diff($currentDateObj);
    return $ageInterval->y;
}

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Include your database connection code here if not already included
$conn = new mysqli("localhost", "root", "", "clinic_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch existing patient records from the database
$sql = "SELECT * FROM patient_tbl";
$result = $conn->query($sql);

// Check for query execution errors
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Display patient records in the table
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["patient_id"])) {
    // Assuming you have a variable $patient_id containing the patient ID
    $patient_id = $_GET["patient_id"]; // Replace with the actual patient ID

    // Query to retrieve patient details for editing
    $editQuery = "SELECT First_name, Middle_name, Last_name, Birthdate, Sex, Martial_status, Occupation, Telephone_no, Address, Email, Insurance, Insurance_id_no FROM patient_tbl WHERE Patient_Id = ?";
    $stmtEdit = $conn->prepare($editQuery);
    $stmtEdit->bind_param("i", $patient_id);
    $stmtEdit->execute();
    $stmtEdit->bind_result($edited_first_name, $edited_middle_name, $edited_last_name, $edited_birthdate, $edited_sex, $edited_marital_status, $edited_occupation, $edited_telephone_no, $edited_address, $edited_email, $edited_insurance, $edited_insurance_id_no);
    $stmtEdit->fetch();
    $stmtEdit->close();
}

// Handle form submission for updating patient data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Get the patient ID from the form submission
    $patient_id = sanitize_input($_POST["patient_id"]);

    // Assuming you have updated column names in your actual table
    $updateQuery = "UPDATE patient_tbl SET First_name=?, Middle_name=?, Last_name=?, Birthdate=?, Sex=?, Martial_status=?, Occupation=?, Telephone_no=?, Address=?, Email=?, Insurance=?, Insurance_id_no=? WHERE Patient_Id=?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param("sssssssssssss", $_POST["edited_first_name"], $_POST["edited_middle_name"], $_POST["edited_last_name"], $_POST["edited_birthdate"], $_POST["edited_sex"], $_POST["edited_marital_status"], $_POST["edited_occupation"], $_POST["edited_telephone_no"], $_POST["edited_address"], $_POST["edited_email"], $_POST["edited_insurance"], $_POST["edited_insurance_id_no"], $patient_id);


    $stmtUpdate->execute();
    $stmtUpdate->close();

    // Redirect back to Patient.Info.php or another page after updating
    header("Location: Patient.Record2.php?patient_id=" . $patient_id);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient Record</title>
    <link rel="stylesheet" href="patientinfo-edit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
</head>
<body>

    <!-- Add your HTML form for editing patient data here -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>"> <!-- Add this line to include the patient ID in the form submission -->
        <div class="content" id="patient-info-content">
            <div class="patient-info-container">

            <div class="info-container">
                <div class="left-info">
                <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">

                        <p><strong>First name:</strong> <input type="text" name="edited_first_name" value="<?php echo $edited_first_name; ?>"></p>
                        <p><strong>Last name:</strong> <input type="text" name="edited_last_name" value="<?php echo $edited_last_name; ?>"></p>
                        <p><strong>Middle name:</strong> <input type="text" name="edited_middle_name" value="<?php echo $edited_middle_name; ?>"></p>

                        <p><strong>Age:</strong> <?php echo calculateAge($edited_birthdate); ?></p>
                        <p><strong>Sex:</strong> <input type="text" name="edited_sex" value="<?php echo $edited_sex; ?>"></p>
                        <p><strong>Birthdate:</strong> <input type="date" name="edited_birthdate" value="<?php echo $edited_birthdate; ?>"></p>
                    </div>
                    <div class="right-info">
                        <p><strong>Martial Status:</strong> <input type="text" name="edited_marital_status" value="<?php echo $edited_marital_status; ?>"></p>
                        <p><strong>Occupation:</strong> <input type="text" name="edited_occupation" value="<?php echo $edited_occupation; ?>"></p>
                        <p><strong>Telephone No:</strong> <input type="text" name="edited_telephone_no" value="<?php echo $edited_telephone_no; ?>"></p>
                        <p><strong>Address:</strong> <input type="text" name="edited_address" value="<?php echo $edited_address; ?>"></p>
                    </div>
                </div>

                <hr>

                <div class="additional-info-container">
                    <h2 id="additional-info-h2">Additional Information:</h2>
                    <p><strong>Email:</strong> <input type="text" name="edited_email" value="<?php echo $edited_email; ?>"></p>
                    <p><strong>Insurance:</strong> <input type="text" name="edited_insurance" value="<?php echo $edited_insurance; ?>"></p>
                    <p><strong>Insurance ID Card No:</strong> <input type="text" name="edited_insurance_id_no" value="<?php echo $edited_insurance_id_no; ?>"></p>
                </div>

            </div>
            <button class="edit-button" type="submit" name="submit">
                <img src="Icon/Edit.svg" alt="Edit Icon"> Edit
            </button>
        </div>
    </form>

</body>
</html>
