<?php

        
       try
       {
          if(session_status() == PHP_SESSION_ACTIVE)
          {
           session_destroy();
          }        
          
       } catch (Exception $ex) {
           echo $ex->getMessage();
       }    $path = $_SERVER['DOCUMENT_ROOT'];
   
   $path .= "/webofart/include/header.php";
   include_once($path);


       ?>     
        <center>
       <br><br><br>
       <img src='/webofart/image/login_successful.png' alt='correct' height='300' width='300'>";
       <br><br><br>
       <h2 align='center'>LogOut SuccessFull</h2></center>


<?php


$path = $_SERVER['DOCUMENT_ROOT'];
   
   $path .= "/webofart/include/footer.php";
   include_once($path);
?>

