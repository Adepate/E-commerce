<?php

session_start();
include('connection.php');
// check if user click the button

if(isset($_POST['place_order'])){

    //get user info and store it in db
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total'];
    $order_status = "on_hold";
    $user_id =1;
    $order_date = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date) VALUE(?,?,?,?,?,?,?)");

    $stmt->bind_param('isiisss',$order_cost,$order_status,$user_id,$phone,$city,$address,$order_date);

    $stmt->execute();


    //get order id
    $order_id = $stmt->insert_id;

    echo $order_id;





    //get product from cart (frim sessinon)



    // issue new order and store order info db


    //store each single item in order_item db

    //remove everthing from cart


    // inform user whether everything is fine or there is a problem and take them to pay


}

?>