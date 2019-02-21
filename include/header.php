<link href="/webofart/css/bootstrap.css" rel="stylesheet">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <img class="navbar-brand"src="/webofart/include/logo.png" alt="logo">
        </div>
        <ul class="nav navbar-nav">
            <li><a href="">Buy Art</a></li>
            <li><a href="">Sell Art</a></li>
            <li><a href="">About</a></li>
        </ul>
        <?php
        
              
              
        if(session_status() == PHP_SESSION_NONE)
        {
                          session_start();
                if(isset($_SESSION["username"]))
                {
                    echo '<ul class="nav navbar-nav navbar-right">
                        <li>
                             <a href="/webofart/index.php">welcome</a>
                        </li>
                        <li>
                            <a href="/webofart/validate/signout.php"><button class="mybtn btn-danger">signout</button></a>
                        </li>
                         </ul>';
                }
                else
                {
                    echo '<ul class="nav navbar-nav navbar-right">
            <li>
                <a href="/webofart/user/registration.php"><span class="glyphicon glyphicon-user"></span>  &nbsp;Sign up</a>
            </li>
            <li>
                <a href="/webofart/user/login.php"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Login</a>
            </li>              
        </ul>';
                }
            } 
            else 
            {
                
            
          
                echo '<ul class="nav navbar-nav navbar-right">
            <li>
                <a href="/webofart/user/registration.php"><span class="glyphicon glyphicon-user"></span>  &nbsp;Sign up</a>
            </li>
            <li>
                <a href="/webofart/user/login.php"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Login</a>
            </li>              
        </ul>';
       
/*        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="/webofart/user/registration.php"><span class="glyphicon glyphicon-user"></span>  &nbsp;Sign up</a>
            </li>
            <li>
                <a href="/webofart/user/login.php"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Login</a>
            </li>              
        </ul>*/
            }
            
            ?>
    </div>
</nav>
