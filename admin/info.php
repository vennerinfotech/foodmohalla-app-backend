<?php 
include("session.php"); 
include("process/connection.php");
?>
<div class="notification-list mx-h-350 customscroll">
    <?php 
        $sql_get = mysqli_query($conn, "SELECT  users.first_name,users.last_name,order.order_number,order.id from `order` inner join users on users.id=order.user_id    where status = '0'");
        if(mysqli_num_rows($sql_get)>0)	
        {
            while($result1 = mysqli_fetch_assoc($sql_get)){
                    ?>
            <ul>	
                <li>
                    <a href="#">
                        <img src="vendors/images/img.jpg" alt="">
                        <span><?php echo $result1['first_name'] ?> <?php echo $result1['last_name'] ?></span><br>
                        <span onclick = "window.location.href= 'vieworder.php?id=<?php echo $result1['id'] ?>'">Order Number : <?php echo $result1['order_number'] ?></span>
                    </a>
                </li>
            </ul>
        <?php  }?>
    <?php  }else
        echo "Sorry! Your Order Box Is Empty";
    ?>
</div>