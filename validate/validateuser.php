<html>
    <head></head>
    <body>
        
        <?php 
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/dbcon.php";
        include($path);
        
        $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/webofart/include/header.php";
            include_once($path);       
            $flag = 0;
            if(session_status() == PHP_SESSION_NONE)
            {
                 session_start();
                 
            }
            if(session_status() == PHP_SESSION_ACTIVE)
            {               
               
                if(isset($_SESSION["username"]))    
                {
                    $flag=1;
                    header("Location: ../index.php");
                }  
                else
                {
                    if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["Captcha"]) )
                {
                    if($_POST["username"]!="" && $_POST["password"]!="" && $_POST["Captcha"]==$_COOKIE["Captcha"])
                    {//   echo "inside";
                    try
                    {
                      //  echo "<br>inside try ";
                     ?>          
        <?php
                  //        $dbhandler = new PDO('mysql:host=192.168.29.150;dbname=ce119','ce119','ce119');	//192.168.29.150 ce119 ce119 ce119

                        $sql = "select * from user where username=:name and password=:pass";
                        $stmt = $dbhandler->prepare($sql);
                        $stmt->bindParam(":name",$_POST["username"]);
                        $stmt->bindParam(":pass",$_POST["password"]);
                        $stmt->execute();
                        $y = $stmt->rowCount();
                        if ($y==1)
                        {
                           //     session_start();
         
                             // setcookie("id", $_POST['name'],time()+60*60*2);
                               setcookie("Captcha","",time()+(86400*30),"/"); 
                               $_SESSION['username']=$_POST['username'];
                               $flag=1;
                               header("Location: /webofart/user/userprofile/userprofile.php");
                             
                        }
                        else
                        { 
                            echo "</h1>UNAUTHORIZED ACCESS </h1>";
                       //   include  'index.php';
                        }
                   //     echo "<br>executed try ";
                    } catch (Exception $ex) {
                        echo $ex->getMessage();
                    }
                    }
                    else
                    {
                     echo "</h1>UNAUTHORIZED ACCESS </h1>";
                  //   include  'index.php';
                        
                    }
                }
                else
                {
                     echo "</h1>UNAUTHORIZED ACCESS </h1>";
                  //   include  'index.php';
                }
                }
            }              
            else
            {
               
                if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["Captcha"]))
                {
                    if($_POST["username"]!="" && $_POST["password"]!="" && $_POST["Captcha"]==$_COOKIE["Captcha"])
                    {//   echo "inside";
                    try
                    {
                      //  echo "<br>inside try ";
                        
                  //        $dbhandler = new PDO('mysql:host=192.168.29.150;dbname=ce119','ce119','ce119');	//192.168.29.150 ce119 ce119 ce119

                        $sql = "select * from user where username=:name and password=:pass";
                        $stmt = $dbhandler->prepare($sql);
                        $stmt->bindParam(":name",$_POST["username"]);
                        $stmt->bindParam(":pass",$_POST["password"]);
                        $stmt->execute();
                        $y = $stmt->rowCount();
                        if ($y==1)
                        {
                                session_start();
         
                             // setcookie("id", $_POST['name'],time()+60*60*2);
                               setcookie("Captcha","",time()+(86400*30),"/");
                                $_SESSION['username']=$_POST['username'];
                                $flag = 1;
                                 header("Location: ../index.php");
                        }
                        else
                        { 
                            echo "</h1>UNAUTHORIZED ACCESS </h1>";
                       //   include  'index.php';
                        }
                   //     echo "<br>executed try ";
                    } catch (Exception $ex) {
                        echo $ex->getMessage();
                    }
                    }
                    else
                    {
                     echo "</h1>UNAUTHORIZED ACCESS </h1>";
                  //   include  'index.php';
                        
                    }
                }
                else
                {
                     echo "</h1>UNAUTHORIZED ACCESS </h1>";
                  //   include  'index.php';
                }
                // echo "<h1>WELCOME user : ".$_SESSION['username']."</h1>";
            }
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/webofart/include/footer.php";
            include_once($path);       
        ?>
    </body>        
    
</html>