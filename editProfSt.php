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

                $username = $_SESSION['username'];
                
                $query = "SELECT * FROM users WHERE username = '$username'";
                $query_run = mysqli_query($con, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="editedStu.php" method="POST">

                        <div class="container">

                        <h1 class="login-title">Edit Student</h1>
                        
                        <div class="form-group">
                                <label>Username  :</label>&nbsp;
                                <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" readonly>
                            </div><br>
                            <div class="form-group">
                                <label>Name      :</label>&nbsp;
                                <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control"
                                    placeholder="Enter Name">
                            </div><br>
                            <div class="form-group">
                                <label>Email     :</label>&nbsp;
                                <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control"
                                    placeholder="Enter Email">
                            </div><br>
                            <div class="form-group">
                                <label>User type :</label>&nbsp;
                                <input type="radio" name="radio" value="student" required />
                                <label for="html">Student</label>
                            </div><br><br>

                            <a href="editProfSt.php" class="btn btn-danger">CANCEL</a>&nbsp;&nbsp;
                            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>

                            </div>

                        </form>
                        <?php
                }
        ?>

    </div>

</body>

</html>