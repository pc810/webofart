
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/dbcon.php";

include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/session.php";
include($path);
?>
<?php

if(!isset($_SESSION["username"])){
    header("Location: /webofart/user/login.php");
}
else if(!isset($_GET['artid']) || !isset($_GET['cartid']))
{
    header("Location: /webofart/index.php");
}
 else {
    

$art_id=$_GET['artid'];
$cart_id=$_GET['cartid'];

try{
    $sql="delete from cart_content where art_id='$art_id' and cart_id='$cart_id'";
    $query=$dbhandler->query($sql);
    
    header('Location: cart.php');
} catch (Exception $ex) {
    header('Location: cart.php');

}
 }
?>