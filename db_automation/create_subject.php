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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve values from the form
    $subjectCode = $_POST["subject_code"];
    $subjectName = $_POST["subject_name"];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO subject_tbl (subject_code, subject_name) VALUES ('$subjectCode', '$subjectName')";

    if ($conn->query($sql) === true) {
        echo "Subject created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
