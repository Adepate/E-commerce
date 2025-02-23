<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <!--Nav bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container">
            <img class="logo" src="assets/imgs/logo.jpg" alt="">
            <h2 class="brand">Orange</h2>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact us</a>
              </li>
              <li class="nav-item">
                <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i> </a>
                <a href="account.html"><i class="fa-solid fa-user"></i> </a>

              </li>
            </ul>
           
          </div>
        </div>
      </nav>


      <!--Home section-->
      <section id="home">
        <div class="container"> 
            <h5>NEW ARRIVALS</h5>
           <h1><span>Best Prices</span> This Season</h1>
           <p>Eshop offers the best products for the most affordqable prices</p>
           <button>Shop now</button>
           </div>
           
      </section>


           <!--brand-->
        <section id="brand" class="container">
            <div class="row">
                <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg" alt="">
                <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg" alt="">
                <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg" alt="">
                <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg" alt="">
            </div>
        </section>

        <!--new-->
        <section id="new" class="w-100">
            <div class="row p-0 m-0">
                <!--one-->
                <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                    <img class="img-fluid" src="assets/imgs/shop3.jpg" alt="">
                    <div class="details">
                        <h2>Extreamly Awesome</h2>
                        <button class="text-uppercase">Shop now</button>
                    </div>
                </div>
                <!--two-->
                <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                    <img class="img-fluid" src="assets/imgs/shop1.jpg" alt="">
                    <div class="details">
                        <h2>Awesome bag</h2>
                        <button class="text-uppercase">Shop now</button>
                    </div>
                </div>
                <!--three-->
                <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                    <img class="img-fluid" src="assets/imgs/shop2.jpg" alt="">
                    <div class="details">
                        <h2>30% off</h2>
                        <button class="text-uppercase">Shop now</button>
                    </div>
                </div>
            </div>
        </section>

        <!--features-->
        <section id="featured" class="my-5 pb-5">
            <div class="container text-center mt-5 py-5">
                <h3>Our featured</h3>
                 <hr class="mx-auto">
                <p>Here you can check our featured product</p>
            </div>
            <div class="row mx-auto container-fluid">

        <?php include('server/get_featured_product.php');  ?>

        <?php while($row= $featured_products->fetch_assoc()){ ?>

                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <h4 class="p-price"># <?php echo $row['product_price']; ?></h4>
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
                </div>

                <?php } ?>
                           
            </div>

        </section>


        <!--banner-->
        <section id="banner">
            <div class="container">
                <h4>MID SEASON'S SALE</h4>
                <h1>Autum Collection <br> UP to 30% OFF</h1> 
                <button class="text-uppercase">shop now</button>
            </div>

        </section>

        <!--clothes-->
        <section id="featured" class="my-5">
            <div class="container text-center mt-5 py-5">
                <h3>Dresses & Coats</h3>
                 <hr class="mx-auto">
                <p>Here you can check out our amazing clothes </p>
            </div>
            <div class="row mx-auto container-fluid">

            <?php include('server/get_coats.php'); ?>
            <?php while($row=$coats_products->fetch_assoc()){ ?>

                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <h4 class="p-price">#<?php echo $row['product_price']; ?></h4>
                    <button class="buy-btn">Buy Now</button>
                </div>

                <?php }  ?>

            </div>
        </section>


         <!--watches-->
         <section id="featured" class="my-5">
            <div class="container text-center mt-5 py-5">
                <h3>Best Watches</h3> <hr class="mx-auto">
                <p>Check out our unique watches </p>
            </div>
            <div class="row mx-auto container-fluid">
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/watch1.jpg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name">Sport shoe</h5>
                    <h4 class="p-price">#14,000</h4>
                    <button class="buy-btn">Buy Now</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/watch2.jpg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name">Sport shoe</h5>
                    <h4 class="p-price">#16,000</h4>
                    <button class="buy-btn">Buy Now</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/watch1.jpg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name">Sport shoe</h5>
                    <h4 class="p-price">#10,000</h4>
                    <button class="buy-btn">Buy Now</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/watch2.jpg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name">Sport shoe</h5>
                    <h4 class="p-price">#12,000</h4>
                    <button class="buy-btn">Buy Now</button>
                </div>


            </div>

        </section>


          <!--shoes-->
        <section id="shoes" class="my-5">
            <div class="container text-center mt-5 py-5">
                <h3>Shoes</h3> <hr class="mx-auto">
                <p>Here you can check out our amazing shoes </p>
            </div>
            <div class="row mx-auto container-fluid">
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/shoe1.jpg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name">Sport shoe</h5>
                    <h4 class="p-price">#14,000</h4>
                    <button class="buy-btn">Buy Now</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/shoe4.jpg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name">Sport shoe</h5>
                    <h4 class="p-price">#16,000</h4>
                    <button class="buy-btn">Buy Now</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/shoe5.jpg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name">Sport shoe</h5>
                    <h4 class="p-price">#10,000</h4>
                    <button class="buy-btn">Buy Now</button>
                </div>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/shoe6.jpg" alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name">Sport shoe</h5>
                    <h4 class="p-price">#12,000</h4>
                    <button class="buy-btn">Buy Now</button>
                </div>


            </div>

        </section>


        <!--footer-->
        <footer class="mt-5 py-5">
            <div class="row container mx-auto pt-5">
                <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                    <img class="logo" src="assets/imgs/logo.jpg" alt="kjk">
                    <p class="pt-3">we provide the best product for the most affordable price </p>
                </div>
                <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                    <h5 class="pb-2">featured</h5>
                        <ul class="text-uppercase">
                            <li><a href="#">men</a></li>
                            <li><a href="#">women</a></li>
                            <li><a href="#">boy</a></li>
                            <li><a href="#">girls</a></li>
                            <li><a href="#">new arrival</a></li>
                            <li><a href="#">clothes</a></li> 
                        </ul>
                </div>

                <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                    <h5 class="pb-2">Contact Us</h5>
                    <div>
                        <h6 class="text-uppercase">Address</h6>
                        <p>123, simpson street,lagos</p>
                    </div>
                   
                    <div>
                        <h6 class="text-uppercase">Phone</h6>
                        <p>08142862135</p>
                    </div>
                    <div>
                        <h6 class="text-uppercase">Email</h6>
                        <p>benz@gmail.com</p>
                    </div>
                    </div>

                     <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                        <h5 class="pb-2">Instagram</h5>
                        <div class="row">
                            <img src="assets/imgs/feature1.jpg" class="img-fluid w-25 h-100 m-2" alt="">
                            <img src="assets/imgs/feature2.jpg" class="img-fluid w-25 h-100 m-2" alt="">
                            <img src="assets/imgs/feature3.jpg" class="img-fluid w-25 h-100 m-2" alt="">
                            <img src="assets/imgs/feature4.jpg" class="img-fluid w-25 h-100 m-2" alt="">
                            <img src="assets/imgs/feature5.jpg" class="img-fluid w-25 h-100 m-2" alt="">

                        </div>
                    </div>
                </div>
                
                    <div class="copyright mt-5">
                        <div class="row container mx-auto">
                            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                                <img src="assets/imgs/payment4.jpg" alt="hh">
                            </div>
                            <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mx-auto mb-2">
                                <p>eCommerce @ 2025 ALL Right Reserved</p>
                            </div>
                            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-square-x-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                
        </footer>


      
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>