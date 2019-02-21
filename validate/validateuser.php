<html>
    <head>
    <body>
        <?php 
        session_start();
            if(isset($_SESSION["username"]))
            {                   
               
                      echo "<h1>WELCOME user : ".$_SESSION['username']."</h1>";
                      
            }   
            else
            {
               
                if(isset($_POST["username"]) && isset($_POST["password"]) )
                {
                    if($_POST["username"]!="" && $_POST["password"]!="")
                    {//   echo "inside";
                    try
                    {
                      //  echo "<br>inside try ";
                        $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=webofart','root','');
                  //        $dbhandler = new PDO('mysql:host=192.168.29.150;dbname=ce119','ce119','ce119');	//192.168.29.150 ce119 ce119 ce119

                        $sql = "select * from user where username=:name and password=:pass";
                        $stmt = $dbhandler->prepare($sql);
                        $stmt->bindParam(":name",$_POST["username"]);
                        $stmt->bindParam(":pass",$_POST["password"]);
                        $stmt->execute();
                        $y = $stmt->rowCount();
                        if ($y==1)
                        {
                             // setcookie("id", $_POST['name'],time()+60*60*2);
                                $_SESSION['username']=$_POST['username'];
                            echo "<h1>WELCOME user : ".$_POST["username"]."</h1>";
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
        ?>
    </body>        
    </head>    
</html>