<?php
	include '../connection.php';
	if(isset($_POST['submit'])){
		$name = $_POST['user_name'];
		$email = $_POST['user_email'];
		$password = $_POST['user_password'];
		$confirm_password = $_POST['confirm_password'];

	if(!empty($email) && !empty($password) && !empty($name) && !empty($confirm_password)) {
			$pass = md5($password);
			$confirm = md5($confirm_password);

			if($pass == $confirm)
			{
				mysqli_query($connect,"
				insert into users (user_email,user_password,user_name,confirm_password)
				values ('$email','$pass','$name','$confirm')
				");
				header("location:login.php");
				setcookie("success", "Đăng ký thành công!", time()+1, "/","", 0);
			}
			else{
				header("location:sigin.php");
				setcookie("error", "Password và Confirm Password không giống nhau!", time()+1, "/","", 0);
			}
		}
	}
	?>