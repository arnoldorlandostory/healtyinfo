<?php

session_start();

require_once ('CreateDb.php');
require_once ('component.php');


// create instance of Createdb class
$database = new CreateDb("Productdb", "Producttb");

if (isset($_POST['add'])){
  /// print_r($_POST['product_id']);
  if(isset($_SESSION['cart'])){

      $item_array_id = array_column($_SESSION['cart'], "product_id");

      if(in_array($_POST['product_id'], $item_array_id)){
          echo "<script>alert('Product is already added in the cart..!')</script>";
          echo "<script>window.location = 'book.php'</script>";
      }else{

          $count = count($_SESSION['cart']);
          $item_array = array(
              'product_id' => $_POST['product_id']
          );

          $_SESSION['cart'][$count] = $item_array;
      }

  }else{

      $item_array = array(
              'product_id' => $_POST['product_id']
      );

      // Create new session variable
      $_SESSION['cart'][0] = $item_array;
      print_r($_SESSION['cart']);
  }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beli Obat</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>






<p class="Judul">Pilih Obat </p>
<a href="cart.php" class="next">></a>
<?php require_once ("header-rs.php"); ?>
<div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
            ?>
        </div>
</div>



<!-- Footer start -->
<footer>
  <div class="socials">
    <a href="https://instagram.com/arnold.ot?igshid=MzNlNGNkZWQ4Mg=="><i 
      data-feather="instagram"></i></a>
    <a href="https://twitter.com/4th_Noob"><i 
      data-feather="twitter"></i></a>
    <a href="https://www.facebook.com/arnold.orlandotarigan.7"><i 
      data-feather="facebook"></i></a>
  </div>
 

 <div class="links">
    <a href="Tes.html">Beranda</a>
    <a href="#services">Services</a>
    <a href="Article.html">Article</a>
    <a href="#about">Tentang Kami</a>
 </div>

 <div class="credit">
  <p>Created by <a href="">Arnold Orlando Tarigan</a>. | &copy; 2023</p>
 </div>


</footer>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
