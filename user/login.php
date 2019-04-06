<html>
    <body style="background:url('/webofart/image/web/pattern.png');">

        <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/webofart/include/header.php";
        include_once($path);
        ?>
        <div class="container">
           <br><br><br>
           <div class="row" >
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex" style="background:no-repeat scroll center url('/webofart/image/web/regfore4.jpg');">
                            <!-- Background image for card set in CSS! -->
                        </div>
                        <div class="card-body">
                            <h1 class="card-title text-center" style="font-size:50px;">LOGIN PAGE</h1>
                            <form action="/webofart/validate/validateuser.php" method="POST"class="form-signin">
                                <div class="form-label-group">
                                    <input type="text" id="inputusername" class="form-control" placeholder="Username" required autofocus name="username">
                                    <label for="inputusername">Username</label>
                                </div>
                                
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                                    <label for="inputPassword">Password</label>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>