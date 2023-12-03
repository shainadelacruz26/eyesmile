<?php
// Include your database connection code here if not already included
$conn = new mysqli("localhost", "root", "", "clinic_management");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the default time zone
date_default_timezone_set('Asia/Manila');

// Define business hours and time slot duration
$businessDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
$startTime = strtotime('09:00');
$endTime = strtotime('16:30');
$timeSlotDuration = 30 * 60; // 30 minutes in seconds

// Fetch appointments data from the database
$sql = "SELECT Preferred_date, Preferred_time, Status, First_name, Middle_name, Last_name, Ext_name FROM appointment_tbl WHERE Status = 'Approved'";
$result = $conn->query($sql);

// Check for query execution errors
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Convert appointments data to FullCalendar-compatible JSON format
$events = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Assuming Preferred_time is in the format '9:00AM-9:30AM'
        list($start, $end) = explode('-', $row['Preferred_time']);
        $dateTime = new DateTime($row['Preferred_date'] . ' ' . $start);
        $dateTime->setTimeZone(new DateTimeZone('Asia/Manila'));

        // Construct the full name
        $fullName = $row['First_name'] . ' ' . $row['Middle_name'] . ' ' . $row['Last_name'] . ' ' . $row['Ext_name'];

        $events[] = [
            'title' => $fullName,
            'start' => $dateTime->format('Y-m-d\TH:i:s'),
            'end' => $dateTime->format('Y-m-d\TH:i:s'),
        ];
    }
} else {
    // Generate events for business hours and time slots
    foreach ($businessDays as $day) {
        $currentDateTime = strtotime('next ' . $day, $startTime);

        while ($currentDateTime <= $endTime) {
            $start = new DateTime(date('Y-m-d H:i', $currentDateTime));
            $start->setTimeZone(new DateTimeZone('Asia/Manila'));

            $end = $start->add(new DateInterval('PT' . $timeSlotDuration . 'S'));

            $events[] = [
                'title' => 'Available',
                'start' => $start->format('Y-m-d\TH:i:s'),
                'end' => $end->format('Y-m-d\TH:i:s'),
            ];

            $currentDateTime += $timeSlotDuration;  
        }
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($events);

// Close connection
$conn->close();
?>
