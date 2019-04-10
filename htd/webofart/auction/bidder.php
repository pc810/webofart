<?php

$path = $_SERVER["DOCUMENT_ROOT"];
$path .= "/webofart/include/dbcon.php";
include_once($path);


if (isset($_GET["artid"])) {
    $artid = $_GET["artid"];

    $sql = "select username from archive_auction where art_id=?";
    $stmt = $dbhandler->prepare($sql);
    $stmt->execute(array($artid));
    
    if ($stmt->rowCount() > 0) {
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        $username = $rs["username"];
        echo $username;
    } else {
        echo "Not decided";
    }
}
?>