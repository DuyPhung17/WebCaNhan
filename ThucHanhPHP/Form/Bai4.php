<?php
  $errToan = $errLy = $errHoa = $errDC = $kq = "";
  $tong = 0;
  if(isset($_POST['submit']))
  {
    //Kiem Tra Toan
    if(isset($_POST['Toan']))
    {
      $Toan = $_POST['Toan'];
      if(empty($Toan))
        $errToan = "* Chưa nhập điểm Toán";
      else if(!is_numeric($Toan))
        $errToan = "* Chỉ cho phép nhập số";
      else if($Toan < 0 || $Toan > 10)
        $errToan = "* Vui lòng nhập điểm trong khoảng từ 0 đến 10";
    }
    //Kiem Tra Ly
    if(isset($_POST['Ly']))
    {
      $Ly = $_POST['Ly'];
      if(empty($Ly))
        $errLy = "* Chưa nhập điểm Lý";
      else if(!is_numeric($Ly))
        $errLy = "* Chỉ cho phép nhập số";
      else if($Ly < 0 || $Ly > 10)
        $errLy = "* Vui lòng nhập điểm trong khoảng từ 0 đến 10";
    }
    //Kiem Tra Hoa
    if(isset($_POST['Hoa']))
    {
      $Hoa = $_POST['Hoa'];
      if(empty($Hoa))
        $errHoa = "* Chưa nhập điểm Hóa";
      else if(!is_numeric($Hoa))
        $errHoa = "* Chỉ cho phép nhập số";
      else if($Hoa < 0 || $Hoa > 10)
        $errHoa = "* Vui lòng nhập điểm trong khoảng từ 0 đến 10";
    }
    //Kiem Tra Diem Chuan
    if(isset($_POST['DiemChuan']))
    {
      $DiemChuan = $_POST['DiemChuan'];
      if(empty($DiemChuan))
        $errDC = "* Chưa nhập điểm chuẩn";
      else if(!is_numeric($DiemChuan))
        $errDC = "* Chỉ cho phép nhập số";
      else if($DiemChuan < 0)
        $errDC = "* Không cho phép nhập số âm";
    }
    //Tinh Diem Tong
    if(empty($errToan) && empty($errLy) && empty($errHoa) && empty($errDC))
      $tong = $Toan + $Ly + $Hoa;
    //Kiem Tra Ket Qua
    if(!empty($tong))
    {
      if($Toan>0 && $Ly>0 && $Hoa>0 && $tong>$DiemChuan)
        $kq = "Đậu";
      else $kq = "Rớt";    
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
    <h3 class=" text-center text-color mb-4">BÀI 4: KẾT QUẢ THI ĐẠI HỌC</h3>

    <form action="" method="post" style="width:40%;margin-left:30%" name="TinhDiem">
        <div class="form-group">
          <label>Toán: </label>
          <input type="text" name="Toan" class="form-control" value="<?php if(isset($Toan)) echo $Toan ?>">
          <p class="text-danger"><?php if(!empty($errToan)) echo $errToan;?></p>
        </div>

        <div class="form-group">
          <label>Lý: </label>
          <input type="text" name="Ly" class="form-control" value="<?php if(isset($Ly)) echo $Ly ?>">
          <p class="text-danger"><?php if(!empty($errLy)) echo $errLy;?></p>
        </div>

        <div class="form-group">
          <label>Hóa: </label>
          <input type="text" name="Hoa" class="form-control" value="<?php if(isset($Hoa)) echo $Hoa ?>">
          <p class="text-danger"><?php if(!empty($errHoa)) echo $errHoa;?></p>
        </div>

        <div class="form-group">
          <label>Điểm chuẩn: </label>
          <input type="text" name="DiemChuan" class="form-control" value="<?php if(isset($DiemChuan)) echo $DiemChuan ?>">
          <p class="text-danger"><?php if(!empty($errDC)) echo $errDC;?></p>
        </div>

        <div class="form-group">
          <label>Tổng điểm: </label>
          <input type="text" class="form-control" disabled value=<?php if(!empty($tong)) echo $tong ?>>
        </div>

        <div class="form-group">
          <label>Kết quả thi: </label>
          <input type="text" disabled class="form-control" value=<?php if(!empty($kq)) echo $kq ?>>
        </div>

        <button class="btn btn-color" type="submit" name="submit">Tính Toán</button>
        <button class="btn btn-dark" type="reset">Đặt lại</button>
        <a href="../Index.php" class="btn btn-secondary">Trở Về</a>
    </form> 

    </div>
  </body>
</html>