<html>
    <body>
        <?php $path = $_SERVER["DOCUMENT_ROOT"];
                $path.="/webofart/include/header.php";
                include_once($path);
        ?>
        <div class="container-fluid">
        
        <?php
        
            $path = $_SERVER["DOCUMENT_ROOT"];
            if(isset($_SESSION["username"]))
            {
                $path.="/webofart/art/registration.php";
            }
            else
            {
                $path.="/webofart/art/sellabout.php";
            }
                include_once($path);
            
        ?>
        </div>
    </body>
</html>