<?php
    include '../../connection.php';
    
?>


<?php
    if(isset($_GET['product_id'])){
        //TODO: Role = admin 
        $id = $_GET['product_id'];
        $getUserID = $_COOKIE['user_id'];
        $getUserRole = $_COOKIE['role'];
        $sqlProduct = "DELETE FROM products WHERE product_id='$id'";
        $resProduct = mysqli_query($connect, $sqlProduct);
        if($resProduct == true){
            $_SESSION['delete_product'] = "<font color='blue'>Xóa sản phẩm thành công!</font>";
            header("location: product.php");
        }else { echo "Có lỗi!";}
    }
?>