<?php 
  if(isset($_POST['submit']))
  {
    $n = rand(1,100);

    function inSoChan($n)
    {
      for($i=2;$i<=$n;$i++)
      {
        if($i % 2 == 0)
          echo $i. " ";
      }
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Bài 1</title>
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
    <h2 class=" text-center text-color mb-5"> - BÀI 1 - </h2>

    <form action="" method="post" style="width:40%;margin-left:30%">
        <div class="form-group">
          <label for="ChieuDai">Sinh số ngẫu nhiên N (1 đến 100): </label>
          <input type="text" class="form-control" disabled 
          <?php 
            if(!empty($n))
              echo 'value="'.$n.'"';
          ?>
          >
        </div>
        <button class="btn btn-color" type="submit" name="submit">Random</button>

        <div class="form-group mt-3">
          <label>Các số chẵn từ 1 đến <?php if(!empty($n)) echo $n ?>: </label>
          <textarea cols="10" rows="5" disabled class="form-control"> 
          <?php
           if(!empty($n))
            echo inSoChan($n);
          ?>
          </textarea>
        </div>

        <a href="../Index.php" class="btn btn-secondary">Trở Về</a>
    </form> 

    </div>
  </body>
</html>