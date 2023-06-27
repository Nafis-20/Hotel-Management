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
        <a href="managerDash.php" class="icon-a"><i class="fa fa-dashboard icons"></i>Dashboard</a>
        <a href="managerRoomBook.php" class="icon-a"><i class="fa fa-users icons"></i>Booked Room</a>
        <a href="managerMessage.php" class="icon-a"><i class="fa fa-users icons"></i>Message</a>
        <a href="editProfMan.php" class="icon-a"><i class="fa fa-users icons"></i>Edit Profile</a>
        <a href="logout.php" class="icon-a"><i class="fa fa-list-alt icons"></i>Logout</a>

    </div>
    <div id="main">

    <br><br><br>

    <?php
    require('db.php');
    // When form submitted, insert values into the database.
    
    if(isset($_POST['delete_btn']))
    {
        $username = $_POST['delete_id'];
    
        $query = "DELETE FROM roombook WHERE username='$username'";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
            echo "Room booking rejected successfully";
        else
            echo "Failed to disapproved";
    }
?>
    </div>
</body>
</html>