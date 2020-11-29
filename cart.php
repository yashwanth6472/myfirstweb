<?php
session_start();
require('functions.php');
 $product_shuffle = $product->getData();


 if($_SERVER['REQUEST_METHOD'] == "POST"){
   if(isset($_POST['remove_iteam'])){
     $cart->deleteCart($_POST['item_id']);
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
     td{
       border-bottom: 1px solid #000;
     }
      body{
        overflow-X: hidden;
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
      height: 21rem;
      margin-top: 30px;
    }
    .swiper-slide .iteam img{
      width: auto;
      height: 10rem;
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
      height: 19rem;
      text-align: center;
    }
    .NewBrand .iteam img{
      width: auto;
      height: 10rem;
    }
   
    
    .iteam .content{
      margin-left: 15rem;
      
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
              <a class="nav-link" href="#">Top Sale</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Top Brand</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">New Brand</a>
            </li>
            
          </ul>

          <i class="fas fa-cart-plus fa-2x" style="margin-left: 60%;"><span style="margin: 10px; font-size: 20px; font-weight: 500;"><?php echo count($product->getData('cart')) . '  Iteams In Cart'; ?></span></i>
        </div>
      </nav>

      
      <div class="container">
      <?php
      foreach($product->getData('cart') as $iteams): 
                  $cart_iteam = $product->getProduct($iteams['id']);
                        $subTotal[]=array_map(function($iteams){
              ?>

              
        <div class="iteam d-flex"  style="margin-top: 2rem; border: 1px solid rgba(0,0,0,0.4);">
          <section style="width: 20%;">
            <img src="<?php echo $iteams['images']; ?>" width="auto" height="200" alt="">
          </section>


          <section style="width: 80%;">
            <div class="name">
              <h4><?php echo $iteams['names']; ?></h4>
            </div>
              <div class="ratings text-warning">
                <li class="fas fa-star"></li>
                <li class="fas fa-star"></li>
                <li class="fas fa-star"></li>
                <li class="fas fa-star"></li>
                <li class="fas fa-star"></li>
              </div>
              <span> | 65,000</span>


              <div class="price">
                <h5>&#x20B9;<?php echo $iteams['price'];
                
               
                ?></h5>
              </div>

              <div class="option" style="margin-top: 8px;">
                <select name="Size" id="Size">
                  <option value="">Size</option>
                  <option value="">S</option>
                  <option value="">M</option>
                  <option value="">L</option>
                  <option value="">XL</option>
                </select>
  
                <select name="quantuity" id="">
                  <option value="">Quantity</option>
                  <option value="">1</option>
                  <option value="">2</option>
                  <option value="">3</option>
                  <option value="">4</option>
                </select>
              </div>
              

           <form method="post">
           <input type="hidden" value="<?php echo $iteams['id']; ?>" name="item_id">
           <button type="submit" name="remove_iteam" class="btn btn-danger m-2">REMOVE</button>

           
           </form>
          </section>
        </div>
        <?php
return $iteams['price'];
}, $cart_iteam);//closing map

    

        endforeach; 
        
    
        ?>
         </div>
<hr>
<div class="container" style="margin-left: 28%;">
<?php 
if(!isset($subTotal)){
  echo '<img src="images/emptykart.gif" width="auto"; height="500" alt=""> <br>';
  echo "<h4 style='margin-left: 24%; margin-top: -5rem; margin-bottom: 10rem;'>Empty Cart</h4>";
}
?>
</div>


      <div class="container">
      <h4 style="margin-top: 1rem; margin-bottom: -2rem;">Bill:</h4>
                <div class="bill text-center">
                  <table style="border: 1px solid #000; width: 50%; font-weight: 500; font-size: 20px;">

                  <tr>
                    <td>Price  </td>
                    <td>&#x20B9;&nbsp;<?php echo isset($subTotal)? $cart->add($subTotal) : 0; ?></td>
                  </tr>

                  <tr>
                    <td>You Save  </td>
                    <td>&#x20B9;&nbsp; <?php echo isset($subTotal)?999:0; ?></td>
                  </tr>

                  <hr>

                  <tr>
                    <td style="border: none;">Total Cost  </td>
                    <td style="border: none;">&#x20B9; <?php echo isset($subTotal)?$cart->add($subTotal) - 999 : 0; ?>                   
</td>
                  </tr>

                  </table>
                </div> 
                <button type="submit" name="remove_iteam" class="btn btn-warning m-2">Place Order</button>

      </div>
       
                 
  
             
<div class="container">

<h4 style="margin-top: 30px">New Brand</h4>
  <div class="NewBrand">
    <div class="swiper-container">
      <div class="swiper-wrapper">
      <?php
      shuffle($product_shuffle);
      foreach($product_shuffle as $iteam): ?>
        <div class="swiper-slide">
          <div class="iteam">
            <img src="<?php echo $iteam['images'];?>" alt="">
        
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
        <input type="hidden" name='user_id' value="<?php echo $iteam['user_id']??'2' ?>">
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
             

     


     
      <footer style="background-color: #3c3c3c; margin-top: 30px;"> 
        <div class="row" style="background-color: #3c3c3c; color: white; text-align: center; padding: 50px; height: 20rem;">
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