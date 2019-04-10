<html>
    <body style="background: url('/webofart/image/web/pattern.png');">

        <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/header.php";
        include_once($path);
        ?>
 <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex" style="background:no-repeat scroll center url('/webofart/image/web/regfore3.jpg');">
                            <!-- Background image for card set in CSS! -->
                        </div>
                        <div class="card-body">
                            <h1 class="card-title text-center" style="font-size:50px;">Register Auction</h1>
                            <form action="registerauction.php" method="POST" enctype="multipart/form-data" class="form-signin">
                                    
                                <div class="form-label-group">
                                    <input type="text" id="inputauction_name" class="form-control" placeholder="Name" required autofocus name="auction_name">
                                    <label for="inputauction_name">Name</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" id="inputauction_about" class="form-control" placeholder="About" required autofocus name="auction_about">
                                    <label for="inputauction_about">About</label>
                                </div>
                                
                                <div class="form-label-group">
                                    <input type="file" id="inputart_loc" name="art_loc" class="form-control" placeholder="Upload Art" required autofocus>
                                    <label for="inputart_loc">Upload Poster</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="datetime-local" id="inputauction_start" class="form-control" placeholder="Creation date" required autofocus name="auction_start">
                                    <label for="inputauction_start">Start time</label>
                                </div>    
                                <div class="form-label-group">
                                    <input type="datetime-local" id="inputauction_end" class="form-control" placeholder="Creation date" required autofocus name="auction_end">
                                    <label for="inputauction_end">End time</label>
                                </div>    
                                
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="mybtn">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/webofart/include/footer.php";
//  include_once($path);
            ?>
    
        
        </body>
</html>
