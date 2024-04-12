<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

   if($row['user_type'] == 'user'){

      $_SESSION['user_name'] = $row['name'];
      header('location:user_page.php');

   }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">



</head>
<body>
<header>
   <h2 class="logo-text">AISpelling</h2>
   <nav class="navigation">
      <a href="http://localhost/demo_login_system/web_home.php">Home</a> 
      <!--<button class ="btnLogin-popup">Login</button>-->
      <a href="http://localhost/demo_login_system/login_form.php" class="btnLogin-popup">Login</a>
   </header>

<div class="form-container">
   <form action="" method="post">
   <img src="image/logo.jpg" alt="Logo" class="logo">
      <h3>Login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register now</a></p>
   </form>
   

</div>


</body>
</html>