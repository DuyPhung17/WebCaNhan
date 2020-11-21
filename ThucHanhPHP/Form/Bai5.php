<?php 
  $errBD = $errKT = $kq = "";
  if(isset($_POST['submit']))
  {
    //Kiem Tra Gio Bat Dau
    if(isset($_POST['BatDau']))
    {
      $BatDau = $_POST['BatDau'];
      if($BatDau =="")
        $errBD = "* Chưa nhập giờ bắt đầu";
      elseif(!is_numeric($BatDau))
        $errBD = "* Chỉ cho phép nhập số";
      elseif($BatDau < 0 || $BatDau > 24)
        $errBD = "Hãy nhập giờ trong khoảng từ 1 đến 24";
      if(isset($KetThuc) && $KetThuc=="" && $BatDau > $KetThuc)
        $errBD = "Giờ bắt đầu phải nhỏ hơn giờ kết thúc !";
    }
    //Kiem Tra Gio Ket Thuc
    if(isset($_POST['KetThuc']))
    {
      $KetThuc = $_POST['KetThuc'];
      if($KetThuc=="")
        $errKT = "* Chưa nhập giờ kết thúc";
      elseif(!is_numeric($KetThuc))
        $errKT = "* Chỉ cho phép nhập số";
      elseif($KetThuc < 0 || $KetThuc > 24)
        $errKT = "Hãy nhập giờ trong khoảng từ 1 đến 24";
      if($BatDau=="" && $KetThuc < $BatDau)
        $errKT = "Giờ kết thúc phải nhỏ hơn giờ bắt đầu !";
    }
    //Tinh Tien
    if(empty($errBD) && empty($errKT))
    {
      if($BatDau >= 10 && $KetThuc <= 17)
        $kq = ($KetThuc - $BatDau) * 20000;
      elseif($BatDau >= 17 && $KetThuc <= 24)
        $kq = ($KetThuc - $BatDau) * 45000;
      else $kq = 'Không hợp lệ !';
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
    <h3 class=" text-center text-color mb-4">BÀI 5: TÍNH TIỀN KARAOKE</h3>

    <form action="" method="post" style="width:40%;margin-left:30%" name="TinhDiem">
    
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Giờ bắt đầu: </label>
          <input type="text" name="BatDau" class="form-control col-sm-7" value="<?php if(isset($BatDau)) echo $BatDau ?>">
          <label class="col-sm-1 col-form-label">(h)</label>
        </div>
        <div class="form-group row">
          <p class="text-danger col-sm-4"></p>
          <p class="text-danger col-sm-8"><?php if(!empty($errBD)) echo $errBD;?></p>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Giờ kết thúc: </label>
          <input type="text" name="KetThuc" class="form-control col-sm-7" value="<?php if(isset($KetThuc)) echo $KetThuc ?>">
          <label class="col-sm-1 col-form-label">(h)</label>
        </div>
        <div class="form-group row">
          <p class="text-danger col-sm-4"></p>
          <p class="text-danger col-sm-8"><?php if(!empty($errKT)) echo $errKT;?></p>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Tiền thanh toán: </label>
          <input type="text" name="Tong" class="form-control col-sm-7" disabled value="<?php if(!empty($kq)) echo $kq ?>">
          <label class="col-sm-1 col-form-label">(VND)</label>
        </div>

        <div class="form-group row">
        <p class="col-sm-4"></p>
          <div class="col-sm-8 pl-0 pt-3">
            <button class="btn btn-color" type="submit" name="submit">Tính Toán</button>
            <button class="btn btn-dark" type="reset">Đặt lại</button>
            <a href="../Index.php" class="btn btn-secondary">Trở Về</a>
          </div>
        </div>

    </form> 

    </div>
  </body>
</html>