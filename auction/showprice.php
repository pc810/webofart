<?php

$path = $_SERVER["DOCUMENT_ROOT"];
$path .= "/webofart/include/dbcon.php";
include_once($path);


if (isset($_GET["artid"])) {
    $artid = $_GET["artid"];

    $sql = "select user_current_bid from archive_auction where art_id=?";
    $stmt = $dbhandler->prepare($sql);
    $stmt->execute(array($artid));
    
    if ($stmt->rowCount() > 0) {
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        $current_art_bid = $rs["user_current_bid"];
        echo $current_art_bid;
    } else {
        $sql = "select art_current_bid from auction_art where art_id=?";
        $stmt = $dbhandler->prepare($sql);
        $stmt->execute(array($artid));
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        $current_art_bid = $rs["art_current_bid"];
        echo $current_art_bid;
    }
}
?>