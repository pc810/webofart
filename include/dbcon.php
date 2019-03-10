<?php
     //$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=webofart','root','');
     $dbhandler = new PDO('mysql:host=localhost;dbname=webofart','root','root');
     $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  //   echo 'successfully connected';
?>