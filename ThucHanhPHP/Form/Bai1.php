<?php
  $errBK = $cv = $dt = "";
  const PI = 3.14;
  if(isset($_POST['submit']))
  {
    if(empty($_POST['bk']))
      $errBK = "* Chưa nhập bán kính";
    else 
    {
      $bk = $_POST['bk'];
      if(!is_numeric($bk))
        $errBK = "* Chỉ cho phép nhập số";
      else if($bk <= 0)
        $errBK = "* Bán kính phải lớn hơn 0";
    }
    if(empty($errBK))
    {
      $cv = $bk * PI * 2;
      $dt = pow($bk,2) * PI;
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
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
    <h3 class=" text-center mb-5 text-color">BÀI 1: DIỆN TÍCH & CHU VI HÌNH TRÒN</h3>

    <form action="" method="post" style="width:40%;margin-left:30%">
        <div class="form-group">
          <label for="BanKinh">Bán Kính: </label>
          <input type="text" name="bk" class="form-control" value="<?php if(isset($bk)) echo $bk ?>">
          <p class="text-danger"><?php if(!empty($errBK)) echo $errBK;?></p>
        </div>

        <div class="form-group">
          <label for="DienTich">Chu Vi: </label>
          <input type="text" disabled class="form-control" value= <?php if(!empty($cv)) echo $cv ?>>
        </div>

        <div class="form-group">
          <label for="DienTich">Diện Tích: </label>
          <input type="text" disabled class="form-control" value= <?php if(!empty($dt)) echo $dt ?>>
        </div>

        <button class="btn btn-color" type="submit" name="submit">Tính Toán</button>
        <button class="btn btn-dark" type="reset">Đặt lại</button>
        <a href="../Index.php" class="btn btn-secondary">Trở Về</a>
    </form> 

    </div>
  </body>
</html>