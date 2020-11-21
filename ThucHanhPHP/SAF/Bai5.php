<?php
  if(isset($_POST['submit']))
  {
    //Kiem Tra Day So
    if(isset($_POST['dayso']))
    {
      $dayso = $_POST['dayso'];
      if(empty($dayso))
        $errDS = "Chưa nhập dãy số";
      elseif(!preg_match('/(\d,)+(\d)$/',$dayso))
        $errDS = 'Hãy nhập dãy số và ngăn cách bởi dấu "," ';
    }
    //Kiem Tra So can thay the
    if(isset($_POST['socantt']))
    {
      $socantt = $_POST['socantt'];
      if($socantt=="")
        $errSCTT = "Chưa nhập số cần thay thế";
      elseif(!preg_match('/^\d+$/',$socantt))
        $errSCTT = 'Chỉ cho phép nhập số tự nhiên';
      elseif($socantt<=0)
        $errSCTT = "Số cần thay thế phải lớn hơn 0";
    }
    //Kiem Tra So can thay the
    if(isset($_POST['sott']))
    {
      $sott = $_POST['sott'];
      if($sott=="")
        $errSTT = "Chưa nhập số thay thế";
      elseif(!preg_match('/^\d+$/',$sott))
        $errSTT = 'Chỉ cho phép nhập số tự nhiên';
      elseif($sott<=0)
        $errSTT = "Số thay thế phải lớn hơn 0";
    }
    //Xu Ly
    if(!isset($errDS) && !isset($errSCTT) && !isset($errSTT) )
      $mang = explode(",",$dayso);

    function in_Mang($mang)
    {
      for($i=0; $i < count($mang); $i++)
        echo $mang[$i].'&nbsp;';
    }

    function thayThe($mang,$socantt,$sott)
    {
      if(in_array($socantt,$mang))
      {
        for($i=0; $i < count($mang); $i++)
          if($mang[$i]==$socantt)
          {
            $mang[$i] = $sott;
            in_Mang($mang);
            break;
          }
      }
      else echo "Không thay thế được !";
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

    <h3 class="text-center mt-4 text-color">Bài 5: THAY THẾ SỐ</h3>
    <div class="container mt-4" style="margin-left: 27%;">
        <form action="" method="post">
            <div class="form-group w-50">
                <label>Nhập dãy số: </label>
                <input type="text" name="dayso" class="form-control" value="<?php if(!empty($dayso)) echo $dayso ?>">
                <p class="text-danger"><?php if(isset($errDS)) echo $errDS ?></p>
            </div>

            <div class="form-group w-25">
                <label>Nhập số cần thay thế: </label>
                <input type="text" name="socantt" class="form-control" value="<?php if(!empty($socantt)) echo $socantt ?>">
                <p class="text-danger"><?php if(isset($errSCTT)) echo $errSCTT ?></p>
            </div>

            <div class="form-group w-25">
                <label>Nhập số thay thế: </label>
                <input type="text" name="sott" class="form-control" value="<?php if(!empty($sott)) echo $sott ?>">
                <p class="text-danger"><?php if(isset($errSTT)) echo $errSTT ?></p>
            </div>

            <button type="submit" name="submit" class="btn btn-color">Thay thế</button>
            <button class="btn btn-dark" type="reset">Đặt lại</button>

            <div class="form-group w-50 mt-3">
                <label>Mảng ban đầu: </label>
                <input type="text" class="form-control" disabled value=
                <?php 
                  if(!empty($mang))
                    in_Mang($mang);
                ?>>
            </div>
            <div class="form-group w-50">
                <label>Mảng sau khi thay thế: </label>
                <input type="text" class="form-control" disabled value=
                <?php 
                  if(!empty($mang) && !empty($socantt) && !empty($sott))
                    thayThe($mang,$socantt,$sott);
                ?>>
            </div>
        </form>
        <a href="../Index.php" class="btn btn-secondary">Trở Về</a>
    </div>

  </body>
</html>