<html>
    <body>
        <?php $path = $_SERVER["DOCUMENT_ROOT"];
                $path.="/webofart/include/header.php";
                include_once($path);
        ?>
        <div class="container-fluid">
    
        <?php
         $path = $_SERVER["DOCUMENT_ROOT"];
                $path.="/webofart/art/registration.php";
                include_once($path);
       
        ?>
        </div>
            <?php
        $path = $_SERVER["DOCUMENT_ROOT"];
                $path.="/webofart/include/footer.php";
                include_once($path);
        ?>
    </body>
</html>