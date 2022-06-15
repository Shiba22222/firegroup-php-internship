<?php 
include '../handle_sigin.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
body {
    background: url('../assets/images/bg.jpg');
}
</style>

<body>
    <div class="shiba">
        <?php
				if(isset($_COOKIE['error'])){
			?>
        <div class="alert alert-danger">
            <center>
                <strong>
                    <font color="red">'Có lỗi!'</font>
                </strong>
                <font color="red"> <?php echo $_SESSION['add']; ?></font>
            </center>
        </div>
        <?php } ?>
        <form action="" method="POST">
            <div class="login-box">
                <h1>Register</h1>
                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input type="text" name="user_name" placeholder="Username">
                </div>
                <div class="textbox">
                    <i class="fa fa-envelope-o"></i>
                    <input type="text" name="user_email" placeholder="Email">
                </div>

                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="user_password" placeholder="Password">
                </div>
                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="confirm_password" placeholder="Password Confirm">
                </div>
                <button type="submit" name="submit" class="btn">Register</button>
                <a href="login.php" class="Husky">
                    <font color="#FF0000">Already a member?</font>
                </a>
                </br>
                </br>
                <a href="admins/product.php" class="Husky">
                    <font color="#FF0000">Back to Home</font>
                </a>
            </div>
        </form>
    </div>
    <?php 
    ?>
</body>

</html>