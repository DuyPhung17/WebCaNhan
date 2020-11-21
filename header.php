<?php 

    require_once('db_config/db_connect.php');
    if(isset($_POST['login']))
    {
        $usn = $_POST['usn'];
        $pwd = $_POST['pwd'];
        $sql = 'select * from account 
                where username ="'.$usn.'" && password = "'.$pwd.'"';
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {   
            $row = mysqli_fetch_array($result);
            $_SESSION['id'] = $row['id'];
            $_SESSION['usn'] = $row['username'];
            $_SESSION['pwd'] = $row['password'];
            $_SESSION['adm'] = $row['admin'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['addr'] = $row['address'];
            $_SESSION['img'] = $row['image'];
            if($row['admin']==1)  
                header('location: admin/index.php');
            else{
                echo '<script type="text/javascript">swal("Đăng nhập thành công!","Chào mừng '.$_SESSION['name'].' quay trở lại","success");</script>';
                header('location: index.php?sus=1');
            }
        }
        else echo '<script type="text/javascript">swal("Đăng nhập thất bại!", "Tên đăng nhập hoặc mật khẩu không đúng !", "error");</script>';
    }
    $count = 0;
    if(isset($_SESSION['cart']))
    foreach($_SESSION['cart'] as $id=>$qty)
        $count += $_SESSION['cart'][$id];
?>

<nav class="navbar navbar-expand-sm  sticky-top shadow-lg" id="navbar">                                    
        <!-- Place Logo -->
        <a class="navbar-brand" href="index.php">
            <img height="50px" src="./img/logo2.png" id="logo">
        </a>
        <!-- Button Collapse Menu -->
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_res">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menu Responsive, hide in small screen-->
        <div class="collapse navbar-collapse menu" id="navbar_res">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" id="navlink" href="index.php">Trang Chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="navlink" href="about.html">Giới Thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="navlink" href="brand.php?id=7&pg=1">Sản Phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="navlink" href="search.php">Tìm Kiếm</a>
                </li>
                <?php 
                    if(isset($_SESSION['name']))
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" id="navlink" href="logout.php">Đăng Xuất</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="navlink" href="cart.php"><i class="fa fa-shopping-cart cart"></i>
                        <span class="badge badge-pill badge-danger" id="cart_count">'.$count.'</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="navlink" href="account.php">'.$_SESSION['name'].'<img class="ml-2 avt" height="30px" src="img/'.$_SESSION['img'].'"></a>
                    </li>
                    ';
                    else echo '
                    <li class="nav-item">
                        <a class="nav-link" id="navlink" data-toggle="modal" data-target="#login" href="#login">Đăng Nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="navlink" href="cart.php"><i class="fa fa-shopping-cart cart"></i>

                        </a>
                    </li>
                    ';
                ?>
                
            </ul>
        </div>   
    </nav>

    <!-- LoginForm -->
    <div class="modal fade" id="login">
        <div class="modal-dialog lgform">
            <div class="modal-content">
                <div class="modal-body">
                    
                        <div class="row justify-content-center">
                            
                                <a href="index.html" data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
                                <form method="post" class="col-8">
                                    <div class="text-center">
                                        <img id="logimg" src="./img/logo.png">
                                        
                                    </div>
                                    <div class="form-group">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                      <label> Tên đăng nhập</label>
                                      <input type="text" class="form-control" id="username" name="usn">
                                    </div>
                                    <div class="form-group">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                        <label> Mật khẩu</label>
                                        <input type="password" class="form-control" id="pass" name="pwd">
                                    </div>

                                    <p class="text-center mt-2"><i>(Admin: duy-123 &nbsp; || &nbsp; Guest: duy2-123)</i></p>
                                    <button type="submit" name="login" id="loginbtn" class="btn btn-color btn-block mt-3">Đăng Nhập</button>
                                    <a id="signup" href="register.php" class="btn btn-outline-color btn-block mb-2">Đăng Ký</a>
                                </form>
                              
                        </div> 
                    
                </div>
            </div>
        </div>
    </div>