<?php 
  if(isset($_POST['submit']))
  {
    //Kiem Tra Name
    if(isset($_POST['name']))
    {
      $name = $_POST['name'];
      if(empty($name))
        $name = "Chưa nhập Name";
      elseif(!preg_match('/[a-zA-Z]/',$name))
        $name = "Name không hợp lệ";
    }
    //Kiem Tra Address
    if(isset($_POST['addr']))
    {
      $addr = $_POST['addr'];
      if(empty($addr))
        $addr = "Chưa nhập Address";
      elseif(!preg_match('/[a-zA-Z0-9]/',$addr))
        $addr = "Address không hợp lệ";  
    }
    //Kiem Tra Phone
    if(isset($_POST['phone']))
    {
      $phone = $_POST['phone'];
      if(empty($phone))
        $phone = "Chưa nhập Phone";
      elseif(!preg_match('/[0-9]/',$phone))
        $phone = "Phone không hợp lệ";    
    }
    //Kiem Tra Gender
    if(isset($_POST['gender']))
      $gender = $_POST['gender'];
    else $gender = "Chưa chọn Gender";

    //Kiem Tra Country
    if(isset($_POST['country']))
      $country = $_POST['country'];

    //Kiem Tra Study
    $listStudy = "";
    if(isset($_POST['study']))
    { 
      $arrStudy = array();
      $study = $_POST['study'];
      foreach($study as $selected)
        $arrStudy[] = $selected;
      $listStudy = implode(', ',$arrStudy);
    }
    else $listStudy = "Chưa chọn Study nào";

    //Kiem Tra Note
    if(isset($_POST['note']))
      $note = $_POST['note'];
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>CONFIG</title>
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
    <h4 class=" text-center mb-4 text-color">- Bạn đã nhập thành công! Dưới đây là thông tin đã nhập -</h4>

    <form action="" method="" style="width:50%;margin-left:20%" name="TinhDiem">
        
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Fullname: </label>
            <label class="col-sm-4 col-form-label">
              <?php 
                if(!empty($name)) echo $name;
              ?>
            </label>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Address: </label>
            <label class="col-sm-4 col-form-label">
              <?php 
                if(!empty($addr)) echo $addr;
              ?>
            </label>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Phone: </label>
            <label class="col-sm-4 col-form-label">
              <?php 
                if(!empty($phone)) echo $phone;
              ?>
            </label>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Gender: </label>
          <label class="col-sm-4 col-form-label">
              <?php 
                if(!empty($gender)) echo $gender;
              ?>
            </label>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Country: </label>
            <label class="col-sm-4 col-form-label">
              <?php 
                if(!empty($country)) echo $country;
              ?>
            </label>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Study</label>
            <label class="col-sm-8 col-form-label">
              <?php
                if(!empty($listStudy)) echo $listStudy;
              ?>
            </label>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Note: </label>
          <label class="col-sm-4 col-form-label">
              <?php 
                echo $_POST['note'];
              ?>
            </label>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label"></label>
            <div class="col-sm-8">
            <a href="javascript:window.history.back(-1);" class="btn btn-secondary">Trở Về</a>
            </div>
        </div>

    </form> 

    </div>
  </body>
</html>