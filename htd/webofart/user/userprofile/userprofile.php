<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/dbcon.php";
include($path);
/* $path .= "/webofart/include/session.php";
  include($path);
 */
$path2 = $_SERVER['DOCUMENT_ROOT'];
$path2 .= "/webofart/include/session.php";
include($path2);
?>


<?php
try {
    
    if(isset($_SESSION["username"]))
    {
        
    }
    $username = $_SESSION["username"];
// echo $username;
    $sql = "SELECT * FROM user WHERE username='$username'";
    $query = $dbhandler->query($sql);


    while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
        foreach ($r as $key => $value) {
//echo $key.' ';
            switch ($key) {

                case "user_photo":
                    $user_photo = $value;
                    break;
                case "name":
                    $name = $value;
                    break;
                case "email":
                    $email = $value;
                    break;
                case "user_city":
                    $user_city = $value;
                    break;
                case "user_state":
                    $user_state = $value;
                    break;
                case "contact":
                    $contact = $value;
                    break;
                default:
                    echo '';
            }
        }
/*echo $name;
echo $username;
echo $user_photo;
    */}
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex, nofollow">

        <title><?php echo $name; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="userprofile.css">
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
$path3 = "/webofart/image/profile/".$user_photo;
?>

                        <img src="<?php echo htmlspecialchars($path3); ?>" alt="test" />

                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <form action="/webofart/user/userprofile/changephoto.php" method="post" enctype="multipart/form-data" >
                                <input type="file" name="file" onchange="this.form.submit()"/>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            <?php echo $name; ?>
                        </h5>
                        <h6>
                            Artist
                        </h6>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">MY ARTS</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <form action="/webofart/user/userprofile/editprofile.php" method="post" enctype="multipart/form-data" >
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </form>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>WORK LINK</p>
                        <a href="/webofart/user/userprofile/editprofile.php">Update Profile</a><br/>
                        <a href="/webofart/displayart/purchasehistory.php">Purchase History</a><br/>

                        <p></p>
                        <a href="/webofart/user/userprofile/deleteaccount.php">Delete Account</a><br/>
                        <a href="/webofart/validate/signout.php">Sign out</a><br/>


                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $username; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $name; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $email; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $contact; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>City</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $user_city; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>State</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $user_state; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="container">
                                <h2>Image Gallery</h2>
                                <p></p>
                                <p></p>
                                <p></p>
                                <div class="row">


                                    <?php
                                    $sql = "SELECT art_id,art_title,art_loc FROM art WHERE username='$username'";
                                    $query = $dbhandler->query($sql);
//echo $query->rowCount();
                                    while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
                                        foreach ($r as $key => $value) {
//echo $key.' ';

                                            $art_loc = "";
                                            switch ($key) {

                                                case "art_id":
                                                    $art_id = $value;
                                                    break;
                                                case "art_title":
                                                    $art_title = $value;
                                                    break;
                                                case "art_loc":
                                                    $art_loc = $value;
                                                    break;
                                                default:
                                                    echo '';
                                            }

                                           $path = "/webofart/image/userart/" . $art_loc;
                                          //  $path = "../" . $art_loc;
                                            $arts = "/webofart/user/userprofile/art.php?artid=" . $art_id;
//                                           $arts = "/webofart/displayart/aboutart.php?artid=" . $art_id;
                                        }
                                        ?>

                                        <div class="col-md-4">
                                            <div class="img-thumbnail">
                                                <a href="<?php echo htmlspecialchars($arts); ?>" target="_blank">
                                                    <img src="<?php echo htmlspecialchars($path); ?>" alt="<?php echo htmlspecialchars($art_title); ?>" style="width:100%" height="200">
                                                    <div class="caption">
                                                        <p><?php echo htmlspecialchars($art_title); ?></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label></label><br/>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
