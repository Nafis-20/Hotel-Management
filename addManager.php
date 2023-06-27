<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<html>

<head>

    <link rel="stylesheet" href="css/style2nd.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body data-new-gr-c-s-check-loaded="14.1017.0" data-gr-ext-installed="">

    <div id="mySidenav" class="sidenav">
        <p class="logo"><span>BNB</span>Residence</p>
        <a href="admin.php" class="icon-a"><i class="fa fa-dashboard icons"></i>Dashboard</a>
        <a href="adminStudent.php" class="icon-a"><i class="fa fa-users icons"></i>Student</a>
        <a href="adminManager.php" class="icon-a"><i class="fa fa-users icons"></i>Manager</a>
        <a href="addStudent.php" class="icon-a"><i class="fa fa-list icons"></i>Add Student</a>
        <a href="addManager.php" class="icon-a"><i class="fa fa-list icons"></i>Add Manager</a>
        <a href="logout.php" class="icon-a"><i class="fa fa-list-alt icons"></i>Logout</a>

    </div>
    <div id="main">

    <br><br><br>

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
                  <h3>You have added a manager successfully.</h3><br/>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='addManager.php'>add manager</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Add Manager</h1>

                            <div class="form-group">
                                <label>Username  :</label>&nbsp;
                                <input type="text" class="login-input" name="username" placeholder="Username" required />
                            </div><br>
                            <div class="form-group">
                                <label>Name      :</label>&nbsp;
                                <input type="text" class="login-input" name="name" placeholder="Name">
                            </div><br>
                            <div class="form-group">
                                <label>Email     :</label>&nbsp;
                                <input type="email" class="login-input" name="email" placeholder="Email Address">
                            </div><br>
                            <div class="form-group">
                                <label>Password  :</label>&nbsp;
                                <input type="password" class="login-input" name="password" placeholder="Password">
                            </div><br>
                            <div class="form-group">
                                <label>User type :</label>&nbsp;
                                <input type="radio" name="radio" value="manager" required />
                                <label for="html">Manager</label>
                            </div><br><br>

        <input type="submit" name="submit" value="Register" class="login-button">
    </form>
<?php
    }
?>
    </div>
</body>
</html>