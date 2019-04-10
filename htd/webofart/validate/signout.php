<html>
    <body style="background:url('/webofart/image/web/pattern.png');">
<?php

        $flag = 0;
       try
       {
          if(session_status() != PHP_SESSION_ACTIVE )
          {
              session_start();
              if(isset($_SESSION["username"]))
              {
                  session_destroy();
                  $flag = 1; 
                  
              }
              else {
                  $flag = 0;
              }
              
              
             
          
          }        
          else
          {
             // session_start();
                  session_destroy();
                  $flag = 0; 
              
          }
          
       } catch (Exception $ex) {
           echo $ex->getMessage();
       }    $path = $_SERVER['DOCUMENT_ROOT'];
   
   $path .= "/webofart/include/header.php";
   include_once($path);
       if($flag == 0)
       {
            header("Location: /webofart/index.php");
       }
       else {
       echo "<center>
       <br><br><br>
       <img src='/webofart/image/login_successful.png' alt='correct' height='300' width='300'>';
       <br><br><br><h1 class='text-center' style='font-size:75px; color:white;'>LogOut SuccessFull</h1></center>";
       }


//$path = $_SERVER['DOCUMENT_ROOT'];
//   
//   $path .= "/webofart/include/footer.php";
//   //include_once($path);
?>
    </body>
</html>

