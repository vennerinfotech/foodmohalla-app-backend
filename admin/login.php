<?php require_once ('process/connection.php');
// require_once ('session.php'); 
// session_destroy();
session_start();
ob_start();

       
           

                    $user=$_REQUEST['a_email'];
                    $pass=$_REQUEST['a_password']; 

                    $res=mysqli_query($conn,"select * from admin where a_email='$user' and a_password='$pass'");
                    $row= mysqli_fetch_array($res);
                    $username=$row["a_email"];
                    $password=$row["a_password"];
                    if($user == $username && $pass == $password){
                        $_SESSION['a_email'] = $username;
                        
                        if($row["role"]=="Admin"){
		
                            echo "admin";// header("location:dashboard.php");
                        }
                        else if($row["role"]=="Shop")
                        {	
                             echo "shop";//header("location:shopdashboard.php");
                        }
                    }
                    else 
                    {
                       echo "Email-Id or Password invalid";
                    }
                    

?>