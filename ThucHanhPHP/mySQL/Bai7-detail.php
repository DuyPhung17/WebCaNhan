<?php 
    $conn = mysqli_connect('localhost','root','','db_bansua')
    or die ('ket noi ko dc');
    mysqli_set_charset($conn,'utf8');
  
    if(isset($_GET['id']))
        $id = $_GET['id'];

    $sql = 'SELECT * from sua where Ma_sua = "'.$id.'"';
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Bài 7</title>
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
    
    <div class="container mt-4 w-50">
    <h2 class="text-center mt-4 mb-4 text-color">- <?php echo $row['Ten_sua']  ?> -</h2>

    <div class="row">
        <?php 
            echo '
            <div class="col-5">
                <img height="200px" src="img/'.$row['Hinh'].'"/>
            </div>
            <div class="col-7">
                <p>
                    <b>Thành phần dinh dưỡng</b>
                    <br>'.$row['TP_Dinh_Duong'].'
                </p>
                <p>
                    <b>Lợi ích</b>
                    <br>'.$row['Loi_ich'].'
                </p>
                <p class="text-right">
                    <b>Trọng lượng: </b>'.$row['Trong_luong'].'gr - 
                    <b>Đơn giá: </b>'.number_format($row['Don_gia']).' VND
                </p>
            </div>
            ';
        ?>

    </div>

    <a href="Bai7.php" class="btn btn-secondary">Trở Về</a>
    </div>

  </body>
</html>