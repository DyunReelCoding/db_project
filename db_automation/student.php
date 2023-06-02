<!DOCTYPE html>
<html>
<head>
    <title>Student Page</title>
</head>
<body>
    <h1>Welcome, Student!</h1>

    <h2>Event Schedule</h2>
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

    // Retrieve events from Event table
    $sql = "SELECT * FROM event_tbl";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Building Name</th>";
        echo "<th>Room Number</th>";
        echo "<th>Subject</th>";
        echo "<th>Date</th>";
        echo "<th>Time</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['building_name'] . "</td>";
            echo "<td>" . $row['room_number'] . "</td>";
            echo "<td>" . $row['subject_id'] . "</td>";
            echo "<td>" . $row['event_date'] . "</td>";
            echo "<td>" . $row['event_time'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No events found";
    }

    $conn->close();
    ?>

    <form action="dbphp.php" method="post">
        <input type="submit" value="Logout">
    </form>
</body>
</html>
