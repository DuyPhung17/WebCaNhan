<?php
  if(isset($_POST['submit']))
  {
    //Kiem Tra Day So
    if(isset($_POST['dayso']))
    {
      $dayso = $_POST['dayso'];
      if(empty($dayso))
        $err = "Chưa nhập dãy số";
      elseif(!preg_match('/(\d,)+(\d)$/',$dayso))
        $err = 'Hãy nhập dãy số và ngăn cách bởi dấu "," ';
    }
    //Xu Ly
    if(!isset($err))
      $mang = explode(",",$dayso);

    function in_Mang($mang)
    {
      for($i=0; $i < count($mang); $i++)
        echo $mang[$i].'&nbsp;';
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

    <h3 class="text-center mt-4 text-color">Bài 6: SẮP XẾP MẢNG</h3>
    <div class="container mt-4" style="margin-left: 27%;">
        <form action="" method="post">
            <div class="form-group w-50">
                <label>Nhập mảng: </label>
                <input type="text" name="dayso" class="form-control" value="<?php if(!empty($dayso)) echo $dayso ?>">
                <p class="text-danger"><?php if(isset($err)) echo $err ?></p>
            </div>

            <button type="submit" name="submit" class="btn btn-color">Sắp xếp</button>
            <button class="btn btn-dark" type="reset">Đặt lại</button>

            <div class="form-group w-50 mt-3">
                <p class="text-color">Sau khi sắp xếp: </p>
                <label>Tăng dần: </label>
                <input type="text" class="form-control" disabled value=
                <?php 
                  if(!empty($mang))
                  {
                    sort($mang);
                    in_Mang($mang);
                  }
                ?>>
            </div>
            <div class="form-group w-50">
                <label>Giảm dần: </label>
                <input type="text" class="form-control" disabled value=
                <?php 
                  if(!empty($mang))
                  {
                    rsort($mang);
                    in_Mang($mang);
                  }
                ?>>
            </div>
        </form>
        <a href="../Index.php" class="btn btn-secondary">Trở Về</a>
    </div>

  </body>
</html>