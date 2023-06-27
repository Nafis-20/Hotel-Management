<html>

<head>
    <title>Database</title>
</head>

<body>
    <?php
    $con = mysqli_connect("localhost","naffy","nafis123");
    //Create connection
    // Create database
    // Create table
    mysqli_select_db($con, "my_db");

    $sql = "CREATE TABLE IF NOT EXISTS `users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `username` varchar(50) NOT NULL,
        `name` varchar(50) NOT NULL,
        `email` varchar(50) NOT NULL,
        `password` varchar(50) NOT NULL,
        `user_type` varchar(50) NOT NULL,
        `create_datetime` datetime NOT NULL,
        PRIMARY KEY (`id`)
       );";

$sql1 = "CREATE TABLE IF NOT EXISTS `roombook` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL,
    `name` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `roomtype` varchar(50) NOT NULL,
    `booking_time` datetime NOT NULL,
    PRIMARY KEY (`id`)
   );";

$sql2 = "CREATE TABLE IF NOT EXISTS `contact` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL,
    `name` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `message` varchar(50) NOT NULL,
    `message_time` datetime NOT NULL,
    PRIMARY KEY (`id`)
   );";

    mysqli_query($con, $sql);
    mysqli_query($con, $sql1);
    mysqli_query($con, $sql2);
    mysqli_close($con);
    ?>
</body>

</html>