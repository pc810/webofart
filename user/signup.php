<?php 
     
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/webofart/include/dbcon.php";
            include_once($path);
        
           
 ?>
<html>
    <body>
        <?php
          
   $path = $_SERVER['DOCUMENT_ROOT'];
   
   $path .= "/webofart/include/header.php";
   include_once($path);
            if(isset($_POST["user_state"]) && isset($_POST["user_pincode"])&& isset($_POST["user_city"])&& isset($_POST["user_addr"])&& isset($_POST["repassword"])&& isset($_POST["name"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["contact"]) && isset($_POST["gender"]) && isset($_POST["dob"]))
             {
                if(strlen($_POST["name"])>=5)
                {
                    if( $_POST["password"]== $_POST["repassword"])
                    {                            
                        if(strlen($_POST["password"])>5 && strlen($_POST["password"])<11)
                        {
                            try{
                                if(session_status() == PHP_SESSION_NONE)
                                {
                                    session_start();
                                }
                                
                                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                    //$sql="insert into profile(name,password,gender,dob,training,placement,achivement,posted) values(priyank,1234567,male,now(),interested,notinterested,123,now()";
                            
     $sql="insert into user (username,name,password,email,contact,gender,dob,posted,user_state,user_pincode,user_city,user_addr,user_photo) "
             . "values(:username,:name,:password,:email,:contact,:gender,:dob,now(),:user_state,:user_pincode,:user_city,:user_addr,:user_photo)";
                                   $stmt = $dbhandler->prepare($sql);
                                   $stmt->bindParam(":username", $_POST["username"]);
                                   $stmt->bindParam(":name", $_POST["name"]);
                                   $stmt->bindParam(":gender", $_POST["gender"]);
                                   $stmt->bindParam(":email", $_POST["email"]);
                                   $stmt->bindParam(":password", $_POST["password"]);
                                   $stmt->bindParam(":contact", $_POST["contact"]);
                                   $stmt->bindParam(":dob", $_POST["dob"]);                                 
                                   $stmt->bindParam(":user_state", $_POST["user_state"]);
                                   $stmt->bindParam(":user_pincode", $_POST["user_pincode"]);
                                   $stmt->bindParam(":user_city", $_POST["user_city"]);
                                   $stmt->bindParam(":user_addr", $_POST["user_addr"]);
                                   if(!empty($_FILES["user_photo"]["name"]))
                                   {
                                        $target_location="../image/profile/".basename($_FILES["user_photo"]["name"]);
                                        $target_location=basename($_FILES["user_photo"]["name"]);
                                        if(! (move_uploaded_file($_FILES["user_photo"]["tmp_name"], $target_location)))
                                                echo "Error: " . $_FILES["user_photo"]["error"] . "<br>";
                                        else
                                        {
                                            $ext = pathinfo($target_location, PATHINFO_EXTENSION);
                                            $new="../image/profile/".$_POST["username"].".".$ext;
                                            rename($target_location,$new);
                                            //header("Location:index.php?msg=Congrats, Your File is Successfully Uploaded.");
                                           $e = array("jpeg","jpg","png");
                                           if(in_array($ext, $e) == FALSE)
                                           {
                                               echo 'Error';
                                               header("Location: /webofart/index.php");
                                           }
                                           else
                                            {
     
                                            }
                                           
                                           
                                            
                                        }
                                    }
                                    //$new=basename($_FILES["user_photo"]["name"]);
                                    $new = $_POST["username"].".".$ext;
                                    $stmt->bindParam(":user_photo",$new);
                               
                                   
                                   $stmt->execute();
                                   //echo '-1-2-3';
                                   $username=$_POST['username'];
                                        $sql="insert into cart(username) values('$username')";
                                   $query = $dbhandler->query($sql);
                                 
                                   /*  $sql = "select * from user";
                                     $stmt = $dbhandler->prepare($sql);
                                     
                                     $stmt->execute();
                                        $y = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                     echo "<br>";
                                     $flag=0;
                                     $id=0;
                                        foreach ($y as $row) {
                                           
                                               echo "<br>Hello Record inserted successfully with ID ".$id;
                                               echo "<br>Entered details below<br>";
                                               echo "<table border=1 align='center'>";
                                             foreach ($row as $key => $value) 
                                             {
                                                 
                                                
                                                     echo "<tr><td>".$key."</td><td>".$value."</td></tr>";                                                 
                                                 
                                             }
                                       //  }
                                         echo "</table>";
                                     }
                                     
                                         
                                     
                                     echo "<br>";
                                    */ 
                                   
   
                                     echo "<br><br><center><h1 align='center'> YOUR DETAILS ARE REGISTERED</h1>";
                                     echo "<br><br><br><img src='/webofart/image/login_successful.png' alt='correct' height='300' width='300'>";
                                     echo "<br><br><br><h2 align='center'>Login Again</h2></center>";
                              }  
                           catch(PDOException $e)
                              {
                                    echo $e->getMessage();
                                               die();
                        } 
                        }else
                    {
                        echo "PASSWORD MUST BE OF 6 TO 10 CHARACTERS";
                    }

                        }
                        else
                        {
                            echo "REMATCHING OF PASSWORD FAILED";
                        }
                           
                    }
                    else {
                            echo "NAME must be greater than 5 characters";
                    }
                        
                }
               else
                {
                   echo " NOT VALID";
                }
            
             $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/webofart/include/footer.php";
   include_once($path);
        ?>   
    </body>         
</html>