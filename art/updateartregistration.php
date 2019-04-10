 <html>
    <body style="background:url('/webofart/image/web/back2.png');">

        <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/header.php";
        include_once($path);
        
        
        
        if(!isset($_SESSION["username"]))
        {
            header("Location: /webofart/index.php");
        }
        $sql = "select * from art where art_id=?";
        $stmt = $dbhandler->prepare($sql);
        $stmt->execute(array($_GET["artid"]));
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
       // print_r($r);
        $art_title = $art_medium = $art_width = $art_height = $art_about = $art_genre = $art_created_date = $art_price = $art_status = 0;
         
                foreach ($r[0] as $key => $value) {
                    switch ($key) {
                        case "art_title":
                            $art_title = $value;
                            break;
                        case "art_loc":
                            $art_loc = $value;
                            break;
                        case "art_medium":
                            $art_medium = $value;
                            break;  
                        case "art_width":
                            $art_width = $value;
                            break;
                        case "art_height":
                            $art_height = $value;
                            break;
                        case "art_about":
                            $art_about = $value;
                            break;       
                        case "art_genre":
                            $art_genre = $value;
                            break;
                        case "art_created_date":
                            $art_created_date = $value;
                            break;
                        case "art_price":
                            $art_price = $value;
                            break;
                        case "art_status":
                            $art_status = $value;
                            break;
                    }
                }
            
        
        
        
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex" style="background:no-repeat scroll center url('/webofart/image/userart/<?php echo $art_loc;?>');">
                            <!-- Background image for card set in CSS! -->
                        </div>
                        <div class="card-body">
                            <h1 class="card-title text-center" style="font-size:50px;">Update Art</h1>
                            <form action="../art/updateart.php" method="POST" class="form-signin">
                                <input type="hidden" name="art_id" value="<?php echo $_GET["artid"];?>">
                                <div class="form-label-group">
                                    <input type="text" id="inputart_title" class="form-control" placeholder="Title" required autofocus name="art_title" value="<?php echo $art_title; ?>">
                                    <label for="inputart_title">Art title</label>
                                </div>

                                <label> Medium</label>
                                <div class="form-group ">
                                    <select name="art_medium" id="inputart_medium" class="form-control">
                                        <option value="oil" <?php if($art_medium == "oil")  echo "selected='selected'"; ?>>Oil</option>
                                        <option value="watercolor"  <?php if($art_medium == "watercolor")  echo "selected='selected'"; ?>>Water-Color</option>
                                        <option value="acrylic" <?php if($art_medium == "acrylic")  echo "selected='selected'"; ?> >Acrylic</option>
                                        <option value="pastels" <?php if($art_medium == "pastels")  echo "selected='selected'"; ?> >Pastels</option>
                                    </select>
                                </div>
                                
                                <label>Genre</label>
                                <div class="form-group">
                                    <select name="art_genre" id="inputGenre" class="form-control">
                                        <option value="nature" <?php if($art_genre == "nature")  echo "selected='selected'"; ?> >Nature</option>
                                        <option value="digital" <?php if($art_genre == "digital")  echo "selected='selected'"; ?>>Digital</option>
                                        <option value="abstract" <?php if($art_genre == "abstract")  echo "selected='selected'"; ?>>Abstract</option>
                                        <option value="history" <?php if($art_genre == "history")  echo "selected='selected'"; ?>>History</option>
                                    </select>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="inputart_width" class="form-control" placeholder="Width" required autofocus name="art_width" value="<?php echo $art_width;?>">
                                    <label for="inputart_width">Width</label>
                                </div>   
                                <div class="form-label-group">
                                    <input type="text" id="inputheight" class="form-control" placeholder="Height" required autofocus name="art_height" value="<?php echo $art_height;?>">
                                    <label for="inputheight">Height</label>
                                </div>        
                                <div class="form-label-group">
                                    <input type="text" id="inputart_about" class="form-control" placeholder="About" required autofocus name="art_about" value="<?php echo $art_about;?>">
                                    <label for="inputart_about"> About</label>
                                </div>       

                                <div class="form-label-group">
                                    <input type="text" id="inputprice" class="form-control" placeholder="Cost" required autofocus name="art_price" value="<?php echo $art_price;?>">
                                    <label for="inputprice">Cost</label>
                                </div>         
                                <div class="form-label-group">
                                    <input type="date" id="inputart_created_date" class="form-control" placeholder="Creation date" required autofocus name="art_created_date" value="<?php echo $art_created_date;?>">
                                    <label for="inputart_created_date">Art created</label>
                                </div>                              
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
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
