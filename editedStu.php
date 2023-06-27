<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <title>BNB Residence</title>
</head>

<body>
    <header>
        <nav id="navbar">
            <div class="container">
                <h1 class="logo"><a href="index.php">BNB Residence</a></h1>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="booking.php">Booking</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a class="current" href="editProfSt.php">Edit Profile</a></li>
                    <li><a href="login.php">Logout</a></li>

                </ul>
            </div>
        </nav>
    </header>
    
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