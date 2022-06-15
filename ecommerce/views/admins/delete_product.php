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
    if(isset($_GET['product_id'])){
        $id = $_GET['product_id'];
        $sqlProduct = "DELETE FROM products WHERE product_id='$id'";
        $resProduct = mysqli_query($connect, $sqlProduct);
        if($resProduct == true){
            $_SESSION['delete_product'] = "<font color='blue'>Xóa sản phẩm thành công!</font>";
            header("location: product.php");
        }else { echo "Có lỗi!";}
    }
?>