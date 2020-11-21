<?php 
    session_start();
    $id = $_GET['id'];
    require_once('db_config/db_connect.php');

    $sql = 'Select glasses.name as gname, glasses.image, normal_price, sale_price, rating, brand.name as bname, brand.image as bimage, id_brand 
            from glasses join brand
            on glasses.id_brand = brand.id 
            where glasses.id = '.$id;
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    $id_brand = $row['id_brand'];
    //Phan trang
    $sql_qty = 'select count(id) as qty from glasses where id_brand ='.$id_brand;
    $result_qty = mysqli_query($conn,$sql_qty);
    $row_qty = mysqli_fetch_array($result_qty);
    $total_Product = $row_qty['qty']; //Tong so san pham
    $product_perPage = 4;//So san pham tren 1 trang
    $total_Page = ceil($total_Product / $product_perPage);//tong so trang
    if(isset($_GET['pg']))
        $current_Page = $_GET['pg'];//Trang hien tai
    $index = ($current_Page - 1)*$product_perPage; //Vi tri bat dau lay trong $sql LIMIT
    $sqllq = 'select * from glasses where id_brand ='.$id_brand.' limit '.$index.', '.$product_perPage.'';
    $resultlq = mysqli_query($conn,$sqllq);

    //Comment
    $sql_cmt = 'select comment.id as cmid, text,rate, account.name as aname, account.image as aimg from comment join glasses
                    on comment.id_product = glasses.id
                    join account on comment.id_user = account.id
                where glasses.id = '.$id;
    $result_cmt = mysqli_query($conn,$sql_cmt);

    //Add Comment
    if(isset($_POST['submit']))
    {
        $text = $_POST['text'];
        $rate = $_POST['rate'];
        if(!empty($text))
        {   
            $sql_addcmt = 'INSERT INTO comment(id_product, id_user, text, rate) 
                            VALUES ('.$id.','.$_SESSION['id'].',"'.$text.'",'.$rate.')';
            mysqli_query($conn,$sql_addcmt);
        } 
        //Cap nhat rate
        $sql_rate = 'select rate from comment where id_product ='.$id;
        $result_rate = mysqli_query($conn,$sql_rate);
        $arr_rate = array();
        while($row_rate = mysqli_fetch_array($result_rate))
            $arr_rate[] = $row_rate['rate'];  
        $rating_new = round(array_sum($arr_rate)/count($arr_rate));
        //Cap nhat rating cho glasses            
        $sql_rating = 'update glasses set rating = '.$rating_new.' where id='.$id;
        mysqli_query($conn,$sql_rating);
        header("Refresh:0");
    }

