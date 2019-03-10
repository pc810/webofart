<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>  
        <!--<link rel="stylesheet" href="/webofart/bootstrap-4.3.1-dist/css/myfoot.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style>
            .bgimg
            {
                height: 80%; position: relative;

                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;

            }
        </style>
    </head>
    <body>
        <?php include_once 'include/header.php'; ?>
        <div class="jumbotron bgimg jumbotron-fluid" style="background-image: url(http://blog.hostbaby.com/wp-content/uploads/2014/03/Trees_1400x900-1024x658.png);">
            <div class="container">
                <h1 class="display text-dark">
                    <font style="size: 30px;">Online Art Gallery</font>
                </h1>
                <div class="row">
                    <div class="col-md-8">
                        <h4>Meet contemporary artists, buy directly from them </h4>
                        <br><h6>&nbsp; Register YourSelf Today</h6>
                        <br>
                        <br>
                        <form class="form-group" action="user/registration.php">
                            <button class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="image/web/collage_art.jpg" alt="Card image cap">
                            <div class="card-body">
                                Collage
                            </div>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="image/web/digital_art.jpg" alt="Card image cap">
                            <div class="card-body">
                                Digital Art
                            </div>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="image/web/drawing_art.jpg" alt="Card image cap">
                            <div class="card-body">
                                Drawing
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="image/web/light_art.jpg" alt="Card image cap">
                            <div class="card-body">
                                Light Art
                            </div>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="image/web/painting_art.jpg" alt="Card image cap">
                            <div class="card-body">
                                Paintings
                            </div>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="image/web/photography_art.jpg" alt="Card image cap">
                            <div class="card-body">
                              Photography
                            </div>
                        </div>
                    </div>
                </div>
            
    </body>
</html>