<?php
    include '../../connection.php';
    
?>

<?php
    if(isset($_GET['product_id'])){
        $adminRole = $_COOKIE['role'];
        $adminID = $_COOKIE['user_id'];
        $productID = $_GET['product_id'];
        $productSql = "SELECT * FROM products
                        inner join users on users.user_id = products.user_id
                        WHERE product_id = '$productID'";
        $productRes = mysqli_query($connect, $productSql);
        $productData = mysqli_fetch_assoc($productRes);
        if(empty($productData)){
            echo '<h2>Khong tim thay san pham</h2>';
        }
        $productUserRole = $productData['role'];
        $productUserId = $productData ['user_id'];

        $isDelete = false;
        
        if($productUserRole == 'admin' && $productUserId == $adminID){  
            $isDelete = true;
        }
        if($productUserRole == 'user' && $productUserId == $adminID){ 
            $isDelete = true;
        }
        if($productUserRole == 'user' && $adminRole == 'admin'){ 
            $isDelete = true;
        }
        
        if($isDelete){
            $productDelete = "DELETE FROM products where product_id = '$productID'";
            $productDeleteRes = mysqli_query($connect, $productDelete);
            if($productDeleteRes == false){
                echo "Xoa khong thanh cong";
            }else{
                header("location: product.php");
            }
        }else{
            echo "Ban khong duoc xoa du lieu";
            header("location: product.php");
        }
        
        
    }
    
?>
