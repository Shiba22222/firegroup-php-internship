<?php include '../layouts/menu.php' ?>

<?php
    if(isset($_COOKIE['role'])){
        $authen = $_COOKIE['role'];
        if($authen == 'user'){
            echo "<center>Bạn không đủ quyền truy cập vào trang này</center><br>";
            echo "<a href='product.php'><center> Click để về lại trang chủ</center></a>";
            die;
        }
    }
?>

<?php
    if(isset($_GET['user_id'])){
        $id = $_GET['user_id'];
        $getUserSql = "SELECT * FROM users WHERE user_id=$id";
        $resUserSQL = mysqli_query($connect,$getUserSql);
        $row = mysqli_fetch_assoc($resUserSQL);
        $name = $row['user_name'];
        $email = $row['user_email'];
        $role = $row['role'];
    }
?>

<div class="card-content">
    <div class="card-body">
        <form class="form" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Tên:</label>
                        <input type="text" id="first-name-column" class="form-control" value="<?php echo $name; ?>"
                            name="user_name">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Email:</label>
                        <input type="text" id="first-name-column" class="form-control" value="<?php echo $email; ?>"
                            name="user_email">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <p>Role</p>
                        <fieldset class="form-group">
                            <input <?php if($role == "admin"){ echo "checked";} ?> type="radio" name="role" value="admin">admin
                            <input <?php if($role == "user"){ echo "checked";} ?> type="radio" name="role" value="user">user
                        </fieldset>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" class="btn btn-primary mr-1 mb-1" value="Lưu">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $id = $_POST['user_id'];
        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $role = $_POST['role'];
        
        
        if(!empty($name) && !empty($email)){
            $updateUserSql = "UPDATE users SET 
            user_name = '$name',
            user_email = '$email',
            role= '$role'
            WHERE user_id=$id";
            $resUpdateUser = mysqli_query($connect,$updateUserSql);
            if (!empty($resUpdateUser)) {
                $_SESSION['update_account'] = "<font color='blue'>Sửa tài khoản thành công!</font>";
                header("location: account.php");
                exit();
            } else {
                echo ( mysqli_error($connect));
                die;
            }
            
        }
    }
    include '../layouts/footer.php'
?>