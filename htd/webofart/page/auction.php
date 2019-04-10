<html>
    <head>
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
  
  .mytran{
      background-color: rgba(5,4,2,0.1);
width:850px;
height: 100%;
margin-left:auto;
margin-right:auto;
padding: 15px; 
  }
</style>
    </head>
    <body style="background-image: url('/webofart/image/web/pattern.png');">
        <?php
        $path = $_SERVER["DOCUMENT_ROOT"];
        $path .= "/webofart/include/header.php";
        include_once($path);

        $path = $_SERVER["DOCUMENT_ROOT"];
        $path .= "/webofart/include/dbcon.php";
        include_once($path);
        ?>
        
        <div class="mycontainer">
        <img src="/webofart/image/web/regback.jpg" width="100%" height="700px"> 
        <div class="centered">
        <font style="color:white; font-size: 100px;">
                Current Auctions
                </font>       
        </div>
        
        </div>
        <div class="container">             
<br>
        <hr>        
        <?php
        try {
            
            
          
            $sql = "select * from auction";
            $stmt = $dbhandler->prepare($sql);
            $stmt->execute();
            $auctions = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            
            $auction_id = 0;
            $auction_name = $art_loc = $auction_posted = $auction_start = $auction_end = "";
            echo "<div class='container jumbotron'>";
                if(isset($_SESSION["username"]))
                {
                    echo '<a href="../auction/auctionhistory.php" class="btn btn-info">Results</a>';
                }
            
                            if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1)
                            {
                                echo '<a href="../auction/create_auction.php">'
                                    . '  <button class="btn badge-info">Create Auction</button>'
                                    . '</a><br><br>';
                            }
            echo "<br><div class='col-md-8'><hr><br>";
            if($stmt->rowCount()<=0)
            {
                echo "<h1>No Auction Found</h1>";
            }
            foreach ($auctions as $key => $auction) {
                foreach ($auction as $key => $value) {
                    switch ($key) {
                        case "auction_id":
                            $auction_id = $value;
                            break;
                        case "auction_name":
                            $auction_name = $value;
                            break;
                        case "art_loc":
                            $art_loc = "../image/userart/" . $value;
                            break;
                        case "auction_posted":
                            $auction_posted = $value;
                            break;
                        case "auction_start":
                            $auction_start = $value;
                            break;
                        case "auction_end":
                            $auction_end = $value;
                            break;
                        default:
                            break;
                    }
                }
                //echo "<br>".$auction_id."<br>".$auction_name."<br>".$art_loc."<br>".$auction_posted."<br>".$auction_start."<br>".$auction_end."<br>";
                ?>          
                <div class="jumbotron" style="background-size: 100% 170%; background-repeat: no-repeat; background-image: url(<?php echo $art_loc; ?>);">
<!--                    <p>
                        ID : <?php //echo $auction_id; ?>
                    </p>-->
                    
                    <center>                        
                            <h3 id="<?php echo $auction_id; ?>" style="color:white;"> </h3>
                    </center>
                    <br>
                    <br>
                </div>    
                <div class="row">
                    <div class="col-md-4"><h3><?php echo $auction_name;?> </h3>    </div>                    
                    <div class="ml-auto">                        
                        <div id="myend<?php echo $auction_id; ?>">
                            
                        
                        <?php 
                            if(isset($_SESSION["admin"]) && $_SESSION["admin"]== 1)
                            {
                        ?>
                            <a class="btn badge-success" href="/webofart/auction/edit_auction.php?auction_id=<?php echo $auction_id; ?>">
                                Edit
                        </a>
                        <a class='btn badge-danger' href='/webofart/auction/deleteauction.php?auction_id=<?php echo $auction_id; ?>'>                            
                        Delete
                        </a>
                            <a class="btn badge-info" href="/webofart/auction/create_auction_art.php?auction_id=<?php echo $auction_id; ?>">
                                Add Art
                            </a>
                        <?php
                            }                            
                        ?>
                        <a class="btn badge-dark" href="/webofart/auction/aboutauction.php?auction_id=<?php echo $auction_id; ?>">
                                Bid Now
                        </a>
                        </div>
                        
                    </div>
                </div>                        
                <hr>    
                <br><br>    
                <?php
            }
            echo "</div></div>";
        } catch (PDOException $exception) {
            echo $exception;
        }
        ?>
        <script>
<?php
foreach ($auctions as $key => $auction) {
    echo 'mytime(' . $auction['auction_id'] . ',"' . $auction['auction_end'] . '"'.',"' . $auction['auction_start'] . '");';
}
?>


            function mytime(a, b,c)
            {
                //document.getElementById(a).innerHTML = b.toString();
                var countDownDate = new Date(b).getTime();
                var auction_start = new Date(c).getTime();
               
// Update the count down every 1 second
                var x = setInterval(function () {

                    // Get todays date and time
                    var now = new Date().getTime();

                    var flag = 0;
                    if(auction_start>=now)
                    {
                        flag = 1;
                        countDownDate = auction_start;
                    }
                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Display the result in the element with id="demo"
                    if(flag==0)
                    {
                        document.getElementById(a).innerHTML = "<h5>Live Bidding closes in </h5><br><h2>"+days + "d " + hours + "h "
                            + minutes + "m " + seconds + "s "+"</h2>";
                    }
                    else
                    {
                        document.getElementById(a).innerHTML = "<h5>Starting in </h5><br><h2>"+days + "d " + hours + "h "
                            + minutes + "m " + seconds + "s "+"</h2>";
                    }
                    var value = 'myend'+a; 
                    console.log(value); 
                    // If the count down is finished, write some text 
                    if (distance < 0 && flag==0) {
                        clearInterval(x);
                        
            <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"]==1)
                {
                    
             ?>       
                             document.getElementById(value).innerHTML =  "<a class='btn badge-success' href='/webofart/auction/finish.php?auction_id=<?php echo $auction_id; ?>'>Finish</a> &nbsp;"+"<a class='btn badge-danger' href='/webofart/auction/deleteauction.php?auction_id=<?php echo $auction_id; ?>'>Delete</a>";             
                <?php
                
                }?>
                        document.getElementById(a).innerHTML = "EXPIRED";
                    }
                }, 1000);
            }

        </script>  
        </div>
    </body>
</html>