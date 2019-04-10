<?php 
     
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/webofart/include/dbcon.php";
            include($path);
        
            
 ?>
<?php
 session_start();   
 if(!isset($_SESSION["username"]))
 {
     header("Location: /webofart/user/login.php");
 }
 else if(!isset($_GET['artid']))
 {
     header("Location: /webofart/index.php");
 }
 else {
     

echo $_GET['artid'];
$art_id=$_GET['artid'];

$username=$_SESSION['username'];
echo $username;
$sql="select * from cart where username='$username'";
$query = $dbhandler->query($sql);
while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
        foreach ($r as $key => $value) {
//echo $key.' ';
            switch ($key) {

                case "cart_id":
                    $cart_id = $value;
                    break;
                
                default:
                    echo '';
            }
        }

}
echo $cart_id;
try{
$sql12="insert into cart_content(cart_id,art_id) values('$cart_id','$art_id')";
//echo '--';

$query = $dbhandler->query($sql12);
}
 catch (PDOException $e)
 {
     header('Location: displayart.php');
 }


header('Location: displayart.php');
 }
?>