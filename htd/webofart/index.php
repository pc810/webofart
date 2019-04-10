<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>  
        <!--<link rel="stylesheet" href="/webofart/bootstrap-4.3.1-dist/css/myfoot.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style>

            .bottom-left {
                position: absolute;
                bottom: 8px;
                left: 16px;
            }

            .top-left {
                /*  position: absolute;
                  top: 120px;
                  left: 120px;*/
                position: absolute;
                top: 20%;
                left: 5%;
                right: 50%;
            }

            .top-right {
                position: absolute;
                /*  top: 8px;
                  right: 16px;*/
                top: 20%;

                right: 2%;
            }

            .bottom-right {
                position: absolute;
                /*  bottom: 8px;
                  right: 16px;*/
                bottom: 15%;
                right: 20%;
            }
            .mycontainer {
                position: relative;
                text-align: center;
                color: white;
            }
            .centered {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);


            </style>
        </head>

        <body style="background: url('/webofart/image/web/pattern.png');">
            <?php include_once 'include/header.php'; ?>
            <div class="mycontainer">
                <img src="/webofart/image/mybackground.jpg" width="100%" height="700px"> 
                <div class="top-left">
                    <font style="font-size: 500%;">Art Gallery</font>
                    <br>
                    <font style="font-size: 150%;">showcasing the best works</font>
                    <br>
                    <font size="6">of modern art</font>
                </div>
                <div class="top-right">
                    <a href="page/auction.php" style="color:white;"><font style="font-size: 250%;">Auction</font></a>
                </div>
                <div class="bottom-right">
                    <a href="user/registration.php" style="color:white;"><font style="font-size: 250%;">Join Today</font></a>        
                </div>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">                    
                    <div class="carousel-item active">
                        <div class="jumbotron jumbotron-fluid" style="  background-repeat: no-repeat;
                             background-size:100% 100%;  background-image: url(/webofart/image/web/back1.jpeg);">
                            <div class="container">
                                <h1 class="display text-dark">
                                    <font style="size: 30px; color: white;">Sell your originals on Webofart </font>
                                </h1>

                                <br>
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4 style=" color: white;">Sell art works from your collection and increase your revenues by selling high quality fine prints and posters </h4>


                                        <br>
                                        <form class="form-group" action="page/sellart.php">
                                            <button class="btn btn-dark">Sell Art</button>
                                        </form>
                                    </div>
                                </div>
                                <br>


                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    if(!isset($_SESSION["username"]))
                    {
                        echo '<div class="carousel-item">
                        <div class="jumbotron jumbotron-fluid"  style="background-size:50% 100%;  background-image: url(http://blog.hostbaby.com/wp-content/uploads/2014/03/Trees_1400x900-1024x658.png);">
                            <div class="container">
                                <h1 class="display text-dark">
                                    <font style="size: 30px;">Online Art Gallery</font>
                                </h1>
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4>Meet contemporary artists, buy directly from them </h4>
                                        <br><h6>&nbsp; Register YourSelf Today</h6>
                                        <br>
                                        <br>
                                        <form class="form-group" action="user/registration.php">
                                            <button class="btn btn-primary">Register</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>';
                    }
                ?>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="container">
                <div class="row">
                    <!--                    <div class="col-md-4">
                                            <div class="card mb-4 box-shadow">
                                                <img class="card-img-top" src="image/web/collage_art.jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    Collage
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="card mb-4 box-shadow">
                                                <img class="card-img-top" src="image/web/digital_art.jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    Digital Art
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="card mb-6 box-shadow">
                                                <img class="card-img-top" src="image/web/drawing_art.jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    Drawing
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                    <div class="row">
                        <div class="col-md-6">
                            <a href="/webofart/displayart/displayart.php?action=fetch_data&Medium=&username=&Art_Title=&max_p=990000&min_p=15000&max_h=20000&min_h=100&min_w=100&max_w=20000&page-link=1&Genre=nature">
                                <div class="card mb-6 box-shadow">
                                    <img class="card-img-top" src="image/web/nature.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        Nature Art
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="/webofart/displayart/displayart.php?action=fetch_data&Medium=&username=&Art_Title=&max_p=990000&min_p=15000&max_h=20000&min_h=100&min_w=100&max_w=20000&page-link=1&Genre=abstract">
                                <div class="card mb-6 box-shadow">
                                    <img class="card-img-top" src="image/web/abstract1.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        Abstract
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="/webofart/displayart/displayart.php?action=fetch_data&Medium=&username=&Art_Title=&max_p=990000&min_p=15000&max_h=20000&min_h=100&min_w=100&max_w=20000&page-link=1&Genre=history">
                                <div class="card mb-6 box-shadow">
                                    <img class="card-img-top" src="image/web/history.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        History
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="/webofart/displayart/displayart.php?action=fetch_data&Medium=&username=&Art_Title=&max_p=990000&min_p=15000&max_h=20000&min_h=100&min_w=100&max_w=20000&page-link=1&Genre=digital">
                                <div class="card mb-6 box-shadow">
                                    <img class="card-img-top" src="image/web/digital.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        Digital
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" style="background-color:white;">
                <hr>           
                <div class="row">
                    <div class="col-md-6">
                        <b> <font style="font-size:50px; color: #FFD700;">New Artworks !!</font></b>
                    </div>
                </div>
                <br>
                <div class="row">
                    <!--                    <div class="col-md-1">
                    
                                        </div>
                                        <div class="col-md-5 jumbotron ">                
                                            <p>
                    
                                                <img src="/webofart/image/web/picture.png">
                    
                                                &nbsp;&nbsp;&nbsp;
                                                <a href="">
                                                    <font size="4">Buy original artworks</font>
                                                </a>
                                            </p>
                                            <br>
                                            <p>
                                                <img src="/webofart/image/web/shopping-cart.png">
                    
                    
                                                &nbsp;&nbsp;&nbsp;
                                                <font size="4">Buy reproductions </font>
                                            </p>
                                            <br>
                                            <p>
                                                <img src="/webofart/image/web/sell.png">
                                                &nbsp;&nbsp;&nbsp;
                                                <font  size="4">Sell Artwork </font>  
                                            </p>
                                        </div>-->
                    <?php
                    $path = $_SERVER['DOCUMENT_ROOT'];
                    $path .= "/webofart/include/dbcon.php";
                    include_once($path);
                    $sql = "select * from art limit 5";



                    $stmt = $dbhandler->prepare($sql);
                    $stmt->execute();

                    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $mypath = "/webofart/displayart/aboutart.php?artid=";
                    ?>

                    <div class="col-md-12" style="height:500px;">
                        <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">                            
                            <div class="carousel-inner">
                                <?php
                                $arts = "/webofart/displayart/aboutart.php?artid=";
                                foreach ($rs as $row) {
                                    foreach ($row as $key => $value) {
                                        switch ($key) {
                                            case "art_id":
                                                $art_id = $value;
                                                break;

                                            case "art_title":
                                                $art_title = $value;
                                                break;
                                            case "art_loc":
                                                $art_loc = "image/userart/" . $value;
                                                break;
                                        }
                                    }
                                    echo '<div class="carousel-item">
                                   <a href='.$arts.$art_id.'> <img class="d-block w-100" src=' . $art_loc . ' alt="First slide" style="height:475px;"></a>
                                </div>
                                ';
                                }
                                ?>

                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="/webofart/image/userart/max-van-den-oetelaar-1150510-unsplash.jpg" alt="First slide" style="height:475px;">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/webofart/image/userart/clodagh-da-paixao-683851-unsplash.jpg" alt="Second slide" style="height:475px;">
                                </div>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>            
        </body>
    </html>