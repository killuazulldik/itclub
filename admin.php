<?php
session_start();
include 'connection_db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/admin.css">
    <title>Admin</title>
</head>
<body>
    <div class="container">
        <h1>User Registration</h1><?php echo $_SESSION['email']?>
        <table class="content-table" >
            <thead>
            <tr>
            <th>Id</th>
            <th>name</th>
            <th>email</th>
            <th>password</th>
            <th>action</th>
            </tr>
            </thead>
            <?php
            $query = "SELECT * FROM regtable WHERE reg_status ='pending' ORDER BY reg_id ASC";
            $result = mysqli_query($connection, $query);
            while($row =mysqli_fetch_array($result)){

            
         
            ?>
            <tr>
                <td><?php echo $row['reg_id'];?></td>
                <td><?php echo $row['reg_name'];?></td>
                <td><?php echo $row['reg_email'];?></td>
                <td><?php echo $row['reg_pass'];?></td>
                <td>
                    <form action="admin.php" method = "POST">
                   
                    <input type="hidden" name="id" value = "<?php echo ['reg_id'];?>">
               
                    <input type="submit" name="approve" value = "Approve">

                    </form>
                </td>

            </tr>
        </table>
        <?php
        }
        ?>
    </div>
    <?php

if (isset($_POST['approve'])) {
    // Sanitize user input to prevent SQL injection
    $id = mysqli_real_escape_string($connection, $_POST['id']);

    $updateQuery = "UPDATE regtable SET reg_status = 'approved' WHERE reg_id = '$status '";
    $result = mysqli_query($connection, $updateQuery);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Your account is already approved!");';
        echo 'window.location.href = "login.php";';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Error updating status!");';
        echo '</script>';
    }
}
    
    /* if( isset($_POST['approve'])){
        $id = $_POST['reg_id'];

        $select = "UPDATE regtable SET reg_status = 'approved' WHERE reg_id = '$id'";
        $result = mysqli_query($connection, $select);



       /*  header("location: /club88/login.php");
        exit; */
       /*  echo '<script type="text/javascript">';
        echo 'alert("YOUR ACCOUNT IS ALREADY APPOVED!");';
        echo 'window.location.href = "login.php";';
        echo '</script>'; */

  /*   } */ 
    
    if( isset($_POST['deny'])){
        $id = $_POST['id'];

        $select = "DELETE FROM regtable WHERE id = $'id' ";
        $result = mysqli_query($connection, $select);
        echo '<script type="text/javascript">';
        echo 'alert("Email Already Taken!");';
        echo 'window.location.href = "admin.php";';
        echo '</script>';

    }
    ?>
</body>
</html>