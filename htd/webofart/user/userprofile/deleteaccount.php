<?php 
     
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/webofart/include/dbcon.php";
            include_once($path);
            $path .= "/webofart/include/session.php";
            include_once($path);
            


    $username=$_SESSION['username'];
    echo $username;
    try{
        $sql="delete from user WHERE username='$username'";
        $query = $dbhandler->query($sql);
        echo $query->rowCount();
    //    echo 'hi';
        
    }catch(PDOException $e)
    {
        header("Location /webofart/index.php");
         echo $e->getMessage();
        die();
    }
    header('location:/webofart/user/login.php');
?>