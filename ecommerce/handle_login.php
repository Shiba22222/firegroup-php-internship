<?php
session_start();

include 'connection.php';

if(isset($_POST['submit'])){

	$email = $_POST['user_email'];
	$password = $_POST['user_password'];
	$password = md5($password);
	
	if(!empty($email) && !empty($password)) {
		$rows = mysqli_query($connect,"
					select * from users where user_email = '$email' and user_password = '$password'
				");
				$count = mysqli_num_rows($rows);
				if($count==1){
					$user = mysqli_fetch_assoc($rows);
					setcookie("success", "Login successful!", time()+1, "/","", 0);
					setcookie("user_name", $user['user_name'], time()+9999, "/","", 0);
					setcookie("user_id", $user['user_id'], time()+9999, "/","", 0);
					setcookie("user_email", $user['user_email'], time()+9999, "/","", 0);
					setcookie("role", $user['role'], time()+9999, "/","", 0);
					
					header("location: views/admins/product.php");

				}
				else{	
					header("location: views/login.php");
					setcookie("error", "Chúng tôi không tìm thấy tài khoản của bạn!", time()+1, "/","", 0);
				}
	}
}


?>