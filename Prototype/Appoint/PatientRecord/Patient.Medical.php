<?php
include "patientmedical-add.php"; // Include the file with the database connection

function calculateAge($birthdate) {
    $birthdateObj = new DateTime($birthdate);
    $currentDateObj = new DateTime();
    $ageInterval = $birthdateObj->diff($currentDateObj);
    return $ageInterval->y;
}

// Assuming you have a variable $patient_id containing the patient ID
$patient_id = 1; // Replace with the actual patient ID

// Query to retrieve patient details
$patientQuery = "SELECT First_name, Middle_name, Last_name, Birthdate, Sex, Martial_status, Telephone_no, Insurance_id_no FROM patient_tbl WHERE Patient_Id = ?";
$stmtPatient = $conn->prepare($patientQuery);
$stmtPatient->bind_param("i", $patient_id);
$stmtPatient->execute();
$stmtPatient->bind_result($first_name, $middle_name, $last_name, $birthdate, $sex, $marital_status, $telephone_no, $insurance_id_no);
$stmtPatient->fetch();
$stmtPatient->close();

// Calculate age
$age = calculateAge($birthdate);
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Patient.Medical.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"> <!-- Include Poppins font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Admin Side | Medical History</title>
</head>

<body>
    <div class="class" id="medicalHistory">
        <!-- Left side of the content -->
        <div class="container-lg row">
        <div class="container-lg row">
            <div class="col-6">
                <p>Name: <?php echo $first_name . ' ' . $middle_name . ' ' . $last_name; ?></p>
                <p>Age: <?php echo $age; ?></p>
                <p>Sex: <?php echo $sex; ?></p>
                <p>Birthdate: <?php echo $birthdate; ?></p>
            </div>
            <div class="col-6">
                <p>Marital Status: <?php echo $marital_status; ?></p>
                <p>Contact No. : <?php echo $telephone_no; ?></p>
                <p>Maxicare ID Card No. : <?php echo $insurance_id_no; ?></p>
                <p>Company Name : <?php // Add the company name if available ?></p>
            </div>
        </div>

        <hr>

        <h3 id="additional-info-h3">Additional Information</h3>
        <form action="patientmedical-add.php" method="post" enctype="multipart/form-data">
            <div id="additional-info-content" class="flex-container">
                <div id="left-additional-content" class="flex-item">
                    <label for="general-condition">General Condition:</label>
                    <textarea id="general-condition" name="general_condition"></textarea>

                    <br>
                    <label for="blood-pressure">Blood Pressure:</label>
                    <input type="text" id="blood-pressure" name="blood_pressure">

                    <br>
                    <label for="drugs">Drugs Being Taken:</label>
                    <input type="text" id="drugs" name="drugs_taken">

                    <br>
                    <label for="bleeding-history">Previous History of Bleeding:</label>
                    <input type="text" id="bleeding-history" name="history_of_bleeding">

                    <br>
                    <label for="allergies">Allergies:</label>
                    <input type="text" id="allergies" name="allergies">
                </div>

                <div id="middle-additional-content" class="flex-item">
                    <h3 id="additional-info-h3">Chronic Ailments</h3>
                    <label for="heart-disease">Heart Disease:</label>
                    <div id="heart-disease-options">
                        <label>
                            Yes
                            <input type="radio" id="heart-disease-yes" name="heart_disease" value="yes">
                        </label>

                        <label>
                            No
                            <input type="radio" id="heart-disease-no" name="heart_disease" value="no">   
                        </label>
                    </div>

                    <label for="hypertension">Hypertension:</label>
                    <div id="hypertension-options">
                        <label>
                            Yes
                            <input type="radio" id="hypertension-yes" name="hypertension" value="yes">
                        </label>

                        <label>
                            No
                            <input type="radio" id="hypertension-no" name="hypertension" value="no">
                        </label>
                    </div>

                    <label for="diabetes">Diabetes:</label>
                    <div id="diabetes-options">
                        <label>
                            Yes
                            <input type="radio" id="diabetes-yes" name="diabetes" value="yes">
                        </label>

                        <label>
                            No
                            <input type="radio" id="diabetes-no" name="diabetes" value="no">
                        </label>
                    </div>

                    <label for="bleeding-disorder">Bleeding Disorder:</label>
                    <div id="bleeding-disorder-options">
                        <label>
                            Yes
                            <input type="radio" id="bleeding-disorder-yes" name="bleeding_disorder" value="yes">
                        </label>

                        <label>
                            No
                            <input type="radio" id="bleeding-disorder-no" name="bleeding_disorder" value="no">
                        </label>
                    </div>

                    <label for="psychiatric-disorder">Psychiatric Disorder:</label>
                    <div id="psychiatric-disorder-options">
                        <label>
                            Yes
                            <input type="radio" id="psychiatric-disorder-yes" name="psychiatric_disorder" value="yes">
                        </label>

                        <label>
                            No
                            <input type="radio" id="psychiatric-disorder-no" name="psychiatric_disorder" value="no">
                        </label>
                    </div>
                </div>

                <div id="right-additional-content" class="flex-item">
                <label for="xray-records">X-ray records:</label>
                 <input type="file" id="xray-records" name="xray_records" accept="image/*" style="display: none;">
                <button id="choose-xray-img" onclick="document.getElementById('xray-records').click();">Choose File</button>
                <div id="images-container"></div>

                </div>
            </div>

            <h3>Note</h3>
            <textarea id="note" name="note"></textarea>
            <label id="date1" for="date" id="date1">Date:</label>
            <input type="date" id="date" name="date">

            <!-- Submit button -->
            <button id="submit-button" type="submit" name="submit">Submit</button>
        </form>

        <hr>
        <!-- Table with Date and Description -->
        <?php include "patient.notes.php"?>
    </div>
</body>

</html>
<script src="File_upload.js"></script>

