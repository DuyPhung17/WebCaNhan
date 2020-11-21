<?php 
  if(isset($_POST['submit']))
  {
    if(isset($_POST['n']))
    {
      $n = $_POST['n'];
      if($n=="")
        $err = "Chưa nhập số phần tử";
      elseif(!preg_match('/^\d+$/',$n))
        $err = 'Chỉ cho phép nhập số tự nhiên';
      elseif($n<=0)
        $err = "Số phần tử phải lớn hơn 0";
    }
    if(!isset($err))
    {
      $mang = array();
      for($i=0;$i<$n;$i++)
      {
        $x = rand(0,20);
        $mang[] = $x;
      }
    }
  }
  function in_Mang($mang){
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


    <h3 class="text-center mt-4 text-color">Bài 3: PHÁT SINH MẢNG & TÍNH TOÁN</h3>
    <div class="container mt-4" style="margin-left: 27%;">
        <form action="" method="post">
            <div class="form-group w-50">
                <label>Nhập số phần tử</label>
                <input type="text" name="n" class="form-control" value="<?php if(isset($n)) echo $n ?>">
                <p class="text-danger"><?php if(isset($err)) echo $err ?></p>
            </div>
            <button type="submit" name="submit" class="btn btn-color">Phát sinh và tính toán</button>
            <button class="btn btn-dark" type="reset">Đặt lại</button>
            <div class="form-group w-50 mt-3">
                <label>Mảng: </label>
                <input type="text" name="" class="form-control" disabled value=
                <?php 
                  if(!empty($mang))
                    in_Mang($mang);
                ?>>
            </div>
            <div class="form-group w-25 mt-3">
                <label>Giá trị lớn nhất: </label>
                <input type="text" name="" class="form-control" disabled value=
                <?php 
                if(!empty($mang))
                  echo max($mang);
                ?>>
            </div>
            <div class="form-group w-25 mt-3">
                <label>Giá trị nhỏ nhất: </label>
                <input type="text" name="" class="form-control" disabled value=
                <?php 
                if(!empty($mang))
                  echo min($mang);
                ?>>
            </div>
            <div class="form-group w-25 mt-3">
                <label>Tổng mảng: </label>
                <input type="text" name="" class="form-control" disabled value=
                <?php 
                if(!empty($mang))
                  echo array_sum($mang);
                ?>>
            </div>
            <div class="text-danger">(Các phần tử trong mảng có giá trị từ 0 đến 20)</div>
        </form>
        <a href="../Index.php" class="btn btn-secondary">Trở Về</a>
    </div>

  </body>
</html>