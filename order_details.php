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

<?php include('layouts/header.php');  ?>


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


      <?php include('layouts/footer.php');  ?>
