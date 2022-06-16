<?php
    include '../layouts/menu.php'
?>

<?php
    if(isset($_COOKIE['role'])){
        $authen = $_COOKIE['role'];
        if($authen == 'user'){
            echo "<center>Bạn không đủ quyền truy cập vào trang này</center><br>";
            echo "<a href='../products/product.php'><center> Click để về lại trang chủ</center></a>";
            die;
        }
    }
?>

<?php
    if(isset($_GET['category_id'])){
        $id = $_GET['category_id'];
        $getCategorySql = "SELECT * FROM categories WHERE category_id=$id";
        $res = mysqli_query($connect,$getCategorySql);
        $count = mysqli_num_rows($res);
        
        if($count == 1){
            $row = mysqli_fetch_assoc($res);
            // echo '<pre>' . var_export($row, true) . '</pre>';
            // die;
            $update_name = $row['category_name'];
            $update_image = $row['category_image'];
            $update_description = $row['category_description'];
            $update_status = $row['status'];
        }else {
            echo "Có lỗi mời nhập lại!";
        }
    }
?>

<div class="card-content">
    <div class="card-body">
        <form class="form" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Tên *:</label>
                        <input type="text" id="first-name-column" class="form-control" value="<?php echo $update_name; ?>"
                            name="category_name">
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Mô Tả :</label>
                        <textarea class="form-control" name="category_description" id="exampleFormControlTextarea1"
                            rows="3" ><?php echo $update_description; ?></textarea>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <p>Status</p>
                        <fieldset class="form-group">
                            <input <?php if($update_status == "Hoạt động"){ echo "checked";} ?> type="radio" name="status" value="Hoạt động">Hoạt động
                            <input <?php if($update_status == "Không hoạt động"){ echo "checked";} ?> type="radio" name="status" value="Không hoạt động"> Không hoạt động
                        </fieldset>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p>Upload Image</p>
                    <div class="form-file">
                        <input type="file" name="image">
                    </div>
                    <br>
                    <div class="form-file">
                        <?php
                            if($update_image != ""){
                                ?>
                                    <img src="../../assets/images/categories/<?php echo $update_image ?>" alt="" height="100px" width="150px">
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
                    <input type="hidden" name="category_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="image" value="<?php echo $update_image?>" >
                    <input type="submit" name="category" class="btn btn-primary mr-1 mb-1" value="Lưu">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['category'])){
        $id = $_POST['category_id'];
        $update_name = $_POST['category_name'];
        $update_description = $_POST['category_description'];
        $update_status = $_POST['status'];
        $update_image = $_FILES['image']['name'];
        
        if(isset($update_image)){
            $cate_image = $_FILES['image']['name'];
            if($cate_image !="")
            {
                $tmp = explode('.',$cate_image);
                $ext = end($tmp);
                $cate_image = "Category_".microtime(true).'.'.$ext;
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../../assets/images/categories/".$cate_image;
                $upload = move_uploaded_file($source_path, $destination_path);
                if($upload == false){
                    echo "Update thất bại!";
                }
            }
        }else{
            $cate_image = "";
        }
        if(!empty($update_name)){
            $updateCategorySql = "UPDATE categories SET 
            category_name = '$update_name',
            category_description = '$update_description',
            category_image= '$cate_image',
            status = '$update_status'
            WHERE category_id=$id";
            $res2 = mysqli_query($connect,$updateCategorySql);
            
            if (!empty($res2)) {
                $_SESSION['update_category'] = "<font color='blue'>Sửa danh mục thành công!</font>";
                header("location: category.php");
                exit();
            } else {
                echo ( mysqli_error($connect));
                die;
            }
            
        }
    }
    include '../layouts/footer.php'
?>