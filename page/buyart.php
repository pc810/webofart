<html>
    <head>
        
    </head>
    <body>
        <?php $path = $_SERVER["DOCUMENT_ROOT"];
                $path.="/webofart/include/header.php";
                include_once($path);
        ?>
        <div class="container-fluid">
           
            <div class="container bg-primary">
                    <br>
                    <div class="jumbotron">
                        <h1 class="text-uppercase text-center"><font class="bg-primary">Hello There</font></h1>
                        <p class="text-center text-primary">
                            This Is buy art Page.
                        </p>
                    </div>
                <br>
            </div>
        <div class="container">
                &nbsp;
                <div class="row">
                      &nbsp;  &nbsp;   &nbsp;
                    <div class="card col-md-3 bg-info">
                        <div class="card-header bg-danger">Head</div>
                        <div class="card-body">Basic card</div>
                        <div class="card-footer bg-primary">Dead</div>
                    </div>
                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                    <div class="card col-md-3 bg-info">
                        <div class="card-header bg-danger">Head</div>
                        <div class="card-body">Basic card</div>
                        <div class="card-footer bg-primary">Dead</div>
                    </div>
                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                    <div class="card col-md-3 bg-info">
                        <div class="card-header bg-danger">Head</div>
                        <div class="card-body">Basic card</div>
                        <div class="card-footer bg-primary">Dead</div>
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