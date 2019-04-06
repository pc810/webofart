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

<?php
//$path = $_SERVER['DOCUMENT_ROOT'];
//$path .= "/webofart/include/dbcon.php";
//include($path);
/* $path .= "/webofart/include/session.php";
  include($path);
 */
?>

<?php
        
  //      session_start();
//$_SESSION['username']="smp1613s";
    //   $_SESSION['username']="pc8101234";
   if(!isset($_SESSION["username"])){
       header("Location: /webofart/index.php");
   }
$username = $_SESSION["username"];
        $flag=1;
        $emailerr=NULL;
        $contacterr=NULL;
    if(isset($_POST['submit']))
    {
        echo '000';
        $name=$_POST['name'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $regemail="/[a-zA-Z]\w+@(\w{2,8})\.(com|in)/";
        $regcontact="/(\+91){0,1}\d{10}/";
        
        if(!preg_match($regemail,$email ))
        {
            echo '000';
            $flag=0;
            $emailerr="invalid email";
        }
        if(!preg_match($regcontact, $contact))
        {
            echo '000';
            $flag=0;
            $contacterr="invalid contect";
        }
        
        if($flag==1)
        {
            echo '001';
            $sql="update user set name='$name',email='$email',contact='$contact',user_city='$city',user_state='$state' where username='$username'";
            //$sql="update user set name=?,email=?,contact=?,user_city=?,user_state=? where username='$username'";
            echo '002';
            $query = $dbhandler->query($sql);
            //$query->execute(array($name,$email,$contact,$city,$state));
            echo '003';
            header('Location: userprofile.php');
        }
    }
?>


<?php
try {
    //session_start();
//$_SESSION['username']="smp1613s";
    //   $_SESSION['username']="pc8101234";
    $username = $_SESSION["username"];
//  echo $username;
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
//echo $name;
//echo $username;
//echo $user_photo;
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>
<div class="container emp-profile">

            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <?php
                        $path = "../../image/profile/".$user_photo;
                        //$path = "../../image/profile/".$_SESSION["usern"];
                        //$path = "../image/profile/" . $user_photo;
//echo $path;           
                        ?>

                        <img src="<?php echo htmlspecialchars($path); ?>" alt="test" />

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
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Edit Profile</a>
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
                        <p>WORK LINK</p>

                        <a href="/webofart/user/userprofile/deleteaccount.php">Delete Account</a><br/>
                        <a href="/webofart/validate/signout.php">Sign out</a><br/>


                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <?php if($emailerr!=NULL){?>
                            <div class="col-md-6">
                                    <label>*INVALID EMAIL</label>
                            </div>
                            <?php }?>
                            <?php if($contacterr!=NULL){?>
                            <div class="col-md-6">
                                    <label>*INVALID CONTACT</label>
                            </div>
                            <?php }?>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input type="text" name="name" value="<?php echo $name;?>"/></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input type="text" name="email" value="<?php echo $email;?>"/></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Contact</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input type="text" name="contact" value="<?php echo $contact;?>"/></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>City</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input type="text" name="city" value="<?php echo $user_city;?>"/></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>State</label>
                                </div>
                                <div class="col-md-6">
                                    <p><input type="text" name="state" value="<?php echo $user_state;?>"/></p>
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