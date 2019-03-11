<!doctype html>
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/dbcon.php";

include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/session.php";
include($path);
?>
<?php
$username = $_SESSION['username'];
//echo $username;
$sql = "select * from cart where username='$username'";
$query = $dbhandler->query($sql);
while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
    foreach ($r as $key => $value) {
//echo $key.' ';
        switch ($key) {

            case "cart_id":
                $cart_id = $value;
                break;

            default:
                echo '';
        }
    }
}
?>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Cart</title>
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

    <body>

        <!--================Header Menu Area =================-->
        <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/header.php";
        include($path);
        ?><div class="top_menu row m0">
        </div>        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Everything you can imagine is real</h2>
                        <div class="page_link">
                            <a href="/webofart/index.php">Home</a>
                            <a href="cart.php">Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Cart Area =================-->
        <section class="cart_area">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col"></th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  
                                   $sql="select * from cart_content natural join art where cart_id='$cart_id'";
                                    $query = $dbhandler->query($sql);
                                    $rowcount=$query->rowCount();
                                    $sum=0;
//echo $query->rowCount();
                                    while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
                                        foreach ($r as $key => $value) {
//echo $key.' ';

                                            
                                            switch ($key) {

                                                case "art_id":
                                                    $art_id = $value;
                                                    break;
                                                case "art_title":
                                                    $art_title = $value;
                                                    break;
                                                case "art_loc":
                                                    $art_loc = $value;
                                                    break;
                                                case "art_price":
                                                    $art_price=$value;
                                                    $sum=$sum+$art_price;
                                                    
                                                default:
                                                    echo '';
                                            }

                                           $path1 = "/webofart/image/userart/" . $art_loc;
                                          
                                            $arts = "/webofart/user/userprofile/art.php?artid=" . $art_id;
                                        }
                                        //echo $path1;
                                        ?>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="f_p_img">
                                        <img class="img-thumbnail" src="<?php echo $path1;?>" alt="">
                                        
                                    </div>
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <div class="media-body">
                                            <a href="<?php echo $arts;?>">
                                                <p><?php echo $art_title;?></p>
                                            </a>
                                            </div>
                                    </td>
                                   
                                    <td>
                                        <h5>₹<?php echo $art_price;?></h5>
                                    </td>
                                     <td>
                                        <div class="product_count">
                                            <a class="gray_btn" href="/webofart/displayart/removefromcart.php?artid=<?php echo $art_id;?>&cartid=<?php echo $cart_id;?>">remove</a>
                                        </div>
                                    </td>
                                </tr>
                                
                                    <?php } ?>

                               
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>₹<?php echo $sum;?></h5>
                                    </td>
                                </tr>
                                <tr class="shipping_area">
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Shipping</h5>
                                    </td>
                                    <td>



                                    </td>
                                </tr>
                                <tr class="out_button_area">
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="checkout_btn_inner">
                                            <a class="gray_btn" href="displayart.php">Continue Shopping</a>
                                            <?php
                                            if($rowcount!=0){
                                            ?>
                                            <a class="main_btn" href="checkout.php?saleamount=<?php echo $sum;?>&cartid=<?php echo $cart_id;?>">Proceed to checkout</a>
                                                    <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Cart Area =================-->

        <!--================ Subscription Area ================-->

        <!--================ End Subscription Area ================-->

        <!--================ start footer Area  =================-->
        <footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About Us</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">

                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">

                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <!--                        <div class="single-footer-widget f_social_wd">
                                                    <h6 class="footer_title">Follow Us</h6>
                                                    <p>Let us be social</p>
                                                    <div class="f_social">
                                                        <a href="#">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                       
                                                        
                                                    </div>-->
                    </div>
                </div>
            </div>
            
       
    </footer>
    <!--================ End footer Area  =================-->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
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
    <script src="js/theme.js"></script>
</body>

</html>