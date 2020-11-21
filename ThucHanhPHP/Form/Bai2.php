<?php 
  $errCD = $errCR = $cv = $dt = "";
  if(isset($_POST['submit']))
  {
    //Kiem Tra Chieu Dai
    if(empty($_POST['cd']))
      $errCD = "* Chưa nhập chiều dài";
    else 
    {
      $cd = $_POST['cd'];
      if(!is_numeric($cd))
        $errCD = "* Chỉ cho phép nhập số";
      else if($cd <= 0)
        $errCD = "* Chiều dài phải lớn hơn 0";
    }
    //Kiem Tra Chieu Rong
    if(empty($_POST['cr']))
      $errCR = "* Chưa nhập chiều rộng";
    else 
    {
      $cr = $_POST['cr'];
      if(!is_numeric($cr))
        $errCR = "* Chỉ cho phép nhập số";
      else if($cr <= 0)
        $errCR = "* Chiều rộng phải lớn hơn 0";
      else if(!empty($cd) && $cr > $cd)
        $errCR = "* Chiều rộng phải nhỏ hơn Chiều dài";
    }
    //Tinh DT & CV
    if(empty($errCD) && empty($errCR))
    {
      $cv = ($cd + $cr) * 2;
      $dt = $cd * $cr;
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
    <h3 class=" text-center text-color mb-5">BÀI 2: DIỆN TÍCH HÌNH CHỮ NHẬT</h3>
    <form action="" method="post" style="width:40%;margin-left:30%">
        <div class="form-group">
          <label for="ChieuDai">Chiều Dài: </label>
          <input type="text" name="cd" class="form-control" value= <?php if(isset($cd)) echo $cd;?>>
          <p class="text-danger"><?php if(!empty($errCD)) echo $errCD;?></p>
        </div>

        <div class="form-group">
          <label for="ChieuRong">Chiều Rộng: </label>
          <input type="text" name="cr" class="form-control" value=<?php if(isset($cr)) echo $cr;?>>
          <p class="text-danger"><?php if(!empty($errCR)) echo $errCR;?></p>
        </div>

        <div class="form-group">
          <label for="DienTich">Diện Tích: </label>
          <input type="text" disabled name="DienTich" class="form-control" value =<?php if(!empty($dt)) echo $dt;?>>
        </div>

        <button class="btn btn-color" type="submit" name="submit">Tính Toán</button>
        <button class="btn btn-dark" type="reset">Đặt lại</button>
        <a href="../Index.php" class="btn btn-secondary">Trở Về</a>
    </form> 
    </div>
  </body>
</html>