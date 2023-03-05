<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <style>
        body{
            background-origin: padding-box;
            background-color: aqua;
        }
        h2{
            text-align: center;
             text-decoration-color: black;
        }
        form{
            text-align: center;
            border: 1px;
            padding: 10px;
            color: black;
        }
    </style>
</head>

<body>
   
    <h2>User Registration Form</h2>
    <form method="POST" action="register.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <input type="submit" value="Register">
    </form>
</body>

</html>