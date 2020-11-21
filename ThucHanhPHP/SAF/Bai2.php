<?php 
  if(isset($_POST['submit']))
  {
    if(isset($_POST['dayso']))
    {
      $dayso = $_POST['dayso'];
      if(empty($dayso))
        $err = "Chưa nhập dãy số";
      elseif(!preg_match('/(\d,)+(\d)$/',$dayso))
        $err = 'Hãy nhập dãy số và ngăn cách bởi dấu "," ';
    }
    if(!isset($err))
    {
      $mang = explode(",",$dayso);
      $sum = 0;
      for($i=0;$i<sizeof($mang);$i++)
          $sum += $mang[$i];
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



    <h3 class="text-center mt-4 text-color">Bài 2: NHẬP & TÍNH TRÊN DÃY SỐ</h3>
    <div class="container mt-4" style="margin-left: 27%;">
        <form action="" method="post">
            <div class="form-group w-50">
                <label >Nhập dãy số</label>
                <input type="text" name="dayso" class="form-control">
                <p class="text-danger"><?php if(isset($err)) echo $err ?></p>
            </div>
            <button type="submit" name="submit" class="btn btn-color">Tính tổng dãy số</button>
            <button class="btn btn-dark" type="reset">Đặt lại</button>
            <div class="form-group w-25">
                <label class="mt-3">Tổng dãy số: </label>
                <input type="text" name="" class="form-control" disabled value=    
                <?php 
                  if(isset($sum))
                    echo $sum
                ?>>
            </div>
        </form>
        <a href="../Index.php" class="btn btn-secondary">Trở Về</a>
    </div>

  </body>
</html>