<?php 
  $errChuHo = $errCSCu = $errCSMoi = $errDonGia = $kq = "";
  $DonGia = 20000;
  if(isset($_POST['submit']))
  {
    //Kiem Tra Chu Ho
    if(empty($_POST['ChuHo']))
      $errChuHo = "* Chưa nhập tên chủ hộ";      
    else
    {
      $ChuHo = $_POST['ChuHo'];
      if(!preg_match('/[a-zA-Z]/',$ChuHo))
        $errChuHo = "Tên chủ hộ không hợp lệ";
    }
    //Kiem Tra Chi So Cu
    if(isset($_POST['CSCu']))
    {
      if(empty($_POST['CSCu']))
      $errCSCu = "* Chưa nhập chỉ số cũ";
      else 
      {
        $CSCu = $_POST['CSCu'];
        if(!is_numeric($CSCu))
          $errCSCu = "* Chỉ cho phép nhập số";
        else
        {
          if($CSCu <= 0)
            $errCSCu = "* Chỉ số cũ phải lớn hơn 0"; 
          if(empty($errCSMoi) && !empty($CSMoi) &&$CSCu > $CSMoi)
            $errCSCu = "* Chỉ số cũ không được lớn hơn Chỉ số mới";
        } 
      }
    }
    //Kiem Tra Chi So Moi
    if(isset($_POST['CSMoi']))
    {
      if(empty($_POST['CSMoi']))
      $errCSMoi = "* Chưa nhập chỉ số mới";
      else 
      {
        $CSMoi = $_POST['CSMoi'];
        if(!is_numeric($CSMoi))
          $errCSMoi = "* Chỉ cho phép nhập số";
        else 
        {
          if($CSMoi <= 0)
            $errCSMoi = "* Chỉ số mới phải lớn hơn 0";
          if(empty($errCSCu) && $CSMoi < $CSCu)
            $errCSMoi = "* Chỉ số mới không được nhỏ hơn Chỉ số cũ";
        }
      }
    }
    //Kiem Tra Don Gia 
    if(isset($_POST['DonGia']))
    {
      if(empty($_POST['DonGia']))
      {
        $DonGia = " ";
        $errDonGia = "* Chưa nhập đơn giá";
      }
      else 
      {
        $DonGia = $_POST['DonGia'];
        if(!is_numeric($DonGia))
          $errDonGia = "* Chỉ cho phép nhập số";
        else if($DonGia <= 0)
          $errDonGia = "* Đơn giá phải lớn hơn 0";
      }
    }
    //Tinh Tien
    if(empty($errChuHo) && empty($errCSCu) && empty($errCSMoi) && empty($errDonGia))
      $kq = ($CSMoi - $CSCu) * $DonGia;
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
    <h3 class=" text-center text-color mb-5">BÀI 3: THANH TOÁN TIỀN ĐIỆN</h3>

    <form action="" method="POST" style="width:40%;margin-left:30%" name="TinhTienDien">
        <div class="form-group">
          <label>Tên Chủ Hộ: </label>
          <input type="text" name="ChuHo" class="form-control" value="<?php if(isset($ChuHo)) echo $ChuHo ?>">
          <p class="text-danger"><?php if(!empty($errChuHo)) echo $errChuHo;?></p>
        </div>

        <div class="form-group">
          <label>Chỉ số cũ: </label>
          <input type="text" name="CSCu" class="form-control" value="<?php if(isset($CSCu)) echo $CSCu ?>">
          <p class="text-danger"><?php if(!empty($errCSCu)) echo $errCSCu;?></p>
        </div>

        <div class="form-group">
          <label>Chỉ số mới: </label>
          <input type="text" name="CSMoi" class="form-control" value="<?php if(isset($CSMoi)) echo $CSMoi ?>">
          <p class="text-danger"><?php if(!empty($errCSMoi)) echo $errCSMoi;?></p>
        </div>

        <div class="form-group">
          <label> Đơn Giá: </label>
          <input type="text" name="DonGia" class="form-control" value="<?php if(!empty($DonGia)) echo $DonGia ?>">
          <p class="text-danger"><?php if(!empty($errDonGia)) echo $errDonGia; ?></p>
        </div>

        <div class="form-group">
          <label>Số tiền thanh toán: </label>
          <input type="text" disabled class="form-control" value=<?php if(!empty($kq)) echo $kq ?>>
        </div>

        <button class="btn btn-color" type="submit" name="submit">Tính Toán</button>
        <button class="btn btn-dark" type="reset">Đặt lại</button>
        <a href="../Index.php" class="btn btn-secondary">Trở Về</a>
    </form> 

    </div>
  </body>
</html>