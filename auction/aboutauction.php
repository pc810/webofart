<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body style="background: url('/webofart/image/web/pattern.png');">
        <?php
        $path = $_SERVER["DOCUMENT_ROOT"];
        $path .= "/webofart/include/header.php";
        include_once($path);

        $path = $_SERVER["DOCUMENT_ROOT"];
        $path .= "/webofart/include/dbcon.php";
        include_once($path);
        $sql = "select * from auction_art where auction_id=?";
        $stmt = $dbhandler->prepare($sql);
        $stmt->execute(array($_GET["auction_id"]));
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $sql = "select * from auction where auction_id=?";
        $stmt = $dbhandler->prepare($sql);
        $stmt->execute(array($_GET["auction_id"]));
        $rs_about = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>      
        <br>
        <br>
        <div class="container jumbotron">

            <center>

                <div class="jumbotron" style="background-size: 100% 170%; background-repeat: no-repeat; background-image: url(<?php echo "../image/userart/" . $rs_about[0]["art_loc"]; ?>)">
                    <div class="row">
                        <div class="col ml-auto">
                            <font style="color: white;">
                            <h3 style=""><?php echo $rs_about[0]["auction_name"]; ?></h3>
                            <p style="" id="<?php echo $rs_about[0]["auction_id"]; ?>" >YO</p>
                            </font>
                        </div>
                    </div>
                </div>

                <br><br>
            </center>
            <h1>About</h1>
            <hr>
            <h6>
<?php echo $rs_about[0]["auction_about"]; ?>
            </h6>
            
        </div>
        <div class="container jumbotron">
            <div class="card-columns">
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
            case "art_current_bid":
                $art_current_bid = $value;
                break;
            case "art_loc":
                $art_loc = "../image/userart/" . $value;
                break;
        }
    }
    ?>
                    
                    
                        <a href="displayart.php?artid=<?php echo $art_id; ?>">
                            <div class="card">
                            <img class="card-img-top" src="<?php echo $art_loc; ?>" alt="image" >
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $art_title; ?></h5>
                            </div>
                            <script>
                                $(document).ready(function () {
                                    setInterval(function () {
                                        $("#currentprice<?php echo $art_id;?>").load("showprice.php?artid=<?php echo $art_id;?>")
                                    }, 1000);
                                });
                            </script>
                            <div class="card-footer">
                                <small class="text-muted">Current BID:</small><h6 id="currentprice<?php echo $art_id;?>"></h6>
                            </div>
                        </div>    
                    </a>


    <?php
}
?> </div>
        </div>
        <script>
<?php
echo 'mytime(' . $rs_about[0]['auction_id'] . ',"' . $rs_about[0]['auction_end'] . '"'.',"' . $rs_about[0]['auction_start'] . '");';

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
                    // If the count down is finished, write some text 
                    if (distance < 0 && flag==0) {
                        clearInterval(x);
                        document.getElementById(a).innerHTML = "EXPIRED";
                    }
                }, 1000);
            }

        </script>  

    </body>
</html>