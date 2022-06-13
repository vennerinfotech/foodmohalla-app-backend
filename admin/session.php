<?php 
include ("process/connection.php");
if(!isset($_SESSION)){
    session_start();
    ob_start();

}
if (!isset($_SESSION['a_email'])){
    header("location:index.php");
}
?>
