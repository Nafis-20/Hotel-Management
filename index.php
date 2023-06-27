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
                    <li><a class="current" href="index.php">Home</a></li>
                    <li><a href="booking.php">Booking</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="editProfSt.php">Edit Profile</a></li>
                    <li><a href="login.php">Logout</a></li>

                </ul>
            </div>
        </nav>

        <div id="showcase">
            <div class="container">
                <div class="showcase-content">
                    <h2 style="color:#ff6a3d;"><span class="text-primary">Hello</span> <?php echo $_SESSION['username']; ?> </h2>
                    <h1 style="color:#ff6a3d;"><span class="text-primary">Your</span> Dream Home</h1>
                    <p style="color: #FAB162; font-weight: bold; font-family: 'Josefin Sans', sans-serif; font-size: 30px;" class="lead">Live your Best hostel Moments <br> with our best of facilities.
                    </p>

                </div>
            </div>
        </div>
    </header>
    <section id="home-info" class="bg-dark">
        <div class="info-img"></div>
        <div class="info-content">
            <h2 style="color: rgba(225, 108, 35, 0.9);">About our Hostel</h2>
            <p>
                BNB, which was founded in 2001, is an experienced building and construction company that specializes in a wide range of sectors, including housing, commercial, industrial, and hospitality projects. BNB maintains its commitment to integrity, innovation,
                and strength, and it continues to provide quality development. BNB is playing a key role in restructuring the environments in which we live, work, and play, with an admirable record of success of making outstanding progress.
            </p>
        </div>
    </section>

</body>

</html>