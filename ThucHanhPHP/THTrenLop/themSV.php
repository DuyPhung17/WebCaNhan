<?php
    $conn = mysqli_connect('localhost','root','','db_lophoc')
    or die ('ket noi ko dc');
    mysqli_set_charset($conn,'utf8');

  if(isset($_POST['submit']))
  {
    $hoten = $_POST['hoten'];
    $namsinh = $_POST['namsinh'];
    $lop = $_POST['lop'];

    $sql = 'insert sinhvien(hoten,namsinh,id_lop)
            value ("'.$hoten.'",'.$namsinh.','.$lop.')';
    $result = mysqli_query($conn,$sql);

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
    <h3 class=" text-center mb-5">Thêm sinh viên</h3>

    <form action="" method="post" style="width:40%;margin-left:30%">
        <div class="form-group">
          <label for="BanKinh">Họ tên: </label>
          <input type="text" name="hoten" class="form-control" value="<?php if(isset($hoten)) echo $hoten ?>">
        </div>

        <div class="form-group">
          <label for="DienTich">Năm sinh: </label>
          <input type="text" name="namsinh" class="form-control" value= <?php if(!empty($ns)) echo $namsinh ?>>
        </div>

        <div class="form-group">
          <label for="">Lớp: </label>
          <select name="lop">
            <option value="1">59.cntt-3</option>
            <option value="2">59.cntt-1</option>
          </select>
        </div>

        <button class="btn btn-success" type="submit" name="submit">Thêm</button>
        <button class="btn btn-secondary" type="reset">Đặt lại</button>
        <a href="dssv.php" class="btn btn-primary" type="reset">Xem danh sách sinh viên</a>
    </form> 

    </div>
  </body>
</html>