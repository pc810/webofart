
<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body style="background-image: url(http://blog.hostbaby.com/wp-content/uploads/2014/03/Trees_1920x1234.png);">

        <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/header.php";
        include_once($path);
        ?>
        <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/dbcon.php";

        include_once($path);
        if (isset($_GET["artid"])) {
            $art_id = $_GET["artid"];
            //$art_id = 2;
//$art_id = $_GET;
        }
        if (1 == 1) {
            
            
            
            $sql = "select * from art WHERE art_id='$art_id'";
            $query = $dbhandler->query($sql);
            $artist = "";
            $art_current_bid = 0;

            while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
                foreach ($r as $key => $value) {
                    switch ($key) {
                        case "art_genre":
                            $art_genre = $value;
                            break;
                        case "art_title":
                            $art_title = $value;
                            break;
                        case "art_medium":
                            $art_medium = $value;
                            break;
                        case "art_about":
                            $art_about = $value;
                            break;
                        case "art_created_date":
                            $art_created_date = $value;
                            break;
                        case "art_width":
                            $art_width = $value;
                            break;
                        case "art_height":
                            $art_height = $value;
                            break;
                        case "art_loc":
                            $art_loc = $value;
                            break;
                        case "art_price":
                            $art_price = $value;
                            break;
                        case "username":
                            $artist = $value;
                            break;
                    }
                }
            }
            $carts = "/webofart/displayart/addtocart.php?artid=".$art_id;

            $sql = "select user_photo from user where username=?";
            $stmt = $dbhandler->prepare($sql);
            $stmt->execute(array($artist));
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rs as $row) {
                                    foreach ($row as $key => $value) {
                                        switch ($key) {
                                            case "user_photo":
                                                $loc_photo = $value;
                                                break;
                                        }
                                    }
            }
            ?>
            <div class="container">
                <br>
                <br>

                <div class="row jumbotron">

                    <div class="col-md-4">
                        <img class="img-thumbnail" src="../image/userart/<?php echo $art_loc; ?>" alt="image">                           
                        <hr>
                        <br>      
                        <a href="<?php echo $carts;?>" class="btn btn-success" style="width:100%;">Add to Cart</a>
                        <br>
                        <br>  
                        <h2>About this ArtWork :</h2>
                <p>
                    <?php echo $art_about; ?>
                </p>
                    </div>
                    <div class="col-md-1">
                        &nbsp;
                    </div>
                    <div class="col-md-5">
                        <div class=" jumbotron border border-primary">
                            <div class="row">
                                <h4 class="text-primary"><?php echo $art_title; ?></h4>
                            </div>
                            <br>
                            <div class="row">
                                <h6>Ratings:</h6>
                            </div>
                            <div class="row">

                                <h5 class="text-success"><div class="btn-success">&nbsp;<?php echo rand(1,5)?> *&nbsp;</div></h5>
                            </div>
                            <br><br>
                            <div class="row">
                                <h6 class="text-success">                                    
                                    Price
                                </h6>
                            </div>
                            <div class="row">
                                <h2>$<?php echo $art_price; ?></h2>
                                <!--                            <h2 id="currentprice"></h2>-->
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <h6>Creator </h6>
                            </div>
                            <div class="row" style="padding: 7px">
                                <div class="card" style="background-color: black;">
                                    <a href="#" class="card-img-top">
                                        <img src="../image/profile/<?php echo $loc_photo?>" class="img-thumbnail" width="100px" height="100px">
                                    </a>
                                </div>
                                <div class="col">
                                    <h3><?php echo $artist; ?></h3>                                
                                </div>
                            </div>
                            <br>

                            <h6>Description</h6>        
                            <br><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <h6>Medium </h6>
                                </div>
                                <div class="col">
                                    <?php echo $art_medium; ?>
                                </div>
                            </div>
                            <div class="row">                      
                                <div class="col-md-2">
                                    <h6>Created </h6> 
                                </div>
                                <div class="col">
                                    <?php echo $art_created_date; ?>
                                </div>
                            </div>

                            <div class="row">  
                                <div class="col-md-2"><h6> Width  </h6></div>
                                <div class="col"><?php echo $art_width; ?></div>

                            </div>
                            <div class="row">  
                                <div class="col-md-2">
                                    <h6>Height </h6> </div><div class="col"><?php echo $art_height; ?></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
<!--            <div class="container jumbotron">

                <h2>About this ArtWork :</h2>
                <p>
                    <?php echo $art_about; ?>
                </p>
            </div>-->

            <br>
            <div class="container jumbotron">
                <h5>Related Art:</h5>
                <hr>


                <?php
                $sql = "select * from art WHERE art_genre=? limit 6";
                $stmt = $dbhandler->prepare($sql);
                $stmt->execute(array($art_genre));
                if ($stmt->rowCount() == 0) {
                    $sql = "select * from auction_art limit 5";
                    $stmt = $dbhandler->prepare($sql);
                    $stmt->execute();
                }
                $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $mypath = "/webofart/displayart/aboutart.php?artid=";
                ?>

                <div class="row">
                    <?php
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
                                    $art_loc = "../image/userart/" . $value;
                                    break;
                            }
                        }
                        ?>
                        <div class="col-md-2">
                            <a href="<?php echo $mypath;
                echo $art_id; ?>">

                                <div class="card">

                                    <div class="card-img-top">
                                        <img src="<?php echo $art_loc; ?>" class="img-thumbnail" width="180px" height="200px">
                                    </div>
                                    <div class="card-footer">
                                        <h6><?php echo $art_title; ?> </h6>
                                    </div>


                                </div>
                            </a>
                        </div>
                        <?php
                    }
        }
                    ?> 
            </div>
            <hr>
        </div>
    </body>
</html>

