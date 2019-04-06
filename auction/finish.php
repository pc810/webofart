<?php

        $path = $_SERVER["DOCUMENT_ROOT"];
        $path .= "/webofart/include/dbcon.php";
        include_once($path);
        
        if(!isset($_SESSION['admin']))
        {
              header("Location: /webofart/index.php");
        }
        $sql = "CALL assign_art()";
        $stmt = $dbhandler->prepare($sql);
        $stmt->execute();
        if(!isset($_GET["auction_id"]))
        {
            echo "not set";
           header("Location: /webofart/index.php");
        }
        /*try{
                    $sql = "delete from auction where auction_id=?";
$stmt = $dbhandler->prepare($sql);
$stmt->execute(array($_GET["auction_id"]));
                     echo "finish";
        } catch (Exception $ex) {
            echo 'try again';
        }*/
        ?>