<?php 
    session_start();
    require_once('db_config/db_connect.php');
    $total_Page = $current_Page = 1;
    if(isset($_GET['pg']))
        $current_Page = $_GET['pg'];//Trang hien tai
    if(isset($_GET['submit']) && !empty($_GET['s']))
    {   
        $s = $_GET['s'];
        $sql_qty = 'Select count(id) as qty from glasses where name like "%'.$s.'%"';
        $result_qty = mysqli_query($conn,$sql_qty);
        $row = mysqli_fetch_array($result_qty);
        $total_Product = $row['qty']; //Tong so san pham
        $product_perPage = 8;//So san pham tren 1 trang
        $total_Page = ceil($total_Product / $product_perPage);//tong so trang

        $index = ($current_Page - 1)*$product_perPage; //Vi tri bat dau lay trong $sql LIMIT

        $sql = 'Select * from glasses where name like "%'.$s.'%" limit '.$index.', '.$product_perPage.'';
        $result = mysqli_query($conn,$sql);

    }
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Tìm Kiếm</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="img/logo.png">
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- <script src="code.js"></script> -->
      </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!----------------------- I. Header -->
    <?php 
        if(isset($_GET['stt']))
        {
            if($_GET['stt'] == 1)
                echo '<script type="text/javascript">swal("Chức năng giỏ hàng cần đăng nhập !", "Nếu chưa có tài khoản hãy đăng ký !", "error");</script>';
            else echo '<script type="text/javascript">swal("Đã thêm mặt hàng này vào giỏ !", "Hãy kiểm tra giỏ hàng của bạn!", "success");</script>';
        }
        include('header.php');
    ?>   

    <div class="container search">
        <form action="" method="get">
            <div class="input-group">
                <input type="text" name="s" class="form-control" placeholder="Tìm kiếm sản phẩm" value="<?php if(isset($search)) echo $search ?>">
                <input type="text" name="pg" value="1" hidden>
                <div class="input-group-append">
                    <button class="btn btn-color" name="submit" type="submit">
                    <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <div class="row">
            <!-- <h3 class="text-center p-3 text-color col-12">Hello</h3> -->
            <?php
                if(isset($result) && mysqli_num_rows($result) > 0)
                {   
                    echo '<h4 class="text-center pt-5 text-color col-12">- Đã tìm thấy '.$total_Product.' sản phẩm -</h4>';
                    while($row = mysqli_fetch_array($result))
                    {
                        echo'
                        <div class="col-md-3 product_item">
                            <a href="detail.php?id='.$row['id'].'&pg=1"><img class="product_image" src="./img/'.$row['image'].'"></a>
                            <h3 class="text-color">'.$row['name'].'</h3>
                            <p class="price">'.number_format($row['normal_price']).' VND</p>
                            <a href="addcart.php?id='.$row['id'].'"  class="btn bg-color text-white">Thêm vào <i class="fa fa-shopping-cart"></i> </a>
                        </div>
                        ';
                    }
                }
                elseif(isset($_GET['submit']) && mysqli_num_rows($result) <= 0)
                    echo '<h4 class="text-center text-danger pt-5 text-color col-12">- Không tìm thấy sản phẩm trùng khớp ! -</h4>';
            ?>
        </div>

        <!--Phan trang-->
        <ul class="pagination mx-auto" style="width: 30%">
        <?php 
            if(isset($_GET['pg']) && isset($s) && mysqli_num_rows($result) > 0)
            {
                //Gan nut truoc
                if($_GET['pg']>1)
                echo '        
                <li class="page-item">
                    <a class="page-link" href="?pg='.($_GET['pg']-1).'&s='.$s.'&submit=">Trước</a>
                </li>';
                else echo '        
                <li class="page-item disabled">
                    <a class="page-link" href="#">Trước</a>
                </li>';
                //Gan cac trang
                for($i=1;$i<=$total_Page;$i++)
                {   
                if($i==$_GET['pg'])
                echo '        
                <li class="page-item active">
                    <a class="page-link" href="?pg='.$i.'&s='.$s.'&submit=">'.$i.'<span class="sr-only">(current)</span></a>
                </li>';
                else echo '<li class="page-item"><a class="page-link" href="?pg='.$i.'&s='.$s.'&submit=">'.$i.'</a></li>';
                }
                //Gan nut sau
                if($_GET['pg']<$total_Page)
                echo '        
                <li class="page-item">
                    <a class="page-link" href="?pg='.($_GET['pg']+1).'&s='.$s.'&submit=">Sau</a>
                </li>';
                else echo '        
                <li class="page-item disabled">
                    <a class="page-link" href="#">Sau</a>
                </li>';
            }
        ?>
        </ul>

    </div>

    <!----------------------- VIII. Footer -->
    <?php include('footer.php') ?>

  </body>
</html>

<?php 
    // mysqli_free_result($result);
    // mysqli_free_result($resultlq);
    // mysqli_close($conn);
?>