<html>
    <head>
        <link href="/webofart/css/bootstrap.css" rel="stylesheet">
    <body>
        <?php
          
   $path = $_SERVER['DOCUMENT_ROOT'];
   
   $path .= "/webofart/include/header.php";
   include_once($path);
            if(isset($_POST["repassword"])&&isset($_POST["name"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["contact"]) && isset($_POST["gender"]) && isset($_POST["dob"]))
             {
                if(strlen($_POST["name"])>=5)
                {
                    if( $_POST["password"]== $_POST["repassword"])
                    {                            
                        if(strlen($_POST["password"])>5 && strlen($_POST["password"])<11)
                        {
                            try{
                                session_start();
                                    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=webofart','root','');	//192.168.29.150 ce119 ce119 ce119
                                //   $dbhandler = new PDO('mysql:host=192.168.29.150;dbname=ce119','ce119','ce119');	//192.168.29.150 ce119 ce119 ce119
                                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                    //$sql="insert into profile(name,password,gender,dob,training,placement,achivement,posted) values(priyank,1234567,male,now(),interested,notinterested,123,now()";
                            
     $sql="insert into user (username,name,password,email,contact,gender,dob,posted) values(:username,:name,:password,:email,:contact,:gender,:dob,now())";
                                   $stmt = $dbhandler->prepare($sql);
                                   $stmt->bindParam(":username", $_POST["username"]);
                                   $stmt->bindParam(":name", $_POST["name"]);
                                   $stmt->bindParam(":gender", $_POST["gender"]);
                                   $stmt->bindParam(":email", $_POST["email"]);
                                   $stmt->bindParam(":password", $_POST["password"]);
                                   $stmt->bindParam(":contact", $_POST["contact"]);
                                   $stmt->bindParam(":dob", $_POST["dob"]);
                                   $stmt->execute();
                                 
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
                                   
   
                                     echo "<center><h1 align='center'> YOUR DETAILS ARE REGISTERED</h1>";
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
    </head>    
</html>