<?php
session_start();
include("connection_db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/user-style.css">
</head>
<body>
    <?php
    include "template/userheader.php";
    ?>
<div class="header">
  <h1>My Profile</h1><?php echo $_SESSION['email']?>
  <p>A <b>responsive</b> website created by me.</p>
</div>

</body>
</html>
