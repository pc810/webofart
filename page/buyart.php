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
                
                $sql = "select art_id,username,art_title,art_medium,art_price,art_loc from art";
                $stmt = $dbhandler->prepare($sql);
                $stmt->execute();
                $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo '<div class="container">
                             <div class="card-columns">';
                foreach ($rs as $row) 
                {
                   // print_r($row);
                
                
             echo '<a href="../art/displayart.php?artid='.$row["art_id"].'"> <div class="card">
                    <img class="card-img-top" src="../image/userart/'.$row["art_loc"].'" alt="Img">
                    <div class="card-body">
                        <a href="../art/displayart.php?artid='.$row["art_id"].'" ><h5 class="card-title">
                            '.$row["art_title"].'
                        </h5></a>
                        <p class="card-text">
                            '.$row["art_price"].'
                        </p>
                    </div>
                </a></div>';
                }
                ?>
            </div>
            
        </div>
        <?php $path = $_SERVER["DOCUMENT_ROOT"];
                $path.="/webofart/include/footer.php";
                include_once($path);
        ?>
    </body>
</html>