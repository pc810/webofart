<link rel="stylesheet" href="/webofart/bootstrap-4.3.1-dist/css/bootstrap.css">
<link rel="stylesheet" href="/webofart/bootstrap-4.3.1-dist/css/myglyphicon.css">
<nav class="navbar navbar-expand-sm bg-dark navbar-collapse">

    <a href="/webofart/index.php" class="navbar-brand"><img src="/webofart/include/Untitled-logo.png " width="120px" height="30px"></a>
    <div class="collapse navbar-collapse ">
        <ul class="navbar-nav">  

            <li class="nav-item"><a class="nav-link" href="/webofart/index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/webofart/page/buyart.php">Buy Art</a></li>
            <li class="nav-item"><a class="nav-link" href="/webofart/page/sellart.php">Sell Art</a></li>
            <li class="nav-item"><a class="nav-link" href="/webofart/page/about.php">About</a></li>
        </ul>
        <?php
        $flag = 0;
<<<<<<< HEAD

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
                                <a class="nav-link" href="/webofart/user/userprofile/userprofile.php">signed in as ' . $_SESSION["username"] . '</a>
=======
              
        if(session_status() == PHP_SESSION_NONE)
        {
                session_start();
                if(isset($_SESSION["username"]))
                {
                    $flag = 0;
                }
                else
                {
                   $flag = 1;
                }
            }
            else
            {
                $flag = 1;
            }
            
            if ($flag == 0)
            {
                
                $length = strlen($_SESSION["username"]);
                for($i=0;$i<(170-$length);$i++)
                {
                    echo "&nbsp;";
                }
                
                 echo '<ul class="nav navbar-right">
                            <li class="nav-item">
                                <a class="nav-link" href="/webofart/user/userprofile/userprofile.php">signed in as '.$_SESSION["username"].'</a>
>>>>>>> 21c4b4e5dfd3456960f772506a50323692a74e03
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-danger" href="/webofart/validate/signout.php">SignOut</a>
                            </li>   
                        </ul>';
<<<<<<< HEAD
        } else {
            echo '<ul class="nav ml-auto" >
=======
            }
            else
            {
                
                for($i=0;$i<(185);$i++)
                {
                    echo "&nbsp;";
                }
                echo '<ul class="nav float-right">
>>>>>>> 21c4b4e5dfd3456960f772506a50323692a74e03
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
