<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>


    <div class="container">
        <div class="box form-box">
        <?php 
             
             include("php/config.php");
             if(isset($_POST['submit'])){
               $email = mysqli_real_escape_string($con,$_POST['email']);
               $password = mysqli_real_escape_string($con,$_POST['password']);

               $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
               $row = mysqli_fetch_assoc($result);

               if(is_array($row) && !empty($row)){
                   $_SESSION['valid'] = $row['email'];
                   $_SESSION['username'] = $row['username'];
               }else{
                   echo "<div class='message'>
                     <p>Wrong Username or Password</p>
                      </div> <br>";
                  echo "<a href='home.php'><button class='btn'>Go Back</button>";
        
               }
               if(isset($_SESSION['valid'])){
                   header("Location: home.php");
               }
             }else{

           
           ?>
            <header>Login</header>
            <form action="" method="post">

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required autocomplete="off">
                </div>

                <div class="field input">
                    <label for="password">Passwrord</label>
                    <input type="password" name="password" id="password" required autocomplete="off">
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="login">
                </div>

                <div class="links">
                    Don't have account?
                    <a href="register.php" style="text-decoration: none;">SignUp Here</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>

</body>

</html>