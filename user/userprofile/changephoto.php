<?php 
     
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/webofart/include/dbcon.php";
            include_once($path);
           // $path .= "/webofart/include/session.php";
            //include($path);$path .= "/webofa
            
            $path2 = $_SERVER['DOCUMENT_ROOT'];
$path2 .= "/webofart/include/session.php";
include($path2);
?>
<?php
       try{
           
       //$_SESSION['username']='smp1613s';
       //echo 'hi';
       $username=$_SESSION['username'];
       echo $username;
       //echo $username;
       $file_name = $_FILES['file']['name'];
       $file_size = $_FILES['file']['size'];
       $file_tmp = $_FILES['file']['tmp_name'];
      
       echo $file_name;
       $path = $_SERVER['DOCUMENT_ROOT'];
       $path .= "/webofart/image/profile";
       move_uploaded_file($file_tmp,$path.$file_name);
        $sql = "update user
SET user_photo = '$file_name'
WHERE username= '$username'";
        $query = $dbhandler->query($sql);
        
        echo 'hello';
        $sql1="SELECT * FROM user WHERE username='$username'";
        $query = $dbhandler->query($sql1);
        echo $query->rowCount();
        echo 'hello1';
        
        
        
       }
 catch(PDOException $e)
 {
     echo $e->getMessage();
    die();
 }
        header('Location: userprofile.php');

?>