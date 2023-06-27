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

            if(isset($_POST['edit_btn']))
            {
                $username = $_POST['edit_id'];
                
                $query = "SELECT * FROM users WHERE username = '$username'";
                $query_run = mysqli_query($con, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="edited.php" method="POST">
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
                                <input type="radio" name="radio" value="manager" required />
                                <label for="html">Manager</label>
                                <input type="radio" name="radio" value="student" required />
                                <label for="html">Student</label>
                            </div><br><br>

                            <a href="adminStudent.php" class="btn btn-danger">CANCEL</a>&nbsp;&nbsp;
                            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>

                        </form>
                        <?php
                }
            }
        ?>

    </div>
</body>
</html>