<?php

session_start();
//error_reporting(0);
if(isset($_POST['add_to_cart'])){

    //if user has already added product to cart
    if(isset($_SESSION['cart'])){

        $products_array_ids = array_column($_SESSION['cart'],"product_id");//return an array produt
        if( !in_array($_POST['product_id'], $products_array_ids)){

            $product_id = $_POST['product_id'];
     
            $product_array = array(
                                 'product_id' => $_POST['product_id'],
                                 'product_name' => $_POST['product_name'],
                                 'product_price' => $_POST['product_price'],
                                 'product_image' => $_POST['product_image'],
                                 'product_quantity' => $_POST['product_quantity']
            );
     
            $_SESSION['cart'][$product_id] = $product_array;

            //product added succesful
        } else {
            echo '<script>alert("Product was already added to the cart");</script>';
        }

        // if this first product
    } else{

       $product_id =  $_POST['product_id'];
       $product_name =  $_POST['product_name'];
       $product_price =  $_POST['product_price'];
       $product_image =  $_POST['product_image'];
       $product_quantity =  $_POST['product_quantity'];

       $product_array = array(
                            'product_id' => $product_id,
                            'product_name' => $product_name,
                            'product_price' => $product_price,
                            'product_image' => $product_image,
                            'product_quantity' => $product_quantity
       );

       $_SESSION['cart'][$product_id] = $product_array;

    }



    //calc total
    calculateTotalCart();



//remove product from crt
} else if(isset($_POST['remove_product'])){

    $product_id = $_POST['product_id'];

    unset($_SESSION['cart'][$product_id]);

    //calculate total
    calculateTotalCart();

} else if(isset($_POST['edit_quantity'])){

    //get id and quantity from form
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    

    //get the product arry from the session
    $product_array = $_SESSION['cart'][$product_id];

    //update product quntity
    $product_array['product_quantity'] = $product_quantity;

    //return array back to its place
    $_SESSION['cart'][$product_id] = $product_array;

    //calculate total incase we update quantity
    calculateTotalCart();

}
else {
   // header('location: index.php');
}


//calculate total
function calculateTotalCart(){

        $total = 0;

    foreach($_SESSION['cart'] as $key => $value){
        //return an array
        $product = $_SESSION['cart'][$key];

        $price = $product['product_price'];
        $quantity = $product['product_quantity'];

            //each time it is going to add total 
        $total = $total + ($price * $quantity);
    }

    $_SESSION['total'] = $total;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

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

 <!--Cart-->
      <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Your Cart</h2>
            <hr>
        </div>

            <table class="mt-5 pt-5">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </tr>
                
            <?php foreach($_SESSION['cart'] as $key => $value){ ?>

                <tr>
                    <td>
                        <div class="product-info">
                            <img src="assets/imgs/<?php echo $value['product_image'];?>"/>
                            <div>
                                <p><?php echo $value['product_name']; ?></p>
                                <small><span>&#8358;</span><?php echo $value['product_price']; ?></small>
                                 <br>

                        <form method="POST" action="cart.php">

                            <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                            <input type="submit"  class="remove-btn" name="remove_product" value="remove">
                     </form>
                            </div>
                        </div>
                    </td>

                    <td>

                    <form method="POST" action="cart.php" >
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                        <input type="number" name="product_quantity"  value="<?php echo $value['product_quantity']; ?>"/>

                        <input type ="submit" class="edit-btn" value="edit" name="edit_quantity">

                     </form>
                    </td>

                    <td>
                        <span>&#8358;</span>
                        <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price']; ?></span>
                    </td>
                </tr>

                <?php }  ?>
            </table>

           <div class="cart-total">
            <table>
               
                <tr>
                    <td> Total</td>
                    <td>&#8358; <?php echo $_SESSION['total']; ?></td>
                </tr>
            </table>
           </div>

           <div class="checkout-container">
            <form action="checkout.php" method="POST">
                <input type="submit" class="text checkout-btn" value="checkout" name="checkout">
            </form>
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