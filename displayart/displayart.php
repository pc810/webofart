<!doctype html>
<?php
//PHASE 1       
// $path = $_SERVER['DOCUMENT_ROOT'];
// $path .= "/webofart/include/dbcon.php";
// include_once($path);
// $path = $_SERVER['DOCUMENT_ROOT'];
// $path1 .= "/webofart/include/session.php";
// include($path1);
//PHASE 1
try {

    //$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=webofart', 'root', '');
    //$dbhandler = new PDO('mysql:host=localhost;dbname=webofart','root','root');
    //$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   echo 'successfully connected';
     $path = $_SERVER['DOCUMENT_ROOT'];
     $path .= "/webofart/include/dbcon.php";
     include_once($path);
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/webofart/include/header.php";
    include_once($path);
    ?>
    <?php
//PHASE 2
// // if (isset($_GET['genre'])) {
// //     $na = $bo = $hi = $all = $ab = "";
// //     $genre = $_GET['genre'];
// // } else {
// // $genre="all";    
// // }
// // switch ($genre) {
// //     case "nature":
// //         $na = "active";
// //         break;
// //     case "bodyart":
// //         $bo = "active";
// //         break;
// //     case "abstract":
// //         $ab = "active";
// //         break;
// //     case "history":
// //         $hi = "active";
// //         break;
// //     default:
// //         $all = "active";
// }
//PHASE 2
    ?>
    <?php
    if (isset($_GET['page-link'])) {
        $page = $_GET['page-link'];
        switch ($page) {
            case "1":
                $page = 1;
                break;
            case "2":
                $page = 2;
                break;
            case "3":
                $page = 3;
                break;
            case "4":
                $page = 4;
                break;
            case "5":
                $page = 5;
                break;
            default:
                echo '';
                ;
        }
    } else {
        $page = 1;
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
            <!-- PHASE 3 -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <!-- PHASE 3 -->
        </head>

        <body style="background: url('/webofart/image/web/pattern.png');">

            <!--================Header Menu Area =================-->

    <?php
// PHASE 4
// $path2 = $_SERVER['DOCUMENT_ROOT'];
// $path2 .= "/webofart/include/header.php";
// include($path2);
// PHASE 4}
    ?>



            <!--================Header Menu Area =================-->

            <!--================Home Banner Area =================-->
            <br>
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
            <!-- PHASE 6 -->
            <div id="hidden_form_container" >
            </div>
            <!-- PHASE 6 -->
            <section class="cat_product_area section_gap">
                <div class="container-fluid">
                    <div class="row flex-row-reverse">
                        <div class="col-lg-9">
                            <div class="product_top_bar">
                                <div class="right_page ml-auto">
                                    <nav class="cat_page" aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                            </li>
                                            <li>
                                                <input type="button" name="1" value="1" class=" btn-outline-primary page-link" onclick="get_fil(this, '1')" <?php
        if (isset($_GET['page-link'])) {
            if ($_GET['page-link'] == "1") {
                echo "disabled";
            } else {
                echo "enabled";
            }
        } else
            echo "enabled";
    ?>/>

                                            </li>
                                            <li>
                                                <input type="button" name="2" value="2" class=" btn-outline-primary page-link" onclick="get_fil(this, '2')" <?php
                                                if (isset($_GET['page-link'])) {
                                                    if ($_GET['page-link'] == "2") {
                                                        echo "disabled";
                                                    } else {
                                                        echo "enabled";
                                                    }
                                                } else
                                                    echo "enabled";
                                                ?>
                                                       />
                                            </li>
                                            <li>
                                                <input type="button" name="3" value="3" class=" btn-outline-primary page-link" onclick="get_fil(this, '3')" <?php
                                                if (isset($_GET['page-link'])) {
                                                    if ($_GET['page-link'] == "3") {
                                                        echo "disabled";
                                                    } else {
                                                        echo "enabled";
                                                    }
                                                } else
                                                    echo "enabled";
                                                ?>
                                                       />         
                                            </li>
                                            <li>
                                                <input type="button" name="4" value="4" class=" btn-outline-primary page-link" onclick="get_fil(this, '4')" <?php
                                                if (isset($_GET['page-link'])) {
                                                    if ($_GET['page-link'] == "4") {
                                                        echo "disabled";
                                                    } else {
                                                        echo "enabled";
                                                    }
                                                } else
                                                    echo "enabled";
                                                ?>
                                                       />
                                            </li>
                                            <li>
                                                <input type="button" name="5" value="5" class=" btn-outline-primary page-link" onclick="get_fil(this, '5')" <?php
                                                if (isset($_GET['page-link'])) {
                                                    if ($_GET['page-link'] == "5") {
                                                        echo "disabled";
                                                    } else {
                                                        echo "enabled";
                                                    }
                                                } else
                                                    echo "enabled";
                                                ?>
                                                       />
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="latest_product_inner row">
                                                <?php
                                                // PHASE 5
                                                $limit = 3;
                                                $offlimit = ($page - 1) * 3;
                                                $query = "SELECT * FROM art WHERE art_status='available' ";
                                                if (isset($_GET["Medium"]) && !empty($_GET["Medium"])) {
                                                    $M_filter = '"' . implode('","', explode(',', $_GET["Medium"])) . '"';
                                                    $query .= " AND art_medium IN(" . $M_filter . ")";
                                                }
                                                if (isset($_GET["Genre"]) && !empty($_GET["Genre"])) {
                                                    $G_filter = '"' . implode('","', explode(',', $_GET["Genre"])) . '"';
                                                    $query .= " AND art_genre IN(" . $G_filter . ")";
                                                }
                                                if (isset($_GET["username"]) && !empty($_GET["username"])) {
                                                    $U_filter = '"' . implode('","', explode(',', $_GET["username"])) . '"';
                                                    $query .= " AND username IN(" . $U_filter . ")";
                                                }
                                                if (isset($_GET["Art_Title"]) && !empty($_GET["Art_Title"])) {
                                                    $AT_filter = '"' . implode('","', explode(',', $_GET["Art_Title"])) . '"';
                                                    $query .= " AND art_title IN(" . $AT_filter . ")";
                                                }
                                                if (isset($_GET["max_p"]) && !empty($_GET["max_p"]) && !empty($_GET["min_p"]) && isset($_GET["min_p"])) {
                                                    $maxp_filter = (float) $_GET["max_p"];
                                                    $minp_filter = (float) $_GET["min_p"];
                                                    // echo $maxp_filter;
                                                    $query .= " AND art_price BETWEEN " . $minp_filter . " AND " . $maxp_filter . "";
                                                }
                                                if (isset($_GET["max_w"]) && !empty($_GET["max_w"]) && !empty($_GET["min_w"]) && isset($_GET["min_w"])) {
                                                    $maxw_filter = (float) $_GET["max_w"];
                                                    $minw_filter = (float) $_GET["min_w"];
                                                    $query .= " AND art_width BETWEEN " . $minw_filter . " AND " . $maxw_filter . "";
                                                }
                                                if (isset($_GET["max_h"]) && !empty($_GET["max_h"]) && !empty($_GET["min_h"]) && isset($_GET["min_h"])) {
                                                    $maxh_filter = (float) $_GET["max_h"];
                                                    $minh_filter = (float) $_GET["min_h"];
                                                    $query .= " AND art_height BETWEEN " . $minh_filter . " AND " . $maxh_filter . "";
                                                }
                                                $query .= " limit " . $limit . " offset " . $offlimit;
                                                //                                    }
                                                // else {
                                                //    
                                                // }
                                                // $query = $dbhandler->query($sql);
                                                // PHASE 5
                                                $statement = $dbhandler->prepare($query);
                                                $statement->execute();
                                                $result = $statement->fetchAll();
                                                $total_r = $statement->rowCount();
                                              //  echo $query;
                                               // echo "Total".$total_r;
                                                $lte = 0;
                                                // while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
                                                //     foreach ($r as $key => $value) {
                                                //         switch ($key) {
                                                if ($total_r > 0) {
                                                    echo '<div class="card-columns">';
                                                    foreach ($result as $row) {
                                                        // case "art_id":
                                                        if ($lte < 3) {
                                                            $lte += 1;
                                                            $art_id = $row['art_id'];
                                                            // break;
                                                            // case "art_title":
                                                            $art_title = $row['art_title'];
                                                            // break;
                                                            // case "art_loc":
                                                            // break;
                                                            // case "art_price":
                                                            $art_price = $row['art_price'];
                                                            //     default:
                                                            //         echo '';
                                                            // }
                                                            // $path1 = "/webofart/image/userart/" . $art_loc;
                                                            $path1 = "/webofart/image/userart/" . $row['art_loc'];
                                                            //$arts = "/webofart/user/userprofile/art.php?artid=" . $art_id;
                                                            $arts = "/webofart/displayart/aboutart.php?artid=" . $art_id;
                                                            $carts = "/webofart/displayart/addtocart.php?artid=" . $art_id;
                                                            echo '
                                                            <div class="card">
                                                                <center>
                                                                <div class="card-header"><b>'.$art_title.'</b></div>
                                                                <a href='.$arts.'><img class="card-img-top" src='.$path1.' alt="image"></a>
                                                                 </center>
                                                                 <div class="card-footer">
                                                                    <div class="row">
                                                                    <div class="col-md-10">
                                                                        <font size="4">₹'.$art_price.'</font>'
                                                                    . '</div>';
                                                            if(isset($_SESSION["username"]))
                                                              {
                                                              echo '
                                                                  <div class="ml-auto">
                                                              <a href="'.$carts.'">
                                                                    <img src="https://img.icons8.com/android/22/000000/shopping-cart.png">
                                                              </a>
                                                              </div>'
                                                              ;
                                                              }
                                                                echo '</div>
                                                               </div>
                                                            </div>    
                                                            ';
                                                            
                                                            /*                                            echo '<div class="col-lg-3 col-md-3 col-sm-6">
                                                              <div class="f_p_item">
                                                              <div class="f_p_img">
                                                              <img class="img-fluid" src="'.$path1.'" alt="">';
                                                              if(isset($_SESSION["username"]))
                                                              {
                                                              echo '
                                                              <div class="p_icon">
                                                              <a href="'.$carts.'">
                                                              <img src="https://img.icons8.com/android/22/000000/shopping-cart.png">
                                                              </a>
                                                              </div>'
                                                              ;
                                                              }
                                                              echo '
                                                              </div><a href="'.$arts.'">
                                                              <h4>'.$art_title.'</h4>
                                                              </a>
                                                              <h5>₹'.$art_price.'</h5>
                                                              </div>
                                                              </div>';
                                                             */
                                                        }
                                                    }
                                                    echo "</div>";
                                                } else {
                                                    $art_price = '';
                                                    $art_title = '';
                                                }
                                                //echo $path1;
                                                ?>
                                <!-- 
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="f_p_item">
                                        <div class="f_p_img">
                                            <img class="img-fluid" src="<?php echo $path1; ?>" alt="">
                                            <div class="p_icon">
                                                
                                                <a href="/webofart/displayart/addtocart.php?artid=<?php echo $art_id; ?>">
                                                    <i class="lnr lnr-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <a href="<?php echo $arts; ?>">
                                            <h4><?php echo $art_title; ?></h4>
                                        </a>
                                        <h5><?php if ($art_price != '') echo '₹' . $art_price; ?></h5>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="left_sidebar_area">

                                <aside class="left_widgets p_filter_widgets">
                                    <div class="l_w_title">
                                        <h3>Product Filters</h3>
                                    </div>
                                    <div class="widgets_inner">
                                        <h5>Medium:</h5>
                                        <!--                      <div class="btn-group">
                                             <button class="btn btn-outline-primary dropdown-toggle badge-pill " data-toggle="dropdown" aria-hashpop='true' aria-expanded='false' >
                                                 Medium
                                             </button>
                                             <div class="dropdown-menu round border-info "> -->
                                        <li>

                                            &nbsp&nbsp<input type="checkbox" class="common_selector Medium" value="oil" 
    <?php
    if (isset($_GET['Medium'])) {
        $te = explode(",", $_GET["Medium"]);
        foreach ($te as $med) {
            if ($med == "oil")
                echo 'checked="checked"';
        }
    }
    ?> /> Oil
                                        </li>
                                        <li>
                                            &nbsp&nbsp<input type="checkbox" class="common_selector Medium" value="watercolor" 
    <?php
    if (isset($_GET['Medium'])) {
        $te = explode(",", $_GET["Medium"]);
        foreach ($te as $med) {
            if ($med == "watercolor")
                echo 'checked="checked"';
        }
    }
    ?> /> Water-Color
                                        </li>
                                        <li>
                                            &nbsp&nbsp<input type="checkbox" class="common_selector Medium" value="acrylic"
                                            <?php
                                                             if (isset($_GET['Medium'])) {
                                                                 $te = explode(",", $_GET["Medium"]);
                                                                 foreach ($te as $med) {
                                                                     if ($med == "acrylic")
                                                                         echo 'checked="checked"';
                                                                 }
                                                             }
                                                             ?> /> Acrylic                        
                                        </li>
                                        <li>
                                            &nbsp&nbsp<input type="checkbox" class="common_selector Medium" value="pastels"
                                                             <?php
                                                             if (isset($_GET['Medium'])) {
                                                                 $te = explode(",", $_GET["Medium"]);
                                                                 foreach ($te as $med) {
                                                                     if ($med == "pastels")
                                                                         echo 'checked="checked"';
                                                                 }
                                                             }
                                                             ?> /> Pastels
                                        </li>
                                        <!-- </div> -->
                                        <!-- </div> -->
                                        <br>
                                        <h5>Genre:</h5>
                                        <li>

                                            &nbsp&nbsp<input type="checkbox" class="common_selector Genre" value="nature" 
                                            <?php
                                            if (isset($_GET['Genre'])) {
                                                $te = explode(",", $_GET["Genre"]);
                                                foreach ($te as $med) {
                                                    if ($med == "nature")
                                                        echo 'checked="checked"';
                                                }
                                            }
                                            ?> /> Nature
                                        </li>
                                        <li>
                                            &nbsp&nbsp<input type="checkbox" class="common_selector Genre" value="digital" 
    <?php
    if (isset($_GET['Genre'])) {
        $te = explode(",", $_GET["Genre"]);
        foreach ($te as $med) {
            if ($med == "digital")
                echo 'checked="checked"';
        }
    }
    ?> /> Digital
                                        </li>
                                        <li>
                                            &nbsp&nbsp<input type="checkbox" class="common_selector Genre" value="abstract"
                                            <?php
                                            if (isset($_GET['Genre'])) {
                                                $te = explode(",", $_GET["Genre"]);
                                                foreach ($te as $med) {
                                                    if ($med == "abstract")
                                                        echo 'checked="checked"';
                                                }
                                            }
                                            ?> /> Abstract                  
                                        </li>
                                        <li>
                                            &nbsp&nbsp<input type="checkbox" class="common_selector Genre" value="history"
                                            <?php
                                            if (isset($_GET['Genre'])) {
                                                $te = explode(",", $_GET["Genre"]);
                                                foreach ($te as $med) {
                                                    if ($med == "history")
                                                        echo 'checked="checked"';
                                                }
                                            }
                                            ?> /> History
                                        </li>
                                        <br> <!-- &nbsp&nbsp -->
                                        <h5>Artist:</h5>
                                        <!-- <div class="btn-group">
                        
                                        <button class="btn btn-outline-primary dropdown-toggle badge-pill" data-toggle="dropdown" aria-hashpop='true' aria-expanded='false' >
                                                Artist
                                            </button>
                                            <div class="dropdown-menu round border-info ">
                                        -->        <?php
                                            $query = "SELECT DISTINCT(username) FROM art WHERE  art_status = 'available'";
                                            $statement = $dbhandler->prepare($query);
                                            $statement->execute();
                                            $result = $statement->fetchAll();
                                            foreach ($result as $row) {
                                                ?>
                                            <li>
                                                &nbsp&nbsp<input type ="checkbox" class="common_selector User" value="<?php echo $row['username']; ?>"
        <?php
        if (isset($_GET['username'])) {
            $te = explode(",", $_GET["username"]);
            foreach ($te as $med) {
                if ($med == $row['username'])
                    echo 'checked="checked"';
            }
        }
        ?>
                                                                 />&nbsp<?php echo $row['username']; ?>
                                            </li>
                                                <?php
                                            }
                                            ?>
                                        <!-- div>
                                    </div> -->
                                        <br>
                                        <h5>Art Title:</h5><!-- 
                                        <div class="btn-group">
                                        <button class="btn btn-outline-primary dropdown-toggle badge-pill" data-toggle="dropdown" aria-hashpop='true' aria-expanded='false' >
                                                Art Title
                                            </button>
                                            <div class="dropdown-menu round border-info"> -->

                                        <?php
                                        $query = "SELECT DISTINCT(art_title) FROM art WHERE  art_status = 'available'";
                                        $statement = $dbhandler->prepare($query);
                                        $statement->execute();
                                        $result = $statement->fetchAll();
                                        foreach ($result as $row) {
                                            ?>
                                            <li>
                                                &nbsp&nbsp<input type ="checkbox" class="common_selector Art_Title" value="<?php echo $row['art_title']; ?>" 
        <?php
        if (isset($_GET['Art_Title'])) {
            $te = explode(",", $_GET["Art_Title"]);
            foreach ($te as $med) {
                if ($med == $row['art_title'])
                    echo 'checked="checked"';
            }
        }
        ?> />&nbsp<?php echo $row['art_title']; ?>
                                            </li>
                                            <?php
                                        }
                                        ?><!-- 
                                    </div>
                                </div> -->
                                        <br>
                                        <!-- <div class="btn-group">
                        
                                        <button class="btn btn-outline-primary dropdown-toggle badge-pill" data-toggle="dropdown" aria-hashpop='true' aria-expanded='false' >
                                                Price
                                            </button>
                                            <div class="dropdown-menu round border-info ">
                                             </div> -->
                                        <div>
                                            <h5>Price: </h5>    
                                            <input type="hidden" id="hidden_minimum_price" value="15000" />
                                            <input type="hidden" id="hidden_maximum_price" value="990000" />
                                            <p id="price_show" >&nbsp&nbsp15000 - 990000</p>
                                            <div id="price_range"></div>
                                        </div>    
                                        <!-- div>
                                    </div> -->
                                        <br>
                                        <!-- <div class="btn-group">
                        
                                        <button class="btn btn-outline-primary dropdown-toggle badge-pill" data-toggle="dropdown" aria-hashpop='true' aria-expanded='false' >
                                                Width
                                            </button>
                                            <div class="dropdown-menu round border-info ">
                                        -->
                                        <h5>Width:</h5>
                                        <input type="hidden" id="hidden_minimum_width" value="100" />
                                        <input type="hidden" id="hidden_maximum_width" value="20000" />
                                        <p id="width_show">&nbsp&nbsp100 - 20000</p>
                                        <div id="width_range"></div>
                                        <!-- </div>    
                                       <div class="list-group">
                                           </div>
                                       </div> -->
                                        <br><!-- 
                                        <div class="btn-group">
                        
                                        <button class="btn btn-outline-primary dropdown-toggle badge-pill" data-toggle="dropdown" aria-hashpop='true' aria-expanded='false' >
                                                Height
                                            </button> -->
                                        <h5>Height:</h5>
                                        <!-- <div class="dropdown-menu round border-info "> -->
                                        <input type="hidden" id="hidden_minimum_height" value="100" />
                                        <input type="hidden" id="hidden_maximum_height" value="20000" />
                                        <p id="height_show">&nbsp&nbsp100 - 20000</p>
                                        <div id="height_range"></div>
                                        <!-- </div>   
                                       </div> -->
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="row">
                        <nav class="cat_page mx-auto" aria-label="Page navigation example">
                            <ul class="pagination"> 
                                <li class="<?php echo $one; ?>">
                                                <input type="" name="" class="page-link" />1
                                            </li>
                                            <li class="<?php echo $two; ?>">
                                                <a class="page-link" href="displayart.php?page=2">2</a>
                                            </li>
                                            <li class="<?php echo $three; ?>">
                                                <a class="page-link" href="displayart.php?page=3">3</a>
                                            </li>
                                            <li class="<?php echo $four; ?>">
                                                <a class="page-link" href="displayart.php?page=4">4</a>
                                            </li>
                                            <li class="<?php echo $five; ?>">
                                                <a class="page-link" href="displayart.php?page=5">5</a>
                                            </li>
                            </ul>
                        </nav>
                    </div> -->
                </div>
    <?php
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>
        </section>
        <!--================End Category Product Area =================-->


        <script type="text/javascript">
            var globpg = 1;
            $(document).ready(function () {

                function filter_data()
                {
                    var action = 'fetch_data';
                    var minimum_price = $('#hidden_minimum_price').val();
                    var maximum_price = $('#hidden_maximum_price').val();
                    var minimum_width = $('#hidden_minimum_width').val();
                    var maximum_width = $('#hidden_maximum_width').val();
                    var minimum_height = $('#hidden_minimum_height').val();
                    var maximum_height = $('#hidden_maximum_height').val();
                    var Medium = get_filter('Medium');
                    var Genre = get_filter('Genre');
                    var username = get_filter('User');
                    var Art_Title = get_filter('Art_Title');
                    var pg = globpg;
                    theForm = document.createElement('form');
                    theForm.action = 'displayart.php';
                    theForm.method = 'get';
                    newInput1 = document.createElement('input');
                    newInput1.type = 'hidden';
                    newInput1.name = 'action';
                    newInput1.value = action;
                    newInput12 = document.createElement('input');
                    newInput12.type = 'hidden';
                    newInput12.name = 'Genre';
                    newInput12.value = Genre;
                    newInput2 = document.createElement('input');
                    newInput2.type = 'hidden';
                    newInput2.name = 'Medium';
                    newInput2.value = Medium;
                    newInput3 = document.createElement('input');
                    newInput3.type = 'hidden';
                    newInput3.name = 'username';
                    newInput3.value = username;
                    newInput4 = document.createElement('input');
                    newInput4.type = 'hidden';
                    newInput4.name = 'Art_Title';
                    newInput4.value = Art_Title;
                    newInput5 = document.createElement('input');
                    newInput5.type = 'hidden';
                    newInput5.name = 'max_p';
                    newInput5.value = maximum_price;
                    newInput6 = document.createElement('input');
                    newInput6.type = 'hidden';
                    newInput6.name = 'min_p';
                    newInput6.value = minimum_price;
                    newInput7 = document.createElement('input');
                    newInput7.type = 'hidden';
                    newInput7.name = 'max_h';
                    newInput7.value = maximum_height;
                    newInput8 = document.createElement('input');
                    newInput8.type = 'hidden';
                    newInput8.name = 'min_h';
                    newInput8.value = minimum_height;
                    newInput10 = document.createElement('input');
                    newInput10.type = 'hidden';
                    newInput10.name = 'max_w';
                    newInput10.value = maximum_width;
                    newInput9 = document.createElement('input');
                    newInput9.type = 'hidden';
                    newInput9.name = 'min_w';
                    newInput9.value = minimum_width;
                    newInput11 = document.createElement('input');
                    newInput11.type = 'hidden';
                    newInput11.name = 'page-link';
                    newInput11.value = pg;
                    // Now put everything together...
                    theForm.appendChild(newInput1);
                    theForm.appendChild(newInput2);
                    theForm.appendChild(newInput3);
                    theForm.appendChild(newInput4);
                    theForm.appendChild(newInput5);
                    theForm.appendChild(newInput6);
                    theForm.appendChild(newInput7);
                    theForm.appendChild(newInput8);
                    theForm.appendChild(newInput9);
                    theForm.appendChild(newInput10);
                    theForm.appendChild(newInput11);
                    theForm.appendChild(newInput12);
                    document.getElementById('hidden_form_container').appendChild(theForm);
                    // ...and submit it
                    theForm.submit();

                }
                function get_filter(class_name)
                {
                    // THE LAST UNDO       

                    var filter = [];
                    $('.' + class_name + ':checked').each(function () {
                        filter.push($(this).val());
                    });
                    return filter;
                }


                $('.common_selector').click(function () {
                    filter_data();
                });
                $('.page-link').click(function (obg) {
                    globpg = $(this).val();

                    filter_data();
                });
                $('#price_range').slider({
                    range: true,
                    min: 15000,
                    max: 990000,
                    values: [15000, 990000],
                    step: 500,
                    stop: function (event, ui)
                    {
                        $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                        $('#hidden_minimum_price').val(ui.values[0]);
                        $('#hidden_maximum_price').val(ui.values[1]);
                        filter_data();
                    }
                });
                $('#width_range').slider({
                    range: true,
                    min: 100,
                    max: 20000,
                    values: [100, 20000],
                    step: 50,
                    stop: function (event, ui)
                    {
                        $('#width_show').html(ui.values[0] + ' - ' + ui.values[1]);
                        $('#hidden_minimum_width').val(ui.values[0]);
                        $('#hidden_maximum_width').val(ui.values[1]);
                        filter_data();
                    }
                });
                $('#height_range').slider({
                    range: true,
                    min: 100,
                    max: 20000,
                    values: [100, 20000],
                    step: 50,
                    stop: function (event, ui)
                    {
                        $('#height_show').html(ui.values[0] + ' - ' + ui.values[1]);
                        $('#hidden_minimum_height').val(ui.values[0]);
                        $('#hidden_maximum_height').val(ui.values[1]);
                        filter_data();
                    }
                });
                // PRICE SLIDER SETTINGS 
                $ck_p_min = "<?php
if (isset($_GET['min_p'])) {
    echo $_GET["min_p"];
} else {
    echo -1;
}
?>"
                $ck_p_max = "<?php
if (isset($_GET['max_p'])) {
    echo $_GET["max_p"];
} else {
    echo -1;
}
?>"
                if ($ck_p_min != -1 && $ck_p_max != -1) {
                    $("#price_range").slider('values', 0, $ck_p_min);
                    $("#price_range").slider('values', 1, $ck_p_max);
                    $('#price_show').html($ck_p_min + ' - ' + $ck_p_max);
                    $('#hidden_minimum_price').val($ck_p_min);
                    $('#hidden_maximum_price').val($ck_p_max);
                }
                // WIDTH SLIDER SETTINGS
                $ck_w_min = "<?php
if (isset($_GET['min_w'])) {
    echo $_GET["min_w"];
} else {
    echo -1;
}
?>"
                $ck_w_max = "<?php
if (isset($_GET['max_w'])) {
    echo $_GET["max_w"];
} else {
    echo -1;
}
?>"
                if ($ck_w_min != -1 && $ck_w_max != -1) {
                    $("#width_range").slider('values', 0, $ck_w_min);
                    $("#width_range").slider('values', 1, $ck_w_max);
                    $('#width_show').html($ck_w_min + ' - ' + $ck_w_max);
                    $('#hidden_minimum_width').val($ck_w_min);
                    $('#hidden_maximum_width').val($ck_w_max);
                }
                // HEIGHT SLIDER SETTINGS
                $ck_h_min = "<?php
if (isset($_GET['min_h'])) {
    echo $_GET["min_h"];
} else {
    echo -1;
}
?>"
                $ck_h_max = "<?php
if (isset($_GET['max_h'])) {
    echo $_GET["max_h"];
} else {
    echo -1;
}
?>"
                if ($ck_h_min != -1 && $ck_h_max != -1) {
                    $("#height_range").slider('values', 0, $ck_h_min);
                    $("#height_range").slider('values', 1, $ck_h_max);
                    $('#height_show').html($ck_h_min + ' - ' + $ck_h_max);
                    $('#hidden_minimum_height').val($ck_h_min);
                    $('#hidden_maximum_height').val($ck_h_max);
                }


            });
        </script>
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