
<!doctype html>
<html lang="en">
  <head>
    <title>Trang Nhập Liệu</title>
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
    <h3 class=" text-center mb-4 text-color">BÀI 6: PHÉP TÍNH TRÊN HAI SỐ</h3>

    <form action="Bai6-KQ.php" method="post" style="width:50%;margin-left:25%" name="TinhDiem">
    
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Chọn phép tính: </label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="PhepTinh" id="Cong" value="Cộng">
            <label class="form-check-label" for="inlineRadio1">Cộng</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="PhepTinh" id="Tru" value="Trừ">
            <label class="form-check-label" for="inlineRadio1">Trừ</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="PhepTinh" id="Nhan" value="Nhân">
            <label class="form-check-label" for="inlineRadio1">Nhân</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="PhepTinh" id="Chia" value="Chia">
            <label class="form-check-label" for="inlineRadio1">Chia</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="PhepTinh" id="Chiald" value="Chia lấy dư">
            <label class="form-check-label" for="inlineRadio1">Chia lấy dư</label>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Số thứ 1: </label>
          <input type="text" name="So1" class="form-control col-sm-8">
        </div>
 
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Số thứ 2: </label>
          <input type="text" name="So2" class="form-control col-sm-8">
        </div>

        <div class="form-group row">
        <label class="col-sm-4 col-form-label"></label>
          <div class="col-sm-8 pl-0">
          <button class="btn btn-color" type="submit" name="submit">Tính Toán</button>
          <button class="btn btn-dark" type="reset">Đặt lại</button>
          <a href="../Index.php" class="btn btn-secondary">Trở Về</a>
          </div>
        </div>

    </form> 

    </div>
  </body>
</html>