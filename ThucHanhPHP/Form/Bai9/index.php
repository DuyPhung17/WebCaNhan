<!doctype html>
<html lang="en">
  <head>
    <title>Liên Hệ</title>
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

    <div class="container">
    <nav class="navbar navbar-expand-sm navbar-dark bg-color mt-2">
      <a class="navbar-brand" href="index.php">Bài 9</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="index.php?p=1">Trang Chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=2">Giới Thiệu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=3">Tin Tức</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=4">Liên Hệ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=5">Diễn Đàn</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm">
        </form>
      </div>
    </nav>
    
    <div class="text-center mt-5">
    <?php 
      if(isset($_GET['p']))
      {
        $url = $_GET['p'];
        switch($url){
          case 1: include 'trangchu.php';break;
          case 2: include 'gioithieu.php';break;
          case 3: include 'tintuc.php';break;
          case 4: include 'lienhe.php';break;
          case 5: include 'diendan.php';break;
        }
      }
      else{
        echo '<h2>BÀI 9: XÂY DỰNG GIAO DIỆN MENU</h2>';
        echo '<h3> - Phùng Bá Duy - 59.cntt-3 - </h3>';
      } 
    ?>
    <a href="../../Index.php" class="btn btn-secondary btn-lg mt-5">Trở lại</a>
    </div>
    
    </div>
  </body>
</html>