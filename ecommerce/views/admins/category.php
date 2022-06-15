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

<!--  -->
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row" id="table-inverse">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-content">
                        <?php
                            if(isset($_SESSION['add_category']))
                            {
                                echo $_SESSION['add_category'];
                                unset($_SESSION['add_category']);
                            }
                            if(isset($_SESSION['delete_category']))
                            {
                                echo $_SESSION['delete_category'];
                                unset($_SESSION['delete_category']);
                            }
                            if(isset($_SESSION['update_category']))
                            {
                                echo $_SESSION['update_category'];
                                unset($_SESSION['update_category']);
                            }
				           ?>
                           
                        <div class="card-body">
                            <a href="add_category.php" class="btn btn-outline-success">+ Tạo Danh Mục Mới</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-light mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TÊN</th>
                                        <th>Hình ảnh</th>
                                        <th>Mô Tả</th>
                                        <th>Trạng Thái</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody id="ListCategory">
                                    <?php
                                        $sql = "SELECT * FROM categories";
                                        $res = mysqli_query($connect, $sql);
                                        if($res == true){
                                            $count = mysqli_num_rows($res);
                                            if($count > 0){
                                                $i = 1;
                                                while($rows = mysqli_fetch_assoc($res)){
                                                    $category_id = $rows['category_id'];
                                                    $category_name = $rows['category_name'];
                                                    $category_image = $rows['category_image'];
                                                    $category_description = $rows['category_description'];
                                                    $status = $rows['status'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?> </td>
                                                        <td><?php echo $category_name ?></td>
                                                        <td><img src="../../assets/images/categories/<?php echo $category_image ?>" alt="" height="100px" width="150px"></td>
                                                        <td><?php echo $category_description ?></td>
                                                        <td><?php echo $status ?></td>
                                                        <td>
                                                            <a href="update_category.php?category_id=<?php echo $category_id ?>">
                                                                <button type="submit" title="update"
                                                                    style="border: none; background-color:transparent;">
                                                                    <i class="fas fa-trash fa-lg text-danger">Sửa</i>
                                                                </button>
                                                            </a>
                                                            <a href="delete_category.php?category_id=<?php echo $category_id ?>">
                                                                <button type="submit" title="delete"
                                                                    style="border: none; background-color:transparent;">
                                                                    <i class="fas fa-trash fa-lg text-danger">Xóa</i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    
                                    <?php
                                                }
                                                
                                            }
                                        } else {}
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include '../layouts/footer.php';
?>