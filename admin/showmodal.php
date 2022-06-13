<?php  
include("session.php"); 
include("process/connection.php");

$orderno = $_POST["order_number"];  

   
$result=mysqli_query($conn,"SELECT products.name, order.order_number, shops.shop_name, users.first_name, grab_best_deal.deal_name, order_item.item_price,order_item.quantity,order_item.created_at,order_item.updated_at,order_item.id
from order_item inner join shops on shops.id= order_item.shop_id inner join products on products.id = order_item.product_id inner join `order` on order.id=order_item.order_id inner join users on users.id = order_item.user_id inner join grab_best_deal on grab_best_deal.id=order_item.grab_best_deal_id") or die(mysqli_error($conn));
$row=mysqli_fetch_assoc($result);
      echo json_encode($row);  
  
 ?> 