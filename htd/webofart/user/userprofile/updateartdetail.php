
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/dbcon.php";

include_once($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/webofart/include/session.php";
include($path);
?>

<?php
$art_id = $_SESSION['artid'];

if(isset($_POST['submit']))
    {
   //     echo '000';
     //   echo $art_id;
        $title=$_POST['title'];
        $about=$_POST['about'];
        $creationdate=$_POST['creationdate'];
        $price=$_POST['price'];
        $width=$_POST['width'];
        $height=$_POST['height'];
        $status=$_POST['status'];
        
        
        
       
            $sql="update art set art_title='$title',art_about='$about',art_created_date='$creationdate',art_price='$price',art_width='$width',art_height='$height',art_status='$status' where art_id='$art_id'";
            //$sql="update user set name=?,email=?,contact=?,user_city=?,user_state=? where username='$username'";
       //     echo '002';
            $query = $dbhandler->query($sql);
            //$query->execute(array($name,$email,$contact,$city,$state));
         //   echo '003';
            header('Location: art.php');
    }      
?>
<?php
$art_id = $_SESSION['artid'];
//echo $_GET["artid"];
//echo 'hello';
$sql = "select * from art WHERE art_id='$art_id'";
$query = $dbhandler->query($sql);
//echo $query->rowCount();


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
            case "art_status":
                $art_status = $value;
                break;
            default:
  //              echo '';
        }
    }
    //echo $art_price;
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
//$path = "/webofart/image/profile/".$art_loc;
//$path = "/webofart/image/userart/anna-sullivan-518434-unsplash.jpg";
//$path = "/webofart/image/userart/" . $art_loc;

//$path = "../../image/userart/".$art_loc;
//$path = "../".$art_loc;
//echo $path;
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

                        <a href="/webofart/user/userprofile/userprofile.php">My Profile</a><br/>

                        <a href="/webofart/validate/signout.php">Sign out</a><br/>


                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Title</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input type="text" name="title" value="<?php echo $art_title; ?>"/></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>About</label>
                                </div>
                                <div class="col-md-6">
                                    <p><textarea rows="4" cols="40" name="about" required="required" autofocus><?php echo $art_about; ?>
                                        </textarea></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Creation date</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input type="text" name="creationdate" value="<?php echo $art_created_date; ?>"/></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Height</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input type="text" name="height" value="<?php echo $art_height; ?>"/></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Width</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input type="text" name="width" value="<?php echo $art_width; ?>"/></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Price</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input type="text" name="price" value="<?php echo $art_price; ?>"/></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-6">
                                    <p><select name="status">
                                            <option value="available" selected="Selected">Available</option>
                                            <option value="sold">Sold</option>
                                        </select></p>
                                </div>
                            </div>
                                <div class='btn'>
                                   <input type="submit" name="submit" value="Update"/>
                               </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

