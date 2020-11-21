<?php 
  if(isset($_GET['id']))
    $id = $_GET['id'];

  require_once('db_config/db_connect.php');
  $sql = 'delete from comment where id='.$id;
  mysqli_query($conn,$sql);
  
  header('Location: '.$_SERVER['HTTP_REFERER']);
?>