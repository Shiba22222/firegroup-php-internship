<?php include '../layouts/menu.php'; ?>

<?php
    if(isset($_GET['product_id'])){
        $id =$_GET['product_id']; 
        $sqlProduct = "SELECT * FROM products 
                        -- inner join product_image on products.product_image_id = product_image.product_id
                        WHERE product_id='$id'";                 
        $resProduct = mysqli_query($connect, $sqlProduct);                                         
        if($resProduct == true){
            while($row = mysqli_fetch_assoc($resProduct)){
                $id = $row['product_id'];
                $image = $row['product_image'];  
            }
        }
    }
?>

<div class="card-content">
    <div class="card-body">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="first-name-column">Danh sách album ảnh:</label>
                <input type="text" id="first-name-column" class="form-control" placeholder="Name" name="category_name">
            </div>
        </div>
        <form class="form" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Upload Image</p>
                    <div class="form-file">
                        <input type="file" name="image" multiple>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <input type="submit" name="submit" class="btn btn-primary mr-1 mb-1" value="Lưu">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        // echo '<pre>' . var_export($_POST, true) . '</pre>';die;
        if(isset($_FILES['image']['name'])){
            $cate_image = $_FILES['image']['name'];
            if($cate_image !="")
            {
                $tmp = explode('.',$cate_image);
                $ext = end($tmp);
                foreach($cate_image as $item){
                    $item = "Category_".microtime(true).'.'.$ext;
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../../assets/images/categories/album/".$item;
                    $upload = move_uploaded_file($source_path, $destination_path);
                    if($upload == false){
                        echo "Update thất bại!";
                }
                }
            }
        }else{
            $cate_image = "";
        }
        if(isset($cate_image)){                              
            $updateProduct = "INSERT INTO product_image
                                image = '$cate_image'";
            $resUpdate = mysqli_query($connect, $updateProduct);
            if(!empty($resUpdate)){
                header("location: album_product.php");
                exit();
            }else {
                echo ( mysqli_error($connect));
                die;
            }
        }else{
            echo "Mời nhập dữ liệu!";
        }
    }
?>
<?php include '../layouts/footer.php'; ?>