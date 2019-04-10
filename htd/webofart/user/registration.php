<html>    
    <body style="background:url('/webofart/image/web/pattern.png');">
<!--<body style="background:url('https://doc.x3dom.org/tutorials/basics/htmlCSS/pattern.png');">-->
        
        <?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/webofart/include/header.php";
   include_once($path);
   if(isset($_SESSION["username"])){
           header("Location: /webofart/index.php");
        }
 else {
?>
    <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex">
                            <!-- Background image for card set in CSS! -->
                        </div>
                        <div class="card-body">
                            <h1 class="card-title text-center" style="font-size:50px;">Register Yourself</h1>
                            <form action="/webofart/user/signup.php" method="POST" enctype="multipart/form-data" class="form-signin">
                                <div class="form-label-group">
                                    <input type="text" id="inputname" class="form-control" placeholder="Username" required autofocus name="name">
                                    <label for="inputname">Name</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="file" id="inputuser_photo" name="user_photo" class="form-control" placeholder="profile" required autofocus>
                                    <label for="inputuser_photo">Profile</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="inputusername" class="form-control" placeholder="Username" required autofocus name="username">
                                    <label for="inputusername">Username</label>
                                </div>

                                <hr>
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                                    <label for="inputPassword">Password</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required name="repassword">
                                    <label for="inputConfirmPassword">Confirm password</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="email" id="inputemail" class="form-control" placeholder="email" required autofocus name="email">
                                    <label for="inputemail">Email</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" id="inputcontact" class="form-control" placeholder="contact" required autofocus name="contact">
                                    <label for="inputcontact">Phone number</label>
                                </div>
                                <div class="form-label-group">
                                    Male
                                    <input type="radio" id="inputmale"  placeholder="gender" required name="gender" value="male">  
                                    Female
                                    <input type="radio" id="inputfemale"  placeholder="gender" required autofocus name="gender" value="female">  
                                </div>
                                <div class="form-label-group">
                                    <input type="date" id="inputBirthday" class="form-control" placeholder="Birthday" required autofocus name="dob">
                                    <label for="inputBirthday">Birthday</label>
                                </div>                              
                                <div class="form-label-group">
                                    <input type="text" id="inputAddress" class="form-control" placeholder="Address" required autofocus name="user_addr">
                                    <label for="inputAddress">Address</label>
                                </div>   
                                <div class="form-label-group">
                                    <input type="text" id="inputCity" class="form-control" placeholder="City" required autofocus name="user_city">
                                    <label for="inputCity">City</label>
                                </div>        
                                <div class="form-label-group">
                                    <input type="text" id="inputPincode" class="form-control" placeholder="Pincode" required autofocus name="user_pincode">
                                    <label for="inputPincode"> Pincode</label>
                                </div>       

                                <div class="form-label-group">
                                    <input type="text" id="inputState" class="form-control" placeholder="State" required autofocus name="user_state">
                                    <label for="inputState"> State</label>
                                </div>       
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                                <a class="d-block text-center mt-2 small" href="/webofart/user/login.php">Sign In</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <?php }?>
</body>
</html>
