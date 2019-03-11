<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/dbcon.php";

include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/session.php";
include($path);
?>


<?php

echo '1';
$sale_id = "";
$saleamount = $_GET['saleamount'];
$username = $_SESSION['username'];
$cart_id = $_GET['cartid'];
$date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 5, date('Y')));
echo '2';
try {
    $sql13 = "select * from user where username='$username'";
    $user_addr = "";
    $query = $dbhandler->query($sql13);
    echo '3';
    while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
        foreach ($r as $key => $value) {
//echo $key.' ';
            switch ($key) {

                case "user_addr":
                    $user_addr = $value;
                    break;

                default:
                    echo '';
            }
        }
    }


    echo '4';
    $sql14 = "insert into sales_order(username,order_status,dely_date,dely_addr,sale_amount,sale_date) values('$username','on time','$date','$user_addr','$saleamount',now())";
    $query = $dbhandler->query($sql14);
    echo '5';

    $sql11 = "SELECT sale_id FROM sales_order where sale_date=(SELECT max(sale_date) FROM sales_order WHERE username='$username')";
    $query = $dbhandler->query($sql11);
    while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
        foreach ($r as $key => $value) {
            switch ($key) {

                case "sale_id":
                    $sale_id = $value;
                    break;

                default:
                    echo '';
            }
        }
    }
    $_SESSION['saleid']=$sale_id;
    echo '6';
    $sql15 = "select * from cart_content natural join art where cart_id='$cart_id'";
    $query = $dbhandler->query($sql15);
    echo '7';
//echo $query->rowCount();
    while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
        foreach ($r as $key => $value) {
//echo $key.' ';


            switch ($key) {

                case "art_id":
                    $art_id = $value;
                    break;

                default:
                    echo '';
            }
        }



        $sql16 = "insert into sales_order_detail(sale_id,art_id) values('$sale_id','$art_id')";
        $query1 = $dbhandler->query($sql16);
    }
    echo '8';

    $sql17 = "delete from cart_content where cart_id='$cart_id'";
    $query = $dbhandler->query($sql17);
    echo '9';
    header('Location: confirmation.php');
} catch (PDOException $e) {
    header('Location: confirmation.php');
}
?>