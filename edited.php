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
    
if(isset($_POST['updatebtn']))
{
    $username = $_POST['edit_username'];
    $name = $_POST['edit_name'];
    $email = $_POST['edit_email'];
    $user_type = $_POST['radio'];

    $query = "UPDATE users SET name='$name', email='$email', user_type='$user_type' WHERE username='$username'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
        echo "Your data is updated successfully";
    else
        echo "Failed to update your data";
}
?>
    </div>
</body>
</html>