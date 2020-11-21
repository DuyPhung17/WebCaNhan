<!doctype html>
<html lang="en">
    <head>
        <title>Tài khoản</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@8af0edd/css/all.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="img/logo.png">
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- <script src="code.js"></script> -->
      </head>
  <body>
  <?php 
    session_start();
    require_once('db_config/db_connect.php');
    if(isset($_GET['id']))
        $id_bill = $_GET['id'];
    if(isset($_GET['fail']))
        echo '<script type="text/javascript">swal("Mật khẩu sai !", "Nếu chưa có tài khoản hãy đăng ký !", "error");</script>';
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['password']))
        {
            $password = $_POST['password'];
            if($password == $_SESSION['pwd'])
                header('location: editaccount.php?id='.$_SESSION['id']);

            else{
                header('location: account.php?fail=1');
            }
        }  
    }
    $sql_bill = 'Select *
                from bills join account 
                    on bills.id_customer = account.id
                where bills.id = '.$id_bill;
    $result_bill = mysqli_query($conn,$sql_bill);
    $bill = mysqli_fetch_array($result_bill);

    $sql_detail = 'Select * from bill_detail join bills 
            on bill_detail.id_bill = bills.id
            join glasses on bill_detail.id_glasses = glasses.id
            where id_bill = '.$id_bill;
    $result_detail = mysqli_query($conn,$sql_detail);

?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!----------------------- I. Header -->
    <?php 
        include('header.php');
        if(isset($check) && isset($name))
        echo '<script type="text/javascript">swal("Tạo tài khoản thành công!", "Tên tài khoản: '.$name.'", "success");</script>';
    ?>   

<div class="container mt-4">
    
    <div class="bill_detail p-5">

        <h4 class="text-center pb-3 font-weight-bold"><img src="img/logo.png" height="25px" class="mr-1"> THÔNG TIN HÓA ĐƠN</h4>
        <br>
        <?php 
            echo '
            <p><b>Tên khách hàng: &emsp;</b>'.$bill['name'].'</p>
            <p><b>Địa chỉ: &emsp;</b>'.$bill['address'].'</p>
            <p><b>Số điện thoại: &emsp;</b>'.$bill['phone'].'</p>
            <p><b>Ngày đặt hàng: &emsp;</b>'.date('d/m/Y',strtotime($bill['date_order'])).'</p>
            <br>
            <b>Chi tiết hóa đơn:</b>
            <table class="table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                </tr>
            </thead>
            <tbody>';
            while($row = mysqli_fetch_array($result_detail))
            {
                echo '
                <tr>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['quantity'].'</td>';
                    if(!empty($row['sale_price']))
                        echo '<td>'.number_format($row['sale_price']).' VND</td>';
                    else echo '<td>'.number_format($row['normal_price']).' VND</td>';
                    echo'
                </tr>';
            }
            echo '</tbody>
        </table>
            <p><b class="text-right">Tổng tiền: '.number_format($bill['total']).' VND </b></p>';
        ?>
        <br><br><br>
        <p class="text-center mb-1"><i>Cảm ơn quý khách đã mua hàng !</i></p>
    </div>

    <!-- check password -->
    <div class="modal fade" id="checkpass">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div id="lgform">
                                <a href="index.html" data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
                                <form method="post" action="">
                                    <div class="text-center">
                                        <?php 
                                            echo '<img id="accimg" src="./img/'.$_SESSION['img'].'">'; 
                                            echo '<h5><b>'.$_SESSION['name'].'</b></h5>';                                   
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                        <label>Nhập mật khẩu</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                        <a href="#" class="text-color">Quên mật khẩu</a>
                                        <button type="submit" name="submit" id="signup" href="#" class="btn btn-color ml-5">Tiếp tục</button>
                                    </div>
                                </form>
                            </div>    
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
    <!----------------------- VIII. Footer -->
    <?php include('footer.php') ?>

  </body>
</html>

<?php 
    // mysqli_free_result($result);
    // mysqli_free_result($resultlq);
    // mysqli_close($conn);
?>