<?php
     $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=webofart','root','');
     //$dbhandler = new PDO('mysql:host=localhost;dbname=webofart','root','root');
     $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
<<<<<<< HEAD
  //   echo 'successfully connected';
=======
     echo 'successfully connected';
>>>>>>> 21c4b4e5dfd3456960f772506a50323692a74e03
?>