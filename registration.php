<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="css/style1.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $name = $_POST['name'];
        $name = mysqli_real_escape_string($con, $name);
        $email    = $_POST['email'];
        $email    = mysqli_real_escape_string($con, $email);
        $password = $_POST['password'];
        $password = mysqli_real_escape_string($con, $password);
        $usertype = $_POST['radio'];
        $usertype = mysqli_real_escape_string($con, $usertype);
        $create_datetime = date("Y-m-d H:i:s");

        $query    = "INSERT into `users` (username, name, password, email, user_type, create_datetime)
                     VALUES ('$username', '$name', '" . md5($password) . "', '$email', '$usertype', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="name" placeholder="Name">
        <input type="email" class="login-input" name="email" placeholder="Email Address">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="radio" name="radio" value="admin" required />
        <label for="html">Admin</label>
        <input type="radio" name="radio" value="manager" required />
        <label for="html">Manager</label>
        <input type="radio" name="radio" value="student" required />
        <label for="html">Student</label>
        <br><br>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>