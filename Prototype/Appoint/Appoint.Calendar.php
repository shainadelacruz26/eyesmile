<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Calendar</title>
    
    <!-- Include FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <style>
          body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        #calendar {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .fc-today-button {
            background-color: #FF6D33;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            margin-top: 10px;
        }


        .fc-button-group button {
            color: black;
        }

        .fc-state-active, .fc-state-active:hover, .fc-state-active:active {
            background-color: #FF6D33;
            color: #fff;
        }

      
    </style>
</head>
<body>

    <!-- Calendar Container -->
    <div id="calendar"></div>

    <script>
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: {
                    url: 'get-appointments.php', // URL to fetch events from
                    type: 'GET',
                    data: {
                        // Add any additional parameters here
                    },
                    error: function () {
                        alert('Error fetching events');
                    }
                },
                dayClick: function (date, jsEvent, view) {
                    // Handle day click event here
                    alert('Clicked on: ' + date.format());
                    // You can add logic to display details of appointments for the clicked day
                },
            });
        });
    </script>

</body>
</html>
