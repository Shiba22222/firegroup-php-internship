<?php
    include '../../connection.php';

?>

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
    if(isset($_GET['category_id'])){
        $id = $_GET['category_id'];
    
        $sql = "DELETE FROM categories WHERE category_id = '$id'";
        $res = mysqli_query($connect, $sql);
        if($res == true){
            $_SESSION['delete_category'] = "<font color='blue'>Xóa danh mục thành công!</font>";
            header("location: category.php");
        }else { echo "Có lỗi xin thử lại!";}
    }
?>