<?php 
    $conn = mysqli_connect('localhost','root','','db_bansua')
    or die ('ket noi ko dc');
    mysqli_set_charset($conn,'utf8');

    $current_Page = 1;
    if(isset($_GET['pg']))
        $current_Page = $_GET['pg'];//Trang hien tai 
    $sql_qty = 'Select count(ma_sua) as qty from sua';
    $result_qty = mysqli_query($conn,$sql_qty);
    $row = mysqli_fetch_array($result_qty);
    $total_Product = $row['qty']; //Tong so san pham
    $product_perPage = 5;//So san pham tren 1 trang
    $total_Page = ceil($total_Product / $product_perPage);//tong so trang

    $index = ($current_Page - 1)*$product_perPage; //Vi tri bat dau lay trong $sql LIMIT
  
    $sql = 'SELECT * from sua,hang_sua,loai_sua where sua.Ma_hang_sua = hang_sua.Ma_hang_sua and sua.Ma_loai_sua = loai_sua.Ma_loai_sua
            LIMIT '.$index.', '.$product_perPage.'';
    $result = mysqli_query($conn,$sql) or die('Truy van sai');

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Bài 5</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <div class="container mt-4">
    <h2 class="text-center mt-4 mb-4 text-color">- THÔNG TIN CÁC SẢN PHẨM -</h2>
    <table class="table table-hover table-striped" style="width:50%; margin:auto; ">
        <tbody>
            <?php 
                while($row = mysqli_fetch_array($result)) 
                    echo'
                    <tr>
                        <td><img height="100px" src="img/'.$row['Hinh'].'"/></td>
                        <td><p><b>'.$row['Ten_sua'].'</b></p>
                        <p>Nhà sản xuất: '.$row['Ten_hang_sua'].'
                        <br>'.$row['Ten_loai'].' - '.$row['Trong_luong'].'gr - '.number_format($row['Don_gia']).' VND</p>
                        </td>
                    </tr>
                ';
                mysqli_free_result($result);
                mysqli_close($conn);
            ?>
        </tbody>
    </table>


<!--Phan trang-->
<ul class="pagination mx-auto" style="width: 40%">
  <?php 
      if(isset($_GET['pg']))
      {
          //Gan nut truoc
          if($_GET['pg']>1)
          echo '        
          <li class="page-item">
              <a class="page-link" href="?pg='.($_GET['pg']-1).'">Trước</a>
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
              <a class="page-link" href="?pg='.$i.'">'.$i.'<span class="sr-only">(current)</span></a>
          </li>';
          else echo '<li class="page-item"><a class="page-link" href="?pg='.$i.'">'.$i.'</a></li>';
          }
          //Gan nut sau
          if($_GET['pg']<$total_Page)
          echo '        
          <li class="page-item">
              <a class="page-link" href="?pg='.($_GET['pg']+1).'">Sau</a>
          </li>';
          else echo '        
          <li class="page-item disabled">
              <a class="page-link" href="#">Sau</a>
          </li>';
      }
      else header('location: Bai5.php?pg=1');
  ?>
</ul>
<a href="../Index.php" class="btn btn-secondary mb-5 ml-5 mx-auto">Trở Về</a>
    </div>

  </body>
</html>