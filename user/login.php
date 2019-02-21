<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
       
    <body>
     <H1 align="center">LOGIN PAGE</H1> 
     <?php 
       if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
     if(isset($_SESSION['delete']))
     {
         echo '<h1>deleted account</h1><br>';
          unset($_SESSION['delete']);
           unset($_SESSION['id']);
           session_destroy();
     }
      else if(isset($_SESSION['id']))
        {
           
                header("Location: ../index.php");  
      
        }     
       
     ?>
     <form action="../index.php" method="POST">
     <table border="1" align="center">
         <tr>
             <td>Username:  </td>
             <td><input type="text" name="name">       
         </tr>
         <tr>
             <td>Password:  </td>
             <td><input type="password" name="password">       
         </tr>
         <tr>
             <td><input type="submit" value="login"> </td>
             <td><input type="reset">       
         </tr>
         <tr>
             <td><a href="registration.php">New User</a></td>
         </tr>
         
         
     </table>
     </form>
    </body>
</html>
