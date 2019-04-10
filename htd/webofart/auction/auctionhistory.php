<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/dbcon.php";

include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/session.php";
include($path);
?>
<?php
if (!isset($_SESSION["username"])) {
    header("Location: /webofart/user/login.php");
}
?>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Purchase History</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>

    <body style="background: url('/webofart/image/web/pattern.png');">

        <!--================Header Menu Area =================-->

        <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/header.php";
        include($path);
        ?>
        <br>
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2 style="color:white;">Your Purchase</h2>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <br>
        <?php
        $username = $_SESSION['username'];
//echo $username;
        $sql = "SELECT sale_amount,sale_id,sale_date FROM auction_sales_order where username='$username'";
        $query = $dbhandler->query($sql);
        $sale_amount = 0;
        while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
            foreach ($r as $key => $value) {
//echo $key.' ';
                switch ($key) {
                    case "sale_id":
                        $sale_id = $value;
                        break;
                    case "sale_amount":
                        $sale_amount = $value;
                        break;
                    case "sale_date":
                        $sale_date = $value;
                        break;
                }
            }
        //    echo 'sale id '.$sale_id;
            $sql1 = "SELECT * FROM auction_sales_order_details NATURAL JOIN auction_art WHERE sale_id='$sale_id'";
            $query1 = $dbhandler->query($sql1);
            $sum = 0;
            $art_id = $art_title = $art_loc = 0 ;
            while ($r = $query1->fetch(PDO::FETCH_ASSOC)) {
                foreach ($r as $key => $value) {
//echo $key.' ';
                    switch ($key) {
                        case "art_id":
                            $art_id = $value;
                            $arts = "/webofart/user/userprofile/art.php?artid=" . $art_id;
                            break;
                        case "art_title":
                            $art_title = $value;
                            break;
                        case "art_loc":
                            $art_loc = $value;
                            $path1 = "/webofart/image/userart/" . $art_loc;
                            break;
                    }
                //    echo '<br>'.$art_id." ".$art_title." ".$art_loc;
                }
                ?>
                <section class="cart_area">
                    <div class="container">                
                        <div class="cart_inner">
                            <div class="table-responsive">
                                <table class="table" style="background-color: white">
                                    <tbody>

                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="f_p_img">
                                                        <img class="img-thumbnail" src="<?php echo $path1; ?>" alt="" width="250" height="250">                                        
                        <!--                                <h4 align="center" style="color:#FFF">Sale Id: <?php echo $sale_id; ?></h4>-->
                                                    </div>    
                                                    <center>
                                                        <div class="col-md-8">
                                                            <br><br><br>
                                                            <h5 align="center" style="color:#000">Ordered on <br><br><br><br></h5><h2><?php echo $sale_date; ?></h2>
                                                        </div>
                                                    </center>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media-body">
                                                    
                                                        <p><?php echo $art_title; ?></p>
                                                    
                                                </div>
                                            </td>

                                            <td>
                                                <h5>₹<?php echo $sale_amount; ?></h5>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>    <?php
            }
        }
        ?>
</html>