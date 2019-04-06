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
       
       //echo $username;
       $file_name = $_FILES['file']['name'];
       $file_size = $_FILES['file']['size'];
       $file_tmp = $_FILES['file']['tmp_name'];
      
       echo $file_name;
       echo "<br>".$file_tmp;
       $path = $_SERVER['DOCUMENT_ROOT'];
       $path .= "/webofart/image/profile/";
       $ext = pathinfo($file_name, PATHINFO_EXTENSION);
       echo "<br>e :".$ext;
       move_uploaded_file($file_tmp,$path.$username.".".$ext);
        
        echo $path; 
        
        $sql = "update user
SET user_photo = '".$username.".".$ext."'".
"WHERE username= '$username'";
        $query = $dbhandler->query($sql);
        
        
        $sql1="SELECT * FROM user WHERE username='$username'";
        $query = $dbhandler->query($sql1);
        echo $query->rowCount();
        
        
        
        
       }
 catch(PDOException $e)
 {
     header("Location /webofart/index.php");
     echo $e->getMessage();
    die();
 }
        header('Location: userprofile.php');

?>