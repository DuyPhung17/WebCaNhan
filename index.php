<?php 
    require_once('db_config/db_connect.php');

    $sql_new = 'Select * from glasses where new = 1';
    $result_new = mysqli_query($conn,$sql_new);

    $sql_sale = 'Select * from glasses where sale_price is not null';
    $result_sale = mysqli_query($conn,$sql_sale);
    
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Mắt Kính Duy Hoàng</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.png">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="code.js"></script>
  </head>
  <body>
    <script>
        AOS.init();
    </script>
    <!----------------------- I. CREATE MENU -->
    <?php
        session_start();
        if(isset($_GET['stt']))
        {
            if($_GET['stt'] == 1)
                echo '<script type="text/javascript">swal("Chức năng giỏ hàng cần đăng nhập !", "Nếu chưa có tài khoản hãy đăng ký !", "error");</script>';
            // else echo '<script type="text/javascript">swal("Đã thêm mặt hàng này vào giỏ !", "Hãy kiểm tra giỏ hàng của bạn!", "success");</script>';
        }
        if(isset($_GET['sus']))
        {
            echo '<script type="text/javascript">swal("Đăng nhập thành công!","Chào mừng '.$_SESSION['name'].' quay trở lại","success");</script>';
        }
        if(isset($_GET['log']))
        {
            echo '<script type="text/javascript">swal("Vui lòng đăng nhập lại !", "Bạn vừa cập nhật tài khoản !", "info");</script>';
        }
        include('header.php');
    ?>

    <!----------------------- II. CREATE CAROUSEL -->
    <div class="carousel slide" data-ride="carousel" id="slides">
        <!-- Thanh nhỏ ở dưới để chuyển ảnh slide -->
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
        </ul>
        <!-- Ảnh -->
        <div class="carousel-inner">
            <div class="carousel-item  active">
                <img src="./img/slide1.jpg"  id="slide-after">
                <div class="carousel-caption">
                    <h2>CHÀO MỪNG ĐẾN VỚI MẮT KÍNH</h2>
                    <h1 class="display-2">DUY HOÀNG</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./img/slide2.jpg"  id="slide-after">
                <div class="carousel-caption">
                    <h1 class="display-4">MẪU KÍNH MỚI TỪ RAY-BAN</h1>
                    <a type="button" class="btn btn-outline-light btn-md" href="brand.php?id=7&pg=1">
                        Xem Thêm</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./img/slide3.jpg"  id="slide-after">
                <div class="carousel-caption">
                    <h1 class="display-4">BỘ SƯU TẬP VERSACE 2020</h1>
                    <a href="brand.php?id=10&pg=1" type="button" class="btn btn-outline-light btn-md">
                        Xem Thêm
                    </a>
                </div>
            </div>

            <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
    </div>

    <div class="container">
    <!----------------------- III. San Pham Moi -->
        <div class="container-fluid padding pt-5">
        <div>
            <h2 class="text-center text-color" data-aos="fade-up" data-aos-duration="500"><i class="fa fa-tag"></i>  SẢN PHẨM MỚI</h2>
            <hr id="hra">
        </div>
        <div class="row">
            <?php 
                if(mysqli_num_rows($result_new) > 0)
                {
                    while($row = mysqli_fetch_array($result_new))
                    {
                        echo '
                        <div class="col-md-3 product_item">
                            <h4 class="badge badge-danger" id="new">Mới</h4>
                            <a href="detail.php?id='.$row['id'].'&pg=1"><img class="product_image" src="./img/'.$row['image'].'"></a>
                            <h3 class="text-color">'.$row['name'].'</h3>
                            <p class="price">'.number_format($row['normal_price']).' VND</p>
                            <a href="addcart.php?id='.$row['id'].'"  class="btn bg-color text-white">Thêm vào <i class="fa fa-shopping-cart"></i> </a>
                        </div>
                        ';
                    }
                }
            ?>
        </div>
        </div>

    <!----------------------- III. San Pham Sale -->
    <div class="container-fluid padding pt-5">
        <div>
            <h2 class="text-center text-color" data-aos="fade-up" data-aos-duration="500">SẢN PHẨM GIẢM GIÁ </h2>
            <hr id="hra">
        </div>
        <div class="row">
            <?php 
                if(mysqli_num_rows($result_sale) > 0)
                {
                    while($row = mysqli_fetch_array($result_sale))
                    {
                        echo '
                        <div class="col-md-3 product_item">
                            <a href="detail.php?id='.$row['id'].'&pg=1"><img class="product_image" src="./img/'.$row['image'].'"></a>
                            <h3 class="text-color">'.$row['name'].'</h3>
                            <p class="rating">
                                Đánh giá: ';
                                for($i=0; $i<$row['rating']; $i++)
                                    echo ' <i class="fa fa-star"></i>'; 
                            echo'</p>
                            <p class="price">
                                <span class="text-danger">'.number_format($row['sale_price']).' VND</span>
                                <del>'.number_format($row['normal_price']).' VND</del>
                            </p>
                            <a href="addcart.php?id='.$row['id'].'" class="btn bg-color text-white">Thêm vào <i class="fa fa-shopping-cart"></i></a>
                        </div>
                        ';
                    }
                }
            ?>
        </div>
        </div>    
    </div>
                

<!----------------------- VII. Contact -->
<br id="cont">
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center ">
            <h2 class="text-center">LIÊN HỆ</h2>
            <hr id="hra">
        </div>
        <div class="col-12 social text-center">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <i class="fa fa-phone" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <i class="fa fa-comment" aria-hidden="true"></i>
        </div>
    </div>
</div>
</div>
<!----------------------- VIII. Footer -->
<?php include('footer.php') ?>
<div id="BT">
    <a href="ThucHanhPHP">Bài tập</a>
</div>
</body>
</html>

<?php 
    mysqli_free_result($result_new);
    mysqli_free_result($result_sale);
    mysqli_close($conn);
?>