<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/header.php";
include_once($path);
$path = $_SERVER["DOCUMENT_ROOT"];
$path .= "/webofart/include/dbcon.php";
include_once($path);

if (isset($_POST["mysubmit"])) {
    $raise = $_POST["raise"];
    $artid = $_POST['artid'];
    $user_art_bid = $current_art_bid = $art_min_raise = $art_max_raise = 0;
    $sql = "select art_current_bid,art_min_raise,art_max_raise from auction_art where art_id=?";
    $stmt = $dbhandler->prepare($sql);
    $stmt->execute(array($artid));
    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    $current_art_bid = $rs["art_current_bid"];
    $art_min_raise = $rs["art_min_raise"];
    $art_max_raise = $rs["art_max_raise"];
    $user_art_bid = $current_art_bid + $raise;
    if ($raise >= $art_min_raise && $raise <= $art_max_raise) {
        $sql = "insert into live_auction(username,user_current_bid,art_id,live_posted) values(?,?,?,now())";
        $stmt = $dbhandler->prepare($sql);
        $stmt->execute(array($_SESSION["username"], $user_art_bid, $artid));

        if ($user_art_bid > $current_art_bid) {
            $sql = "update auction_art set art_current_bid = ? where art_id=?";
            $stmt = $dbhandler->prepare($sql);
            $stmt->execute(array($user_art_bid,$artid));
        } else {
            
        }
    }
    header("Location: /webofart/auction/displayart.php?artid=$artid");
}
?>