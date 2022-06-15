<?php
    include '../layouts/menu.php';
?>
<?php
    if(isset($_GET['product_id'])){
        $id = $_GET['product_id'];
        
        $sqlProduct = "SELECT * FROM products 
                        inner join categories on products.category_id = categories.category_id 
                        WHERE product_id = '$id'";
        $resProduct = mysqli_query($connect, $sqlProduct);

        if($resProduct == true){
            $rowProduct = mysqli_fetch_assoc($resProduct);
            $name = $rowProduct['product_name'];
            $quantity = $rowProduct['product_quantity'];
            $price = $rowProduct['product_price'];
            $title = $rowProduct['product_title'];
            $description = $rowProduct['product_description'];
            $image = $rowProduct['product_image'];
            $category = $rowProduct['category_id'];
            $category_name = $rowProduct['category_name'];
            
            
            
        }
    }
    
?>
<div class="card-content">
    <div class="card-body">
        <form class="form" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Tên sản phẩm:</label>
                        <input type="text" id="first-name-column" class="form-control" value="<?php echo $name ?>"
                            name="product_name">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Số lượng:</label>
                        <input type="number" id="first-name-column" class="form-control" value="<?php echo $quantity ?>"
                            name="product_quantity">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Giá:</label>
                        <input type="number" id="first-name-column" class="form-control" value="<?php echo $price ?>"
                            name="product_price">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Tiêu đề:</label>
                        <input type="text" id="first-name-column" class="form-control" value="<?php echo $title ?>"
                            name="product_title">
                    </div>
                </div>
                <option value="" value=""></option>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Danh Mục:</label>
                        <select name="category_id" id="">
                            <?php
                                $sqlCategoey = "SELECT * FROM categories
                                                WHERE ";
                                $res = mysqli_query($connect, $sqlCategoey);
                                
                                if($res == true){
                                    $categories = mysqli_fetch_all($res);

                                    foreach($categories as $category){
                                        $name = $category[1];
                                        $id = $category[0];
                                        echo '<option value='."$id".'">'.$name.'</option>';
                                        
                                    }
                            
                                }
                                
                               
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Mô Tả :</label>
                        <textarea class="form-control" name="product_description"  id="exampleFormControlTextarea1"
                            rows="3"><?php echo $description ?></textarea>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p>Upload Image</p>
                    <div class="form-file">
                        <input type="file"  name="image">
                        
                    </div>
                    <br>
                    <div class="form-file">
                        <?php
                            if($image != ""){
                                ?>
                                    <img src="../../assets/images/products/<?php echo $image ?>" alt="" height="100px" width="150px">
                                <?php
                            }
                            else
                            {
                                echo "Có lỗi";
                            }
                        ?>
                    </div>
                </div>
                
                <div class="col-12 d-flex justify-content-end">
                    <input type="hidden" name="product_id" value="<?php echo $id ?>">
                    <input type="hidden" name="image" value="<?php echo $image ?>">
                    <input type="submit" name="update" class="btn btn-primary mr-1 mb-1" value="Lưu">
                </div>
            </div>
        </form>    
    </div>
</div>

<?php 
    
    if(isset($_POST['update'])){
        $id = $_POST['product_id'];
        $name = $_POST['product_name'];
        $quantity = $_POST['product_quantity'];
        $price = $_POST['product_price'];
        $title = $_POST['product_title'];
        $description = $_POST['product_description'];
        $image = $_FILES['image']['name'];
        $category = $_POST['category_id'];
        
        if(isset($image)){
            $cate_image = $_FILES['image']['name'];
            if($cate_image !="")
            {
                $tmp = explode('.',$cate_image);
                $ext = end($tmp);
                $cate_image = "Product_".microtime(true).'.'.$ext;
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../../assets/images/products/".$cate_image;
                $upload = move_uploaded_file($source_path, $destination_path);
                if($upload == false){
                    echo "Update thất bại!";
                }
            }
        }else{
            $cate_image = "";
        }
        if(!empty($name) && !empty($quantity) && !empty($price) && !empty($title)){
            $updateProduct = "UPDATE products SET
                                product_name = '$name',
                                product_quantity = '$quantity',
                                product_price = '$price',
                                product_title = '$title',
                                product_description = '$description',
                                product_image = '$cate_image',
                                category_id = '$category'
                                WHERE product_id = '$id'";
            $resUpdate = mysqli_query($connect, $updateProduct);
            // echo '<pre>' . var_export($updateProduct, true) . '</pre>';die;
            if(!empty($resUpdate)){
                header("location: product.php");
                exit();
            }else {
                echo ( mysqli_error($connect));
                die;
            }
            
        }

        
    }
?>
<?php include '../layouts/footer.php' ?>