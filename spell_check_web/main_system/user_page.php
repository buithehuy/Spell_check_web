<?php
    @include 'login_system/config.php';
    session_start();

    if(!isset($_SESSION['user_name'])){
         header('location:http://localhost/spell_check_web/login_system/web_home.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
    <header>
        <a href="http://localhost/spell_check_web/login_system/web_home.php" class="logo-text">AISpelling</a>
        <!--<h2 class="logo-text">AISpelling</h2>-->
        <nav class="navigation">
            <a href="http://localhost/spell_check_web/login_system/web_home.php">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
            </a>
            <a href="#">
                <span class="icon"><ion-icon name="share-social-outline"></ion-icon></span>
            </a>
            <button class ="btnUser">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></ion-icon></span>
                <h1><span><?php echo $_SESSION['user_name'] ?></span></h1>
            </button>
        </nav>
    </header>

    <div class="input-container">
        <textarea name="content" placeholder="Nhập nội dung cần kiểm tra chính tả" class="input-field"></textarea>
         <button class="check">
            <span class="icon"><ion-icon name="search-outline"></ion-icon></span>
            Kiểm tra
        </button>
        
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>