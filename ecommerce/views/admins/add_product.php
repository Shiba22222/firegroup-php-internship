<?php
    include '../layouts/menu.php';
    if(isset($_SESSION['error_add'])){
        echo $_SESSION['error_add'];
        unset($_SESSION['error_add']);
    }
?>

<div class="card-content">
    <div class="card-body">
        <form class="form" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Tên sản phẩm:</label>
                        <input type="text" id="first-name-column" class="form-control" placeholder="Name"
                            name="product_name">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Số lượng:</label>
                        <input type="number" id="first-name-column" class="form-control" placeholder="Quantity"
                            name="product_quantity">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Giá:</label>
                        <input type="number" id="first-name-column" class="form-control" placeholder="Price"
                            name="product_price">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Tiêu đề:</label>
                        <input type="text" id="first-name-column" class="form-control" placeholder="Title"
                            name="product_title">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Danh Mục:</label>
                       
                        </select>
                        <select name="category_id" id="">
                            <?php
                                $sqlCategoey = "SELECT * FROM categories";
                                $res = mysqli_query($connect, $sqlCategoey);
                                
                                if($res == true){
                                    $categories = mysqli_fetch_all($res);

                                    foreach($categories as $category){
                                        $name = $category[1];
                                        $id = $category[0];
                                        echo '<option value='."$id".'>'.$name.'</option>';
                                    }
                                    
                                }
                               
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Mô Tả :</label>
                        <textarea class="form-control" name="product_description" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p>Upload Image</p>
                    <div class="form-file">
                        <input type="file"  name="image" multiple>
                        
                    </div>
                </div>
                
                <div class="col-12 d-flex justify-content-end">
                    <input type="submit" name="product" class="btn btn-primary mr-1 mb-1" value="Lưu">
                </div>
            </div>
        </form>    
    </div>
</div>
<?php
            if(isset($_POST['product'])){
                $name = $_POST['product_name'];
                $quantity = $_POST['product_quantity'];
                $price = $_POST['product_price'];
                $title = $_POST['product_title'];
                $description = $_POST['product_description'];
                $category_id = $_POST['category_id'];
                if(isset($_FILES['image']['name'])){
                    $image = $_FILES['image']['name'];
                    if($image != ""){
                        $tmp = explode('.',$image);
                        $ext = end($tmp);
                        $image = "Product_".microtime(true).'.'.$ext;
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../../assets/images/products/".$image;
                        $upload = move_uploaded_file($source_path, $destination_path);
                        if ($upload == false){
                            echo "Upload thất bại";
                        }

                    }
                }else {
                    $image = "";
                }
                $user_id = !empty($_COOKIE['user_id']) ? $_COOKIE['user_id'] : null;
                
                $sqlCategoey = "SELECT * FROM categories";
                $res = mysqli_query($connect, $sqlCategoey);
                if($res == true){
                    $categories = mysqli_fetch_assoc($res);
                }
                
                if(!empty($name) && !empty($quantity) && !empty($price) && !empty($title)){
                    $productSql  = "INSERT INTO products SET 
                    product_name = '$name',
                    product_quantity = '$quantity',
                    product_price= '$price',
                    product_title = '$title',
                    product_description = '$description',
                    user_id = '$user_id',
                    category_id = '$category_id',
                    product_image = '$image'";   
                    //    echo '<pre>' . var_export($productSql, true) . '</pre>';
                    //    die;
                    $res2 =  mysqli_query($connect,$productSql);
                    if (!empty($res2)) {
                        header("location: product.php");
                        $_SESSION['add_product'] = "<font color='blue'>Tạo sản phẩm thành công!</font>";
                        exit();
                    } else {
                        echo ( mysqli_error($connect));
                     die;
                    }
                }else{
                    $_SESSION['error_add'] = "<h4>Mời nhập dữ liệu!</h4>";
                }
            }
        ?>
<?php include '../layouts/footer.php' ?>