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

        include_once $path;

        if (!isset($_SESSION['admin']) || !isset($_POST["mybtn"])) {
            header("Location: /webofart/page/auction.php");
        } else {
            try {
                if (!isset($_POST["auction_start"])) {
                    $_POST["auction_start"] = "now()";
                }
                if (!isset($_POST["auction_end"])) {
                    $_POST["auction_end"] = "now()";
                }
                $sql = "update auction set auction_name = ?, auction_about = ?, auction_start=?, auction_end = ?";
                $stmt = $dbhandler->prepare($sql);
                $stmt->execute(array($_POST["auction_name"],
                            $_POST["auction_about"],
                            $_POST["auction_start"],
                            $_POST["auction_end"]));
                header("Location: /webofart/index.php");
                //  }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        //}
        ?>
    </body>
</html>