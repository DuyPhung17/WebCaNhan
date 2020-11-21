<?php 
$err = false;
$kq = 0;
if(isset($_POST['submit']))
{
  //Kiem Tra Phep Tinh
  if(isset($_POST['PhepTinh']))
    $PhepTinh = $_POST['PhepTinh'];
  else
    header('location: Bai7-NL.php?error= Chưa chọn phép tính !');
  //Kiem Tra So 1
  if(isset($_POST['So1']))
  {
    $So1 = str_replace(",",".",$_POST['So1']);
    if(empty($So1))
      header('location: Bai7-NL.php?error= Chưa nhập đủ 2 số !');
    elseif(!is_numeric($So1))
      header('location: Bai7-NL.php?error= Chỉ cho phép nhập số !');
  }
  //Kiem Tra So 2
  if(isset($_POST['So2']))
  {    
    $So2 = str_replace(",",".",$_POST['So2']);
    if($So2=="")
      header('location: Bai7-NL.php?error= Chưa nhập đủ 2 số !');
    elseif(!is_numeric($So2))
      header('location: Bai7-NL.php?error= Chỉ cho phép nhập số !');
    elseif(!empty($PhepTinh))
      if($PhepTinh == "Chia" || $PhepTinh == "Chia lấy dư"  && $So2 == 0)
      header('location: Bai7-NL.php?error= Không thực hiện được phép chia cho 0 !');
  }

  //Tinh Toan
  switch($PhepTinh)
  {
    case 'Cộng': $kq = $So1 + $So2;break;
    case 'Trừ':  $kq = $So1 - $So2;break;
    case 'Nhân': $kq = $So1 * $So2;break;
    case 'Chia': $kq = $So1 / $So2;break;
    case 'Chia lấy dư': $kq = $So1 % $So2;break;
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Trang Kết Quả</title>
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
    <h3 class=" text-center mb-4 text-color">BÀI 7: PHÉP TÍNH TRÊN HAI SỐ (MỞ RỘNG)</h3>

    <form action="" method="post" style="width:40%;margin-left:30%" name="TinhDiem">
    
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Chọn phép tính: </label>
          <label class="col-sm-8 col-form-label">
            <?php 
              if(isset($PhepTinh)) echo $PhepTinh; 
            ?>
          </label>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Số thứ 1: </label>
          <input type="text" name="So1" class="form-control col-sm-8" disabled value=<?php if(isset($So1)) echo $So1?>>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Số thứ 2: </label>
          <input type="text" name="So2" class="form-control col-sm-8" disabled value=<?php if(isset($So2)) echo $So2?>>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Kết quả: </label>
          <input type="text" name="So2" class="form-control col-sm-8" disabled value="<?php if(isset($kq)) echo $kq ?>">
        </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-4 col-form-label"></label>
          <a href="javascript:window.history.back(-1);" class="btn btn-secondary">Trở Về</a>
        </div>

    </form> 

    </div>
  </body>
</html>