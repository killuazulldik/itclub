
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <title>Registration</title>
    
  </head>
  <body>
    <div class="container">
      <form id="form" action="registration.php" method="POST">
        <h1>Registration</h1>

        <div class="input-control">
          <label for="username">name</label>
          <input id="username" name="name" type="text" />  
        </div>

        <div class="input-control">
          <label for="email">Email</label>
          <input id="email" name="email" type="email  " required />
        </div>

        <div class="input-control">
          <label for="password">Password</label>
          <input id="password" name="password" type="password" />   
        </div>

        <button type="submit" name= "register" value= "Register" >Sign Up</button>
      </form>
    </div>

    <?php
  include "connection_db.php";

    if( isset($_POST['register'])){

      $username = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      $select ="SELECT * FROM regtable WHERE  reg_email ='$email'";
      $result = mysqli_query($connection,$select);

      if(mysqli_num_rows($result) > 0){
        echo '<script type="text/javascript">';
        echo 'alert("Email Already Taken!");';
        echo 'window.location.href = "login.php";';
        echo '</script>';
    
    
        
    }else{

      $register = "INSERT INTO  regtable (reg_name, reg_email, reg_pass, reg_status) VALUE ('$username', '$email', '$password', 'pending')";
      mysqli_query($connection, $register);
         echo '<script type="text/javascript">';
        echo 'alert("Email !");';
        echo 'window.location.href = "login.php";';
        echo '</script>';
    }
  }
    ?>
  </body>
</html>