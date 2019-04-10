<?php
     $path = $_SERVER['DOCUMENT_ROOT'];
     $path .= "/webofart/include/dbcon.php";
     include_once($path);
     $path = $_SERVER['DOCUMENT_ROOT'];
     $path .= "/webofart/include/header.php";
     include_once($path);
     if(!isset($_SESSION["username"]) || !isset($_GET["artid"]))
     {
        header('Location: /webofart/page/error.php');
     }
 else {
       $id = $_GET["artid"];
    $sql = "delete from art where art_id=?";
    $stmt = $dbhandler->prepare($sql);
    $stmt->execute(array($id));
    
    header('Location: /webofart/displayart/displayart.php');
      
}      

?>
