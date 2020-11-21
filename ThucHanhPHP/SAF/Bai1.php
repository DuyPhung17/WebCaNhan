<?php 
  if(isset($_POST['submit']))
  {
    //Cau a: Kiem Tra n
    if(isset($_POST['n']))
    {
      $n = $_POST['n'];
      if($n == "")
        $err = "Chưa nhập n";
      elseif(!preg_match('/^\d+$/',$n))
        $err = "Chỉ cho phép nhập số";
      elseif($n <= 0)
        $err = "n phải lớn hơn 0";
    }
    if(!isset($err))
    { 
      $mang = array();
      //Cau b
      for($i=0; $i<$n; $i++)
      {
        $x = random_int(-10,10);
        $mang[] = $x;
      }
      //Cau c
      function demChan($mang)
      {
        $count = 0;
        for($i=0; $i<sizeof($mang); $i++)
        {
          if($mang[$i] % 2 == 0)
            $count ++;
        }
        return $count;  
      }
      //Cau d
      function demNhoHon($mang)
      {
        $count = 0;
        for($i=0; $i < sizeof($mang); $i++)
        {
          if($mang[$i] < 100)
            $count ++;
        }
        return $count;  
      }
      //Cau e
      function tongAm($mang)
      {
        $sum = 0;
        for($i=0; $i < sizeof($mang); $i++)
        {
          if($mang[$i] < 0)
            $sum += $mang[$i];
        }
        return $sum;
      }
      //Cau f
      function viTri0($mang)
      {
        $flag = 0;
        $kq = "";
        for($i=0; $i < sizeof($mang); $i++)
        {
          if($mang[$i] == 0)
          {
            $flag = 1;
            echo $i + 1;
            echo '  ';
          }
        }
        if($flag == 0) echo 'Không có !';
      }
      //Cau g
      function sapXep($mang)
      {
        for($i=0; $i < sizeof($mang)-1; $i++)
          for($j=$i+1; $j < sizeof($mang); $j++)
          {
            if($mang[$i] > $mang[$j])
            {
              $temp = $mang[$i];
              $mang[$i] = $mang[$j];
              $mang[$j] = $temp;
            }
          }
        inMang($mang);  
      }

    }
  }
  function inMang($mang)
  {
    for($i=0;$i<sizeof($mang);$i++)
      echo $mang[$i].'&emsp;';
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
    
    <h3 class="text-center mt-4 text-color">Bài 1: XỬ LÝ SỐ TỰ NHIÊN</h3>
    <div class="container mt-4" style="margin-left: 27%;">

        <form action="" method="post" class="mx-auto">
          <div class="form-group w-50">
            <label>Nhập vào số tự nhiên n: </label>
            <input type="text" name="n" class="form-control" value="<?php if(isset($n)) echo $n ?>" >
            <p class="text-danger"><?php if(isset($err)) echo $err ?></p>
          </div>

          <button type="submit" class="btn btn-color" name="submit">Thực hiện</button>
          <button class="btn btn-dark" type="reset">Đặt lại</button>
          <a href="../Index.php" class="btn btn-secondary">Trở Về</a>

          <div class="form-group w-50 mt-3">
            <label>Dãy số nguyên dương <?php if(isset($n) && !isset($err)) echo $n ?> phần tử: </label>
            <input type="text" class="form-control" value="<?php if(isset($mang)) inMang($mang) ?>" >
          </div>

          <div class="form-group w-50 mt-3">
            <label>Số phần tử chẵn trong mảng: </label>
            <input type="text" class="form-control" value="<?php if(isset($mang)) echo demChan($mang) ?>" >
          </div>

          <div class="form-group w-50 mt-3">
            <label>Số phần nhỏ hơn 100 trong mảng: </label>
            <input type="text" class="form-control" value="<?php if(isset($mang)) echo demNhoHon($mang) ?>" >
          </div>

          <div class="form-group w-50 mt-3">
            <label>Tổng các phần tử âm trong mảng: </label>
            <input type="text" class="form-control" value="<?php if(isset($mang)) echo tongAm($mang) ?>" >
          </div>

          <div class="form-group w-50 mt-3">
            <label>Vị trí phần tử 0 trong mảng: </label>
            <input type="text" class="form-control" value="<?php if(isset($mang)) echo viTri0($mang) ?>" >
          </div>

          <div class="form-group w-50 mt-3">
            <label>Sắp xếp các phần tử tăng dần trong mảng: </label>
            <input type="text" class="form-control" value="<?php if(isset($mang)) sapXep($mang) ?>" >
          </div>
        </form>
    </div>
  </body>
</html>