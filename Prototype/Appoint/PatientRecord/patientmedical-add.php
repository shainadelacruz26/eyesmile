<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // Retrieve data from the form
    $general_condition = isset($_POST['general_condition']) ? $_POST['general_condition'] : "";
    $blood_pressure = isset($_POST['blood_pressure']) ? $_POST['blood_pressure'] : "";
    $drugs_taken = isset($_POST['drugs_taken']) ? $_POST['drugs_taken'] : "";
    $history_of_bleeding = isset($_POST['history_of_bleeding']) ? $_POST['history_of_bleeding'] : "";
    $allergies = isset($_POST['allergies']) ? $_POST['allergies'] : "";
    $heart_diseases = isset($_POST['heart_disease']) ? 1 : 0;
    $diabetes = isset($_POST['diabetes']) ? 1 : 0;
    $cancer = isset($_POST['cancer']) ? 1 : 0; 
    $bleeding_disorder = isset($_POST['bleeding_disorder']) ? 1 : 0;
    $psychiatric_disorder = isset($_POST['psychiatric_disorder']) ? 1 : 0;
    $description = isset($_POST['note']) ? $_POST['note'] : "";
    $date = isset($_POST['date']) ? $_POST['date'] : "";

    // Prepare and execute the SQL query
    $sql = "INSERT INTO history_tbl (Patient_id, General_condition, Blood_pressure, Drugs_taken, History_of_bleeding, Allergies, Heart_diseases, Diabetes, Cancer, Bleeding_disorder, Psychiatric_disorder, Description, Date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssiiiiiss", $patient_id, $general_condition, $blood_pressure, $drugs_taken, $history_of_bleeding, $allergies, $heart_diseases, $diabetes, $cancer, $bleeding_disorder, $psychiatric_disorder, $description, $date);

    // Set parameters and execute
    $stmt->execute();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect to Medical.history.php after successful submission
    header("Location: Patient.Medical.php");
    exit();
}
?>