<!-- include this file for user identity -->

<?php
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
          ?>
