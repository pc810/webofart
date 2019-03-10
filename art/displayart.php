
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/dbcon.php";

include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/session.php";
include($path);
//if (isset($_GET["artid"]))
$art_id = $_GET["artid"];
//$art_id = $_GET;
if (1 == 1) {
    $sql = "select * from art WHERE art_id='$art_id'";
    $query = $dbhandler->query($sql);

    while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
        foreach ($r as $key => $value) {
            switch ($key) {



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
                case "art_price":
                    $art_price = $value;
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
                case "username":
                    $artist = $value;
            }
        }
    }
} else {
    //header("Location : /index.php");
}
?>
<html lang="en">
    <head>
    </head>
    <body>

        <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/header.php";
        include_once($path);
        ?>
        <div class="container-fluid">
            <br>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <img class="img-thumbnail" src="../image/userart/<?php echo $art_loc; ?>" alt="image">                           
                    <br>      <br>       <br>         
                    <form action="#">
                        <button class="btn btn-info" type="submit" name="addtocart">ADD TO CART    </button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-info" type="submit" name="buy">&nbsp;&nbsp;BUY&nbsp;&nbsp;   </button> 
                    </form>

                </div>
                <div class="col-md-1">
                    &nbsp;
                </div>
                <div class="col-md-5">
                    <div class=" jumbotron ">
                        <div class="row">
                            <h4 class="text-primary"><?php echo $art_title; ?></h4>
                        </div>
                        <br>
                        <div class="row">
                            <h5 class="text-success"><div class="btn-success">&nbsp;4 *&nbsp;</div></h5>
                        </div>
                           
                            <h6 class="text-success">Price</h6>
                            <h2>$<?php echo  $art_price;?></h2>
                            <br>
                        <br>

                        <div class="row">
                            <div class="card">
                                <a href="#" class="card-img-top">
                                    <img src="../image/profile/pc123456.jpg" class="img-thumbnail" width="100px" height="100px">
                                </a>
                            </div>
                            <div class="col">
                                <h1><?php echo $artist; ?></h1>                                
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
                                <?php echo $art_created_date ?>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-2">
                                <h6> Description </h6> 
                            </div>
                            <div class="col">
                                <?php echo $art_about; ?>
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
        </div>
    </div>
</div>
</body>
</html>

