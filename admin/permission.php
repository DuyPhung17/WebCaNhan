<?php 
    if (!isset($_SESSION['adm'])) {
        header('Location: ../index.php');
    }
    else{
        $adm = $_SESSION['adm'];
        if($adm == 0)
        {
            echo'<script language="javascript">
            alert("Truy cập vào trang quản trị không hợp lệ !")
            </script>';
            exit();
        }
    }
?>