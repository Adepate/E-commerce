
<?php include('layouts/header.php');  ?>


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

<?php include('layouts/footer.php');  ?>


    