<link rel="stylesheet" href="/webofart/bootstrap-4.3.1-dist/css/bootstrap.css">
<link rel="stylesheet" href="/webofart/bootstrap-4.3.1-dist/css/myglyphicon.css">
<script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>

<nav class="navbar navbar-expand-sm bg-dark navbar-collapse">

    <a href="/webofart/index.php" class="navbar-brand"><img src="/webofart/include/Untitled-logo.png " width="120px" height="30px"></a>
    <div class="collapse navbar-collapse ">
        <ul class="navbar-nav">  

            <li class="nav-item"><a class="nav-link" href="/webofart/index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/webofart/displayart/displayart.php?page=1&genre=all">Buy Art</a></li>
            <li class="nav-item"><a class="nav-link" href="/webofart/page/sellart.php">Sell Art</a></li>
            <li class="nav-item"><a class="nav-link" href="/webofart/page/about.php">About</a></li>
        </ul>
        <?php
        $flag = 0;

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            if (isset($_SESSION["username"])) {
                $flag = 0;
            } else {
                $flag = 1;
            }
        } else {
            $flag = 0;
        }

        if ($flag == 0) {

            echo '<ul class="nav ml-auto">
               

                                        <li class="nav-item">
                                            <a href="/webofart/displayart/cart.php" class="icons">
                                                <i class="lnr lnr lnr-cart"></i>
                                            </a>
                                        </li>


                                        
                            <li class="nav-item">
                                <a class="nav-link" href="/webofart/user/userprofile/userprofile.php">signed in as ' . $_SESSION["username"] . '</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-danger" href="/webofart/validate/signout.php">SignOut</a>
                            </li>
                            
                        </ul>';
        } else {
            echo '<ul class="nav ml-auto" >
                        <li class="nav-item">
                            <a class="nav-link" href="/webofart/user/registration.php"><span class="glyphicon glyphicon-user"></span> &nbsp; Sign up</a>
                        </li>
                        <li class="nav-item">    
                            <a class="nav-link" href="/webofart/user/login.php"><span class="glyphicon glyphicon-log-in"></span> &nbsp;Login</a>
                        </li>    
                     </ul>';
        }
        ?>
    </div>  
</nav>