?>
<!doctype html>
<html lang="en">
    <head>
        <title>Thông Tin Sản Phẩm</title>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- <script src="code.js"></script> -->
      </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php 
        include('header.php');
    ?>   

    <div class="container detail">
        <!--Detail-->
            <div class="row">
                <?php 
                    echo '
                    <div class="col-sm-6">
                        <img class="detail-img" src="img/'.$row['image'].'">
                    </div>

                    <div class="col-sm-6 detail-content">
                        <div class="product-body">
                            <h1 class="product-name">'.$row['gname'].'</h1>';
                            if(!empty($row['sale_price']))
                                echo '
                                <del class="price-old">'.number_format($row['normal_price']).' VND</del>
                                <p class="price-sale text-danger">'.number_format($row['sale_price']).' VND</p>
                                ';
                            else echo '<p class="price-unit">'.number_format($row['normal_price']).' VND</p>';
                            echo ' <p>Thương hiệu: <img height="40px" src="img/'.$row['bimage'].'"></p>';
                            echo '                    
                            <p class="price-unit"></p>
                            <p>
                                Đánh giá: ';
                                for($i=0; $i<$row['rating']; $i++)
                                    echo ' <i class="fa fa-star"></i>'; 
                            echo '</p>';
                            echo '
                        </div>

                        <div class="product-desc">
                            <p>Dòng kính mắt này được nhập khẩu từ châu Âu và Bắc Mỹ, mang phong cách thời thượng, hiện đại, phù hợp
                            với những doanh nhân thành đạt hay những chuyến đi dã ngoại hoặc đến những bãi biển. Với thiết kế chắc chắn,
                            tỉ mỉ, chất liệu gọn nhẹ sẽ mang lại cho bạn cảm giác thoải mái khi đeo.</p>
                        </div>
                        <a href="addcart.php?id='.$id.'" id="loginbtn" class="btn bg-color text-white">Thêm vào <i class="fa fa-shopping-cart"></i> </a>';
                        if(!empty($_SESSION['id']))
                            echo '<button type="button" id="signup" class="btn btn-outline-color ml-2" data-toggle="modal" data-target="#cmt">Đánh giá</button>';
                        echo '
                    </div>
                        ';
                ?>
            </div>
        <!--Detail-->
        
        <!--Comment-->
            <div style="padding-left: 50px;">
                <h5 class="text-color mt-5">ĐÁNH GIÁ TỪ KHÁCH HÀNG </h5>
                <hr id="hra_2">
            </div>
            <?php 
                if(mysqli_num_rows($result_cmt) > 0)
                {
                    while($row = mysqli_fetch_array($result_cmt))
                    {
                        echo '
                        <div class="comment_box mt-3">
                            <img src="img/'.$row['aimg'].'">
                            <div class="comment_text">
                                <h5 class="font-weight-bold text-color">'.$row['aname'].'</h6>
                                <p>'.$row['text'].'</p>
                                <p>Đánh giá:';
                                for($i=0; $i<$row['rate']; $i++)
                                        echo ' <i class="fa fa-star"></i>'; 
                                echo'</p>';
                                if(!empty($_SESSION['name']) && $row['aname'] == $_SESSION['name'])
                                echo '<a href="comment_delete.php?id='.$row['cmid'].'" class="text-dark"><i>Xóa </i></a>';
                                echo '
                            </div>
                        </div>
                        ';
                    }
                }
                else echo '<p class="ml-5">Chưa có đánh giá !</p>';
            ?>
        <!--Comment-->
        <!--Form danh gia-->
            <div class="modal fade" id="cmt">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="cmtform">
                                <a href="index.html" data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
                                <h4 class="text-center font-weight-bold text-color mt-3">ĐÁNH GIÁ SẢN PHẨM</h4>
                                <form method="post" action="">
                                <div class="form-group">
                                    <div class="comment_box_form">
                                    <?php
                                        echo'
                                        <img src="img/'.$_SESSION['img'].'">
                                        <div class="comment_text_form">
                                            <h6 class="font-weight-bold">'.$_SESSION['name'].'</h6>
                                            <textarea name="text" class="form-control" cols="50" rows="5"></textarea>
                                        </div>';
                                    ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-5 text-right">Xếp hạng: </label>
                                    <select name="rate" class="form-control col-2 select_rate">
                                      <option value="5">5 &#xf005;</option>
                                      <option value="4">4 &#xf005;</option>
                                      <option value="3">3 &#xf005;</option>
                                      <option value="2">2 &#xf005;</option>
                                      <option value="1">1 &#xf005;</option>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-color btn-block comment_box_btn">Đánh giá</button>
                                </form>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        <!--Form danh gia-->  

        <!--Sản phẩm khác-->
            <div style="padding-left: 50px;">
                <h5 class="text-color mt-5">SẢN PHẨM KHÁC CÙNG THƯƠNG HIỆU </h5>
                <hr id="hra_2">
            </div>
            <div class="row">
            <?php 
                    if(mysqli_num_rows($resultlq) > 0)
                    {
                        while($row = mysqli_fetch_array($resultlq))
                        {
                            echo '
                            <div class="col-md-3 product_item">
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
        <!--Sản phẩm khác--> 

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
        <!--Phan trang-->
        </div>
    </div>

<!----------------------- VIII. Footer -->
<?php include('footer.php') ?>

  </body>
</html>

<?php 
    mysqli_free_result($result);
    mysqli_free_result($resultlq);
    mysqli_close($conn);
?>