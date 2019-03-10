<html>
    <head>
        
    </head>
    <body>
        <?php   $path = $_SERVER["DOCUMENT_ROOT"];
                $path.="/webofart/include/header.php";
                include_once($path);
                
                $path = $_SERVER["DOCUMENT_ROOT"];
                $path.="/webofart/include/dbcon.php";
                include_once($path);
                
                $sql = "select username,art_title,art_medium,art_price from art";
                
                $stmt = $dbhandler->prepare($sql);
                $stmt->execute();
                $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
               
                foreach ($rs as $row) 
                {
                    print_r($row);
                    echo "<br>";
                }
                
        ?>
        <div class="container">
            <div class="card-columns">
                <div class="card">
                    <img class="card-img-top" src="../image/login_successful.png" alt="yo">
                    <div class="card-body">
                        <h5 class="card-title">
                            Title
                        </h5>
                        <p class="card-text">
                            hello
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
        <?php $path = $_SERVER["DOCUMENT_ROOT"];
                $path.="/webofart/include/lessfooter.php";
                include_once($path);
        ?>
    </body>
</html>