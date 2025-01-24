<?php

session_start();

require_once ("php/CreateDb.php");
require_once ("php/component.php");

$db = new CreateDb("Productdb", "Producttb");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
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
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<header>
    <nav class="navbar">
      <a href="Tes.html" class="navbar-logo"
        ><img src="Asset\Image\Healtyinfo.png"
      /></a>

      <div class="navbar-nav1">
        <a href="Tes.html">Beranda</a>
        <a href="services.html">Services</a>
        <a href="Article.html">Article</a>
        <a href="#about">Tentang Kami</a>
      </div>

      <div class="navbar-log">
        <a href="login.html">Profile</a>
      </div>
    </nav>
</header>




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



<?php
    require_once ('header-rs.php');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <a class="back" href="book.php">Back to Item</a>
                <h6>My Cart</h6>
                <hr>

                <?php

                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
                                    $total = $total + (int)$row['product_price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>Rp<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>Rp<?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>
        <a class="formulir" href="Form.php">LANJUTKAN KE FORM</a>
        </div>
    </div>
    
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
