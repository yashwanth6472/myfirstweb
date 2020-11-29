

<?php
require('functions.php');
$product_shuffle = $product->getData();
$iteam_id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == "GET"){
if(isset($_POST['product_cart'])){
  $cart->insertToCart($_GET['user_id'], $_GET['id']);

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
      body{
        overflow-X: hidden;
      }
        ol li{
            margin: 10px;
            font-size: 18px;
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
      height: 19rem;
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
    .TopBrand .iteam img{
      width: auto;
      height: 10rem;
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

      
      <div class="container" style="margin-top: 2rem;">

        <div class="row">
          <?php foreach($product_shuffle as $iteam): ?>
            <?php if($iteam['id'] == $iteam_id): ?>
            <div class="col-md-6">
                <img width="auto" height="500" src="<?php echo $iteam['images']; ?>" alt="">
            </div>

            <div class="col-md-6">
                <div class="name">
                   <h2><?php echo $iteam['names']; ?></h2>
                </div>
                   <div class="rating text-warning d-flex" style="margin-left: -3rem;">
                       <ul style="list-style: none;">
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                       </ul>

                      &nbsp; <div class="text-dark">| 65,000 reviews</div>
                   </div>
                   <hr>
                   <table style="font-weight: 500;">
                       <tr>
                           <td><h5>Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; </h5></td>
                           <td>	&#x20B9;<?php echo $iteam['price']; ?></td>
                       </tr>

                       <tr>
                           <td><h5>You Save :&nbsp;&nbsp;</h5> </td>
                           <td>&#x20B9;2499</td>
                       </tr>
                   </table>

                   <div class="buttons" style="margin-left: -14px;">
                   <form method="get">
                   
                   <input type="hidden" name="id" value="<?php echo $iteam['id']; ?>">
                   <input type="hidden" name="user_id" value="<?php echo $iteam['userId']??'yashwanth'; ?>">

                   <input type="submit" class="btn btn-warning" value="Buy Now">
                   <input type="submit" name="Cart" class="btn btn-danger" value="Add To Cart">
                   
                   </form>
                   </div>

                   <hr>

                   <ol class="fluid d-flex text-center" style="list-style: none;">
                       <li><i class="far fa-shield-check"></i> <p>1 year warrenty</p> </li>
                       <li><i class="fas fa-truck-loading"></i> <p>Ecart Delivery</p> </li>
                       <li><i class="fas fa-door-closed"></i> <p> No-Contact Delivery</p></li>
                       <li><i class="fas fa-undo"></i> <p>7-Days Replacement</p> </li>
                   </ol>
            </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
<hr>
        <div class="details">
            <h3>Product Details</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit beatae, odio totam sapiente vitae laboriosam dolorem nulla, deserunt ab molestiae consequatur quae amet veritatis at sed minus aut dicta nostrum commodi, labore numquam soluta eos. Fugit sed laborum adipisci eaque, non labore voluptate! Reprehenderit quis laudantium ducimus quos perspiciatis recusandae dolorem veniam vero adipisci error quas, eligendi quisquam voluptatum natus.
            </p>
        </div>

        <div class="specification">
            <h3>Specifications</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia alias explicabo tenetur vel. Libero, deleniti at? Perferendis accusamus quos, blanditiis dolorem ducimus rerum dolores quasi quis deleniti officia voluptas ab consequuntur eum nihil earum debitis pariatur facilis natus id possimus tenetur laudantium vitae officiis. Voluptatum placeat asperiores magni exercitationem beatae unde labore accusamus quam ex facilis consequatur eius dolore excepturi recusandae, ea, tempore temporibus voluptate dicta iusto reprehenderit animi! Vero, adipisci nesciunt! Nam aut consequuntur ipsa nulla animi voluptates cupiditate error, temporibus commodi quaerat repellendus, ab quia laudantium quisquam ad. Quaerat ducimus vel repellat? Consequatur libero nulla numquam nam harum?
            </p>
        </div>


        <h4 style="margin-top: 30px">New Brand</h4>
  <div class="NewBrand">
    <div class="swiper-container">
      <div class="swiper-wrapper">
      <?php
      shuffle($product_shuffle);
      foreach($product_shuffle as $iteam): ?>
      <?php if($iteam_id != $iteam['id']): ?>
      
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
        </div>
        </div>
      <?php endif; ?>
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