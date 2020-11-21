<?php 
    session_start();
    $id = $_GET['id'];
    require_once('db_config/db_connect.php');

    //Phan trang
    $sql_qty = 'select count(id) as qty from glasses where id_brand ='.$id;
    $result_qty = mysqli_query($conn,$sql_qty);
    $row = mysqli_fetch_array($result_qty);
    $total_Product = $row['qty']; //Tong so san pham
    $product_perPage = 5;//So san pham tren 1 trang
    $total_Page = ceil($total_Product / $product_perPage);//tong so trang
    if(isset($_GET['pg']))
        $current_Page = $_GET['pg'];//Trang hien tai
    $index = ($current_Page - 1)*$product_perPage; //Vi tri bat dau lay trong $sql LIMIT

    $sql = 'Select glasses.id as gid, glasses.name as gname, glasses.image, normal_price, sale_price, rating, brand.image as bimage, id_brand 
            from glasses join brand
            on glasses.id_brand = brand.id 
            where glasses.id_brand = '.$id.' limit '.$index.', '.$product_perPage.'';
    $result = mysqli_query($conn,$sql);

    $sql_brandimage = 'select image from brand where id='.$id;
    $result_brandimage = mysqli_query($conn,$sql_brandimage);
    $bimage = mysqli_fetch_array($result_brandimage)['image'];
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Sản phẩm</title>
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
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        AOS.init();
    </script>
    <?php 
        include('header.php');
    ?>    

    <div class="container mt-5">
            <!--Sidebar-->
        <div class="row">
            <div class="col-3">
                <nav class="sidebar" id="sidebar">
                    <ul style="list-style:none;" class="rounded">
                        <li class="sb_active"><a href="brand.php?id=7&pg=1"> Ray-Ban</a></li>
                        <li class=""><a href="brand.php?id=1&pg=1"> Coach</a></li>
                        <li class=""><a href="brand.php?id=3&pg=1"> Fendi</a></li>
                        <li class=""><a href="brand.php?id=4&pg=1"> Maui Jim</a></li>
                        <li class=""><a href="brand.php?id=2&pg=1"> Dolce & Gabbana</a></li>
                        <li class=""><a href="brand.php?id=8&pg=1"> Saint Laurent</a></li>
                        <li class=""><a href="brand.php?id=5&pg=1"> Oakley</a></li>
                        <li class=""><a href="brand.php?id=6&pg=1"> Prada</a></li>
                        <li class=""><a href="brand.php?id=10&pg=1"> Versace</a></li>
                        <li class=""><a href="brand.php?id=9&pg=1"> Tory Burch</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-9">
                <div class="row">
                <?php 
                    echo '<div class="col-12 text-center position-absoluted" data-aos="zoom-out" data-aos-duration="2000"><img src="img/'.$bimage.'" height="100px"></div>';
                    while($row = mysqli_fetch_array($result))
                    {
                        echo '
                        <div class="col-md-4 product_item">
                            <a href="detail.php?id='.$row['gid'].'&pg=1"><img class="product_image" src="img/'.$row['image'].'"></a>
                            <h3 class="text-color">'.$row['gname'].'</h3>
                            <p class="rating">
                                Đánh giá: ';
                                for($i=0; $i<$row['rating']; $i++)
                                    echo ' <i class="fa fa-star"></i>'; 
                            echo'</p>
                            <p class="price">';
                                if(!empty($row['sale_price']))
                                    echo '
                                    <del>'.number_format($row['normal_price']).' VND</del>
                                    <span class="text-danger">'.number_format($row['sale_price']).' VND</span>
                                    ';
                                else echo number_format($row['normal_price']).' VND';
                            echo '</p>
                            <a href="addcart.php?id='.$row['gid'].'" id="buy" class="btn bg-color text-white">Thêm vào <i class="fa fa-shopping-cart"></i> </a>
                        </div>
                    ';
                    }
                ?>
                </div>
                
                <!--Phan trang-->
                <ul class="pagination mx-auto" style="width: 30%">
                    <?php 
                        //Gan nut truoc
                        if($_GET['pg']>1)
                            echo '        
                            <li class="page-item">
                                <a class="page-link" href="?id='.$id.'&pg='.($_GET['pg']-1).'">Trước</a>
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
                                <a class="page-link" href="?id='.$id.'&pg='.$i.'">'.$i.'<span class="sr-only">(current)</span></a>
                            </li>';
                            else echo '<li class="page-item"><a class="page-link" href="?id='.$id.'&pg='.$i.'">'.$i.'</a></li>';
                        }
                        //Gan nut sau
                        if($_GET['pg']<$total_Page)
                            echo '        
                            <li class="page-item">
                                <a class="page-link" href="?id='.$id.'&pg='.($_GET['pg']+1).'">Sau</a>
                            </li>';
                        else echo '        
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Sau</a>
                            </li>';
                    ?>
                </ul>
            </div>
        </div>
    </div>

<!----------------------- VIII. Footer -->
<?php include_once('footer.php') ?> 

  </body>
</html>