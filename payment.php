<?php

session_start();



?>



<?php include('layouts/header.php');  ?>


<!--payment-->
       

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Payment</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">
          <p><?php if(isset($_GET['order_status'])) { echo $_GET['order_status'];}?></p>
          <p>Total payment : &#8358; <?php if(isset($_SESSION['total'])) { echo $_SESSION['total'];}?></p>
          <?php if(isset($_SESSION['total'])){ ?>
           <input type="submit" class="btn btn-primary" value="Pay Now">
           <?php } ?>

           <?php if(isset($_GET['order_status']) && $_GET['order_status'] == "not paid"){ ?>
           <input type="submit" class="btn btn-primary" value="Pay Now">
           <?php } ?>

        </div>
    </section>



    <?php include('layouts/footer.php');  ?>
