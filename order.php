<?php 
    session_start();
    require_once('db_config/db_connect.php');
    $cart = $_SESSION['cart'];
    // Tao bill moi
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $sql_new_bill = 
    'INSERT INTO bills (id_customer, date_order, total) 
    VALUES ('.$_SESSION['id'].',"'.date('Y-m-d').'",'.$_SESSION['total'].')';
    mysqli_query($conn,$sql_new_bill);
    $id_bill = mysqli_insert_id($conn);

    //Them mat hang vao bill_detail
    foreach($cart as $id=>$qty)
    {
        $sql_prd = 'select * from glasses where id ='.$id;
        $result_prd = mysqli_query($conn,$sql_prd);
        $row = mysqli_fetch_array($result_prd);

        $sql_new_detail =
        'INSERT INTO bill_detail(id_bill, id_glasses, quantity, normal_price) 
        VALUES ('.$id_bill.','.$row['id'].' ,'.$qty.' ,'.$row['normal_price'].' )';
        mysqli_query($conn,$sql_new_detail);
        unset($_SESSION['cart']);
        header('location: account.php?w=1');
    }

?>
