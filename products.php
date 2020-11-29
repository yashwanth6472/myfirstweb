
<?php 
session_start();
require('functions.php');
$product_shuffle = $product->getData();
// print_r($product_shuffle);

if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST['product_cart'])){
    $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CellShop</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        *{
            padding: 0;
            border-radius: 20px;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;

        }
        body{
          overflow-X: hidden;
        }
        .banner img{
            width: 100%;
            height: 30rem;
        }
        p #pre{
            position: absolute;
            top: 35%;
            left: 2%;
            font-size: 50px;
            background-color: transparent;
            border: none;
            color: white;
        }

        p #next{
            position: absolute;
            top: 35%;
            right: 2%;
            font-size: 50px;
            background-color: transparent;
            border: none;
            color: white;
        }
        .swiper-container {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
      
    }
    .swiper-slide .iteam
    {
      border: 1px solid black;
      width: 12rem;
      height: 23rem;
      margin-top: 30px;
    }
    .swiper-slide .iteam img{
      width: auto;
      height: 10rem;
      border-radius: 0px;
      padding: 10px;
    }
    .TopBrand{
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      margin-top: 30px;
      grid-row-gap: 30px;
    }
    .TopBrand .iteam{
      border: 1px solid black;
      width: 12rem;
      height: 22rem;
      text-align: center;
    }
    .TopBrand .iteam img{
      width: auto;
      height: 10rem;
      padding: 10px;
      border-radius: 0px;
    }
    </style>
</head>
<body>

      
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
        <a class="navbar-brand" href="products.php">CellShope</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#topsale">Top Sale</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#topbrand">Top Brand</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#newbrand">New Brand</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">My Cart</a>
            </li>
            
            
          </ul>
          
          <i style="margin-left: 12rem; font-size: 22px; font-weight: 500;" class="fas fa-user"><span style="margin: 1rem;"><?php echo $_SESSION['user_name']; ?></span></i>

          <i class="fas fa-cart-plus fa-2x" style="margin-left: 20%;"><span style="margin: 10px; font-size: 20px; font-weight: 500;"><?php echo count($product->getData('cart')) . '  Iteams In Cart'; ?></span></i>
        </div>

      </nav>
      
<div class="banner">
    <img class="nature" src="images/banner1.jpg" >
    <img class="nature" src="images/banner2.png">
    <img class="nature" src="images/banner3.jpg">
    
    <p>
    <button id="pre" onclick="myShow.previous()"><i class="fas fa-angle-left"></i></button>
    <button id="next" onclick="myShow.next()"><i class="fas fa-angle-right"></i></button>
    </p>
</div>

