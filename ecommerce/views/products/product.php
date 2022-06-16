<?php
    include '../layouts/menu.php';
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
                            if(isset($_SESSION['add_product']))
                            {
                                echo $_SESSION['add_product'];
                                unset($_SESSION['add_product']);
                            }
				           ?>
                           <?php
                            if(isset($_SESSION['delete_product']))
                            {
                                echo $_SESSION['delete_product'];
                                unset($_SESSION['delete_product']);
                            }
				           ?>
                           <?php
                            if(isset($_SESSION['error_product']))
                            {
                                echo $_SESSION['error_product'];
                                unset($_SESSION['error_product']);
                            }
				           ?>
                        <div class="card-body">
                            <a href="add_product.php" class="btn btn-outline-success">+ Tạo Sản phẩm Mới</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-light mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TÊN</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Tiêu đề</th>
                                        <th>Danh mục</th>
                                        <th>Người tạo - Quyền</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody id="ListCategory">
                                    <?php
                                                    $sqlProducts = "SELECT * FROM ((products 
                                                                    inner join categories on products.category_id = categories.category_id)
                                                                    inner join users on products.user_id = users.user_id)";                 
                                                    $resProducts = mysqli_query($connect, $sqlProducts);                                            
                                                    if($resProducts == true){
                                                        $count = mysqli_num_rows($resProducts);
                                                        $i = 1;
                                                        if($count > 0){
                                                            while($rows = mysqli_fetch_assoc($resProducts)){
                                                                $id = $rows['product_id'];
                                                                $name = $rows['product_name'];
                                                                $quantity = $rows['product_quantity'];
                                                                $price = $rows['product_price'];
                                                                $title = $rows['product_title'];
                                                                $description = $rows['product_description'];
                                                                $image = $rows['product_image'];
                                                                $category_name = $rows['category_name'];
                                                                $user_id = $rows['user_id'];
                                                                $user_name = $rows['user_name'];
                                                                $user_role = $rows['role'];
                                                                
                                                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><img src="../../assets/images/products/<?php echo $image ?>" alt=""
                                                height="100px" width="150px"></td>
                                        <td><?php echo $quantity ?></td>
                                        <td><?php echo $price ?></td>
                                        <td><?php echo $title ?></td>
                                        <td><?php echo $category_name ?></td>
                                        <td><?php echo $user_name."---".$user_role ?></td>
                            
                                        <td>
                                            <a href="album_product.php?product_id=<?php echo $id ?>">
                                                <button type="submit" title="update"
                                                    style="border: none; background-color:transparent;">
                                                    <i class="fas fa-trash fa-lg text-danger">Album</i>
                                                </button>
                                            </a>
                                            <a href="update_product.php?product_id=<?php echo $id ?>">
                                                <button type="submit" title="update"
                                                    style="border: none; background-color:transparent;">
                                                    <i class="fas fa-trash fa-lg text-danger">Sửa</i>
                                                </button>
                                            </a>
                                            <a href="delete_product.php?product_id=<?php echo $id ?>">
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
                                                        
                                                    }
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
