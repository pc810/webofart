<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/header.php";
include_once($path);
if(isset($_SESSION["myerror"]))
{
    echo $_SESSION["myerror"];
}
if(isset($_GET["error"]))
{
    echo $_GET["error"];
}
echo "<center><img src='/webofart/image/web/denied.png'>";
                            echo "<br><font size='50px'>UNAUTHORIZED ACCESS </font></center>";
?>
