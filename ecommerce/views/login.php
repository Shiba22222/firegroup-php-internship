<?php include_once '../handle_sigin.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>
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
				if(isset($_COOKIE["success"])){
			?>
        <div class="alert alert-success ">
            <center><font color="red"><strong>Chúc mừng!</strong> <?php echo $_COOKIE['success']; ?></font></center>
        </div>
        <?php } ?>
        <?php
				if(isset($_COOKIE["error"])){
			?>
        <div class="alert alert-danger">
            <center>
                <strong>
                    <font  color="red">'Có lỗi'</font>
                </strong>
                <font color="red"> <?php echo $_COOKIE["error"]; ?></font>
            </center>
        </div>
        <?php } ?>
        <?php
				if(isset($_COOKIE["login"])){
			?>
        <div class="alert alert-danger">
            <center>
                <strong>
                    <font color="red">'Có lỗi'</font>
                </strong>
                <font color="red"> <?php echo $_COOKIE["login"]; ?></font>
            </center>
        </div>
        <?php } ?>
        <form action="../handle_login.php" method="post">
            <div class="login-box">
                <h1>Login</h1>
                <div class="textbox">
                    <i class="fa fa-envelope-o"></i>
                    <input type="text" name="user_email" placeholder="Email">
                </div>

                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="user_password" placeholder="Password">
                </div>
                <input type="submit" name="submit" class="btn" Value="Login">
                <a href="sigin.php" class="Husky">
                    <font color="#FF0000">Create an account</font>
                </a>
                </br>
                </br>
                <a href="admins/product.php" class="Husky">
                    <font color="#FF0000">Back to Home</font>
                </a>
            </div>
        </form>
    </div>
</body>

</html>