<?php
session_start();

// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "table";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if user has submitted the login form
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query the database to get user info
    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // Password matches, set session variables and redirect to secure page
            $_SESSION['username'] = $username;
            header('Location: secure_page.php');
        } else {
            // Password does not match
            echo "Invalid username or password.";
        }
    } else {
        // User does not exist
        echo "Invalid username or password.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form method="post" action="">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>

</html>