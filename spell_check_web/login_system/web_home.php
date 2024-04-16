<?php

@include 'config.php';

session_start();

if(isset($_POST['login'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      $_SESSION['user_name'] = $row['name'];
      header('location:http://localhost/spell_check_web/main_system/user_page.php');
   }else{
      $error[] = 'incorrect email or password!';
   }

};


if(isset($_POST['register'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password) VALUES('$name','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:http://localhost/spell_check_web/main_system/user_page.php');
      }
   }

};
?>






<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <header>
        <a href="web_home.php" class="logo-text">AISpelling</a>
        <!--<h2 class="logo-text">AISpelling</h2>-->
        <nav class="navigation">
            <a href="web_home.php">Home</a>
            <button class ="btnLogin-popup">Login</button>
    </header>

    <div class="intro-section">
        <img class="img" src="image/logo.png" >
        <div class="content text">
            <h2>Giới thiệu về AI Spelling</h2>
            <p>AI Spelling là một trang web cung cấp dịch vụ chữa lỗi chính tả tiếng Việt dựa trên công nghệ trí tuệ nhân tạo (AI).
                Giúp người dùng kiểm tra và sửa các lỗi chính tả trong văn bản tiếng Việt một cách nhanh chóng và hiệu quả.</p>
                <a href="http://localhost/spell_check_web/main_system/main.php" class="try-link">Thử Ngay   ></a>
        </div>
        
    </div>

    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close"></ion-icon></span>

        <div class="form-box login">
            <h2>Login</h2>
            <form action="" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type = "checkbox">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an acount?
                        <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>


        <div class="form-box register">
            <h2>Registration</h2>
            <form action="" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></ion-icon></span>
                    <input type="text" name="name" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password"required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="cpassword"required>
                    <label>Retype password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type = "checkbox" required>I agree to the term & conditions</label>
                </div>
                <button type="submit" name="register" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an acount?
                        <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>


    </div>
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>