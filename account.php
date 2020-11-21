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
    $sql = 'Select * from account join bills 
            on account.id = bills.id_customer where id_customer = '. $_SESSION['id'].' AND status=1';
    $result = mysqli_query($conn,$sql);

    $sql_wait = 'Select * from account join bills 
            on account.id = bills.id_customer where id_customer = '. $_SESSION['id'].' AND status=0';
    $result_wait = mysqli_query($conn,$sql_wait);

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
        if(isset($_GET['w']))
        echo '<script type="text/javascript">swal("Đặt hàng thành công !", "Đơn hàng của bạn đang chờ để duyệt", "success");</script>';
    ?>   

<div class="container mt-5">
    <h3 class=" text-center mb-4">-Thông tin tài khoản -</h3>
    
    <div class="row">
        <div class="col-4">
            <?php echo '<img class="avt_user" src="img/'.$_SESSION['img'].'">';?>
        </div>
        <div class="col-8">
            <table class="table table-acc">
                <tbody>
                    <tr>
                        <td><b>Tên tài khoản:</b></td>
                        <td><?php echo $_SESSION['name'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Tên đăng nhập: </b></td>
                        <td><?php echo $_SESSION['usn'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Số điện thoại: </b></td>
                        <td><?php echo $_SESSION['phone'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Địa chỉ: </b></td>
                        <td><?php echo $_SESSION['addr'] ?></td>
                    </tr>
                    <tr>
                        <td><a class="btn btn-color" data-toggle="modal" data-target="#checkpass" href="#">Sửa thông tin</a></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!--Waiting-->
    <div class="row">
            <h4>Đơn hàng đang đợi duyệt</h4>
            <table class="table table-hover">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>STT</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th></th>
                    </tr>
                </thead>
            <tbody>
                <?php 
                    $i = 1;
                    while($row = mysqli_fetch_array($result_wait))
                    {
                        echo '
                        <tr>
                            <td>'.$i++.'</td>
                            <td>'.date('d/m/Y',strtotime($row['date_order'])).'</td>
                            <td>'.number_format($row['total']).' VND</td>
                            <td>
                                <a class="btn btn-sm btn-color" href="order_detail.php?id='.$row['id'].'">Chi tiết</a>
                                <a class="btn btn-sm btn-danger" href="bill_delete.php?id='.$row['id'].'">Hủy</a>
                            </td>
                        </tr>';
                    }
                ?>
            </tbody>
            </table>
        </div>

            <!--history-->
    <div class="row">
        <h4>Lịch sử mua hàng</h4>
        <table class="table table-hover">
            <thead class="bg-color text-white">
                <tr>
                    <th>STT</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th></th>
                </tr>
            </thead>
        <tbody>
            <?php 
                $i = 1;
                while($row = mysqli_fetch_array($result))
                {
                    echo '
                    <tr>
                        <td>'.$i++.'</td>
                        <td>'.date('d/m/Y',strtotime($row['date_order'])).'</td>
                        <td>'.number_format($row['total']).' VND</td>
                        <td>
                            <a class="btn btn-sm btn-color" href="bill_detail.php?id='.$row['id'].'">Chi tiết</a>
                        </td>
                    </tr>';
                }
            ?>
        </tbody>
        </table>
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



    <!----------------------- VIII. Footer -->
    <?php include('footer.php') ?>

  </body>
</html>

<?php 
    // mysqli_free_result($result);
    // mysqli_free_result($resultlq);
    // mysqli_close($conn);
?>