<!-- include this file for user identity -->

<?php
    //echo 'hi';
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
                //echo $flag;
          }
          ?>
