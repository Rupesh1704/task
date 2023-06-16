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
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                


                $verify_query = mysqli_query($con,"SELECT email FROM users WHERE email ='$email' ");
                if(mysqli_num_rows($verify_query) != 0){
                    echo"<div class= 'message'>
                    <p>This Email is registered. Please Login!</p>
                    </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Login Here</button>";
                }
                else{
                    mysqli_query($con, "INSERT INTO users (username, email, password, address, phone) VALUES ('$username', '$email', '$password', '$address', '$phone')") or die("Error Occurred");
                    echo"<div class= 'message'>
                    <p>Registeration successful</p>
                    </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Login Now</button></a>";
                }
            }
            else{
        
        ?>

            <header>Register Here</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">User Name</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" autocomplete="off" required >
                </div>

                <div class="field input">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="login">
                </div>

                <div class="links">
                    Have account?
                    <a href="index.php" style="text-decoration: none;">Login Here</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>

</body>

</html>