<?php
/*
keys to note in orders details
not paid
delivered
paid
shipped
 */

include('server/connection.php');

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $stmt->bind_param('i',$order_id);

    $stmt->execute();
    $order_details = $stmt->get_result();
}else{
    header('location: account.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>

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
            <a href="account.php"><i class="fa-solid fa-user"></i> </a>

          </li>
        </ul>
       
      </div>
    </div>
     </nav>


<!--Order details-->
     <section id="orders" class="orders container my-5 py-3">
        <div class="container mt-5 ">
            <h2 class="font-weight-bold text-center">Order details</h2>
            <hr class="mx-auto">
        </div>

            <table class="mt-5 pt-5 mx-auto">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>

                <?php while($row= $order_details->fetch_assoc()){ ?>

                    <tr>
                            <td>
                       <div class="product-info">
                               <img src="assets/imgs/<?php echo $row['product_image']; ?>" alt="">
                                    <div>
                                        <p class="mt-3"><?php echo $row['product_name']; ?></p>
                                    </div
                      </div>
                            </td>

                            <td>
                                <span>&#8358;<?php echo $row['product_price']; ?></span>
                            </td>
                            <td>
                                <span><?php echo $row['product_quantity']; ?></span>
                            </td>
                           
                         </tr> 

                         <?php } ?>

            </table>

            <?php 
                if($order_status == "not paid"){ ?>
                <form action="" style="float:right;">
                    <input type="submit" value="Pay Now" class="btn btn-primary">
                </form>


             <?php } ?>

          
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