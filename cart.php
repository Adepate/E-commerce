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


 <?php include('layouts/header.php');  ?>



<!--cart ----------------------->
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




        
      
      <?php include('layouts/footer.php');  ?>
