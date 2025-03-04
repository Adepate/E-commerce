<?php

session_start();
include('server/connection.php');

if(!isset($_SESSION['logged_in'])){
    header('location: login.php');
    exit;
}

if(isset($_GET['logout'])){
    if(isset($_SESSION['logged_in'])){
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        header('location:login.php');
        exit;
    }
}



if(isset($_POST['change_password'])){
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $user_email = $_SESSION['user_email'];

     //check if password dont match
     if($password !== $confirmPassword){
        header('location: account.php?error=password dont match');
    
    //check password length
    }else if(strlen($password) < 6){
        header('location: account.php?error=password must be at least 6 character');
        //no ereeor
    }else{
        $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
        $stmt->bind_param('ss',md5($password),$user_email);

        if($stmt->execute()){
            header('location: account.php?message=password has been updated successfully');
        }else{
            header('location: account.php?error=could not update password');

        }

    }
}

//get order

if(isset($_SESSION['logged_in'])){
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id =? ");
    $stmt->bind_param('i',$user_id);
    $stmt->execute();

    $orders = $stmt->get_result();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>

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

 <!--account-->

      <section class="my-5 py-5">
       <div class="row container mx-auto">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
        <p class="text-center"style="color:green"><?php if(isset($_GET['register_success'])){ echo $_GET['register_success']; }  ?></p>
        <p class="text-center"style="color:green"><?php if(isset($_GET['login_success'])){ echo $_GET['login_success']; }  ?></p>

        
            <h3 class="font-weight-bold">Account info</h3>
            <hr class="mx-auto">
            <div class="account-info">
                <p>Name <span><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}?></span></p>
                <p>Email <span><?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];} ?></span></p>
                <p><a href="#orders" id="orders-btn">Your orders</a></p>
                <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <form id="account-form" method="post" action="account.php">
                <p class="text-center"style="color:red"><?php if(isset($_GET['error'])){ echo $_GET['error']; }  ?></p>
                <p class="text-center"style="color:green"><?php if(isset($_GET['message'])){ echo $_GET['message']; }  ?></p>

                <h3>Change Password</h3>
                <hr class="mx-auto">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="account-password" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="confirm password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="change password" name="change_password" class="btn" id="change-pass-btn">
                </div>
            </form>
        </div>
       </div>
      </section>


 <!--Orders-->
    <section id="orders" class="orders container my-5 py-3">
            <div class="container mt-2">
                <h2 class="font-weight-bold text-center">Your Orders</h2>
                <hr class="mx-auto">
            </div>

            <table class="mt-5 pt-5">
                <tr>
                    <th>Order id</th>
                    <th>Order cost</th>
                    <th>Order status</th>
                    <th>Order date</th>
                    <th>Order details</th>
                </tr>

                <?php while($row = $orders->fetch_assoc() ){ ?>
                    <tr>
                            <td>
                      <!--      <div class="product-info">
                               <img src="assets/imgs/shoe5.jpg" alt="">
                                <div>
                                    <p class="mt-3"><?php echo $row['order_id']; ?></p>
                                    </div
                            </div> -->
                            <span><?php echo $row['order_id'];?></span>


                            </td>
                            <td>
                                <span><?php echo $row['order_cost'];?></span>
                            </td>
                            <td>
                                <span><?php echo $row['order_status'];?></span>
                            </td>
                            <td>
                                <span><?php echo $row['order_date'];?></span>
                            </td>
                            <td>

                                <form method="POST" action="order_details.php">
                                    <input type="hidden" value="<?php echo $row['order_status']; ?>" name="order_status">
                                    <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id">
                                    <input type="submit" class="btn details-btn" name="order_details_btn" value="details"/>
                                </form>
                            </td>
                         </tr> 
                         <?php } ?>

            </table>

          
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