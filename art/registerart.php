<html>
    <body><?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/header.php";
        include_once($path);

       // if (isset($_POST["submit"])) {
                
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
                $sql = "insert into art(username,art_title,art_medium,art_width,art_height,art_loc,art_about,art_price,art_genre,art_posted,art_created_date) values(?,?,?,?,?,?,?,?,?,now(),?)";
                $stmt = $dbhandler->prepare($sql);
                if (!empty($_FILES["art_loc"]["name"])) {
                    $target_location = "../image/userart/" . basename($_FILES["art_loc"]["name"]);
                    
                    if (!(move_uploaded_file($_FILES["art_loc"]["tmp_name"], $target_location))){                        echo '1';
                        echo "Error: " . $_FILES["art_loc"]["error"] . "<br>";
                    }
                    else {
                        echo '2';
                        $ext = pathinfo($target_location, PATHINFO_EXTENSION);
                        //header("Location:index.php?msg=Congrats, Your File is Successfully Uploaded.");
                        $e = array("jpeg", "jpg", "png","JPEG", "JPG", "PNG");
                    /*    if (in_array($ext, $e) == FALSE) {
                            echo 'Error';
                       //    include_once("Location: /webofart/index.php");
                        } else {
                    */ if ($_FILES["art_loc"]["size"]>  8000000)
                    {
                        $_SESSION["myerror"]="File size to large";
                        header("Location: /webofart/page/error.php");
                    }
                     $target_location = basename($_FILES["art_loc"]["name"]);
                        $stmt->execute(array($_SESSION["username"], $_POST["art_title"],
                                $_POST["art_medium"], $_POST["art_width"], $_POST["art_height"],
                                $target_location, $_POST["art_about"], $_POST["art_price"],
                                $_POST["art_genre"], $_POST["art_created_date"],));
                            header("Location: /webofart/index.php");
                      //  }
                    }
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        //}
        ?>
    </body>
</html>