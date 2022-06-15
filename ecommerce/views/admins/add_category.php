<?php 
    include '../layouts/menu.php';
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

<div class="card-content">
    <div class="card-body">
        <form class="form" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="first-name-column">Tên *:</label>
                        <input type="text" id="first-name-column" class="form-control" placeholder="Name"
                            name="category_name">
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Mô Tả :</label>
                        <textarea class="form-control" name="category_description" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <p>Status</p>
                        <fieldset class="form-group">
                            <input  type="radio" name="status" value="Hoạt động"<?php echo "checked" ?>>Hoạt động
                            <input  type="radio" name="status" value="Không hoạt động"> Không hoạt động
                        </fieldset>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p>Upload Image</p>
                    <div class="form-file">
                        <input type="file"  name="image">
                    </div>
                </div>
                
                <div class="col-12 d-flex justify-content-end">
                    <input type="submit" name="category" class="btn btn-primary mr-1 mb-1" value="Lưu">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['category'])){
        $cate_name = $_POST['category_name'];
        $cate_description = $_POST['category_description'];
        $status = $_POST['status'];
        if(isset($_FILES['image']['name'])){
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
        if(!empty($cate_name) && !empty($cate_description)){                              
            mysqli_query($connect,"
            insert into categories (category_name, category_description, category_image, status)
            values ('$cate_name','$cate_description','$cate_image','$status')
            ");
            $_SESSION['add_category'] = "<font color='blue'>Thêm danh mục thành công!</font>";
            header("location: category.php");
        }else{
            echo "Mời nhập dữ liệu!";
        }
    }
?>

<?php
    
    include '../layouts/footer.php';
 ?>