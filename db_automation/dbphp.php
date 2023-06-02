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

// Registration process
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if user already exists
    $sql = "SELECT * FROM user_tbl WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Registration failed. User with the same email already exists.";
    } else {
        // Insert new user into User table
        $sql = "INSERT INTO user_tbl (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Login process
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists in User table
    $sql = "SELECT * FROM user_tbl WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row['role'] == 'instructor') {
            header("Location: instructor.html");
            exit();
        } elseif ($row['role'] == 'student') {
            header("Location: student.html");
            exit();
        }
    } else {
        echo "Login failed. Invalid credentials.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Registration & Login</title>
</head>
<body>
    <h1>Registration</h1>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <select name="role">
            <option value="student">Student</option>
            <option value="instructor">Instructor</option>
        </select><br>
        <input type="submit" name="register" value="Register">
    </form>

    <h1>Login</h1>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
