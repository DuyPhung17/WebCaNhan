<?php 
    $conn = mysqli_connect('localhost','root','','db_bansua')
    or die ('ket noi ko dc');
    mysqli_set_charset($conn,'utf8');

    $sql = 'SELECT * from hang_sua';
    $result = mysqli_query($conn,$sql) or die('Truy van sai');
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <div class="container mt-4">
    <h3 class=" text-center mb-4 text-color"> - BÀI 1 - </h3>
    <table class="table table-hover table-dark">
        <thead class="thead-light">
            <tr>
                <th>Mã HS</th>
                <th>Tên Hãng Sữa</th>
                <th>Địa Chỉ</th>
                <th>Điện Thoại</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($row = mysqli_fetch_array($result)) 
                    echo'
                    <tr>
                        <td>'.$row['Ma_hang_sua'].'</td>
                        <td>'.$row['Ten_hang_sua'].'</td>
                        <td>'.$row['Dia_chi'].'</td>
                        <td>'.$row['Dien_thoai'].'</td>
                        <td>'.$row['Email'].'</td>
                    </tr>
                ';
                mysqli_free_result($result);
                mysqli_close($conn);
            ?>
        </tbody>
    </table>
    <a href="../Index.php" class="btn btn-secondary">Trở Về</a>
    </div>
    
  </body>
</html>