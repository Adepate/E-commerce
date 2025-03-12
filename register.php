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



<?php include('layouts/header.php');  ?>

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


      <?php include('layouts/footer.php');  ?>
