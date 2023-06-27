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

        <div class="head">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; color: white;" class="nav">☰ Dashboard</span>
                <span style="font-size:30px;cursor:pointer; color: white;" class="nav2">☰ Dashboard</span>
            </div>

            <div class="col-div-6">

            </div>
            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
        <br>

        <div class="col-div-3">
            <div class="box">
                <p>
                <?php 
                $con = mysqli_connect("localhost","naffy","nafis123");
                mysqli_select_db($con, "my_db");
                $sql = "SELECT * FROM users WHERE user_type = 'student'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                echo $count;
                ?>
                <br><span>Student</span></p>
                <i class="fa fa-users box-icon"></i>
            </div>
        </div>
        <div class="col-div-3">
            <div class="box">
                <p>
                <?php 
                $con = mysqli_connect("localhost","naffy","nafis123");
                mysqli_select_db($con, "my_db");
                $sql = "SELECT * FROM users WHERE user_type = 'manager'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                echo $count;
                ?>    
                <br><span>Manager</span></p>
                <i class="fa fa-list box-icon"></i>
            </div>
        </div>


        <div class="clearfix"></div>
        <br><br>

    </div>

</body>

</html>