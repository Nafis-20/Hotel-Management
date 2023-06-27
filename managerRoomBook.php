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
    $con = mysqli_connect("localhost","naffy","nafis123");
    $dbh = new PDO('mysql:host=localhost;dbname=my_db;charset=utf8mb4', 'naffy', 'nafis123');
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$sqlget = "SELECT * FROM roombook";
$sqldata = $dbh->query($sqlget) or die('error users');
echo "<table>"; 
echo "<th>Username</th> <th>Name</th> <th>Email</th> <th>Room type</th> <th>Booking time</th>";

while($row = $sqldata->fetch(PDO::FETCH_ASSOC)) {
    ?>

  <tr>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['roomtype']; ?></td>
        <td><?php echo $row['booking_time']; ?></td>
        <td>
            <form action="managerDel.php" method="post">
              <input type="hidden" name="delete_id" value="<?php echo $row['username']; ?>">
              <button type="submit" name="delete_btn" class="btn btn-danger">REJECT</button>
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