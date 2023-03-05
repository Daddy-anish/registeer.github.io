<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "table";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user input from registration form
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

// Check if passwords match
if ($password != $confirm_password) {
    die("Passwords do not match.");
}

// Check if username or email already exists in database
$sql = "SELECT * FROM user WHERE username='$username' OR email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    die("Username or email already exists.");
}

// Hash password before storing in database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert new user into database
$sql = "INSERT INTO user (username, password, email) VALUES ('$username', '$hashed_password', '$email')";

if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
    header('Location: login.php');
    exit;

} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
