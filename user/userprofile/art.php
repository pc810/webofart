
<?php 
     
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/webofart/include/dbcon.php";
            include_once($path);
            $path .= "/webofart/include/session.php";
            include($path);
            
?>
<?php
    $art_id=$_GET[artid];
    echo $_GET[artid];
    echo 'hello';
   $sql = "select * from art WHERE art_id='$art_id'";
   $query = $dbhandler->query($sql);
   echo $query->rowCount();


while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
foreach ($r as $key => $value) {
//echo $key.' ';
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
default:
echo '';


}
}
echo $art_price;
}

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex, nofollow">

        <title><?php echo $name; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <style type="text/css">
            body{
                background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            }
            .emp-profile{
                padding: 3%;
                margin-top: 3%;
                margin-bottom: 3%;
                border-radius: 0.5rem;
                background: #fff;
            }
            .profile-img{
                text-align: center;
            }
            .profile-img img{
                width: 70%;
                height: 40%;
                border-radius: 0%;
            }
            .profile-img .file {
                position: relative;
                overflow: hidden;
                margin-top: -20%;
                width: 40%;
                border: none;
                border-radius: 10;
                font-size: 15px;
                background: #212529b8;
            }
            .profile-img .file input {
                position: absolute;
                opacity: 0;
                right: 0;
                top: 0;
            }
            .profile-head h5{
                color: #333;
            }
            .profile-head h6{
                color: #0062cc;
            }
            .profile-edit-btn{
                border: none;
                border-radius: 1.5rem;
                width: 70%;
                padding: 2%;
                font-weight: 600;
                color: #6c757d;
                cursor: pointer;
            }
            .proile-rating{
                font-size: 12px;
                color: #818182;
                margin-top: 5%;
            }
            .proile-rating span{
                color: #495057;
                font-size: 15px;
                font-weight: 600;
            }
            .profile-head .nav-tabs{
                margin-bottom:5%;
            }
            .profile-head .nav-tabs .nav-link{
                font-weight:600;
                border: none;
            }
            .profile-head .nav-tabs .nav-link.active{
                border: none;
                border-bottom:2px solid #0062cc;
            }
            .profile-work{
                padding: 14%;
                margin-top: -15%;
            }
            .profile-work p{
                font-size: 12px;
                color: #818182;
                font-weight: 600;
                margin-top: 10%;
            }
            .profile-work a{
                text-decoration: none;
                color: #495057;
                font-weight: 600;
                font-size: 14px;
            }
            .profile-work ul{
                list-style: none;
            }
            .profile-tab label{
                font-weight: 600;
            }
            .profile-tab p{
                font-weight: 600;
                color: #0062cc;
            }    </style>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    </head>
    <!------ Include the above in your HEAD tag ---------->
    <body>
       
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/header.php";
include_once($path);
?>
        <div class="container emp-profile">

            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
<?php
$path = "/webofart/image/userart/".$art_loc;
echo $path;
?>

                        <img src="<?php echo htmlspecialchars($path); ?>" alt="test" />

                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
<?php echo $art_title; ?>
                        </h5>
                        
                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p></p>
                        
                        <a href="/webofart/validate/signout.php">Sign out</a><br/>


                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Title</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $art_title; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>About</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $art_about; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Creation date</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $art_created_date; ?></p>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Height</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $art_height; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Width</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $art_width; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Price</label>
                                </div>
                                <div class="col-md-6">
                                    <p>₹<?php echo $art_price; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

