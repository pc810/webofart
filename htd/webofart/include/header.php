<link rel="stylesheet" href="/webofart/bootstrap-4.3.1-dist/css/bootstrap.css">
<link rel="stylesheet" href="/webofart/bootstrap-4.3.1-dist/js/bootstrap.min.js">
<link rel="stylesheet" href="/webofart/bootstrap-4.3.1-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/webofart/bootstrap-4.3.1-dist/css/myglyphicon.css">
<link rel="stylesheet" href="/webofart/css/mycss.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
<nav class="navbar navbar-expand-sm  navbar-collapse"  style="background-color: #e3f2fd;">

    <a href="/webofart/index.php" class="navbar-brand"><img src="/webofart/include/logo.png " width="120px" height="30px"></a>
    <div class="collapse navbar-collapse ">
        <ul class="navbar-nav">  
            <li class="nav-item"><a class="nav-link" href="/webofart/index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/webofart/displayart/displayart.php?page=1&genre=all">Buy Art</a></li>
            <li class="nav-item"><a class="nav-link" href="/webofart/page/sellart.php">Sell Art</a></li>
            <li class="nav-item"><a class="nav-link" href="/webofart/page/auction.php">Auction</a></li>
            <li class="nav-item"><a class="nav-link" href="/webofart/page/about.php">About</a></li>
        </ul>
        <?php
        $flag = 0;

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            if (isset($_SESSION["username"])) {
                $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=webofart', 'root', '');
                //$dbhandler = new PDO('mysql:host=localhost;dbname=webofart','root','root');
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "select * from admin_user where username=?";
                $stmt = $dbhandler->prepare($sql);
                $stmt->execute(array($_SESSION["username"]));
                $count = $stmt->rowCount();
                if ($count > 0) {
                    $_SESSION["admin"] = 1;
                } else {
                    $_SESSION["admin"] = 0;
                }
                $flag = 0;
            } else {
                $flag = 1;
            }
        } else {
            $flag = 0;
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=webofart', 'root', '');
            //$dbhandler = new PDO('mysql:host=localhost;dbname=webofart','root','root');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "select * from admin_user where username=?";
            $stmt = $dbhandler->prepare($sql);
            $stmt->execute(array($_SESSION["username"]));
            $count = $stmt->rowCount();
            if ($count > 0) {
                $_SESSION["admin"] = 1;
            } else {
                $_SESSION["admin"] = 0;
            }
        }

        if ($flag == 0) {
            if ($count > 0) {
                //   echo 'admin';
            }
            echo '<ul class="nav ml-auto">
               

                            <li class="nav-item">
                                <a href="/webofart/displayart/cart.php">
                                   <img src="/webofart/image/web/shopping-cart-small.png">
                                </a>
                                      </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/webofart/user/userprofile/userprofile.php">signed in as ' . $_SESSION["username"] . '</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-danger" href="/webofart/validate/signout.php">Sign Out</a>
                            </li>
                            
                        </ul>';
        } else {
            echo '<ul class="nav ml-auto" >
                        <li class="nav-item">
                            <a class="nav-link" href="/webofart/user/registration.php">
                            <img src="/webofart/image/web/add-user-male.png"> &nbsp; Sign up</a>
                        </li>
                        <li class="nav-item">    
                            <a class="nav-link" href="/webofart/user/login.php">
                            <img src="/webofart/image/web/enter-2.png"> &nbsp;Login</a>
                        </li>    
                     </ul>';
        }
        ?>
    </div>  
</nav>
