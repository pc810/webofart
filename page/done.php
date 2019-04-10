<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/dbcon.php";
include_once($path);
?>
<html>
        <body style="background-image: url('/webofart/image/web/pattern.png');">
            <?php 
               $path = $_SERVER['DOCUMENT_ROOT'];
   
   $path .= "/webofart/include/header.php";
   include_once($path);
?>
    <br><br><center><h1 align='center' style='color:white;'> YOUR DETAILS ARE REGISTERED</h1>
        <br><br><br><img src='/webofart/image/login_successful.png' alt='correct' height='300' width='300'>
        <br><br><br><h2 align='center' style='color:white;'>Login Again</h2></center>   
</body>         
</html>