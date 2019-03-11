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
//echo '1';
if (isset($_GET['genre'])) {
    $na = $bo = $hi = $all = $ab = "";
    $genre = $_GET['genre'];
} else {
$genre="all";    
}
switch ($genre) {


    case "nature":
        $na = "active";
        break;
    case "bodyart":
        $bo = "active";
        break;
    case "abstract":
        $ab = "active";
        break;
    case "history":
        $hi = "active";
        break;
    default:
        $all = "active";
}
?>
<?php
if (isset($_GET['page'])) {
    $one=$two=$three=$four=$five="page-item";
    $page = $_GET['page'];
    switch ($page) {
        case "1":
            $one = "page-item active";
            break;
        case "2":
            $two = "page-item active";
            break;
        case "3":
            $three = "page-item active";
            break;
        case "4":
            $four = "page-item active";
            break;
        case "5":
            $five = "page-item active";
            break;
        default:
            echo '';
            ;
    }
} else {
 $page=1;   
}
?>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Buy art</title>
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
?>
            <div class="top_menu row m0">
            </div>

        
        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Creativity takes courage</h2>

                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Category Product Area =================-->
        <section class="cat_product_area section_gap">
            <div class="container-fluid">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="product_top_bar">

                            <div class="right_page ml-auto">
                                <nav class="cat_page" aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <!--                                            <a class="page-link" href="#">
                                                                                            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                                                                        </a>-->
                                        </li>
                                        <li class="<?php echo $one;?>">
                                            <a class="page-link" href="displayart.php?page=1&genre=<?php echo $genre; ?>">1</a>
                                        </li>
                                        <li class="<?php echo $two;?>">
                                            <a class="page-link" href="displayart.php?page=2&genre=<?php echo $genre; ?>">2</a>
                                        </li>
                                        <li class="<?php echo $three;?>">
                                            <a class="page-link" href="displayart.php?page=3&genre=<?php echo $genre; ?>">3</a>
                                        </li>
                                        <li class="<?php echo $four;?>">
                                            <a class="page-link" href="displayart.php?page=4&genre=<?php echo $genre; ?>">4</a>
                                        </li>
                                        <li class="<?php echo $five;?>">
                                            <a class="page-link" href="displayart.php?page=5&genre=<?php echo $genre; ?>">5</a>
                                        </li>
                                        <!--                                        <li class="page-item">
                                                                                    <a class="page-link" href="#">
                                                                                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                                                    </a>
                                                                                </li>-->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="latest_product_inner row">
                            <?php
                                    $limit=3;
                                    $offlimit=($page-1)*3;
                                    if($genre=="all")
                                    {
                                    $sql = "SELECT * FROM art limit $limit offset $offlimit";
                                    }
 else {
     $sql = "SELECT * FROM art where art_genre='$genre' limit $limit offset $offlimit";
 }
                                    $query = $dbhandler->query($sql);
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
                                                default:
                                                    echo '';
                                            }

                                           $path1 = "/webofart/image/userart/" . $art_loc;
                                          
                                            $arts = "/webofart/user/userprofile/art.php?artid=" . $art_id;
                                        }
                                        //echo $path1;
                                        ?>
                            
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="f_p_item">
                                    <div class="f_p_img">
                                        <img class="img-fluid" src="<?php echo $path1;?>" alt="">
                                        <div class="p_icon">
                                            
                                            <a href="/webofart/displayart/addtocart.php?artid=<?php echo $art_id;?>">
                                                <i class="lnr lnr-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="<?php echo $arts;?>">
                                        <h4><?php echo $art_title;?></h4>
                                    </a>
                                    <h5>₹<?php echo $art_price;?></h5>
                                </div>
                            </div>
                                    <?php } ?>
                            
                            
                            
                            
                            
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="left_sidebar_area">

                            <aside class="left_widgets p_filter_widgets">
                                <div class="l_w_title">
                                    <h3>Product Filters</h3>
                                </div>
                                <div class="widgets_inner">
                                    <h4>Brand</h4>
                                    <ul class="list">
                                        <li class="<?php echo $all; ?>">
                                            <a href="displayart.php?genre=all&page=<?php echo $page; ?>">All</a>
                                        </li>
                                        <li class="<?php echo $na; ?>">
                                            <a href="displayart.php?genre=nature&page=<?php echo $page; ?>">Nature</a>
                                        </li>
                                        <li class="<?php echo $ab; ?>">
                                            <a href="displayart.php?genre=abstract&page=<?php echo $page; ?>">Abstract</a>
                                        </li>
                                        <li class="<?php echo $bo; ?>">
                                            <a href="displayart.php?genre=bodyart&page=<?php echo $page; ?>">Body Art</a>
                                        </li>
                                        <li class="<?php echo $hi; ?>">
                                            <a href="displayart.php?genre=history&page=<?php echo $page; ?>">History</a>
                                        </li>
                                    </ul>
                                </div>

                                <!--                                <div class="widgets_inner">
                                                                    <h4>Price</h4>
                                                                    <div class="range_item">
                                                                        <div id="slider-range"></div>
                                                                        <div class="row m0">
                                                                            <label for="amount">Price : </label>
                                                                            <input type="text" id="amount" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="top_menu row m0">
                </div>
                <div class="row">
                    <nav class="cat_page mx-auto" aria-label="Page navigation example">
                        <ul class="pagination">
                            <!--                            <li class="page-item">
                                                            <a class="page-link" href="#">
                                                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                                            </a>
                                                        </li>-->

                            
                            <li class="<?php echo $one;?>">
                                            <a class="page-link" href="displayart.php?page=1&genre=<?php echo $genre; ?>">1</a>
                                        </li>
                                        <li class="<?php echo $two;?>">
                                            <a class="page-link" href="displayart.php?page=2&genre=<?php echo $genre; ?>">2</a>
                                        </li>
                                        <li class="<?php echo $three;?>">
                                            <a class="page-link" href="displayart.php?page=3&genre=<?php echo $genre; ?>">3</a>
                                        </li>
                                        <li class="<?php echo $four;?>">
                                            <a class="page-link" href="displayart.php?page=4&genre=<?php echo $genre; ?>">4</a>
                                        </li>
                                        <li class="<?php echo $five;?>">
                                            <a class="page-link" href="displayart.php?page=5&genre=<?php echo $genre; ?>">5</a>
                                        </li>
                            <!--                            <li class="page-item">
                                                            <a class="page-link" href="#">
                                                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                            </a>
                                                        </li>-->
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
        <!--================End Category Product Area =================-->

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
                    <div class="col-lg-3 col-md-6 col-sm-6">

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