<html>
    <body><?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/header.php";
        include_once($path);

        // if (isset($_POST["submit"])) {
        if (!isset($_SESSION['admin']) && $_SESSION['admin']!= 1 || !isset($_POST["art_id"])) {
            header("Location: /webofart/index.php");
        }
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/dbcon.php";
        include($path);
        $sql = "update auction_art set art_current_bid = ?,art_title = ?, art_medium = ?, art_genre = ?, art_width = ?, art_height = ?, art_about = ?,art_min_raise = ?, art_max_raise = ?, art_created_date = ? where art_id = ?";
        try {
            if (!isset($_POST["art_created_date"])) {
                $_POST["art_created_date"] = "now()";
            }
            $stmt = $dbhandler->prepare($sql);
            $stmt->execute(array($_POST["art_current_bid"],
                $_POST["art_title"],
                $_POST["art_medium"],
                $_POST["art_genre"],  
                $_POST["art_width"],
                $_POST["art_height"],
                $_POST["art_about"],  
                $_POST["art_min_raise"],
                $_POST["art_max_raise"],
                $_POST["art_created_date"],
                $_POST["art_id"]));
            header("Location: /webofart/auction/displayart.php?artid=".$_POST["art_id"]);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }        
        ?>
    </body>
</html>