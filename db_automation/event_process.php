<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form for creating a subject is submitted
if (isset($_POST['create_subject'])) {
    $subjectCode = $_POST['subject_code'];
    $subjectName = $_POST['subject_name'];

    // Insert the subject into the subject_tbl table
    $sql = "INSERT INTO subject_tbl (subject_code, subject_name) VALUES ('$subjectCode', '$subjectName')";

    if ($conn->query($sql) === TRUE) {
        $subjectId = $conn->insert_id;
        echo "Subject created successfully! Subject ID:  (note: refer to this id to create event into this subject)" . $subjectId . "<br>";
        echo '<a href="instructor.html"><button>Go Back</button></a>';
        echo '<a href="dbphp.php"><button>Go to Login and Register</button></a>';
    } else {
        echo "Error creating subject: " . $conn->error;
    }
}

// Create Event
if (isset($_POST['create'])) {
    $building_name = $_POST['building_name'];
    $room_number = $_POST['room_number'];
    $subject = $_POST['subject'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Insert new event into Event table
    $sql = "INSERT INTO event_tbl (building_name, room_number, subject_id, event_date, event_time) 
            VALUES ('$building_name', '$room_number', '$subject', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "Event created successfully!<br>";
        echo '<a href="instructor.html"><button>Go Back</button></a>';
        echo '<a href="dbphp.php"><button>Login and Register</button></a>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update Event
if (isset($_POST['update'])) {
    $event_id = $_POST['event_id'];
    $building_name = $_POST['building_name'];
    $room_number = $_POST['room_number'];
    $subject = $_POST['subject'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Update event in Event table
    $sql = "UPDATE event_tbl SET building_name='$building_name', room_number='$room_number', 
            subject_id='$subject', event_date='$date', event_time='$time' WHERE event_id='$event_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Event updated successfully!<br>";
        echo '<a href="instructor.html"><button>Go Back</button></a>';
        echo '<a href="dbphp.php"><button>Go to Login and Register</button></a>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete Event
if (isset($_POST['delete'])) {
    $event_id = $_POST['event_id'];

    // Delete event from Event table
    $sql = "DELETE FROM event_tbl WHERE event_id='$event_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Event deleted successfully!<br>";
        echo '<a href="instructor.html"><button>Go Back</button></a>';
        echo '<a href="dbphp.php"><button>Go to Login and Register</button></a>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
