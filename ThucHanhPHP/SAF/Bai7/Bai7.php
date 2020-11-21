<?php
  if(isset($_POST['submit']))
  {
    //Kiem Tra Day So
    if(isset($_POST['duong']))
    {
      $duong = $_POST['duong'];
      if(empty($duong))
        $err = "Chưa nhập năm dương lịch";
      elseif(!is_numeric($duong))
        $err = "Năm không hợp lệ";
      elseif($duong<3)
        $err = "Năm dương lịch bắt đầu từ 3";
    }
    //Xu Ly
    if(!isset($err))
    {
      $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
      $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tị", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
      $mang_anh = array("Hoi.png", "Ty.jpeg", "Suu.jpg", "Dan.jpg", "Meo.jpg", "Thin.jpg", "Ti.png", "Ngo.jpg", "Mui.jpg", "Than.jpg", "Dau.jpg", "Tuat.jpg");
      
      $duong -= 3;
      $can = $duong % 10;
      $chi = $duong % 12;
      $am  = $mang_can[$can];
      $am  = $am." ".$mang_chi[$chi];
      $anh = $mang_anh[$chi];
      $hinh_anh = "<img src = '$anh'  width='450px'>"; 
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
    <link rel="stylesheet" href="../../style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <h3 class="text-center mt-4 text-color">Bài 7: TÍNH NĂM ÂM LỊCH</h3>
    <div class="container mt-2 mb-2" style="margin-left: 27%;">
        <form action="" method="post">
            <div class="form-group w-50">
                <label>Năm dương lịch: </label>
                <input type="text" name="duong" class="form-control" value="<?php if(!empty($duong)) echo $duong+3 ?>">
                <p class="text-danger"><?php if(isset($err)) echo $err ?></p>
            </div>

            <button type="submit" name="submit" class="btn btn-color mb-3">Chuyển </button>
            <button class="btn btn-dark mb-3" type="reset">Đặt lại</button>

            <div class="form-group w-50">
                <label>Năm âm lịch: </label>
                <input type="text" name="am" class="form-control"
                <?php if(!empty($am)) echo "value = '$am'"?>>
            </div>
            <?php 
              if(!empty($hinh_anh))
                echo $hinh_anh; 
            ?>
        </form>
        <a href="../../Index.php"  class="btn btn-secondary mt-2">Trở Về</a>
    </div>
  </body>
</html>