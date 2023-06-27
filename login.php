<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="css/style1.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $usertype = stripslashes($_REQUEST['radio']);
        $usertype = mysqli_real_escape_string($con, $usertype);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE user_type='$usertype' AND username='$username'
                    AND password='" . md5($password) . "'";

        $result = mysqli_query($con, $query) or die(mysqli_connect_error());

        $rows = mysqli_num_rows($result);

        if ($rows == 1) {

            $logged_in_user = mysqli_fetch_assoc($result);

			if ($logged_in_user['user_type'] == 'admin')
            {
                $_SESSION['username'] = $username;
                // Redirect to user dashboard page
                header("Location: admin.php");
            }
            else if ($logged_in_user['user_type'] == 'manager')
            {
                $_SESSION['username'] = $username;
                // Redirect to user dashboard page
                header("Location: managerDash.php");
            }
            else if ($logged_in_user['user_type'] == 'student')
            {
                $_SESSION['username'] = $username;
                // Redirect to user dashboard page
                header("Location: index.php");
            }

        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    }
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="radio" name="radio" value="admin" required />
        <label for="html">Admin</label>
        <input type="radio" name="radio" value="manager" required />
        <label for="html">Manager</label>
        <input type="radio" name="radio" value="student" required />
        <label for="html">Student</label>
        <br><br>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
</body>
</html>