<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$path = $_SERVER["DOCUMENT_ROOT"];
$path .= "/webofart/include/header.php";
include_once($path);

$path = $_SERVER["DOCUMENT_ROOT"];
$path .= "/webofart/include/dbcon.php";
include_once($path);

if (!isset($_SESSION["admin"])) {
    header("Location: /webofart/user/login.php");
} else if (!isset($_GET["auction_id"])) {
    header("Location: /webofart/page/auction.php");
} else {
    $sql = "delete from auction where auction_id=?";
    $stmt = $dbhandler->prepare($sql);
    $stmt->execute(array($_GET["auction_id"]));
    header("Location: /webofart/page/auction.php");
}
?>