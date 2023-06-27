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
                    <li><a class="current" href="booking.php">Booking</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="editProfSt.php">Edit Profile</a></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <?php
    $con = mysqli_connect("localhost","naffy","nafis123","my_db");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // When form submitted, insert values into the database.
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $name = $_POST['name'];
        $name = mysqli_real_escape_string($con, $name);
        $email    = $_POST['email'];
        $email    = mysqli_real_escape_string($con, $email);
        $roomtype = $_POST['radio'];
        $roomtype = mysqli_real_escape_string($con, $roomtype);
        $create_datetime = date("Y-m-d H:i:s");

        $query    = "INSERT into `roombook` (username, name, email, roomtype, booking_time)
                     VALUES ('$username', '$name', '$email', '$roomtype', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='container'>
            <p>Congratulations " . $_SESSION['username'] . "!</p>
            <h3>You have successfully applied for a room! Wait for the approval!</h3><br/>
                  </div>";
        } else {
            echo "<div class='container'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='booking.php'>book room</a> again.</p>
                  </div>";
        }
    } else {
    ?>
    <form class="form" action="" method="post">

        <section id="contact-form" class="py-3">
            <div class="container">
                <h1 class="l-heading"><span class="text-primary">Room Booking</span></h1>
                <p>Please fill in all spots so you can book a room!</p>

                <input type="text" class="login-input" name="username" placeholder="Username" required /><br><br>
                <input type="text" class="login-input" name="name" placeholder="Name"><br><br>
                <input type="email" class="login-input" name="email" placeholder="Email Address"><br><br>
                <label for="booking">What type of bed you want to book (double sharing/tripple sharing)?</label>
                <input type="radio" name="radio" value="double" required />
                <label for="html">Double bed</label>
                <input type="radio" name="radio" value="tripple" required />
                <label for="html">Tripple bed</label>
                <input type="submit" value="Submit" name="submit" class="login-button"/><br><br>

            </div>
        </section>
    </form>
    <section id="contact-info" class="bg-dark">
        <div class="container">
            <div class="box ">
                <i class="fas fa-hotel fa-3x"></i>
                <h3> Location</h3>
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