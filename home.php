<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" conten t="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p>Welcome</p>
        </div>

        <div class="right-links">
            <a href="php/logout.php"><button class="btn">Log Out </button></a>
        </div>
    </div>

    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p><b>You Have logged in successfully !!!</b>
                    </p>
                </div>
            </div>
        </div>
    </main>

</body>

</html>