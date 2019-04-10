<html>
    <body><?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/header.php";
        include_once($path);

       // if (isset($_POST["submit"])) {
                
        if(!isset($_SESSION["username"]))
         {
            header('Location: /webofart/user/login.php');
         }
 else {
        $path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/dbcon.php";
include($path);
     //$dbhandler = new PDO('mysql:host=localhost;dbname=webofart','root','root');
     $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            include_once $path;
            try {
                if(!isset( $_POST["art_created_date"]))
                {
                     $_POST["art_created_date"]="now()";
                }
                $sql = "update art set art_title = ?,art_medium = ?,art_width = ?,art_height = ?,art_about = ?,art_price = ?,art_genre = ?,art_created_date = ? where art_id = ? ";
                $stmt = $dbhandler->prepare($sql);
                        $stmt->execute(array($_POST["art_title"],
                                $_POST["art_medium"], $_POST["art_width"], $_POST["art_height"],
                                 $_POST["art_about"], $_POST["art_price"],
                                $_POST["art_genre"], $_POST["art_created_date"],$_POST["art_id"]));
                            header("Location: /webofart/index.php");
                      //  }
                    }
                catch (Exception $e) {
                echo $e->getMessage();
            }
 }
        //}
        ?>
    </body>
</html>