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
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row" id="table-inverse">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <?php 
                            {
                                if(isset($_SESSION['update_account'])){
                                    echo $_SESSION['update_account'];
                                    unset($_SESSION['update_account']);
                                }
                                
                            }
                        ?>
                        <div class="table-responsive">
                            <table class="table table-light mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TÊN</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="ListCategory">
                                    <?php   
                                        $sql = 'SELECT * FROM users';
                                        $res = mysqli_query($connect, $sql);
                                        if($res == true){
                                            $count =mysqli_num_rows($res);
                                            if($count > 0){
                                                $i = 1;
                                                while($rows = mysqli_fetch_assoc($res)){
                                                    $id = $rows['user_id'];
                                                    $name = $rows['user_name'];
                                                    $email = $rows['user_email'];
                                                    $password = $rows['user_password'];
                                                    $role = $rows['role'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $name; ?></td>
                                                        <td><?php echo $email; ?></td>
                                                        <td><?php echo $role; ?></td>
                                                        <td>
                                                        <a href="update_account.php?user_id=<?php echo $id ?>">
                                                                <button type="submit" title="update"
                                                                    style="border: none; background-color:transparent;">
                                                                    <i class="fas fa-trash fa-lg text-danger">Sửa</i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        }else{}
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