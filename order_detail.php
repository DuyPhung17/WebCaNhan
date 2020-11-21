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
    $sql = 'Select * from bill_detail join bills 
            on bill_detail.id_bill = bills.id
            join glasses on bill_detail.id_glasses = glasses.id
            where id_bill = '.$id_bill;
    $result = mysqli_query($conn,$sql);

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

    <div class="row">
    <div class="m-4">
        <h5 class="text-color"><a class="text-secondary" href="account.php"><i style="font-size: 25px;" class="fas fa-arrow-circle-left mr-2"></i></a>Thông tin đơn hàng #<?php echo $id_bill ?></h5>
    </div>
        <table class="table">
        <thead class="bg-color text-white">
            <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
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
                        <td>'.$row['name'].'</td>
                        <td>'.$row['quantity'].'</td>';
                        if(!empty($row['sale_price']))
                            echo '<td>'.number_format($row['sale_price']).' VND</td>';
                        else echo '<td>'.number_format($row['normal_price']).' VND</td>';
                        echo '
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