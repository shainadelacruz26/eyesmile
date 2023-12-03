<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the request is a POST request (coming from the delete button)

    if (isset($_POST["historyId"])) {
        // Get the history ID from the POST request
        $historyId = $_POST["historyId"];

        // Prepare and execute the DELETE query
        $deleteSql = "DELETE FROM history_tbl WHERE History_Id = ?";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bind_param("i", $historyId);

        if ($deleteStmt->execute()) {
            // Successfully deleted the note
            echo "success";
        } else {
            // Error deleting the note
            echo "Error deleting note: " . $conn->error;
        }

        $deleteStmt->close();
    }
    exit(); // Exit to prevent rendering the HTML table after a deletion request
}

// Continue with the code to fetch and display notes in the HTML table
$sql = "SELECT History_Id, Date, Description FROM history_tbl WHERE Patient_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $patient_id);
$stmt->execute();
$stmt->bind_result($historyId, $noteDate, $noteDescription);

// Fetch and display the notes in the HTML table
echo '<table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';

while ($stmt->fetch()) {
    echo '<tr>
            <td>' . $noteDate . '</td>
            <td>' . $noteDescription . '</td>
            <td><button onclick="deleteNote(' . $historyId . ')">Delete</button></td>
          </tr>';
}

echo '</tbody>
    </table>';

$stmt->close();
$conn->close();
?>
<script>
function deleteNote(historyId) {
    if (confirm("Are you sure you want to delete this note?")) {
        // Perform an AJAX request to the server to delete the note
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Check the response for success or error
                    if (xhr.responseText === "success") {
                        alert("Note deleted successfully.");
                        // Reload the page or update the table after successful deletion
                        location.reload();
                    } else {
                        alert("Error deleting note: " + xhr.responseText);
                    }
                } else {
                    alert("Error: Unable to communicate with the server.");
                }
            }
        };
        xhr.open("POST", "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("historyId=" + historyId);
    }
}
<script>