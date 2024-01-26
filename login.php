
<?php
session_start();
include 'connection_db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>login</title>
</head>
<body>
<div class="container">
      <form id="form" action="login.php" method="POST">
        <h1>LOGIN</h1>

        <div class="input-control">
          <label for="email">Email</label>
          <input id="email" name="email" type="email  " required />
        </div>

        <div class="input-control">
          <label for="password">Password</label>
          <input id="password" name="password" type="password" />   
        </div>

        <button type="submit" name= "login" value= "login" >login</button>
        <a href = "registration.php">register here</a>
      </form>
    </div>
    <?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = mysqli_query($connection, "SELECT * FROM regtable WHERE reg_email = '$email' AND reg_pass = '$password'");
    $check_user = mysqli_num_rows($select);

    if ($check_user == 1) {
        $row = mysqli_fetch_array($select); // Fetch the result row

        $status = $row['reg_status'];
        $usertype = $row['reg_type'];

        $_SESSION['usertype'] = $usertype;
        $_SESSION['status'] = $status;
        $_SESSION['email'] = $row['reg_email'];
        $_SESSION['password'] = $row['reg_pass'];

        if ($status === "approved" && $usertype === "admin") {
            echo '<script type="text/javascript">';
            echo 'alert("Your account is approved!");';
            echo 'window.location.href = "admin.php";';
            echo '</script>';
        } elseif ($status === "approved" && $usertype === "user") {
            echo '<script type="text/javascript">';
            echo 'alert("Your account is approved!");';
            echo 'window.location.href = "user-dashboard.php";';
            echo '</script>';
        } elseif ($status == "pending") {
            echo '<script type="text/javascript">';
            echo 'alert("Your account is pending!");';
            echo 'window.location.href = "login.php";';
            echo '</script>';
        } else {
            echo 'Your email or password is incorrect';
        }
    } else {
        echo 'Invalid email or password';
    }
}
?>

</body>
</html>
 <?php
/* include_once "footer.php"; */
?> 