<div class="container">
  <h4 style="margin-top: 40px" id="topsale">TOP SALE</h4>
  <div class="TopSale">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php 
        shuffle($product_shuffle);
        foreach($product_shuffle as $iteam): ?>
        <div class="swiper-slide">
          <div class="iteam">
           <a href="<?php printf("index.php?id=%s", $iteam['id']); ?>"> <img src="<?php echo $iteam['images'];?>" alt=""></a>
        
          <div class="name">
            <h6><?php echo $iteam['names']; ?></h6>
          </div>
        
          <div class="rating text-warning">
            <li class="fas fa-star"></li>
            <li class="fas fa-star"></li>
            <li class="fas fa-star"></li>
            <li class="fas fa-star"></li>
            <li class="fas fa-star"></li>
          </div>
        
        <div class="price"><h4>	&#x20B9;<?php echo $iteam['price']; ?></h4></div>
        
        <form action="" method="post">
        <input type="hidden" name='user_id' value="<?php echo $iteam['user_id']??2; ?>">
        <input type="hidden" name='item_id' value="<?php echo $iteam['id'] ?>">
        <button type="submit" name="product_cart" class="btn btn-warning">Add To Cart</button>
        </form>
        </div>
        </div>
        <?php endforeach; ?>
      </div>
      <!-- Add Pagination -->
    
    </div>
  </div>

  <h4 style="margin-top: 40px;">Top Brand</h4>
  <div class="TopBrand" id="topbrand">

  <?php shuffle($product_shuffle);
   foreach($product_shuffle as $iteam): ?>
    <div class="iteam fluid">
     <a href="<?php printf("index.php?id=%s", $iteam['id']); ?>"><img src="<?php echo $iteam['images']; ?>" alt=""></a>
  
    <div class="name">
      <h6><?php echo $iteam['names'] ?></h6>
    </div>
  
    <div class="rating text-warning">
      <li class="fas fa-star"></li>
      <li class="fas fa-star"></li>
      <li class="fas fa-star"></li>
      <li class="fas fa-star"></li>
      <li class="fas fa-star"></li>
    </div>
  
  <div class="price"><h4>	&#x20B9;<?php echo $iteam['price']; ?></h4></div>
  <form action="" method="post">
        <input type="hidden" name='user_id' value="<?php echo $_iteam['user_id']??2; ?>">
        <input type="hidden" name='item_id' value="<?php echo $iteam['id'] ?>">
        <button type="submit" name="product_cart" class="btn btn-warning">Add To Cart</button>
        </form>

  <h1></h1>
 </div>
 
 
  <?php  endforeach; ?>
  </div>

  <h4 style="margin-top: 30px">New Brand</h4>
  <div class="NewBrand" id="newbrand">
    <div class="swiper-container">
      <div class="swiper-wrapper">
      <?php
      shuffle($product_shuffle);
      foreach($product_shuffle as $iteam): ?>
        <div class="swiper-slide">
          <div class="iteam">
            <a href="<?php printf("index.php?id=%s", $iteam['id']); ?>"><img src="<?php echo $iteam['images'];?>" alt=""></a>
        
          <div class="name">
            <h6><?php echo $iteam['names']; ?></h6>
          </div>
        
          <div class="rating text-warning">
            <li class="fas fa-star"></li>
            <li class="fas fa-star"></li>
            <li class="fas fa-star"></li>
            <li class="fas fa-star"></li>
            <li class="fas fa-star"></li>
          </div>
        
        <div class="price"><h4>	&#x20B9;<?php echo $iteam['price']; ?></h4></div>
        <form action="" method="post">
        <input type="hidden" name='user_id' value="<?php echo $iteam['user_id']??'2'; ?>">
        <input type="hidden" name='item_id' value="<?php echo $iteam['id'] ?>">
        <button type="submit" name="product_cart" class="btn btn-warning">Add To Cart</button>
        </form>
        </div>
        </div>
        <?php endforeach; ?>
      </div>
   
      <!-- Add Pagination -->
    
    </div>
  </div>
</div>


<footer style="background-color: #3c3c3c; margin-top: 40px;"> 
  <div class="row" style="background-color: #3c3c3c; color: white; text-align: center; padding: 50px;">
    <div class="col-lg-4">
      <h4>More Links</h4>
      <ul style="list-style: none;">
        <li>Profile</li>
        <li>My Order</li>
        <li>My Cart</li>
        <li>Contact Us</li>
        <li>Help</li>
        
      </ul>  
    </div>

    <div class="col-lg-4">
      <h4>Refrence</h4>
    <ul style="list-style: none;">
      <li><a href="" class="text-light">Top Sale</a></li>
      <li><a href="" class="text-light">Top Brand</a></li>
      <li><a href="" class="text-light">new Brand</a></li>
    </ul>
    </div>
  

  
    <div class="col-lg-4">
      <input type="text" class="form-control" placeholder="User Mail Id">
      <button type="submit" class="btn btn-danger text-light" style="margin: 40px;">Subscribe</button>
    </div>


    <p class="text-light" style="margin-left: 42%; margin-top: 40px;">&copy;Copyright 21-2022 By CellShop</p>
    
  </div>
  
</footer>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
myShow = w3.slideshow(".nature", 10000);
</script>
<script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 5,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  </script>
</body>
</html>