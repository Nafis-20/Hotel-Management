<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<!DOCTYPE html>
<html lang="en">

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
                    <li><a class="current" href="contact.php">Contact Us</a></li>
                    <li><a href="editProfSt.php">Edit Profile</a></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>

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
        $message = $_POST['message'];
        $message = mysqli_real_escape_string($con, $message);
        $create_datetime = date("Y-m-d H:i:s");

        $query    = "INSERT into `contact` (username, name, email, message, message_time)
                     VALUES ('$username', '$name', '$email', '$message', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='container'>
            <p>Hey, " . $_SESSION['username'] . "!</p>
            <h3>We have recieved your message. We will contact with you soon!</h3><br/>
                  </div>";
        } else {
            echo "<div class='container'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='contact.php'>message</a> again.</p>
                  </div>";
        }
    } else {
    ?>

    <form class="form" action="" method="post">

        <section id="contact-form" class="py-3">
            <div class="container">
                <h1 class="l-heading"><span class="text-primary">Contact </span> Us</h1>
                <p>Please fill in all spots so you can contact us</p>
                
                <input type="text" class="login-input" name="username" placeholder="Username" required /><br><br>
                <input type="text" class="login-input" name="name" placeholder="Name"><br><br>
                <input type="email" class="login-input" name="email" placeholder="Email Address"><br><br>
                <input type="text" class="login-input" name="message" placeholder="Message"><br><br>
                <input type="submit" value="Submit" name="submit" class="login-button"/><br><br>
            </div>
        </section>
    </form>
    <section id="contact-info" class="bg-dark">
        <div class="container">
            <div class="box ">
                <i class="fas fa-hotel fa-3x"></i>
                <h3>Location</h3>
                <p>Jalan Rotan, Taman Sri Pulai, 81112 Johor Bahru, Johor, Malaysia</p>
            </div>
            <div class="box">
                <i class="fas fa-phone fa-3x"></i>
                <h3>Contact:</h3>
                <p>+60 3736-2012 78</p>
            </div>
            <div class="box ">
                <i class="fas fa-envelope fa-3x"></i>
                <h3 style="text-align:center;">Email Address</h3>
                <p style="text-align:center ;">bnbresidence22@gmail.com</p>
            </div>
        </div>

    </section>

</body>

</html>

<?php
    }
?>