<?php

session_start();
include('server/connection.php');

//if user has already registered, take user to account page
 if(isset($_SESSION['logged_in'])){

    header('location: account.php');
    exit;
}

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    $confirm_password =  $_POST['confirm_password'];
    //check if password dont match
    if($password !== $confirm_password){
        header('location: register.php?error=pawword dont match');
    
    //check password length
    }else if(strlen($password) < 6){
        header('location: register.php?error=password must be at least 6 character');
    
    //if no error display
    }else{
                //check whether there is a user with  same email
            $stmt1= $conn->prepare("SELECT count(*)FROM users where user_email=?") ;
            $stmt1->bind_param('s',$email);
            $stmt1->execute();
            $stmt1->bind_result($num_rows);
            $stmt1->store_result();
            $stmt1->fetch();


            //if a user already with same email
            if($num_rows != 0){
                header('location: register.php?error=user already exists');

                //if no user reg 
            }else{

            //create a new user
            $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)VALUES (?,?,?)");

            $stmt->bind_param('sss',$name,$email,md5($password));

            //if account creation successful
            if($stmt->execute()){
                $user_id = $stmt->insert_id;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header('location: account.php?register_success=Registration Successful');
                //account count not be created
            }else{
                header('location: register.php?error=could not create an account at the moment');
            }

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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

 <!--Register-->

      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">

            <form id="register-form" action="register.php" method="POST">
                <p style="color:red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];}?></p>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirm_password" placeholder="Confirm-Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" id="register-btn" name="register" class="btn" value="Register">
                </div>
                <div class="form-group">
                    <a id="login-url" href="login.php" class="btn">Do you have an account? Login</a>
                </div>
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