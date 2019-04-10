<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/dbcon.php";

include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/session.php";
include($path);
?>
<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Confirmation</title>
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
        if (!isset($_SESSION["username"])) {
    header("Location: /webofart/user/login.php");
} 
 else {
    


        ?>
        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->
        <br>
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Order Confirmation</h2>
                        <div class="page_link">
                            <a href="index.php">Home</a>
                            <a href="confirmation.php">Confirmation</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Order Details Area =================-->
        <section class="order_details p_120">
            <div class="container" style="background-color: white;">
                <br><br>
                <h3 class="title_confirmation">Thank you. Your order has been received.</h3>
                <div class="row order_d_inner">
                    <div class="col-lg-4">
                        <div class="details_item">
                            <h4>Order Info</h4>
                            <?php
                                    //echo '1';
                             $dely_date=$saleamount=$orderstatus="";
                            $sale_id = $_SESSION['saleid'];
                            //echo $sale_id;
                            try {
                                //echo '2';
                                $sql = "select * from sales_order where sale_id='$sale_id'";
                                $query = $dbhandler->query($sql);
                                while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
                                    foreach ($r as $key => $value) {
                                        switch ($key) {

                                            case "dely_date":
                                                $dely_date = $value;
                                                break;
                                            case "sale_amount":
                                                $sale_amount=$value;
                                                break;
                                            case "order_status":
                                                $orderstatus=$value;
                                                break;
                                            
                                            default:
                                                echo '';
                                        }
                                    }
                                }
                                //echo '3';
                            } catch (PDOException $e) {
                                
                            }
                            
                            ?>
                            <ul class="list">
                                <li>
                                    <a href="#">
                                        <span>Order number</span> : <?php echo $sale_id;?></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Delivery Date</span> : <?php echo $dely_date;?></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Total</span> : <?php echo $sale_amount;?></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Order Status</span> : <?php echo $orderstatus;?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="details_item">
                            <h4>Billing Address</h4>
                            <?php
                            $username=$_SESSION['username'];
                                try {
                                $sql = "select * from user where username='$username'";
                                $query = $dbhandler->query($sql);
                                while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
                                    foreach ($r as $key => $value) {
                                        switch ($key) {

                                            case "user_city":
                                                $user_city = $value;
                                                break;
                                            case "user_state":
                                                $user_state=$value;
                                                break;
                                            case "user_addr":
                                                $user_addr=$value;
                                                break;
                                            case "user_pincode":
                                                $pincode=$value;
                                                break;
                                            
                                            default:
                                                echo '';
                                        }
                                    }
                                }
                            } catch (PDOException $e) {
                                
                            }
                            ?>
                            <ul class="list">
                                <li>
                                    <a href="#">
                                        <span>Address</span> : <?php echo $user_addr;?></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>City</span> : <?php echo $user_city;?></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>State</span> : <?php echo $user_state;?></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Postcode </span> : <?php echo $pincode;?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="details_item">
                            <h4>Shipping Address</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">
                                        <span>Address</span> : <?php echo $user_addr;?></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>City</span> : <?php echo $user_city;?></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>State</span> : <?php echo $user_state;?></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Postcode </span> : <?php echo $pincode;?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="order_details_table">
                    <h2>Order Details</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Creater</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    //echo '1';
                            
                            $sale_id = $_SESSION['saleid'];
                            //echo $sale_id;
                            try {
                                //echo '2';
                                $sum=0;
                                $sql = "SELECT * FROM art NATURAL JOIN sales_order_detail WHERE sale_id='$sale_id'";
                                $query = $dbhandler->query($sql);
                                while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
                                    foreach ($r as $key => $value) {
                                        switch ($key) {

                                            case "username":
                                                $creater = $value;
                                                break;
                                            case "art_title":
                                                $art_title=$value;
                                                break;
                                            case "art_price":
                                                $art_price=$value;
                                                $sum=$sum+$art_price;
                                                break;
                                            
                                            default:
                                                echo '';
                                        }
                                    }
                                
                                //echo '3';
                            ?>
                                <tr>
                                    <td>
                                        <p><?php echo $art_title;?></p>
                                    </td>
                                    <td>
                                        <h5><?php echo $creater;?></h5>
                                    </td>
                                    <td>
                                        <p>₹<?php echo $art_price;?></p>
                                    </td>
                                </tr>
                               <?php 
                                }
                                        } catch (PDOException $e) {
                                
                            }
                            
                            ?>
                                
                                
                                <tr>
                                    <td>
                                        <h4>Subtotal</h4>
                                    </td>
                                    <td>
                                        <h5></h5>
                                    </td>
                                    <td>
                                        <p>₹<?php echo $sum;?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Shipping</h4>
                                    </td>
                                    <td>
                                        <h5></h5>
                                    </td>
                                    <td>
                                        <p>Flat rate: ₹500.00</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Total</h4>
                                    </td>
                                    <td>
                                        <h5></h5>
                                    </td>
                                    <td>
                                        <p>₹<?php echo $art_price+500;?></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Order Details Area =================-->

        <!--================ Subscription Area ================-->

        <!--================ End Subscription Area ================-->

        <!--================ start footer Area  =================-->
<!--        <footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About Us</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">

                    </div>

                </div>

            </div>
        </footer>-->
        <!--================ End footer Area  =================-->




        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.js"></script>
        <script src="js/theme.js"></script>-->
    </body>
<?php 
 }
 ?>
</html>