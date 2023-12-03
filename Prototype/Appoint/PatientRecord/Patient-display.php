<?php
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
    
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $counter . "</td>";
    echo "<td>" . $row['First_name'] . " " . $row['Middle_name'] . " " . $row['Last_name'] . " " . $row['Ext_name'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "<td>" . $row['Telephone_no'] . "</td>";
    echo "<td>" . $row['Address'] . "</td>";
    echo "<td>" . ($row['Insurance'] === 'Yes' ? 'Yes' : 'No') . "</td>";
    echo "<td>";

    // Add a link to Patient.Info.php with the patient's ID as a parameter
    echo "<a href='Patient.Record2.php?patient_id=" . $row['Patient_Id'] . "' style='text-decoration: none;'>";
    echo "<button style='background-color: #0399FE;'><i class='fa-solid fa-eye' style='color: #ffffff;'></i></button>";
    echo "</a>";

    echo "<button style='background-color: #FF5050;'><i class='fa-solid fa-trash' style='color: #ffffff;'></i></button>";
    echo "</td>";
    echo "</tr>";

    $counter++;
}
    // Close connection
    $conn->close();
    ?>
    <!-- Additional rows go here -->