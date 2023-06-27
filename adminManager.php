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
        $con = mysqli_connect("localhost","naffy","nafis123");
        $dbh = new PDO('mysql:host=localhost;dbname=my_db;charset=utf8mb4', 'naffy', 'nafis123');
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$sqlget = "SELECT * FROM users WHERE user_type = 'manager'";
$sqldata = $dbh->query($sqlget) or die('error users');
echo "<table>"; 
echo "<th>Username</th> <th>Name</th> <th>Email</th> <th>User type</th> <th>create_datetime</th> <th>Action</th>";

while($row = $sqldata->fetch(PDO::FETCH_ASSOC)) {
    ?>

  <tr>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['user_type']; ?></td>
            <td><?php echo $row['create_datetime']; ?></td>
            <td>
                <form action="editManager.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['username']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                </form>
            </td>
            <td>
                <form action="delete.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['username']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
                </form>
            </td>
          </tr>

<?php
}
echo "</table>"
?>
    </div>
</body>
</html>