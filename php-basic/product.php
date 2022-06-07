
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

<div class="small-container">

<div class="row row-2">
    <h2>Danh sách sản phẩm</h2>
    <select>
        <option>Default Shop</option>
    </select>
</div>

<div class="row">
    <div class="col-4">
        <img src="images/tao.png" height="150px" width="50px">
        <h4>ID: 1</h4>
        <h4>Tên: Táo</h4>
        <p>Ngày sản xuất: 04/06/2022</p>
        <h4>Số lượng: 5</h4>
        <h4>Giá: 1000d</h4>
        <form action="cart.php" method="post">
            <input type="hidden" name="image" value="tao.png">
            <input type="hidden" name="name" value="Táo">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="date" value="04/06/2022">
            <input type="hidden" name="price" value="1000d">
            <input type="submit" name="addCart" class="btn btn-lg btn-primary" value="Add to Cart">
        </form>
    </div>
    <div class="col-4">
        <img src="images/le.png" height="150px" width="50px">
        <h4>ID: 2</h4>
        <h4>Tên: Lê</h4>
        <p>Ngày sản xuất: 04/06/2022</p>
        <h4>Số lượng: 5</h4>
        <h4>Giá: 1500d</h4>
        <form action="cart.php" method="post">
            <input type="hidden" name="image" value="le.png">
            <input type="hidden" name="name" value="Lê">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="date" value="04/06/2022">
            <input type="hidden" name="price" value="1500d">
            <input type="submit" name="addCart" class="btn btn-lg btn-primary" value="Add to Cart">
        </form>
    </div>
    <div class="col-4">
        <img src="images/xoai.png" height="150px" width="50px">
        <h4>ID: 3</h4>
        <h4>Tên: Xoài</h4>
        <p>Ngày sản xuất: 04/06/2022</p>
        <h4>Số lượng: 5</h4>
        <h4>Giá: 500d</h4>
        <form action="cart.php" method="post">
            <input type="hidden" name="image" value="xoai.png">
            <input type="hidden" name="name" value="Xoài">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="date" value="04/06/2022">
            <input type="hidden" name="price" value="500d">
            <input type="submit" name="addCart" class="btn btn-lg btn-primary" value="Add to Cart">
        </form>
    </div>
</div>

</body>
</html>
