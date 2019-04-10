<html>
    <body style="background:url('/webofart/image/web/pattern.png');">

        <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/header.php";
        include_once($path);
            $sql = "select * from auction where auction_id = ?";
            $stmt = $dbhandler->prepare($sql);
            $stmt->execute(array($_GET["auction_id"]));
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);            
                foreach ($rs[0] as $key => $value) {
                    switch ($key) {                        
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
                        case "auction_about":
                            $auction_about = $value;
                            break;                        
                    }
                }
                //echo $auction_start;
                $auction_start = date_create($auction_start);
                $auction_start_big = date_format($auction_start,"Y-m-d");
                $auction_start_end = date_format($auction_start,"H:i");
                $auction_start = $auction_start_big."T".$auction_start_end;
                $auction_end = date_create($auction_end);
                $auction_end_big = date_format($auction_end,"Y-m-d");
                $auction_end_end = date_format($auction_end,"H:i");
                $auction_end = $auction_end_big."T".$auction_end_end;
                
            
        ?>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex" style="background:no-repeat scroll center url(<?php echo $art_loc;?>);">
                            <!-- Background image for card set in CSS! -->
                        </div>
                        <div class="card-body">
                            <h1 class="card-title text-center" style="font-size:50px;">Update Auction</h1>
                            <form action="update_auction.php" method="POST" class="form-signin">
                                    
                                <div class="form-label-group">
                                    <input type="text" id="inputauction_name" class="form-control" placeholder="Name" required autofocus name="auction_name" value="<?php echo $auction_name;?>">
                                    <label for="inputauction_name">Name</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" id="inputauction_about" class="form-control" placeholder="About" required autofocus name="auction_about" value="<?php echo $auction_about;?>">
                                    <label for="inputauction_about">About</label>
                                </div>
                                
                                <div class="form-label-group">
                                    <input type="datetime-local" id="inputauction_start" class="form-control" placeholder="Creation date" required autofocus name="auction_start" value="<?php echo $auction_start;?>">
                                    <label for="inputauction_start">Start time</label>
                                </div>    
                                <div class="form-label-group">
                                    <input type="datetime-local" id="inputauction_end" class="form-control" placeholder="Creation date" required autofocus name="auction_end" value="<?php echo $auction_end;?>">
                                    <label for="inputauction_end">End time</label>
                                </div>    
                                
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="mybtn">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
        
      

    </body>
</html>
