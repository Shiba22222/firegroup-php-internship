
<?php 
session_start();
if(isset($_GET['deleteCart']) && ($_GET['deleteCart'] == 1)){
        unset($_SESSION['cart']);
    }

if(isset($_GET['deleteProduct']) && ($_GET['deleteProduct'] >= 0)){
    array_splice($_SESSION['cart'], $_GET['deleteProduct'], 1);
}

?>
<?php

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart']=[];
    }

    if(isset($_POST['addCart']) && $_POST['addCart']){
        $image = $_POST['image'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $check = 0;
        for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
            if($_SESSION['cart'][$i][1] == $name){
                $check = 1;
                $quantitynew = $quantity + $_SESSION['cart'][$i][4];
                $_SESSION['cart'][$i][4] = $quantitynew;
            }header("Location: product.php");
        }
        if($check == 0){
            $cart = [$image, $name, $date, $price, $quantity];
            $_SESSION['cart'][] = $cart;
        }header("Location: product.php");

    }

    function showCart(){
        if(isset($_SESSION['cart']) && (is_array($_SESSION['cart']))){
            $sum = 0;
            for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
                $money = (int)$_SESSION['cart'][$i][3] * (int)$_SESSION['cart'][$i][4];
                $sum += $money;
                echo ' <tr>
                    <td>
                        <div class="cart-info">
                            <img src="images/'.$_SESSION['cart'][$i][0].'">
                             <p>'.$_SESSION['cart'][$i][1].'</p>
                        </div>
                    </td>
                    <td>'.$_SESSION['cart'][$i][2].'</td>
                    <td>'.$_SESSION['cart'][$i][4].'</td>
                    <td>'.$_SESSION['cart'][$i][3].'</td>
                    <td>
                        <div>'.$money.'d</div>
                    </td>
                    <td>
                        <a href="cart.php?deleteProduct='.$i.'">Xóa</a>
                    </td>
                </tr> ';               
            }
            echo '<tr>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td>Tổng</td>
                    <td>'.$sum.'d</td>
                </tr>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="navbar">
            <nav>
                <ul id="MenuItems">
                    <li><a href="product.php">Products</a></li>
                    <li><a href="cart.php">Cart</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="small-container cart-page">
        <table>
            <thead>
            <tr>
                <th>Tên</th>
                <th>Ngày sản xuất</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Giá</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
                showCart();
            ?>
            </tbody>
        </table>
        <a href="product.php" class="btn btn-primary"><h2>Tiếp tục mua sắm</h2></a>
        <a href="cart.php?deleteCart=1" class="btn btn-lg btn-primary"><h2>Xóa giỏ hàng</h2></a>
    </div>
</body>
</html>