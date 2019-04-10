 <html>
    <body style="background:url('/webofart/image/web/back2.png');">

        <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/header.php";
        include_once($path);
        
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex" style="background:no-repeat scroll center url('/webofart/image/web/regfore1.jpg');">
                            <!-- Background image for card set in CSS! -->
                        </div>
                        <div class="card-body">
                            <h1 class="card-title text-center" style="font-size:50px;">Register Art</h1>
                            <form action="../art/registerart.php" method="POST" enctype="multipart/form-data" class="form-signin">
                                <div class="form-label-group">
                                    <input type="text" id="inputart_title" class="form-control" placeholder="Title" required autofocus name="art_title">
                                    <label for="inputart_title">Art title</label>
                                </div>

                                <label> Medium</label>
                                <div class="form-group ">
                                    <select name="art_medium" id="inputart_medium" class="form-control">
                                        <option value="oil">Oil</option>
                                        <option value="watercolor">Water-Color</option>
                                        <option value="acrylic">Acrylic</option>
                                        <option value="pastels">Pastels</option>
                                    </select>
                                </div>
                                
                                <label>Genre</label>
                                <div class="form-group">
                                    <select name="art_genre" id="inputGenre" class="form-control">
                                        <option value="nature">Nature</option>
                                        <option value="digital">Digital</option>
                                        <option value="abstract">Abstract</option>
                                        <option value="history">History</option>
                                    </select>
                                </div>
                                <div class="form-label-group">
                                    <input type="file" id="inputart_loc" name="art_loc" class="form-control" placeholder="Upload Art" required autofocus>
                                    <label for="inputart_loc">Upload Art</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="inputart_width" class="form-control" placeholder="Width" required autofocus name="art_width">
                                    <label for="inputart_width">Width</label>
                                </div>   
                                <div class="form-label-group">
                                    <input type="text" id="inputheight" class="form-control" placeholder="Height" required autofocus name="art_height">
                                    <label for="inputheight">Height</label>
                                </div>        
                                <div class="form-label-group">
                                    <input type="text" id="inputart_about" class="form-control" placeholder="About" required autofocus name="art_about">
                                    <label for="inputart_about"> About</label>
                                </div>       

                                <div class="form-label-group">
                                    <input type="text" id="inputprice" class="form-control" placeholder="Cost" required autofocus name="art_price">
                                    <label for="inputprice">Cost</label>
                                </div>         
                                <div class="form-label-group">
                                    <input type="date" id="inputart_created_date" class="form-control" placeholder="Creation date" required autofocus name="art_created_date">
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
